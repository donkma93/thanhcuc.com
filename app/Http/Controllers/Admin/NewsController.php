<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::orderBy('published_at', 'desc')
            ->orderBy('created_at', 'desc')
            ->paginate(15);
            
        return view('admin.news.index', compact('news'));
    }

    public function create()
    {
        return view('admin.news.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'nullable|string|max:500',
            'content' => 'required|string',
            'category' => 'required|in:KIẾN THỨC TIẾNG ĐỨC,HOẠT ĐỘNG CÔNG TY',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_published' => 'boolean',
            'is_featured' => 'boolean',
            'published_at' => 'nullable|date',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->title);
        $data['author_id'] = auth()->id();

        // Handle featured image upload
        if ($request->hasFile('featured_image')) {
            $imagePath = $request->file('featured_image')->store('news', 'public');
            $data['featured_image'] = $imagePath;
        }

        // Set published_at if not provided
        if ($request->is_published && !$request->published_at) {
            $data['published_at'] = now();
        }

        News::create($data);

        return redirect()->route('admin.news.index')
            ->with('success', 'Tin tức đã được tạo thành công.');
    }

    public function show(News $news)
    {
        return view('admin.news.show', compact('news'));
    }

    public function edit(News $news)
    {
        return view('admin.news.edit', compact('news'));
    }

    public function update(Request $request, News $news)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'nullable|string|max:500',
            'content' => 'required|string',
            'category' => 'required|in:KIẾN THỨC TIẾNG ĐỨC,HOẠT ĐỘNG CÔNG TY',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_published' => 'boolean',
            'is_featured' => 'boolean',
            'published_at' => 'nullable|date',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->title);

        // Handle featured image upload
        if ($request->hasFile('featured_image')) {
            // Delete old image if exists
            if ($news->featured_image) {
                Storage::disk('public')->delete($news->featured_image);
            }
            
            $imagePath = $request->file('featured_image')->store('news', 'public');
            $data['featured_image'] = $imagePath;
        }

        // Set published_at if publishing for the first time
        if ($request->is_published && !$news->published_at && !$request->published_at) {
            $data['published_at'] = now();
        }

        $news->update($data);

        return redirect()->route('admin.news.index')
            ->with('success', 'Tin tức đã được cập nhật thành công.');
    }

    public function destroy(News $news)
    {
        // Delete featured image if exists
        if ($news->featured_image) {
            Storage::disk('public')->delete($news->featured_image);
        }

        $news->delete();

        return redirect()->route('admin.news.index')
            ->with('success', 'Tin tức đã được xóa thành công.');
    }

    public function togglePublished(News $news)
    {
        $news->update([
            'is_published' => !$news->is_published,
            'published_at' => !$news->is_published ? now() : null
        ]);

        $status = $news->is_published ? 'đã xuất bản' : 'đã ẩn';
        
        return redirect()->route('admin.news.index')
            ->with('success', "Tin tức đã {$status}.");
    }

    public function toggleFeatured(News $news)
    {
        $news->update(['is_featured' => !$news->is_featured]);

        $status = $news->is_featured ? 'đã gắn nổi bật' : 'đã bỏ nổi bật';
        
        return redirect()->route('admin.news.index')
            ->with('success', "Tin tức đã {$status}.");
    }
}
