@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <form action="/grades/edit/{{ $grade->id }}" enctype="multipart/form-data" method="post">
                @csrf
                <div class="text-center mt-3">
                    <h3>Edit Your Grades!</h3>
                </div>
                <div class="form-group row mt-4">
                    <label for="subject">Subject</label>
                    <input class="form-control" type="text" name="subject" id="subject" value="{{ $grade->subject }}">
                </div>

                <div class="form-group row mt-3">
                    <label for="grade">Letter Grade</label>
                    <select class="form-select" name="grade" id="grade">
                        <option value="{{ $grade->grade }}">{{ $grade->grade }}</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                        <option value="E">E</option>
                        <option value="F">F</option>
                    </select>
                </div>

                <div class="form-group row mt-3">
                    <label for="date-_assigned">Date Assigned</label>
                    <input class="form-control" type="date" name="date_assigned" id="date_assigned" value="{{ $grade->date }}">
                </div>

                <div class="form-group row mt-5">
                    <button type="submit" class="btn btn-primary">Next</button>
                </div>                                  
            </form>
        </div>
    </div>
</div>
@endsection
