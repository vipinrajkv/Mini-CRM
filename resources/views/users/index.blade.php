{{-- @extends('main_layout') --}}
@extends('main_layout')
@section('content')
<h2 class="text-center">Users</h2>
<div class="col-md-10">
    <table id="user_datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

<script type="text/javascript">
    $(function() {
        var table = $('#user_datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('users.index') }}",
            pageLength: 10,
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'email',
                    name: 'email'
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

    <!-- </div> -->
@stop
