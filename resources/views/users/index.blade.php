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
                    Cars Details
                </div>
                <div class="container-fluid">
                    {{-- <div class="row"> --}}
                        <!-- Search Input -->
                        <div class="col-sm-3 col-md-3 d-flex align-items-center">
                            <label for="search" class="control-label" style="margin-right: 10px; margin-top: 8px;">Search</label>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search" name="q">
                                <div class="input-group-btn">
                                    <button class="btn btn-default" type="submit">
                                        <i class="glyphicon glyphicon-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                
                        <!-- Date Picker -->
                        <div class="col-sm-3 col-md-3 d-flex align-items-center">
                            <label for="date" class="control-label" style="margin-right: 10px; margin-top: 8px;">Date</label>
                            <input type="date" class="form-control" id="date" name="date">
                        </div>
                
                        <!-- Status Dropdown -->
                        <div class="col-sm-3 col-md-3 d-flex align-items-center">
                            <label for="status" class="control-label" style="margin-right: 10px; margin-top: 8px;">Status</label>
                            <select class="form-control" id="status" name="status">
                                <option>Paid</option>
                                <option>Unpaid</option>
                            </select>
                        </div>
                
                        <!-- Add Button -->
                        <div class="col-sm-3 col-md-3 d-flex align-items-center" style="
                        margin-top: 32px;">
                            <button type="button" class="btn btn-info preview-add-button"style="margin-right: 12px;" >
                                Apply
                            </button>
                        
                            <button type="button" class="btn btn-success preview-add-button">
                                <span class="glyphicon glyphicon-refresh"></span>
                            </button>
                        </div>
                    {{-- </div> --}}
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
                        {{-- <a href="{{route('admin.cars.create')}}" class="btn btn-info  btn-sm float-right" role="button">Add Car</a> --}}
                        </div>
                        <table class="table table-striped custab">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Car Name</th>
                                    <th>Brand Name</th>
                                    <th>Category</th>
                                    <th>Image</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            {{-- @foreach ($carsList as $cars) --}}
                                <tr>
                                    <td>1</td>
                                    <td>2</td>
                                    <td>3</td>
                                    <td>4</td>
                                    <td>
                                        <img class="product-image" src="" alt="">
                                    </td>
                                    <td class="text-center"><a class='btn btn-info btn-xs' href=""><span
                                                class="glyphicon glyphicon-edit"></span> Edit</a> <a href=""
                                            class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span>
                                            Del</a></td>
                                </tr>
                            {{-- @endforeach --}}
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- </div> -->
@stop
