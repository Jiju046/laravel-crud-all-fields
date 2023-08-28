@extends('layouts.layout')

@section('title', 'Add Details')

@section('content')
    <div class="container my-5">
        <h2 style="color: #025464">Add Details</h2>

        {!! Form::open(['route' => 'students.store']) !!}
        
            @include('students/form', ['student' => $student, 'cities' => $cities])

        {!! Form::close() !!}

        <a class="btn btn-primary m-4" href="{{ route('students.index') }}">Back to Home</a>
@endsection