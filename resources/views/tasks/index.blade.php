{{-- @extends('main_layout') --}}
@extends('main_layout')
@section('content')
    <div class="col-md-10 content">
        <!-- <div class="panel panel-default"> -->
        <div class="panel-heading">
            Dashboard
        </div>
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading ">
                    Task Details
                </div>
                <div class="container-fluid">
                        <div class="col-xs-12 col-md-12 counts-block">
                            {{-- <div class="col-sm-3 col-md-3 d-flex align-items-center">
                          <a href="#" class="btn btn-danger btn-lg" role="button"><span class="glyphicon glyphicon-list-alt"></span> <br/>Apps</a>
                            </div> --}}
                            <div class="col-sm-4 col-md-4 d-flex align-items-center">
                          <a href="#" class="btn btn-warning btn-lg" role="button">{{$totalStatusCount}} <br/>Status Count</a>
                          </div>
                          <div class="col-sm-4 col-md-4 d-flex align-items-center">
                          <a href="#" class="btn btn-success btn-lg" role="button"><span class="glyphicon glyphicon-comment"></span> <br/>Projects</a>
                            </div>
                          {{-- <div class="col-sm-4 col-md-4 d-flex align-items-center">
                          <a href="#" class="btn btn-info btn-lg" role="button"><span class="glyphicon glyphicon-comment"></span> <br/>Comments</a>
                            </div> --}}
                        </div>
                    <form method="GET" action="{{route('index.tasks')}}">
                        <div class="col-sm-2 col-md-2 d-flex align-items-center">
                            <label for="search" class="control-label" style="margin-right: 10px; margin-top: 8px;">Search</label>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search" name="search">
                                <div class="input-group-btn">
                                    {{-- <button class="btn btn-default" type="submit"> --}}
                                        <i class="glyphicon glyphicon-search"></i>
                                    {{-- </button> --}}
                                </div>
                            </div>
                        </div>
                
                        <div class="col-sm-2 col-md-2 d-flex align-items-center">
                            <label for="date" class="control-label" style="margin-right: 10px; margin-top: 8px;">Date</label>
                            <input type="date" class="form-control" id="date" name="date">
                        </div>
                
                        <div class="col-sm-2 col-md-2 d-flex align-items-center">
                            <label for="status" class="control-label" style="margin-right: 10px; margin-top: 8px;">Project</label>
                            <select class="form-control" id="project" name="project">
                                <option value="all">-- select client --</option> 
                                @foreach($projects as $key => $project)
                                    <option value="{{$key}}" @selected($key == request('project'))>{{$project}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-sm-2 col-md-2 d-flex align-items-center">
                            <label for="status" class="control-label" style="margin-right: 10px; margin-top: 8px;">Clients</label>
                            <select class="form-control" id="client" name="client">
                                <option value="all">-- select client --</option>
                                @foreach($clients as $key => $client)
                                    <option value="{{$key}}" @selected($key == request('client'))>{{$client}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-sm-2 col-md-2 d-flex align-items-center">
                            <label for="status" class="control-label" style="margin-right: 10px; margin-top: 8px;">Status</label>
                            <select class="form-control" id="status" name="status">
                                <option value="all">-- select Status --</option>
                                @foreach($status as  $status)
                                    <option value="{{$status->value}}" @selected($status->value == request('status'))>{{$status->value}}</option>
                                @endforeach
                            </select>
                        </div>
                
                        <div class="col-sm-2 col-md-2 d-flex align-items-center" style="
                        margin-top: 32px;">
                            <button type="submit" class="btn btn-info preview-add-button"style="margin-right: 12px;" >
                                Apply
                            </button>
                        
                            <a href="{{route('index.tasks')}}" class="btn btn-success preview-add-button">
                                <span class="glyphicon glyphicon-refresh"></span>
                            </a>
                        </div>
                    </form>
                </div>

            <div>
                <div class="container-fluid">
                    <div class="col-md-12 custyle">
                        @if (Session::has('success'))
                            <div class="alert alert-success">
                                {{ Session::get('success') }}
                            </div>
                        @endif
                        <div class="text-right" style="margin-top: 18px;">
                        </div>
                        <table class="table table-striped custab">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Task Name</th>
                                    <th >Description</th>
                                    <th>Client Name</th>
                                    <th>Dead Line</th>
                                    <th>Status</th>
                                    <th class="text-right">Action</th>
                                </tr>
                            </thead>
                            @foreach ($tasks as $task)
                                <tr>
                                    <td>{{$task->id}}</td>
                                    <td>{{$task->title}}</td>
                                    <td >{{$task->description}}</td>
                                    <td>{{$task->client_name}}</td>
                                    <td>{{$task->deadline_at}}</td>
                                    <td>{{$task->status}}</td>
                                   
                                    <td class="text-center"><a class='btn btn-info btn-xs' href="" style="margin-top: 11px;">
                                        <span class="glyphicon glyphicon-edit"></span> Edit</a></td>
                                    <td class="text-center"> <a href=""class="btn btn-danger btn-xs"  style="margin-top: 11px;">
                                        <span class="glyphicon glyphicon-remove"></span>
                                            Del</a></td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- </div> -->
@stop
