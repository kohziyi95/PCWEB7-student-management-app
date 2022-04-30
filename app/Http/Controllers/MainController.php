<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;
use App\Models\Grade;
use App\Models\Testimonial;

class MainController extends Controller
{
    public function index(){
        $user = Auth::user();
        $profile = Profile::where('studentId', $user->id)->first();
        $grade = Grade::where('studentId', $user->id)->get();
        $testimonial = Testimonial::all();
        // $posts = \App\Post::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();
        // $postscount = \App\Post::where('user_id', $user->id)->count();

        return view('main', [
            'user' => $user,
            'profile' => $profile,
            'grade'=> $grade,
            'testimonial' => $testimonial
        ]);
    }
}
