<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Testimonial;

class TestimonialController extends Controller
{
    public function create(){
        return view('testimonial.createTestimonial');
    }

    public function save(){
        $data = request()->validate([
            'subject' => 'required',
            'description' => 'required',
        ]);

        $user = Auth::user();
        $testimonial = new Testimonial();
        
        $testimonial->studentId = $user->id;
        $testimonial->subject = request('subject');
        $testimonial->description = request('description');
        $saved = $testimonial->save();

        if($saved){
            return redirect('/main');
        }
    }

    public function edit($testimonialId){
        $testimonial = Testimonial::where('id', $testimonialId)->first();
        return view('testimonial.editTestimonial', [
            'testimonial' => $testimonial
        ]);
    }

    public function update($testimonialId){
        $data = request()->validate([
            'subject' => 'required',
            'description' => 'required',
        ]);

        $testimonial = Testimonial::where('id', $testimonialId)->first();
        $testimonial->subject = request('subject');
        $testimonial->description = request('description');

        $updated = $testimonial->save();

        if($updated){
            return redirect('main');
        }
    }

    public function delete($testimonialId){
        
        $testimonial = Testimonial::where('id', $testimonialId)->delete();
        return redirect('main')
        ;
    }
}
