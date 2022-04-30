@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <form action="{{ route('profile.save') }}" enctype="multipart/form-data" method="post">
                @csrf
                <div class="text-center mt-3">
                    <h1>Welcome!</h1>
                    <h3 class="mt-4">Let's complete your profile!</h3>
                </div>
                <div class="form-group row mt-4">
                    <label for="age">Age</label>
                    <input class="form-control" type="number" name="age" id="age">
                </div>

                <div class="form-group row mt-3">
                    <label for="education">Education Level</label>
                    <select class="form-select" name="education" id="education">
                        <option value=""></option>
                        <option value="P1">Primary 1</option>
                        <option value="P2">Primary 2</option>
                        <option value="P3">Primary 3</option>
                        <option value="P4">Primary 4</option>
                        <option value="P5">Primary 5</option>
                        <option value="P6">Primary 6</option>
                        <option value="S1">Secondary 1</option>
                        <option value="S2">Secondary 2</option>
                        <option value="S3">Secondary 3</option>
                        <option value="S4">Secondary 4</option>
                        <option value="S5">Secondary 5</option>
                        <option value="J1">Junior College 1</option>
                        <option value="J2">Junior College 2</option>
                    </select>               
                 </div>

                <div class="form-group row mt-5">
                    <button type="submit" class="btn btn-primary">Next</button>
                </div>                                  
            </form>
        </div>
    </div>
</div>
@endsection
