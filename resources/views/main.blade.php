@extends('layouts.app')

@section('content')
<div class="container">
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        <div class="justify-start text-center">
            <div class="row mt-4">
                <h1>Student Management App</h1>
                <h4 class="mt-4">An App To Connect Students With Tutors</h4>
            </div>
        </div>
    </div>
    <div class="row justify-content-center mt-3">
        <div class="col-4 card m-3 p-3">
            <div class="card-body ">
                <h3 class="card-title text-capitalize text-center">
                    Hi, {{$user->name}}!
                </h3>
                <div class="text-start w-100 mt-4">
                    <div class="h5">
                        <p>Your Profile: </p>
                    </div>
                    <div class="h6 mt-2 ps-4 pe-4">
                        <table class="card p-2">
                            <tr>
                                <td>                            
                                    ID: {{ $user->id }}
                                </td>
                            </tr>
                            <tr>
                                <td>                            
                                    Name: {{ $user->name }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Age: {{ $profile->age }}
                                </td>
                            </tr>
                            <tr> 
                                <td>
                                    Education Level: {{ $profile->education }}
                                </td>
                            </tr>
                        </table>
                        
                    </div>
                   
                </div>
                <div class="mt-3">
                    <div class="h5">
                        <p>Your Actions: </p>
                    </div>
                    <div class="h6 ps-4 pe-4">
                        <table class="card p-2">
                            <tr>
                                <td>                            
                                    <a class="mt-2" href="#testimonial">View Testimonials</a>
                                </td>
                            </tr>
                            <tr>
                                <td>                            
                                    <a class="mt-2" href="{{ route('profile.edit') }}">Edit Your Profile</a>
                                </td>
                            </tr>
                            <tr>
                                <td>                            
                                    <a class="mt-2" href="{{ route('addTestimonial') }}">Add a Testimonial</a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a class="mt-2" href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">Log Out</a>
                                </td>
                            </tr>
                        </table>             
                    </div>
                </div>
            </div>
        </div>

        <div class="col-4 card m-3 p-3">
            <div class="card-body text-center">
                <h3 class="card-title text-capitalize">
                    Your Grades:
                </h3>
                @if($grade != null)
                <div class="">
                    @foreach($grade as $grades)
                    <div class="mt-3 mb-3 card p-3">
                        <table class=" text-start w-100">
                            <tr>
                                <td>Subject: {{ $grades->subject }}</td>
                            </tr>
                            <tr>
                                <td>Level: {{ $profile->education }}</td>
                            </tr>
                            <tr> 
                                <td>Grade: {{ $grades->grade }}</td>
                            </tr>
                            <tr> 
                                <td>Date: {{ $grades->date }}</td>
                            </tr>
                            
                        </table>
                        <div class="text-center mt-3 mb-2">
                            <a class="btn btn-outline-secondary" href="/grades/edit/{{ $grades->id }}">Edit Record</a>
                            <a class="btn btn-outline-secondary" href="/grades/delete/{{ $grades->id }}">Delete Record</a>
                        </div>
                    </div>
                    @endforeach 
                    <div><a href="{{ route('addGrades') }}" class="mt-3 btn btn-outline-secondary">Add a New Record!</a></div>

                </div>
                @else
                    <div><a href="{{ route('addGrades') }}" class="mt-3 btn btn-outline-secondary">Add Your Grades!</a></div>
                @endif
            </div>
        </div>
        <hr class="mt-5 w-75">
        <div id="testimonial" class="text-center m-4">
            <h2>Testimonials From Our Students</h2>
            <div class="row pt-2 ">
                @foreach($testimonial as $t)
                    <div class="col-4 mt-3 mb-3">
                        <div class="card p-3 h-100">
                            <p>Student ID: {{ $t->studentId }}</p>
                            <p>Subject Tutored: {{ $t->subject }}</p>
                            <p>{{ $t->description }}</p>
                            @if ($user->id == $t->studentId)
                                <div class="text-center mt-3 mb-2">
                                    <a class="btn btn-outline-secondary" href="/testimonial/edit/{{ $t->id }}">Edit Testimonial</a>
                                    <a class="btn btn-outline-secondary" href="/testimonial/delete/{{ $t->id }}">Delete Testimonial</a>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="text-center mt-3">
                <a class="row btn btn-outline-secondary" href="{{ route('addTestimonial') }}">
                    {{ __('Add A New Testimonial') }}
                </a>
            </div>
        </div>
        
    </div>

@endsection
