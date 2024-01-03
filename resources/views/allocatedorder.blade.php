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

        <div id="wrapper">

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

                <ul class="nav navbar-right navbar-top-links">
                    <li class="dropdown">
                    <a href = "/logout" >
                            <i class="fa fa-sign-out fa-fw"></i> Logout 
                        </a>  
                    </li>
                </ul>
                <!-- /.navbar-top-links -->
            </nav>

            <aside class="sidebar navbar-default" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">         
                        <li class="sidebar-search">
                  
                            <!-- /input-group -->
                        </li>


                        
                         <li>
                            <a href="/admin" class="active"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>

                        <li>
                            <a href="/userlist" class="active"><i class="fa fa-user fa-fw"></i> Manage User List </a>
                        </li>

                       <li>
                            <a href="/category" class="active"><i class="fa solid fa-list"></i> Manage Category </a>
                        </li>
                         <li>
                            <a href="/product" class="active"><i class="fa fa-product-hunt"></i> Manage Product List</a>
                        </li>

                        <li>
                            <a href="/neworder" class="active"><i class="fa fa-first-order"></i> New Order</a>
                        </li>
                    
                        <li>
                            <a href="/allocateorder" class="active"><i class="fa fa-tasks"></i> Allocated Order</a>
                        </li>

                        <li>
                        <a href="/completeorder" class="active"><i class="fa fa-check"></i></i> Complete Order</a>
                        </li>

                        <li>
                            <a href="/cancelorder" class="active"><i class="fa fa-times"></i> Cancel Order</a>
                        </li>
                    
                        <li>
                            <a href="/payment" class="active"><i class="fa fa-inr"></i> Payment </a>
                        </li>

                        <li>
                            <a href="/gallery" class="active"><i class="fa fa-image"></i> Manage Gallery </a>
                        </li>

                        <li>
                            <a href="/contact" class="active"><i class="fa fa-phone"></i> Manage Contact </a>
                        </li>
                        
                        <li>
                            <a href="/review" class="active"><i class="fa fa-comments"></i> Order Review </a>
                        </li>



                    </ul>
                </div>
            </aside>
            <!-- /.sidebar -->

            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-10">
                            <h1 class="page-header">Allocated Order</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                      
                   
                    <table class="table">
  <thead>
  <tr>
      <th scope="col">id</th>
      <th scope="col">Date</th>
      <th scope="col">Userid</th>
      <th scope="col">Orderaddress</th>
      <th scope="col">view</th>
      <th scope="col">Complete</th>
      <th scope="col">Cancel</th>

    </tr>
  </thead>
  <tbody>
    <?php
    $i = 1;

    foreach($allocatedorder as $a)
    {
    
?>
    <tr>
    <td><?php echo $i++; ?></td>
    <td><?php echo $a->orderdate; ?></td>
    <td><?php echo $a->uname; ?></td> 
      <td><?php echo $a->orderaddress; ?></td>
      <td>
      <form method = "post" action="{{url('/')}}/allocatedorder/view">
        <input type = "hidden" name = "id" value = "<?php echo $a->orderhistoryid; ?>">
        <input type = "hidden" name = "uid" value = "<?php echo $a->uid; ?>">
            @csrf
        <button type = "submit" name = "submit" value = "submit" class = "btn btn-primary btn-sm">
        <i class="fa fa-eye"></i>
        </button>
    </form>
    </td>
    <td>
      <form method = "post" action="{{url('/')}}/allocatedorder/complete">
        <input type = "hidden" name = "id" value = "<?php echo $a->orderhistoryid; ?>">
        <input type = "hidden" name = "uid" value = "<?php echo $a->uid; ?>">
            @csrf
        <button type = "submit" name = "submit" value = "submit" class = "btn btn-success btn-xl">
        <i class="fa fa-check-circle"></i>
        </button>
    </form>
    </td>
    <td>
    <form method = "post" action="{{url('/')}}/allocatedorder/cancel">
        <input type = "hidden" name = "id" value = "<?php echo $a->orderhistoryid; ?>">
        <input type = "hidden" name = "uid" value = "<?php echo $a->uid; ?>">
            @csrf
        <button type = "submit" name = "submit" value = "submit" class = "btn btn-danger btn-sm">
        <i class="fa fa-times"></i>
        </button>
    </form>

    </td>
    </tr>
    <?php
}
?>
  </tbody>
</table>


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