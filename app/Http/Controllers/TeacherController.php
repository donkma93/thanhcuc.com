<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('name')
            ->paginate(12);
            
        return view('teachers.index', compact('teachers'));
    }
    
    public function show($slug)
    {
        $teacher = Teacher::where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();
            
        return view('teachers.show', compact('teacher'));
    }
}
