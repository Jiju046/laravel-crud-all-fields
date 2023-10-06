<!DOCTYPE html>
<html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <!-- DataTables CSS from CDN -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css">

    <style>
        .dataTables_length > label{
            margin-left: 30px;
        }
        .dt-button{
            color: green !important;
            border: 1px solid #B5CB99 !important;
        }
        .book-table_length{
            border: 1px solid grey !important;
        }
        .dataTables_paginate{
            margin-top: 20px;
        }
    </style>

     <!-- jQuery -->
     <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>


</head>
<body>
    
        @yield('content')
    </div>
    
    @stack('scripts')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
    
        });
    </script>
</body>
</html>
