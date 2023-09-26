@extends('layouts.layout')

@section('title', 'Students List')

@section('content')
    <div class="mx-3 my-5">
        <a href="{{ route('dashboard') }}" class="btn float-end" style="background-color:#19A7CE; color:white">Dashboard</a>
        <h1 style="color: #025464">Students List</h1>

        {{-- response message --}}
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table border">
            <thead>
                <tr>
                    <th style="color: #025464">#</th>
                    <th style="color: #025464">Name</th>
                    <th style="color: #025464">Email</th>
                    <th style="color: #025464">Skills</th>
                    <th style="color: #025464">Gender</th>
                    <th style="color: #025464">Appointment</th>
                    <th style="color: #025464">City</th>
                    <th style="color: #025464">Address</th>
                    <th style="color: #025464">Actions</th>
                </tr>
            </thead>
            <tbody>
                {{-- view student data --}}
                
                @forelse ($students as $count => $student)
                    <tr>
                        <td>{{ $count +1 }}</td>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->skills }}</td>
                        <td>{{ $student->gender }}</td>
                        <td>{{ \Carbon\Carbon::parse($student->appointment)-> format('d-m-Y') }}</td>
                        <td>{{ $student->city->city }}</td> <!--from relationship method-->
                        <td>{{ $student->address }}</td>

                        <td style="width:100px">
                            <a class="text-success" href="{{ route('students.show', ['student' => $student->id]) }}"><i class="bi bi-eyeglasses"></i></a>&nbsp&nbsp
                            <a class="text-success" href="{{ route('students.edit', ['student' => $student->id]) }}"><i class="bi bi-pencil-square"></i></a>
                            
                            {{-- delete --}}
                            {!! Form::open(['route' => ['students.destroy', $student->id], 'method' => 'delete', 'style' => 'display:inline-block', 'onsubmit' => "return confirm('Are you sure you want to delete this item?')"]) !!}
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-danger bg-light border-0"><i class="bi bi-trash-fill"></i></button>
                            {!! Form::close() !!}
                        </td>
                    </tr>

                @empty
                    <tr><td colspan="8" class="text-center">No Records Found</td></tr>
                @endforelse
                
            </tbody>
        </table>

        <a href="{{ route('students.create') }}" class="btn" style = 'background-color:#576CBC; color:white' >Add New Student</a>
        
@endsection
