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
        // Log the request data for debugging
        \Log::info('News store request data:', $request->all());
        
        $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'nullable|string|max:500',
            'content' => 'required|string',
            'category' => 'required|in:KIẾN THỨC TIẾNG ĐỨC,HOẠT ĐỘNG CÔNG TY',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_published' => 'boolean',
            'is_featured' => 'boolean',
            'published_at' => 'nullable|date',
            'translations' => 'nullable|array',
            'translations.*.locale' => 'required|string|in:vi,en,de',
            'translations.*.title' => 'nullable|string|max:255',
            'translations.*.excerpt' => 'nullable|string|max:500',
            'translations.*.content' => 'nullable|string',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->title);
        $data['author_id'] = null; // Set to null for now since we're using admin auth
        
        // Handle boolean fields properly
        $data['is_published'] = $request->has('is_published');
        $data['is_featured'] = $request->has('is_featured');

        // Handle featured image upload
        if ($request->hasFile('featured_image')) {
            $imagePath = $request->file('featured_image')->store('news', 'public');
            $data['featured_image'] = $imagePath;
        }

        // Set published_at if publishing for the first time
        if ($data['is_published'] && !$request->published_at) {
            $data['published_at'] = now();
        }
        
        // Convert empty string to null for published_at
        if (empty($data['published_at'])) {
            $data['published_at'] = null;
        }
        
        // Convert empty string to null for excerpt
        if (empty($data['excerpt'])) {
            $data['excerpt'] = null;
        }

        try {
            // Log the data for debugging
            \Log::info('Creating news with data:', $data);
            
            // Additional validation for content
            if (empty(trim($data['content']))) {
                return back()->withInput()
                    ->withErrors(['content' => 'Nội dung tin tức không được để trống.']);
            }
            
            $news = News::create($data);
            
            // Handle translations
            if ($request->has('translations')) {
                foreach ($request->translations as $translation) {
                    if (!empty($translation['locale']) && !empty($translation['title'])) {
                        $news->setTranslated('title', $translation['title'], $translation['locale']);
                    }
                    if (!empty($translation['locale']) && !empty($translation['excerpt'])) {
                        $news->setTranslated('excerpt', $translation['excerpt'], $translation['locale']);
                    }
                    if (!empty($translation['locale']) && !empty($translation['content'])) {
                        $news->setTranslated('content', $translation['content'], $translation['locale']);
                    }
                }
            }
            
            \Log::info('News created successfully with ID:', ['id' => $news->id]);
            
            return redirect()->route('admin.news.index')
                ->with('success', 'Tin tức đã được tạo thành công.');
        } catch (\Exception $e) {
            \Log::error('Error creating news:', ['error' => $e->getMessage(), 'data' => $data]);
            
            return back()->withInput()
                ->withErrors(['error' => 'Có lỗi xảy ra khi tạo tin tức: ' . $e->getMessage()]);
        }
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
        // Log the request data for debugging
        \Log::info('News update request data:', $request->all());
        
        $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'nullable|string|max:500',
            'content' => 'required|string',
            'category' => 'required|in:KIẾN THỨC TIẾNG ĐỨC,HOẠT ĐỘNG CÔNG TY',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_published' => 'boolean',
            'is_featured' => 'boolean',
            'published_at' => 'nullable|date',
            'translations' => 'nullable|array',
            'translations.*.locale' => 'required|string|in:vi,en,de',
            'translations.*.title' => 'nullable|string|max:255',
            'translations.*.excerpt' => 'nullable|string|max:500',
            'translations.*.content' => 'nullable|string',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->title);
        
        // Handle boolean fields properly
        $data['is_published'] = $request->has('is_published');
        $data['is_featured'] = $request->has('is_featured');

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
        if ($data['is_published'] && !$news->published_at && !$request->published_at) {
            $data['published_at'] = now();
        }
        
        // Convert empty string to null for published_at
        if (empty($data['published_at'])) {
            $data['published_at'] = null;
        }
        
        // Convert empty string to null for excerpt
        if (empty($data['excerpt'])) {
            $data['excerpt'] = null;
        }

        try {
            // Log the data for debugging
            \Log::info('Updating news with data:', ['news_id' => $news->id, 'data' => $data]);
            
            // Additional validation for content
            if (empty(trim($data['content']))) {
                return back()->withInput()
                    ->withErrors(['content' => 'Nội dung tin tức không được để trống.']);
            }
            
            $news->update($data);
            
            // Handle translations
            if ($request->has('translations')) {
                foreach ($request->translations as $translation) {
                    if (!empty($translation['locale']) && !empty($translation['title'])) {
                        $news->setTranslated('title', $translation['title'], $translation['locale']);
                    }
                    if (!empty($translation['locale']) && !empty($translation['excerpt'])) {
                        $news->setTranslated('excerpt', $translation['excerpt'], $translation['locale']);
                    }
                    if (!empty($translation['locale']) && !empty($translation['content'])) {
                        $news->setTranslated('content', $translation['content'], $translation['locale']);
                    }
                }
            }
            
            \Log::info('News updated successfully');
            
            return redirect()->route('admin.news.index')
                ->with('success', 'Tin tức đã được cập nhật thành công.');
        } catch (\Exception $e) {
            \Log::error('Error updating news:', ['error' => $e->getMessage(), 'news_id' => $news->id, 'data' => $data]);
            
            return back()->withInput()
                ->withErrors(['error' => 'Có lỗi xảy ra khi cập nhật tin tức: ' . $e->getMessage()]);
        }
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
