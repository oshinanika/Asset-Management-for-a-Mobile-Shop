<?php
ob_start();
session_start();
if($_SESSION['name']!='ams')
{
	header('location: login.php');
}
?>
<?php
include('config.php');
date_default_timezone_set('Asia/Dhaka');
$username = $_SESSION['username'];

if(isset($_POST['form1'])){ 
 

	try {
        
        if(empty($_POST['asset_code'])) {
			throw new Exception('Asset Code is empty.');
        }
	
		if(empty($_POST['customer_name'])) {
			throw new Exception('Customer Name is empty.');
        }
        
        if(empty($_POST['customer_number'])) {
			throw new Exception('Customer Number is empty.');
		}

        if(empty($_POST['customer_address'])) {
			throw new Exception('Customer Address is empty.');
		}

        $date = (new DateTime())->format('Y-m-d H:i:s');
		$result = mysql_query("insert into tbl_soldout (asset_code, user_id, customer_name, customer_phone, customer_address, date) values('$_POST[asset_code]','$username','$_POST[customer_name]','$_POST[customer_number]','$_POST[customer_address]','$date')");
		$success_message = 'Asset sold successful.';

        $availability = "Sold";
        $query = mysql_query("update tbl_assetinfo set storage_location='Not defined', availability='$availability' where asset_code='$_POST[asset_code]'");
        
		header("LOCATION:asset-soldout.php");
	}
	
	catch(Exception $e) {
		$error_message = $e->getMessage();
	}
	
}

?>
<script>
function setDevice(str) {
    var xmlhttp = new XMLHttpRequest();
    
    xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        var result = this.responseText;
        res = result.split(',');
        document.getElementById("company").innerHTML = "Company: "+res[1];
        document.getElementById("device_type").innerHTML = "Type: "+res[0];
        document.getElementById("model_name").innerHTML = "Model: "+res[2];
    }
    };
    xmlhttp.open("GET", "ajax/get-device.php?q=" + str, true);
    xmlhttp.send();
  }
</script>
<!DOCTYPE html>
<html>
    <head>
        
        <!-- Title -->
        <title>AMS | Sell Asset</title>
        
        <meta content="width=device-width, initial-scale=1" name="viewport"/>
        <meta charset="UTF-8">
        <meta name="description" content="Admin Dashboard Template" />
        <meta name="keywords" content="admin,dashboard" />
        <meta name="author" content="Steelcoders" />
        
        <!-- Styles -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
        <link href="assets/plugins/pace-master/themes/blue/pace-theme-flash.css" rel="stylesheet"/>
        <link href="assets/plugins/uniform/css/uniform.default.min.css" rel="stylesheet"/>
        <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/plugins/fontawesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
        <link href="assets/plugins/line-icons/simple-line-icons.css" rel="stylesheet" type="text/css"/>	
        <link href="assets/plugins/offcanvasmenueffects/css/menu_cornerbox.css" rel="stylesheet" type="text/css"/>	
        <link href="assets/plugins/waves/waves.min.css" rel="stylesheet" type="text/css"/>	
        <link href="assets/plugins/switchery/switchery.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/plugins/3d-bold-navigation/css/style.css" rel="stylesheet" type="text/css"/>	
        <link href="assets/plugins/slidepushmenus/css/component.css" rel="stylesheet" type="text/css"/>
        <link href="assets/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css"/>
        
        <!-- Theme Styles -->
        <link href="assets/css/modern.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/themes/white.css" class="theme-color" rel="stylesheet" type="text/css"/>
        <link href="assets/css/custom.css" rel="stylesheet" type="text/css"/>
        
        <script src="assets/plugins/3d-bold-navigation/js/modernizr.js"></script>
        <script src="assets/plugins/offcanvasmenueffects/js/snap.svg-min.js"></script>
        
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        
    </head>
    <body class="page-header-fixed">
        <div class="overlay"></div>
        <nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-right" id="cbp-spmenu-s1">
            <h3><span class="pull-left">Chat</span><a href="javascript:void(0);" class="pull-right" id="closeRight"><i class="fa fa-times"></i></a></h3>
            <div class="slimscroll">
                <a href="javascript:void(0);" class="showRight2"><img src="assets/images/avatar2.png" alt=""><span>Sandra smith<small>Hi! How're you?</small></span></a>
                <a href="javascript:void(0);" class="showRight2"><img src="assets/images/avatar3.png" alt=""><span>Amily Lee<small>Hi! How're you?</small></span></a>
                <a href="javascript:void(0);" class="showRight2"><img src="assets/images/avatar4.png" alt=""><span>Christopher Palmer<small>Hi! How're you?</small></span></a>
                <a href="javascript:void(0);" class="showRight2"><img src="assets/images/avatar5.png" alt=""><span>Nick Doe<small>Hi! How're you?</small></span></a>
                <a href="javascript:void(0);" class="showRight2"><img src="assets/images/avatar2.png" alt=""><span>Sandra smith<small>Hi! How're you?</small></span></a>
                <a href="javascript:void(0);" class="showRight2"><img src="assets/images/avatar3.png" alt=""><span>Amily Lee<small>Hi! How're you?</small></span></a>
                <a href="javascript:void(0);" class="showRight2"><img src="assets/images/avatar4.png" alt=""><span>Christopher Palmer<small>Hi! How're you?</small></span></a>
                <a href="javascript:void(0);" class="showRight2"><img src="assets/images/avatar5.png" alt=""><span>Nick Doe<small>Hi! How're you?</small></span></a>
            </div>
		</nav>
        <nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-right" id="cbp-spmenu-s2">
            <h3><span class="pull-left">Sandra Smith</span> <a href="javascript:void(0);" class="pull-right" id="closeRight2"><i class="fa fa-angle-right"></i></a></h3>
            <div class="slimscroll chat">
                
            </div>
            <div class="chat-write">
                <form class="form-horizontal" action="javascript:void(0);">
                    <input type="text" class="form-control" placeholder="Say something">
                </form>
            </div>
		</nav>
        <div class="menu-wrap">
            <nav class="profile-menu">
                <div class="profile"><img src="assets/images/avatar1.png" width="52" alt="Subrata Bhowmik"/><span>Subrata Bhowmik</span></div>
                <div class="profile-menu-list">
                    <a href="#"><i class="fa fa-star"></i><span>Favorites</span></a>
                    <a href="#"><i class="fa fa-bell"></i><span>Alerts</span></a>
                    <a href="#"><i class="fa fa-envelope"></i><span>Messages</span></a>
                    <a href="#"><i class="fa fa-comment"></i><span>Comments</span></a>
                </div>
            </nav>
            <button class="close-button" id="close-button">Close Menu</button>
        </div>
        <main class="page-content content-wrap">
           <?php include('top-nav.php');?>
			<?php include('sidebar.php');?>
            <div class="page-inner">
                <div class="page-title">
                    <h3>Asset Sell Out</h3>
                    <div class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li><a href="index.php">Home</a></li>
                            <li><a href="#">Asset</a></li>
                            <li class="active">Sell Out</li>
                        </ol>
                    </div>
                </div>
                <div id="main-wrapper">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-white">
                                <div class="panel-body">
									<h4 class="text-danger">
									<?php  
									if(isset($error_message)) {echo $error_message;}
									//if(isset($success_message)) {echo $success_message;}
									?>
									</h4>
									<h4 class="text-success">
									<?php  
									//if(isset($error_message)) {echo $error_message;}
									if(isset($success_message)) {echo $success_message;}
									?>
									</h4>
									<form action="" method="post" >
										<div class="form-horizontal col-md-6"> 
											 <h4 class="no-m m-b-sm m-t-lg">Asset Code <span class="text-danger">*</span></h4>
											 <?php 
												# here database details      
												mysql_connect('localhost','root','') or die('cannot connect to the server');
												mysql_select_db('asset_ms_db') or die('cannot select database');

												$sql = "SELECT asset_code FROM tbl_assetinfo where availability='In Stock'";
												$result = mysql_query($sql);?>
												<select name="asset_code" class="js-states form-control" style="display: none; width: 100%" onchange="setDevice(this.value);">
													<option value="">Please Select Asset</option>
												<?php
													while ($row = mysql_fetch_array($result)) {
															
															echo "<option value='" . $row['asset_code'] ."'>" . $row['asset_code'] ."</option>";
													}

													echo "</select>";
												?>

                                            <p id='company' class="help-block text-info"></p>
                                            <p id='device_type' class="help-block text-info"></p>	
                                            <p id='model_name' class="help-block text-info"></p>	

											<h4 class="no-m m-b-sm m-t-lg">Customer Name</h4>
											<input  type="text" name="customer_name" class="form-control" id="input-help-block" placeholder="Customer Name">
                                            <h4 class="no-m m-b-sm m-t-lg">Customer Phone Number</h4>
											<input  type="number" name="customer_number" class="form-control" id="input-help-block" placeholder="Customer Phone Number">
                                            <h4 class="no-m m-b-sm m-t-lg">Customer Address</h4>
											<input  type="text" name="customer_address" class="form-control" id="input-help-block" placeholder="Customer Address">
											<h4 class="no-m m-b-sm m-t-lg">Sold Out Date</h4>
											<input disabled type="text" name = "date" class="form-control" id="input-help-block" placeholder="<?php echo (new \DateTime())->format('Y-m-d H:i:s');?>">
												
										</div>
							
										</div>
										<div class="form-horizontal col-md-12">
										<br />
										<br />
											<button name="form1" type="submit" class="btn btn-success btn-addon m-b-sm btn-lg"><i class="fa fa-android"></i> Sold Out</button>
										</div>
										
									</form>
                                </div>
                            </div>
                        </div>
                    </div><!-- Row -->
                </div><!-- Main Wrapper -->
                <div class="page-footer">
                    <p class="no-s">MIT 21<sup>st</sup> Batch, Institute of Information Technology, University of Dhaka.</p>
                </div>
            </div><!-- Page Inner -->
        </main><!-- Page Content -->
        <nav class="cd-nav-container" id="cd-nav">
            <header>
                <h3>Navigation</h3>
                <a href="#0" class="cd-close-nav">Close</a>
            </header>
            <ul class="cd-nav list-unstyled">
                <li class="cd-selected" data-menu="index">
                    <a href="javsacript:void(0);">
                        <span>
                            <i class="glyphicon glyphicon-home"></i>
                        </span>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li data-menu="profile">
                    <a href="javsacript:void(0);">
                        <span>
                            <i class="glyphicon glyphicon-user"></i>
                        </span>
                        <p>Profile</p>
                    </a>
                </li>
                <li data-menu="inbox">
                    <a href="javsacript:void(0);">
                        <span>
                            <i class="glyphicon glyphicon-envelope"></i>
                        </span>
                        <p>Mailbox</p>
                    </a>
                </li>
                <li data-menu="#">
                    <a href="javsacript:void(0);">
                        <span>
                            <i class="glyphicon glyphicon-tasks"></i>
                        </span>
                        <p>Tasks</p>
                    </a>
                </li>
                <li data-menu="#">
                    <a href="javsacript:void(0);">
                        <span>
                            <i class="glyphicon glyphicon-cog"></i>
                        </span>
                        <p>Settings</p>
                    </a>
                </li>
                <li data-menu="calendar">
                    <a href="javsacript:void(0);">
                        <span>
                            <i class="glyphicon glyphicon-calendar"></i>
                        </span>
                        <p>Calendar</p>
                    </a>
                </li>
            </ul>
        </nav>
        <div class="cd-overlay"></div>
	

        <!-- Javascripts -->
        <script src="assets/plugins/jquery/jquery-2.1.3.min.js"></script>
        <script src="assets/plugins/jquery-ui/jquery-ui.min.js"></script>
        <script src="assets/plugins/pace-master/pace.min.js"></script>
        <script src="assets/plugins/jquery-blockui/jquery.blockui.js"></script>
        <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <script src="assets/plugins/switchery/switchery.min.js"></script>
        <script src="assets/plugins/uniform/jquery.uniform.min.js"></script>
        <script src="assets/plugins/offcanvasmenueffects/js/classie.js"></script>
        <script src="assets/plugins/offcanvasmenueffects/js/main.js"></script>
        <script src="assets/plugins/waves/waves.min.js"></script>
        <script src="assets/plugins/3d-bold-navigation/js/main.js"></script>
        <script src="assets/plugins/select2/js/select2.min.js"></script>
        <script src="assets/js/modern.min.js"></script>
        <script src="assets/js/pages/form-select2.js"></script>
        
    </body>
</html>