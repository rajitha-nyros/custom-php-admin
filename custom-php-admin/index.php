<?
session_start();
if(isset($_SESSION['userid']))
{
@header('Location:dashboard.php');
}
if(isset($_POST['admin_login'])=='admin_login')
{
	include("includes/config_db.php"); // Including database connection

	mysql_select_db($database);

	extract($_POST);// extracts all posts

	$admin = mysql_query("select * from admins where users_name = '".$username."' and users_password='".$password."'");

	 $row= mysql_num_rows($admin);

	if($row>0){
			$result = mysql_fetch_array($admin);
			$_SESSION['userid']=$result['users_id'];
			$_SESSION['usersname']=$result['users_name'];
			$_SESSION['useremail']=$result['users_email'];
			@header('Location:dashboard.php');
		}
	else{
			@header('Location:index.php?action=failure');
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin login</title>
<link href="includes/css/css.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
<script type="text/javascript" src="includes/js/jquery.validate.js"></script>
<script type="text/javascript" src="includes/js/bootstrap-alert.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	$(".form-inline").validate({
		rules: {
		username: "required",// simple rule, converted to {required:true}
		password: "required"
		}
	});
});
</script>
</head>

<body>
  <div id="main">
                            			<!--if wrong password message-->
                 		 <?php
						   if(isset($_GET['action'])&&$_GET['action']=='failure')
						   {
						   ?>
						       <div class="alert alert-error" style="width:400px;margin-top:30px;margin-bottom:-60px;margin-left:290px;text-align:center;">
								Please give correct username and password
							</div>
						<?
						   }
					   ?>
              <div id="admin" style=" ">
      <form class=" form-inline " name="form" method="post" onSubmit="return validate(this);"  action="index.php" >
    		<fieldset>
                         <label><h2>Admin Login</h2></label>
                        <p>
                        </p>
                        <input type="hidden" name="admin_login" id="admin_login" value="admin_login">
                        <p>
                        <p>
                             <label class="control-label" for="username">Username</label>:
              				 <input class="input-xlarge focused" id="username" type="text" placeholder="username" name="username">
                        </p>
                        <p>
                        	<label class="control-label" for="password">Password</label>:
              				<input class="input-xlarge focused" id="password" type="password" placeholder="password" name="password">
                        </p>
                        <p>
                               <input type="submit" class="btn btn-primary log" value="Login">
                        </p>
            </fieldset>
     </form>
     </div>
  </div>
</body>
</html>
