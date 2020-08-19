<?php session_start();
if (!isset($_SESSION['ssUserID'])) {
  header('Location:../login.php');
}else{
include 'js/conn.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="../images/BI.png" type="image/png" />
    <!--<link rel=“icon” type=“image/png” href=“http://example.com/image.png” />-->

    <title>IT Stock</title>

	<!-- jquery-ui css for lobipanel -->
	<link rel="stylesheet" type="text/css" href="../vendors/lobipanel/lib/jquery-ui.min.css">
    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!--<link rel="stylesheet" type="text/css" href="../vendors/lobipanel/bootstrap/css/bootstrap.min.css">-->
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- lobibox -->
    <link rel="stylesheet" href="../vendors/lobibox/dist/css/Lobibox.min.css"/>
    <!-- lobipanel -->
    <link rel="stylesheet" type="text/css" href="../vendors/lobipanel/dist/css/lobipanel.min.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="../vendors/bootstrap-select/dist/css/bootstrap-select.min.css">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- bootstrap-dialog -->
    <link href="../vendors/bootstrapstrapdialog/bootstrap-dialog.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
    
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.php" class="site_title"><i class="fa fa-line-chart"></i> <span>IT Stock</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
            
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php echo $_SESSION['ssUserName']; ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>ขอเบิก</h3>
                <ul class="nav side-menu">
                  <li><a data-toggle="tooltip" data-placement="bottom"><i class="fa fa-shopping-cart"></i> ขอเบิก<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="javascript:begstock_main();"> เบิก </a></li>
                      <li><a href="javascript:begstock_home();"> ประวัติการเบิก</a></li>
                    </ul>
                  </li>
                </ul>
              </div>

              <div class="menu_section">
                <h3>Purchase Order IT</h3>
                <ul class="nav side-menu">
                  <li><a data-toggle="tooltip" data-placement="bottom"><i class="fa fa-file-text-o"></i> Purchase Order <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="javascript:po_home();">Show Po</a></li>
                      <li><a href="javascript:po_new();">New Po</a></li>
                      <?php if($_SESSION['ssUserStatus'] == '3' || $_SESSION['ssUserStatus'] == '0') { ?>
                      <li><a href="javascript:apr();">Approve</a></li>
                      <?php } ?>
                    </ul>
                  </li>
                </ul>
              </div>

              <div class="menu_section">
                <h3>Stock IT</h3>
                <ul class="nav side-menu">
                  <li><a data-toggle="tooltip" data-placement="bottom"><i class="fa fa-cubes"></i> Stock <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="javascript:stock_home();">Show Stock</a></li>
                      <li><a href="javascript:add_stock();"><i class="fa fa-arrow-left"></i> Import to Stock </a></li>
                      <li><a href="javascript:out_stock();"><i class="fa fa-arrow-right"></i> Export from Stock</a></li>
                    </ul>
                  </li>
                </ul>
              </div>

              <div class="menu_section">
                <h3>Supply & Product</h3>
                <ul class="nav side-menu">
                  <li><a data-toggle="tooltip" data-placement="bottom"><i class="fa fa-university"></i> Supplier management <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="javascript:supply_home();">Show Supplier</a></li>
                      <li><a href="javascript:newsup_btn();">New Supplier</a></li>
                    </ul>
                  </li>
                  <li><a data-toggle="tooltip" data-placement="bottom"><i class="fa fa-archive"></i> Product management <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="javascript:product_home();">Show Product</a></li>
                      <li><a href="javascript:btn_add_product();">New Product</a></li>
                    </ul>
                  </li>
                </ul>
              </div>

              <div class="menu_section">
                <h3>Config Menu</h3>
                <ul class="nav side-menu">
                  <li><a data-toggle="tooltip" data-placement="bottom"><i class="fa fa-cog"></i> Group/Type/adjust <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="javascript:config_home();">Show Group</a></li>
                      <li><a href="javascript:adjust_home();">Adjust</a></li>
                    </ul>
                  </li>
                </ul>
              </div>

              <div class="menu_section">
                <h3>Admin Menu</h3>
                <ul class="nav side-menu">
                  <li><a data-toggle="tooltip" data-placement="bottom"><i class="fa fa-users"></i> User management <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="javascript:user_home();">Show User</a></li>
                      <li><a href="javascript:btn_add_user();">New User</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a>
                <span class="glyphicon " aria-hidden="true"></span>
              </a>
              <a>
                <span class="glyphicon " aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="javascript:btn_profile_user();">
                <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="javascript:logout();">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <?php echo $_SESSION['ssUserName']; ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                <ul class="dropdown-menu dropdown-usermenu pull-right">
                <li><a href="javascript:btn_profile_user();"><i class="fa fa-user pull-right"></i> Profile</a></li>
                  <li><a href="javascript:logout();"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
      <div class="right_col" role="main">
        <div class="">
          <div id="mainpage"></div>
        </div>
      </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Copyright © 2018 All Rights Reserved - Create by <a href="#">Yong Group IT Teams.</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="../vendors/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <!-- Chart.js -->
    <script src="../vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="../vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="../vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="../vendors/Flot/jquery.flot.js"></script>
    <script src="../vendors/Flot/jquery.flot.pie.js"></script>
    <script src="../vendors/Flot/jquery.flot.time.js"></script>
    <script src="../vendors/Flot/jquery.flot.stack.js"></script>
    <script src="../vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="../vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="../vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="../vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="../vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="../vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="../vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
    <!-- Datatables -->
    <script src="../vendors/datatables/jquery.Datatable.js"></script>
    <!-- lobibox -->
    <script src="../vendors/lobibox/dist/js/Lobibox.min.js"></script>
    <!-- If you do not need both (messageboxes and notifications) you can inclue only one of them -->
    <script src="../vendors/lobibox/dist/js/messageboxes.min.js"></script>
    <!-- <script src="dist/js/notifications.min.js"></script> -->

    <!-- lobipanel -->
    <!--<script src="../vendors/lobipanel/lib/jquery.1.11.min.js"></script>-->
    <script src="../vendors/lobipanel/lib/jquery-ui.min.js"></script>
    <script src="../vendors/lobipanel/lib/jquery.ui.touch-punch.min.js"></script>
    <!--<script src="../vendors/lobipanel/bootstrap/js/bootstrap.min.js"></script>-->
    <script src="../vendors/lobipanel/dist/js/lobipanel.js"></script>

    <!-- bootstrap-dialog -->
    <script src="../vendors/bootstrapdialog/dist/js/bootstrap-dialog.min.js"></script>    
    <script src="js/accounting.min.js"></script>
    <script src="js/function.js"></script>
	
  </body>
</html>
<?php } ?>