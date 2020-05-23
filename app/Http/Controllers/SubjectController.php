<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subject;

class SubjectController extends Controller
{
    public function index() {
        $subjects = Subject::all();
        // $subjects = Subject::orderby('name', 'desc')->get();
        // $subjects = Subject::latest();
        // $subjects = Subject::where('name', 'CIS 2202')->get();

        return view('subjects.index', ['subjects' => $subjects]);
    }

    public function show($id) {
        $subject = Subject::findOrFail($id);
        return view('subjects.show', ['subject' => $subject]);
    }

    public function create() {
        return view('subjects.create');
    }
}
