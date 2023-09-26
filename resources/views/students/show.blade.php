@extends('layouts.layout')

@section('title','Student Details')

@section('content')

    <div class="container my-5">

        <h1 style="color: #025464">Student Details</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $student->name }}</h5>
                <p class="card-text"><strong>Email:</strong> {{ $student->email }}</p>
                <p class="card-text"><strong>Skills:</strong> {{ $student->skills }}</p>
                <p class="card-text"><strong>Gender:</strong> {{ $student->gender }}</p>
                <p class="card-text"><strong>Appointment:</strong> {{ $student->appointment }}</p>
                <p class="card-text"><strong>City:</strong> {{ $student->city->city }}</p>
                <p class="card-text"><strong>Address:</strong> {{ $student->address }}</p>

            </div>
    </div>

    <div class="mt-3">
        <a href="{{ route('students.index') }}" class="btn btn-primary">Back</a>
    </div>
@endsection