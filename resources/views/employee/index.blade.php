@extends('layouts.app', ['class' => '', 'page' => __('Employee Page'), 'pageSlug' => 'employee'])

@section('content')
<!DOCTYPE html>
<head>
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <link rel="stylesheet" href="{{ asset('/plugins/datatables/css/jquery.dataTables.css')}}">
    <script src="{{ asset('/plugins/datatables/js/jquery.dataTables.min.js')}}"></script>
</head>
<body>
<div class="row">
    <div class= "col-md-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Employee List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                    <table class="display" cellspacing="0" width="100%" id = "dataTable" name ="dataTable">
                        <thead>
                            <tr>
                                <th>Employee ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Date of Birth</th>
                                <th>Gender</th>
                                <th>Joining Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
        </div>                
    </div>
</div>
<script>
        $('#dataTable').DataTable({
            "processing": true,  // Show processing 
            "serverSide": true,  // Server side processing
            "ajax": {
                "url": "/employee/json",
                "type": "GET",
                "error": function(data){
                    console.log(data);
                }
            },
            "columns": [
                { data: 'employee_id', name: 'employee_id' },
                { data: 'firstname', name: 'firstname' },
                { data: 'lastname', name: 'lastname' },
                { data: 'dob', name: 'dob' },
                { data: 'gender', name: 'gender' },
                { data: 'joining_date', name: 'joining_date' }
            ]
           
        });
        // dataTable.draw();
</script>
</body>
</html>
@endsection