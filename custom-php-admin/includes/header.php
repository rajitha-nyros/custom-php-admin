<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>php-admin-Dashboard</title>

<link href="includes/css/css.css" rel="stylesheet" type="text/css" />
<link href="includes/css/smartpaginator.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
<script type="text/javascript" src="includes/js/bootstrap-tab.js"></script>
<script type="text/javascript" src="includes/js/bootstrap-dropdown.js"></script>
<script type="text/javascript" src="includes/js/bootstrap-button.js"></script>
<script type="text/javascript" src="includes/js/bootstrap-tooltip.js"></script>
<script type="text/javascript" src="includes/js/bootstrap-collapse.js"></script>
<script type="text/javascript" src="includes/js/bootstrap-alert.js"></script>
<script type="text/javascript" src="includes/js/custom-admin.js"></script>
<script type="text/javascript" src="includes/js/jquery.validate.js"></script>
<script type="text/javascript" src="includes/js/application.js"></script>
<script type="text/javascript" src="includes/js/smartpaginator.js"></script>
<script type="text/javascript" src="includes/js/jquery.sortElements.js"></script>
</head>

<body>
				<!--main starts-->
	<div id="main">
    							<!--header starts-->
                <div id="header" style="width:1000px; margin-right:0px;margin-left:0px;">
                                         <!--Fixed navbar -->
                    <div class="navbar navbar-fixed-top">
                            <div class="navbar-inner">
                                      <div class="container">
                                            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                                              <span class="icon-bar"></span>
                                              <span class="icon-bar"></span>
                                              <span class="icon-bar"></span>
                                            </a>
                                            <a class="brand" href="#">Custom PHP Admin</a>
                                      <div class="nav-collapse">
                                              <ul class="nav">
                                                <li class="active"><a href="#">Home</a></li>
                                              </ul>
		                                        <ul class="nav pull-right">
                                                    <li><a href=""><?php echo $_SESSION['usersname']; ?></a></li>
                                                    <li><a href="dashboard.php">Dashboard</a></li>
                                                    <li><a href="logout.php">Log Out</a></li>
                                              	</ul>
                                      </div><!-- /.nav-collapse -->
                                      </div>
                           </div><!-- /navbar-inner -->
                     </div>
                </div>
                            <!--header ends-->
                        
                
                        <!--table list from db-->
                        
                        
    <? include("includes/config_db.php"); ?>