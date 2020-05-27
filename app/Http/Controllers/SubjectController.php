<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subject;
use App\User;
use App\Schoolwork;

class SubjectController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);

        // $subjects = Subject::orderBy('created_at', 'desc')->get();
        // $subjects = Subject::orderby('name', 'desc')->get();
        // $subjects = Subject::latest();
        // $subjects = Subject::where('name', 'CIS 2202')->get();

        return view('subjects.index', ['subjects' => $user->subjects]);
    }

    public function store() {
        $subject = new Subject();

        $subject->name = request('name');
        $subject->description = request('description');
        $subject->user_id = auth()->user()->id;

        $subject->save();    

        return redirect('/subjects')->with('mssg', 'success');
    }

    public function destroy($id) {
        Schoolwork::where('subject_id', '=', $id)->delete();

        $subject = Subject::findOrFail($id);
        $subject->delete();

        return redirect('/subjects')->with('mssg', 'danger');
    }

    public function update($id) {
        $subject = Subject::findOrFail($id);

        $subject->name = request('name');
        $subject->description = request('description');

        $subject->save();

        return redirect('/subjects')->with('mssg', 'edit');
    }

}
