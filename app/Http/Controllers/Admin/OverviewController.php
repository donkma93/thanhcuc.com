<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Overview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class OverviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $overviews = Overview::orderBy('created_at', 'desc')->get();
        return view('admin.overviews.index', compact('overviews'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.overviews.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $this->validateOverview($request);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = $this->extractOverviewData($request);
        $data['image_path'] = $this->handleImageUpload($request) ?? 'images/about/team-photo.jpg';

        // Deactivate all other overviews if this one is active
        if ($data['is_active']) {
            Overview::where('is_active', true)->update(['is_active' => false]);
        }

        Overview::create($data);

        return redirect()->route('admin.overviews.index')
            ->with('success', 'Nội dung tổng quan đã được tạo thành công!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $overview = Overview::findOrFail($id);
        return view('admin.overviews.show', compact('overview'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $overview = Overview::findOrFail($id);
        return view('admin.overviews.edit', compact('overview'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $overview = Overview::findOrFail($id);

        $validator = $this->validateOverview($request);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = $this->extractOverviewData($request);

        if ($uploadedPath = $this->handleImageUpload($request, $overview->image_path)) {
            $data['image_path'] = $uploadedPath;
        }

        // Deactivate all other overviews if this one is active
        if ($data['is_active']) {
            Overview::where('id', '!=', $id)->where('is_active', true)->update(['is_active' => false]);
        }

        $overview->update($data);

        return redirect()->route('admin.overviews.index')
            ->with('success', 'Nội dung tổng quan đã được cập nhật thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $overview = Overview::findOrFail($id);
        $this->deleteUploadedImage($overview->image_path);
        $overview->delete();

        return redirect()->route('admin.overviews.index')
            ->with('success', 'Nội dung tổng quan đã được xóa thành công!');
    }

    /**
     * Toggle active status
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function toggleActive($id)
    {
        $overview = Overview::findOrFail($id);

        if ($overview->is_active) {
            $overview->update(['is_active' => false]);
            $message = 'Nội dung tổng quan đã được ẩn!';
        } else {
            // Deactivate all other overviews
            Overview::where('id', '!=', $id)->update(['is_active' => false]);
            $overview->update(['is_active' => true]);
            $message = 'Nội dung tổng quan đã được kích hoạt!';
        }

        return redirect()->route('admin.overviews.index')
            ->with('success', $message);
    }

    private function validateOverview(Request $request)
    {
        return Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'paragraph_1' => 'required|string',
            'paragraph_2' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'image_title' => 'nullable|string|max:255',
            'button_1_text' => 'nullable|string|max:100',
            'button_1_url' => 'nullable|string|max:255',
            'button_2_text' => 'nullable|string|max:100',
            'button_2_url' => 'nullable|string|max:255',
            'button_3_text' => 'nullable|string|max:100',
            'button_3_url' => 'nullable|string|max:255',
        ], [
            'image.image' => 'File tải lên phải là hình ảnh.',
            'image.mimes' => 'Hình ảnh phải có định dạng: jpeg, png, jpg, gif hoặc webp.',
            'image.max' => 'Dung lượng hình ảnh tối đa 5MB.',
        ]);
    }

    private function extractOverviewData(Request $request): array
    {
        $data = $request->only([
            'title',
            'paragraph_1',
            'paragraph_2',
            'image_title',
            'button_1_text',
            'button_1_url',
            'button_2_text',
            'button_2_url',
            'button_3_text',
            'button_3_url',
        ]);
        $data['is_active'] = $request->has('is_active');

        return $data;
    }

    private function handleImageUpload(Request $request, ?string $oldPath = null): ?string
    {
        if (!$request->hasFile('image')) {
            return null;
        }

        $uploadDir = public_path('images/overviews');
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        $file = $request->file('image');
        $name = 'overview_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move($uploadDir, $name);

        if ($oldPath) {
            $this->deleteUploadedImage($oldPath);
        }

        return 'images/overviews/' . $name;
    }

    private function deleteUploadedImage(?string $path): void
    {
        if ($path && str_starts_with($path, 'images/overviews/')) {
            $fullPath = public_path($path);
            if (File::exists($fullPath)) {
                File::delete($fullPath);
            }
        }
    }
}
