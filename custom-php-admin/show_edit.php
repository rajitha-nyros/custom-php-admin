<?
	session_start();
?>
	<!--Include Head Part Content-->
<?php include("includes/header.php"); ?>  
<!--Include Left Side bar Content-->
<?php include("includes/leftbar.php");
 $sql = 'DESCRIBE '.$_REQUEST['tb_name'].''; 
$result = mysql_query($sql);
$i=0;
while ($list = mysql_fetch_assoc($result))
	{
	
			$row[$i] = $list;
	$i++;		
	}
	if($_GET['action'] == "change")
	{
					echo '<script type="text/javascript">
							$(document).ready(function(){
								$("#edit").trigger("click");
							});
						</script>'; 
	}
	if($_GET['action'] == "remove")
	{
					echo '<script type="text/javascript">
							$(document).ready(function(){
								$("#delet2").trigger("click");
							});
						</script>'; 
	}
	if($_GET['action'] == "history")
	{
					echo '<script type="text/javascript">
							$(document).ready(function(){
								$("#history2").trigger("click");
							});
						</script>'; 
	}
	if($_GET['action'] == "failure")
	{ ?>
                    <div class="alert alert-success" style="width:500px;margin-left:350px;text-align:center;">
                    <a class="close" data-dismiss="alert">&times;</a>
                    <strong>Oh snap!</strong> Change a few things up and try submitting again.
                    </div>
	<?php } 
	if($_GET['action'] == "updated")
	 { ?>
                    <div class="alert alert-success" style="width:500px;margin-left:350px;text-align:center;">
                    <a class="close" data-dismiss="alert">&times;</a>
                    <strong>Well done!</strong> Your information successfully updated.
                    </div>
		<?php
	} 	
if(isset($_POST['Save1']) && ($_POST['Save1'])== "Save")
		{
		//update query to change already entered values
				$keys = array_keys($_POST); 
				$values = array_values($_POST);
				$slices_keys = array_slice($keys,1,2);
				$slices_values = array_slice($values,1,2);
				for($i=0;$i<count($keys)-2;$i++){
				$newrow[]=$slices_keys[$i]."='".$slices_values[$i]."'";
				  }
				$update_arr = join(',',$newrow);
				date_default_timezone_set('Asia/Calcutta');
				$tim = date('y-m-d H:i');
				$update = mysql_query("SELECT Updated_at FROM '".$_REQUEST['tb_name']."' where ".$row[0]['Field']." ='".$_REQUEST['id']."'");
				 $quey = 	"UPDATE 
				".$_REQUEST['tb_name']."
				SET
				$update_arr,
				Updated_at = '".$tim."'
				WHERE  ".$row[0]['Field']."  =".$_REQUEST['id'].""; 
				$ins_res = mysql_query($quey);
				if($ins_res)
				{
					$tab = $_REQUEST['tb_name'];
					$name =  $_SESSION['useremail'];
					date_default_timezone_set('Asia/Calcutta');
					$time = date('y-m-d H:i');
					$affect = "insert into zrow(updated_id,time,tablename,username)values('".$_REQUEST['id']."','$time','$tab','$name')"; 
					$ins = mysql_query($affect) or die(mysql_error());
					$admin = mysql_query("select * from zrow ");
					$result = mysql_fetch_array($admin); 
					echo "<script>document.location.href='listadd.php?tb_name=".$_REQUEST['tb_name']."'</script>";
				}
			else{
				@header('Location:show_edit.php?action=failure');			
			}
		}?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title><? echo ''.$_REQUEST['tb_name'].''; ?></title>
</head>
<!--right part dashboard-->
  <div id="right_part">
	<div id="php_dash_header">
		<h3>Detail of <? echo ''.$_REQUEST['tb_name'].''; ?> # <? echo $_REQUEST['id']; ?></h3>
	</div>
	<div id="bread">
		<ul class="breadcrumb">
			<li><a href="dashboard.php">Dashboard</a> <span class="divider">/</span></li>
			<li><a href="listadd.php?tb_name=<? echo $_REQUEST['tb_name']; ?>"><? echo $_REQUEST['tb_name']; ?></a> <span class="divider">/</span></li>
            <li class="active show" >Show <? echo "".$_REQUEST['tb_name'].""; ?> # <? echo $_REQUEST['id']; ?></li>
			<li class="edit" style="display:none;">Edit <? echo $_REQUEST['tb_name']; ?> # <? echo $_REQUEST['id']; ?></li>
            <li class="delete" style="display:none;">Delete <? echo $_REQUEST['tb_name']; ?> # <? echo $_REQUEST['id']; ?></li>
            <li class="history" style="display:none;">History of <? echo $_REQUEST['tb_name']; ?> # <? echo $_REQUEST['id']; ?></li>
		</ul>
	</div> 
     <div class="span4">
         <div class="tabbable" style="margin-bottom: 9px;">
                   <ul id="tab" class="nav nav-tabs">
                        <li class="active show1"><a href="#home" data-toggle="tab"><i class="icon-info-sign"></i>Show</a></li>
                        <li class="edit1" id="tab_edit"><a href="#profile" data-toggle="tab" id="edit" class="edit3" ><i class="icon-pencil"></i>Edit</a></li>
                        <li class="delete1"><a href="#export" data-toggle="tab" id="delet2"><i class="icon-remove"></i>Delete</a></li>
                        <li class="history1"><a href="#History" data-toggle="tab" id="history2"><i class="icon-book"></i>History</a></li>
                   </ul>
          <div id="myTabContent" class="tab-content">
		    <div class="tab-pane fade in active" id="home">
            	 <p>
                 <? 
				  $result_show = mysql_query('SELECT * FROM '.$_REQUEST['tb_name'].' where '.$row[0]['Field'].' = '.$_REQUEST['id']);
						$row_list = mysql_fetch_row($result_show);
						  for($i=1;$i<count($row_list);$i++) { 
							  if($row_list[$i] !="") { ?>
									<h5>Basic  <? echo $_REQUEST['tb_name']; ?>  Information</h5>
									<div id="show1">
										<div id="result">
											<?php
											echo  $row_list[$i] . "<br>"; 
											?>
										</div>
									</div>
					       <?php } 
				  		  } ?>
				</p>
            </div><!--home -->
            
            <div class="tab-pane fade" id="profile">
					<p id="user_informatiom">
                    <?
                    if(isset($_REQUEST['action']) && ($_REQUEST['action']=='edit'))
						{
								$user_id = $_REQUEST['id']; 
								$resu = mysql_query("SELECT * FROM ".$_REQUEST['tb_name']." where ".$row[0]['Field']." ='".$_REQUEST['id']."'");
								$get_result = mysql_fetch_assoc($resu);
								?>
								<form class=" form-inline userinfo" name="form" method="post" onSubmit="return validate(this);" id="update" action="" >
									<fieldset>
												<label><h2><? echo $_REQUEST['tb_name'] ?> &nbsp;&nbsp;Details</h2></label>
												<input type="hidden" name="user_id" value="<?php echo $get_result[0]; ?>"/> 
												<!--  qualification for remebering-->
										<div class="login_user">
												<!--user qualification field-->
											<p> 
												<? for($i=1;$i<count($get_result[$i])-2;$i++) {?>
													   <label for="<? echo ucwords($get_result[$i]); ?>">&nbsp;&nbsp;<? echo ucwords($get_result[$i]); ?></label>:<br />
													   <input type="text" id="<? echo ucwords($get_result[$i]); ?>"  maxlenght="50" name="qualification" value="<?php  echo $get_result[$i]; ?>"/><br>
												<? } ?>
											</p>
										</div>
												<!--  submit button for user-->
										<div class="allow">
											<p>
											<div class="content3">
												<input type="submit" class="btn btn-primary" value="Save" name="save1" />
												<a href="listadd.php?action=add&tb_name=<? echo $_REQUEST['tb_name']; ?>" class="btn btn-info" value="Save and add another" name="Save2" />Save and add another</a>
					
															<a href="show_edit.php?action=edit&tb_name=<? echo $_REQUEST['tb_name']; ?>&id=<? echo $_REQUEST['id']; ?>" type="submit" class="btn btn-info" value="Save and edit" name="Save3" >Save and edit</a>
															<a href="listadd.php?tb_name=<? echo $_REQUEST['tb_name']; ?>" class="btn"><i class="icon-remove"></i>Cancel</a>
												</div>
											</p>
										</div>
									</fieldset>
										<?php
							}
									else{		
											 $result_show = mysql_query('SELECT * FROM '.$_REQUEST['tb_name'].' where '.$row[0]['Field'].' = '.$_REQUEST['id']);
													?>
													<form class=" form-inline " name="form" method="post" onSubmit="return validate(this);" id="update" action="" >
												<fieldset>
															<label><h2>&nbsp;&nbsp;<? echo $_REQUEST['tb_name'] ?> Details</h2></label>
												 <a href="show_edit.php?action=edit&id=<?php echo $_REQUEST['id'] ; ?>&tb_name=<? echo $_REQUEST['tb_name'] ?>" id="edit"></a>
															<input type="hidden" name="user_id" value="<?php echo $_REQUEST['id']; ?>"/> 
															<!--  qualification for remebering-->
													<div class="login_user">
															<!--user qualification field-->
														<p> 
															<? for($i=1;$i<count($row)-2;$i++) { ?>
																   <label for="<? echo ucwords($row[$i][Field]);  ?>">&nbsp;<? echo ucwords($row[$i][Field]); ?></label>:<br />
																   <input type="text" id="qualification"   maxlenght="50" name="<? echo $row[$i][Field]; ?>" value="<?php  echo $row_list[$i]; ?>"/><br>
															<? } ?>
														</p>
													</div>
															<!--  submit button for user-->
													<div class="allow">
														<p>
														<div class="content3"  style="margin-top:20px;">
															<input type="submit" class="btn btn-primary" value="Save" name="Save1" />
															<a href="listadd.php?action=add&tb_name=<? echo $_REQUEST['tb_name']; ?>" class="btn btn-info" value="Save and add another" name="Save2" />Save and add another</a>
					
															<a href="show_edit.php?action=edit&tb_name=<? echo $_REQUEST['tb_name']; ?>&id=<? echo $_REQUEST['id']; ?>" type="submit" class="btn btn-info" value="Save and edit" name="Save3" >Save and edit</a>
															<a href="listadd.php?tb_name=<? echo $_REQUEST['tb_name']; ?>" class="btn"><i class="icon-remove"></i>Cancel</a>
														</div>
														</p>
													</div>
												</fieldset>
											</form>  
								<? } ?>
					</p>
				</div><!--profile-->
                <div class="tab-pane fade" id="export">
					<p>
						<?php
							if(isset($_GET['act']) && ($_GET['act']=='remove'))
							{
								$delete_user = $_GET['del'];
								$squl_del = "DELETE from ".$_REQUEST['tb_name']." WHERE ".$row[0]['Field']." =".$_GET['del']."";
								$result = mysql_query($squl_del);
								$name =  $_SESSION['useremail'];
								$tab= $_REQUEST['tb_name'];
								date_default_timezone_set('Asia/Calcutta');
								$time = date('y-m-d H:i');
								 $affect = "insert into zrow(deleted_id,username,tablename,time)values('".$_GET['del']."','$name','$tab','$time')";
								 $ins = mysql_query($affect) or die(mysql_error());  
								echo "<script>document.location.href='listadd.php?action=delete&tb_name=".$_REQUEST['tb_name']."'</script>";
							}
						?>	
                            	<div class="alert">
                                    <a class="close" data-dismiss="alert">&times;</a>
                                    <strong>Warning!</strong> Are you sure? You want to delete this <strong>#<?php echo $_REQUEST['id'] ; ?></strong> ?  The related content will also 
                                    be deleted.
                                </div>
                                    <span id="inform">User Information</span>
                                    <a href="show_edit.php?tb_name=<? echo $_REQUEST['tb_name']; ?>&id=<? echo $_REQUEST['id'] ; ?>">User Information #<?php echo $_REQUEST['id'] ; ?></a>
                                <div id="block">                      					
                                    <p>					  
                                        <a href="show_edit.php?act=remove&tb_name=<? echo $_REQUEST['tb_name']; ?>&del=<?php echo $_REQUEST['id'] ; ?>" class="btn btn-danger"><img src="includes/img/30x_checkmark.png" 
                                        width="15px" />Yes, I'm sure</a>
                                        <a href="listadd.php?&tb_name=<? echo $_REQUEST['tb_name']; ?>" class="btn"><i class="icon-remove"></i>cancel</a>
                                    </p>
                        		</div>
					</p>
				</div><!--del tab-->
                
                <div class="tab-pane fade" id="History">
					<p>
                        <div id="history4">
                            <p>
                                <input class="input-small" type="text" placeholder="Filter" style="margin-top:10px;">
                                <a href="?tb_name=<? echo $_REQUEST['tb_name']; ?>" class="btn btn-small btn-primary"><i class="icon-white icon-refresh"></i> Refresh</a>
                            </p>
                        </div>
                		 <? 
				  $result_shows = mysql_query('SELECT * FROM '.$_REQUEST['tb_name'].' where '.$row[0]['Field'].' = '.$_REQUEST['id']);
						  for($i=1;$i<count($row_list);$i++) { 
                          if($row_list[$i] !="") { ?>
                            <h5>Basic  <? echo $_REQUEST['tb_name']; ?>  Information</h5>
                            <div id="show1">
                                <div id="result">
                                    <?php
                                    echo  $row_list[$i] . "<br>"; 
                                    ?>
                                </div>
                            </div>
                  <?php } } ?>
					</p>  
			</div><!--history-->
                
          </div><!--tabb-->
       </div><!--span4-->
    </div><!--right_part-->
 </html>