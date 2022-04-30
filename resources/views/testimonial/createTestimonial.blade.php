@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <form action="{{ route('testimonial.save') }}" enctype="multipart/form-data" method="post">
                @csrf
                <div class="text-center mt-3">
                    <h3>Leave a Testimonial for our Tutors!</h3>
                </div>
                <div class="form-group row mt-4">
                    <label for="subject">Subject Taught:</label>
                    <input class="form-control" type="text" name="subject" id="subject">
                </div>

                <div class="form-group row mt-3">
                    <label for="description">Your Review:</label>
                    <input class="form-control" type="text" name="description" id="description">
                </div>

                <div class="form-group row mt-5">
                    <button type="submit" class="btn btn-primary">Next</button>
                </div>                                  
            </form>
        </div>
    </div>
</div>
@endsection
