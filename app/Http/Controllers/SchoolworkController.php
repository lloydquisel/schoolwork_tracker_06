<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subject;
use App\Schoolwork;

class SchoolworkController extends Controller
{
    public function index() {
        $subjects = Subject::all();
        $schoolworks = Schoolwork::all();

        return view('schoolworks.index', ['schoolworks' => $schoolworks, 'subjects' => $subjects]);
    }
}
