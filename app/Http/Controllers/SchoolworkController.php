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
        $schoolworks = Schoolwork::where('status', '=', '0')->orderBy('deadline')->get();
        $submittedworks = Schoolwork::where('status', '=', '1')->orderBy('date_submitted')->get();

        return view('schoolworks.index', [
            'schoolworks' => $schoolworks, 
            'subjects' => $subjects, 
            'submittedworks' => $submittedworks
        ]);
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

    public function destroy($id) {
        $schoolwork = Schoolwork::findOrFail($id);
        $schoolwork->delete();

        return redirect('/schoolworks');
    }

    public function update($id) {
        $schoolwork = Schoolwork::findOrFail($id);

        $schoolwork->date_submitted = date('m/d/Y');
        $schoolwork->status = true;

        $schoolwork->save();

        return redirect('/schoolworks');
    }
}
