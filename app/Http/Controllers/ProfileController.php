<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;

class ProfileController extends Controller
{
    public function create(){
        return view('profile.createProfile');
    }

    public function save(){
        $data = request()->validate([
            'age' => 'required',
            'education' => 'required',
        ]);

        $user = Auth::user();
        $profile = new Profile();
        
        $profile->studentId = $user->id;
        $profile->age = request('age');
        $profile->education = request('education');
        $saved = $profile->save();

        if($saved){
            return redirect('/grades');
        }
    }

    public function edit(){
        $user = Auth::user();
        $profile = Profile::where('studentId', $user->id)->first();
        return view('profile.editProfile', [
            'profile' => $profile
        ]);
    }

    public function update(){
        $data = request()->validate([
            'age' => 'required',
            'education' => 'required',
        ]);

        $user = Auth::user();
        $profile = Profile::where('studentId', $user->id)->first();
        $profile->age = request('age');
        $profile->education = request('education');

        $updated = $profile->save();

        if($updated){
            return redirect('main');
        }
    }
}

