@extends('layouts.layout')

@section('title', 'Edit Student')

@section('content')

    <div class="container my-5">
        <h1 style="color: #025464">Edit Student</h1>

        {{-- unescaped output --}}
        {!! Form::open(['method' => 'PUT', 'route' => ['students.update', $student->id]]) !!}
           
            @include('students/form', ['student' => $student, 'cities' => $cities, 'cityvalue' => $cityValue])

        {!! Form::close() !!}

        <a class="btn btn-primary m-4" href="{{ route('students.index') }}">Back to Home</a>
@endsection
