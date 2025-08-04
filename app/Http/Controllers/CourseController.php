<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::where('is_active', true)
            ->orderBy('category')
            ->orderBy('sort_order')
            ->get()
            ->groupBy('category');
            
        return view('courses.index', compact('courses'));
    }
    
    public function toeic()
    {
        $courses = Course::where('category', 'TOEIC')
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->get();
            
        return view('courses.toeic', compact('courses'));
    }
    
    public function ielts()
    {
        $courses = Course::where('category', 'IELTS')
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->get();
            
        return view('courses.ielts', compact('courses'));
    }
    
    public function conversation()
    {
        $courses = Course::where('category', 'Giao tiếp')
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->get();
            
        return view('courses.conversation', compact('courses'));
    }
    
    public function vstep()
    {
        $courses = Course::where('category', 'VSTEP')
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->get();
            
        return view('courses.vstep', compact('courses'));
    }
    
    public function foundation()
    {
        $courses = Course::where('category', 'A1-A2')
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->get();
            
        return view('courses.foundation', compact('courses'));
    }
    
    public function intermediate()
    {
        $courses = Course::where('category', 'B1-B2')
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->get();
            
        return view('courses.intermediate', compact('courses'));
    }
    
    public function advanced()
    {
        $courses = Course::where('category', 'C1-C2')
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->get();
            
        return view('courses.advanced', compact('courses'));
    }
    
    public function business()
    {
        $courses = Course::where('category', 'Business German')
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->get();
            
        return view('courses.business', compact('courses'));
    }
    
    public function exam()
    {
        $courses = Course::where('category', 'Exam Preparation')
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->get();
            
        return view('courses.exam', compact('courses'));
    }
    
    public function secondary()
    {
        $courses = Course::where('category', 'B1-B2')
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->get();
            
        return view('courses.intermediate', compact('courses'));
    }
}
