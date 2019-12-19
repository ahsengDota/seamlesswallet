<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>QAA 3571 T Online Betting</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="adminlte/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="adminlte/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="adminlte/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
    folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="adminlte/dist/css/skins/_all-skins.min.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="adminlte/bower_components/morris.js/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="adminlte/bower_components/jvectormap/jquery-jvectormap.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="adminlte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="adminlte/bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            <a href="#" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>A</b>LT</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>Admin</b>LTE</span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">

                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <!-- <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image"> -->
                                <span class="hidden-xs">Admin</span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                                    <p>
                                        Alexander Pierce - Web Developer
                                        <small>Member since Nov. 2012</small>
                                    </p>
                                </li>
                                <!-- Menu Body -->
                                <li class="user-body">
                                    <div class="row">
                                        <div class="col-xs-4 text-center">
                                            <a href="#">Followers</a>
                                        </div>
                                        <div class="col-xs-4 text-center">
                                            <a href="#">Sales</a>
                                        </div>
                                        <div class="col-xs-4 text-center">
                                            <a href="#">Friends</a>
                                        </div>
                                    </div>
                                    <!-- /.row -->
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="#" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p>Admin</p>
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">USER MANAGEMENT</li>
                    <li class="active treeview">
                        <a href="#">
                            <i class="fa fa-dashboard"></i> <span>Users</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="active"><a href="http://6b8fc32f.ngrok.io/userlist"><i class="fa fa-circle-o"></i> User Lists</a></li>
                        </ul>
                    </li>
                    <li class="header">BETTING MANAGEMENT</li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-files-o"></i>
                            <span>Bets</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="http://6b8fc32f.ngrok.io/gamelist"><i class="fa fa-circle-o"></i> Game Lists</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-files-o"></i>
                            <span>Game</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="http://6b8fc32f.ngrok.io/apiLogin" target="_blank"><i class="fa fa-circle-o"></i> ASC Sportsbook</a></li>
                        </ul>
                    </li>
                </ul>
            </section>
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

                @yield('content')

                <footer class="main-footer">
                    <div class="pull-right hidden-xs">
                        <b>Version</b> 2.4.18
                    </div>
                    <strong>Copyright &copy; 2019 QAA 3571 T Online Betting</strong> All rights
                    reserved.
                </footer>
        </div>
        <!-- ./wrapper -->

    <!-- jQuery 3 -->
    <script src="adminlte/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="adminlte/bower_components/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.7 -->
    <script src="adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Morris.js charts -->
    <script src="adminlte/bower_components/raphael/raphael.min.js"></script>
    <script src="adminlte/bower_components/morris.js/morris.min.js"></script>
    <!-- Sparkline -->
    <script src="adminlte/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="adminlte/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="adminlte/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="adminlte/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="adminlte/bower_components/moment/min/moment.min.js"></script>
    <script src="adminlte/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- datepicker -->
    <script src="adminlte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- Slimscroll -->
    <script src="adminlte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="adminlte/bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="adminlte/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="adminlte/dist/js/pages/dashboard.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="adminlte/dist/js/demo.js"></script>
    <!-- DataTables -->
    <script src="adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

    <script>
        $(function () {
            $('#example1').DataTable()
            $('#example2').DataTable({
                'paging'      : true,
                'lengthChange': false,
                'searching'   : false,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : false
            })
        })
    </script>
</body>
</html>
