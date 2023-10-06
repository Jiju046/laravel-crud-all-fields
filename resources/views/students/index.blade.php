@extends('layouts.layout')

@section('title', 'Students List')
 
@section('content')
    <div class="container my-5">
        <h1 style="color: #025464">Students CRUD</h1>
        <div class="card">
            
            <div class="card-header">Manage Students</div>
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success my-2">
                        {{ session('success') }}
                    </div>
                @endif
            
                <a class="btn btn-success my-3" href="{{ route('students.create') }}">Create</a>
                {{ $dataTable->table(['id' => 'students-table']) }}
            </div>
        </div>
    </div>
@endsection
 
@push('scripts')
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>
    <script src="/vendor/datatables/buttons.server-side.js"></script>

    {{-- for delete --}}
    <script>
        function deleteBook(button) {
            let studentId = $(button).data('id'); 
            if (confirm('Are you sure you want to delete?')) {
                $.ajax({
                    url: '/students/' + studentId,
                    type: 'DELETE',
                    success: function () {
                        // Reload the DataTable after successful deletion
                        $('#students-table').DataTable().ajax.reload();
                    },
                    error: function (xhr) {
                        console.error(xhr.responseText);
                        alert('Error deleting book.');
                    }
                });
            }
        }
    </script>

    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush