<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Startmin - Bootstrap Admin Theme</title>

        <!-- Bootstrap Core CSS -->
        <link href="{{asset('asset/css/bootstrap.min.css')}}" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="{{asset('asset//css/metisMenu.min.css')}}" rel="stylesheet">

        <!-- Timeline CSS -->
        <link href="{{asset('asset//css/timeline.css')}}" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="{{asset('asset//css/startmin.css')}}" rel="stylesheet">

        <!-- Morris Charts CSS -->
        <link href="{{asset('asset//css/morris.css')}}" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="{{asset('asset//css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>

        <div>

        <div class="col-lg-4"></div>
            <div class="col-lg-4">
            <div style="height: 150PX;"></div>
            <div style="border:2px solid lightgrey; padding:15px;">
            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.html">Admin panel</a>
                </div>

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                
                <!-- /.navbar-top-links -->
            </nav>

           
            
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Login</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    
                <form method = "post" action = "{{url('/')}}/login/check" autocomplete = "off">
               
                    @csrf
                <div class="form-group">
                <label>User Name</label>
                <input type="text" class="form-control" name = "username" placeholder="Enter Username">
                </div>
            
                <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" name = "password" placeholder="Password">
                </div>

                <button type="submit" name = "submit" value = "submit" class="btn btn-success">Login</button>
                </form>


                </div>
                <!-- /.container-fluid -->
           
            <!-- /#page-wrapper -->

        </div>
        </div>
        </div>
        <!-- /#wrapper -->
   <!-- jQuery -->
   <script src="{{asset('asset/js/jquery.min.js')}}"></script>

<script src="{{asset('asset/js/dataTables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('asset/js/dataTables/dataTables.bootstrap.min.js')}}"></script>

<!-- Bootstrap Core JavaScript -->
<script src="{{asset('asset/js/bootstrap.min.js')}}"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="{{asset('asset/js/metisMenu.min.js')}}"></script>

<!-- Morris Charts JavaScript -->
<script src="{{asset('asset/js/raphael.min.js')}}"></script>
<script src="{{asset('asset/js/morris.min.js')}}"></script>
<script src="{{asset('asset/js/morris-data.js')}}"></script>

<!-- Custom Theme JavaScript -->
<script src="{{asset('asset/js/startmin.js')}}"></script>

    </body>

</html>