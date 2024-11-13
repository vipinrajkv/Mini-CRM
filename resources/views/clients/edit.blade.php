@extends('main_layout')
@section('content')
    <div class="col-md-8 content">
        <!-- <div class="panel panel-default"> -->
        <div class="panel-heading">
            Dashboard
        </div>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @elseif(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading ">
                    Edit Project
                </div>
                <form id="updateProjectForm" method="POST" action="{{route('projects.update', $project->id)}}">
                    @method('PUT')
                    @csrf
                    
                    <div class="panel-body">
                        <div class="form-group col-md-10">
                            <label for="brand">Project Name:</label>
                            <input type="text" name="title"
                                value ="@if (!empty($project)) {{ $project->title ?? '' }} @endif"
                                class="form-control" id="usr">
                            @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-10">
                            <label for="brand">Project Description:</label>
                            <input type="text" name="description"
                                value ="@if (!empty($project)) {{ $project->description ?? '' }} @endif"
                                class="form-control" id="usr">
                            @error('description')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group col-md-10">
                            <label for="usr">Client:</label>
                            <div class="dropdown">
                                <select class="form-control category_list" name="client_id">
                                    <option value="">-- select --</option>
                                    @foreach ($clients as $key => $client)
                                        <option value="{{ $key }}"
                                            @if (!empty($project)) {{ $project->client_id == $key ? 'selected' : '' }} @endif>
                                            {{ $client }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('client_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-md-10">
                            <label for="usr">User:</label>
                            <div class="dropdown">
                                <select class="form-control category_list" name="user_id">
                                    <option value="">-- select --</option>
                                    @foreach ($users as $key => $user)
                                        <option value="{{ $key }}"
                                            @if (!empty($project)) {{ $project->user_id == $key ? 'selected' : '' }} @endif>
                                            {{ $user }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group col-md-10">
                            <label for="brand">Dead Line:</label>
                            <input type="text" name="deadline_at"
                                value="@if (!empty($project)) {{ $project->deadline_at ? date('d-m-Y', strtotime($project->deadline_at)) : '' }} @endif"
                                class="form-control" id="date">
                            @error('deadline_at')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-10">
                            <label for="usr">Status:</label>
                            <div class="dropdown">
                                <select class="form-control category_list" name="status">
                                    @foreach ($projectStatus as $status )
                                        <option value="{{ $status->value }}"
                                            @if (!empty($project)) {{ $project->status == $status->value ? 'selected' : '' }} @endif>
                                            {{ $status->value }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-md-10 ">
                            {{-- <input value="submit" button class="btn btn-primary">  --}}
                            <button class="btn btn-success" type="input"> Cancel</button>
                            <button class="btn btn-primary" type="submit"> Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- </div> -->

@stop
