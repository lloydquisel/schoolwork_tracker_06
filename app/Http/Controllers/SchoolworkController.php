<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subject;
use App\User;
use App\Schoolwork;

class SchoolworkController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        
        // $schoolworks = Schoolwork::all();
        $schoolworks = Schoolwork::where(['status' => '0', 'user_id' => $user_id])->orderBy('deadline')->get();
        $submittedworks = Schoolwork::where(['status' => '1', 'user_id' => $user_id])->orderBy('date_submitted')->get();

        return view('schoolworks.index', [
            'schoolworks' => $schoolworks, 
            'subjects' => $user->subjects, 
            'submittedworks' => $submittedworks
        ]);
    }

    

    public function store() {
        $schoolwork = new Schoolwork();
        
        $schoolwork->description = request('description');
        $schoolwork->subject_id = request('subject_id');
        $schoolwork->deadline = request('deadline');
        $schoolwork->status = false;
        $schoolwork->user_id = auth()->user()->id;

        $schoolwork->save();

        return redirect('/schoolworks');
    }
    
    public function update($id) {
        $schoolwork = Schoolwork::findOrFail($id);

        $schoolwork->date_submitted = date('m/d/Y');
        $schoolwork->status = true;

        $schoolwork->save();

        return redirect('/schoolworks');
    }

    public function destroy($id) {
        $schoolwork = Schoolwork::findOrFail($id);
        $schoolwork->delete();

        return redirect('/schoolworks');
    }
}
