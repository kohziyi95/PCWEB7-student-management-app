<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Grade;

class GradeController extends Controller
{
    public function create(){
        return view('grades.createGrades');
    }

    public function save(){
        $data = request()->validate([
            'subject' => 'required',
            'grade' => 'required',
            'date_assigned' => 'required',
        ]);

        $user = Auth::user();
        $grade_record = new Grade();
        
        $grade_record->studentId = $user->id;
        $grade_record->subject = request('subject');
        $grade_record->grade = request('grade');
        $grade_record->date = request('date_assigned');
        $saved = $grade_record->save();

        if($saved){
            return redirect('/main');
        }
    }

    public function edit($gradesId){
        $user = Auth::user();
        $grade = Grade::where('id', $gradesId)->first();
        return view('grades.editGrades', [
            'grade' => $grade
        ]);
    }

    public function update($gradesId){
        $data = request()->validate([
            'subject' => 'required',
            'grade' => 'required',
            'date_assigned' => 'required',
        ]);

        $grade = Grade::where('id', $gradesId)->first();
        $grade->subject = request('subject');
        $grade->grade = request('grade');
        $grade->date = request('date_assigned');

        $updated = $grade->save();

        if($updated){
            return redirect('main');
        }
    }

    public function delete($gradesId){
        
        $grade = Grade::where('id', $gradesId)->delete();
        return redirect('main')
        ;
    }
}
