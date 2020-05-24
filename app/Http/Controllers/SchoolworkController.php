<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subject;
use App\Schoolwork;

class SchoolworkController extends Controller
{
    public function index() {
        $subjects = Subject::all();
        // $schoolworks = Schoolwork::all();
        $schoolworks = Schoolwork::orderBy('deadline')->get();

        return view('schoolworks.index', ['schoolworks' => $schoolworks, 'subjects' => $subjects]);
    }

    public function store() {
        $schoolwork = new Schoolwork();
        
        $schoolwork->description = request('description');
        $schoolwork->subject_id = request('subject_id');
        $schoolwork->deadline = request('deadline');
        $schoolwork->status = false;

        $schoolwork->save();

        return redirect('/schoolworks');
    }
}
