<!DOCTYPE html>
<html lang="en">

<head>
    <title>Laravel Mini CRM</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <link rel="stylesheet" href="{{ asset('css/custom_style.css') }}">
    {{-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet"
		id="bootstrap-css"> --}}
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <!-- -->
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>

    <script language="JavaScript" src="https://cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script language="JavaScript" src="https://cdn.datatables.net/plug-ins/3cfcc339e89/integration/bootstrap/3/dataTables.bootstrap.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/plug-ins/3cfcc339e89/integration/bootstrap/3/dataTables.bootstrap.css">
</head>

<body>

    <!------ Include the above in your HEAD tag ---------->

    <nav class="navbar navbar-default navbar-static-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle navbar-toggle-sidebar collapsed">
                    MENU
                </button>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">
                    Laravel Mini CRM
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                {{-- <form class="navbar-form navbar-left" method="GET" role="search">
					<div class="form-group">
						<input type="text" name="q" class="form-control" placeholder="Search">
					</div>
					<button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
				</form> --}}
                <ul class="nav navbar-nav navbar-right">
                    @guest
                        @if (Route::has('login'))
                            <li><a href="{{ route('login') }}" target="_blank">Login</a></li>
                        @endif
                        @if (Route::has('register'))
                            <li><a href="{{ route('register') }}" target="_blank">Register</a></li>
                        @endif
                    @else
                        <li class="dropdown ">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                aria-expanded="false">
                                {{ Auth::user()->name }}
                                <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li class="divider"></li>
                                <li><a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
								document.getElementById('logout-form').submit();">Logout</a>
                                </li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </ul>
                        </li>
                    @endguest
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
    <div class="container-fluid main-container">
        @auth
            <div class="col-md-2 sidebar">
                <div class="row">
                    <!-- uncomment code for absolute positioning tweek see top comment in css -->
                    <div class="absolute-wrapper"> </div>
                    <!-- Menu -->
                    <div class="side-menu">
                        <nav class="navbar navbar-default" role="navigation">
                            <!-- Main Menu -->
                            <div class="side-menu-container">
                                <ul class="nav navbar-nav">
                                    <li class="active"><a href="#"><span class="glyphicon glyphicon-dashboard"></span>
                                            Dashboard</a></li>
                                    {{-- <li><a href="#"><span class="glyphicon glyphicon-plane"></span> Active Link</a></li>
								<li><a href="#"><span class="glyphicon glyphicon-cloud"></span> Link</a></li> --}}

                                    <!-- Dropdown-->
                                    {{-- <li class="panel panel-default" id="dropdown">
                                        <a data-toggle="collapse" href="#dropdown-lvl1">
                                            <span class="glyphicon glyphicon-align-justify"></span>Product Features<span
                                                class="caret"></span>
                                        </a>
                                        <!-- Dropdown level 1 -->
                                        <div id="dropdown-lvl1" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <ul class="nav navbar-nav">
                                                    {{-- <li><a href="{{route('brand.list')}}">Brands</a></li> --}}
                                                    {{-- <li><a href=""><span
                                                                class="glyphicon  glyphicon-th-list"></span>Product</a>
                                                    </li> --}}
                                                    <!-- Dropdown level 2 -->
                                                    {{-- <li class="panel panel-default" id="dropdown">
                                                        <a data-toggle="collapse" href="#dropdown-lvl2">
                                                            <span class="glyphicon glyphicon glyphicon-tasks"></span>
                                                            Category <span class="caret"></span>
                                                        </a>
                                                        <div id="dropdown-lvl2" class="panel-collapse collapse">
                                                            <div class="panel-body">
                                                                <ul class="nav navbar-nav">
                                                                    <li><a href=""><span
                                                                                class="glyphicon glyphicon-list-alt"></span>Categories</a>
                                                                    </li>
                                                                    <li><a href=""><span
                                                                                class="glyphicon glyphicon-file"></span>Sub
                                                                            Categories</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div> --}}
                                    {{-- </li> --}} 

                                    <li><a href="{{route('index.tasks')}}"><span class="glyphicon glyphicon-shopping-cart"></span> Tasks</a>
                                    </li>
                                    <li><a href=""><span class="glyphicon glyphicon glyphicon-user"></span> Users</a>
                                    </li>
                                    {{-- @role('user') --}}
                                    <li><a href=""><span class="glyphicon glyphicon glyphicon-user"></span> Roles</a>
                                    </li>
                                    {{-- @endrole --}}

                                </ul>
                            </div><!-- /.navbar-collapse -->
                        </nav>

                    </div>
                </div>
            </div>
        @endauth

        @yield('content')

    </div>
    <footer class="pull-left footer footer_div">
        <p class="col-md-12  text-center">

            Copyright &COPY; {{ date('Y') }}
        </p>
    </footer>
    <script type="text/javascript">
        $(function () {
              
          var table = $('#daterange_table').DataTable({
              processing: true,
              serverSide: true,
              ajax: "{{ route('projects.index') }}",
              pageLength: 10,
              columns: [
                  {data: 'id', name: 'id'},
                  {data: 'title', name: 'title'},
                  {data: 'description', name: 'description'},
                  {data: 'user', name: 'user'},
                  {data: 'client', name: 'client'},
                  {data: 'deadline', name: 'deadline'},
                  {data: 'action', name: 'action', orderable: false, searchable: false},
              ]
          });
              
        });
        $(document).ready(function() {
    
     $("[data-toggle=tooltip]").tooltip();
    
} );

      </script>
    {{-- </div> --}}
    <script>
        $(document).ready(function() {
            // Initialize jQuery UI Datepicker with dd-mm-yy format
            $('#date').datepicker({
                dateFormat: 'dd-mm-yy', // Format: day-month-year
            });
        });
    </script>
</html>
