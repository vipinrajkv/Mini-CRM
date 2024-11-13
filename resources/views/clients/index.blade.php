@extends('main_layout')
@section('content')
@if (session('success'))
<div class="alert alert-success">
	{{ session('success') }}
</div>
@elseif(session('error'))
<div class="alert alert-danger">
	{{ session('error') }}
</div>
@endif

    <h2 class="text-center">Clients</h2>

    <div class="col-md-10">
        <table id="client_data_table" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Contact Name</th>
                    <th>Contact Email</th>
                    <th>Contact Phone Number</th>
                    <th>Client Name</th>
                    <th>Client Address</th>
                    <th>Client Post</th>
                    <th>Client City</th>
                    <th>Gst No</th>
                    <th>Action</th> 
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
    <script type="text/javascript">
        $(function() {
            var table = $('#client_data_table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('clients.index') }}",
                pageLength: 10,
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'contact_name',
                        name: 'contact_name'
                    },
                    {
                        data: 'contact_email',
                        name: 'contact_email'
                    },
                    {
                        data: 'contact_phone_number',
                        name: 'contact_phone_number'
                    },
                    {
                        data: 'client_name',
                        name: 'client_name'
                    },
                    {
                        data: 'client_address',
                        name: 'client_address'
                    },
                    {
                        data: 'client_post',
                        name: 'client_post'
                    },
                    {
                        data: 'client_city',
                        name: 'client_city'
                    },
                    {
                        data: 'gst_no',
                        name: 'gst_no'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });
    
        });
        $(document).ready(function() {
    
            $("[data-toggle=tooltip]").tooltip();
    
        });
    </script>
@stop
