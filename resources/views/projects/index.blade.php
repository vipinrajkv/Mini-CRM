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
    {{--  <div class="row"> --}}
    <div class="col-md-10">
        <table id="daterange_table" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>User</th>
                    <th>Client</th>
                    <th>Deadline</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
@stop
