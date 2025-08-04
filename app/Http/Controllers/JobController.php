<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobPosting;

class JobController extends Controller
{
    public function index()
    {
        $featuredJobs = JobPosting::where('is_active', true)
            ->where('is_featured', true)
            ->orderBy('created_at', 'desc')
            ->get();
            
        $jobs = JobPosting::where('is_active', true)
            ->where('is_featured', false)
            ->orderBy('created_at', 'desc')
            ->get()
            ->groupBy('department');
            
        return view('jobs.index', compact('featuredJobs', 'jobs'));
    }
    
    public function show($slug)
    {
        $job = JobPosting::where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();
            
        return view('jobs.show', compact('job'));
    }
    
    public function apply(Request $request)
    {
        $request->validate([
            'job_id' => 'required|exists:job_postings,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'position' => 'required|string|max:255',
            'cv_link' => 'required|url|max:500',
            'cover_letter' => 'nullable|string|max:2000',
        ]);
        
        // Xử lý lưu đơn ứng tuyển
        // Có thể tạo model JobApplication hoặc gửi email trực tiếp
        
        return back()->with('success', 'Đơn ứng tuyển của bạn đã được gửi thành công! Chúng tôi sẽ liên hệ sớm nhất có thể.');
    }
}
