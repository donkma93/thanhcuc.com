<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Overview;
use Illuminate\Http\Request;
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
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'paragraph_1' => 'required|string',
            'paragraph_2' => 'required|string',
            'video_url' => 'nullable|url',
            'video_title' => 'nullable|string|max:255',
            'button_1_text' => 'nullable|string|max:100',
            'button_1_url' => 'nullable|string|max:255',
            'button_2_text' => 'nullable|string|max:100',
            'button_2_url' => 'nullable|string|max:255',
            'button_3_text' => 'nullable|string|max:100',
            'button_3_url' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Deactivate all other overviews if this one is active
        if ($request->has('is_active') && $request->is_active) {
            Overview::where('is_active', true)->update(['is_active' => false]);
        }

        Overview::create($request->all());

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

        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'paragraph_1' => 'required|string',
            'paragraph_2' => 'required|string',
            'video_url' => 'nullable|url',
            'video_title' => 'nullable|string|max:255',
            'button_1_text' => 'nullable|string|max:100',
            'button_1_url' => 'nullable|string|max:255',
            'button_2_text' => 'nullable|string|max:100',
            'button_2_url' => 'nullable|string|max:255',
            'button_3_text' => 'nullable|string|max:100',
            'button_3_url' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Deactivate all other overviews if this one is active
        if ($request->has('is_active') && $request->is_active) {
            Overview::where('id', '!=', $id)->where('is_active', true)->update(['is_active' => false]);
        }

        $overview->update($request->all());

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
}
