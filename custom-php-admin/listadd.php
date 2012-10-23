<?
session_start();
include("includes/header.php");
include("includes/leftbar.php");
include("pagination.php");
$sql = 'DESCRIBE '.$_REQUEST['tb_name'].'';
$result = mysql_query($sql);
$i=0;
while ($list = mysql_fetch_assoc($result))
	{
			$row[$i] = $list;
			$i++;
	}

	if($_GET['action'] == "add")
	{
							echo '<script type="text/javascript">
									$(document).ready(function(){
										$("#add").trigger("click");
									});
								</script>';
	}
	if($_GET['action'] == "export")
	{
							echo '<script type="text/javascript">
									$(document).ready(function(){
										$("#exports").trigger("click");
									});
								</script>';
	}
	if($_GET['action'] == "hist")
	{
							echo '<script type="text/javascript">
									$(document).ready(function(){
										$("#hist").trigger("click");
									});
								</script>';
	}
	if($_GET['action'] == "export_tab")
	{
							echo '<script type="text/javascript">
									$(document).ready(function(){
										$(".export_select").trigger("click");
									});
								</script>';
	}
	if($_GET['action'] == "failure")
	{ ?>
                             <div class="alert alert-danger" style="width:500px;margin-left:350px;text-align:center;">
                            <a class="close" data-dismiss="alert">&amp;times;</a>
                            <strong>Sorry !</strong>Your information not successfully added .
                            </div>
<?php
    }
	if($_GET['action'] == "success")
		{ ?>
                             <div class="alert alert-success" style="width:500px;margin-left:350px;text-align:center;">
                            <a class="close" data-dismiss="alert">&amp;times;</a>
                            <strong>Well done!</strong> Your information successfully updated.
                            </div>
 <?php }
if(isset($_POST['save1'])=='Save')
	{
		 $keys = array_keys($_POST);
		 $values = array_values($_POST);
		 $slice_values = array_slice($values,1,2);
		 $slices_keys = array_slice($keys,1,2);
		$insert_keys = implode(",",$slices_keys);
		$insert_values = implode(",",$slice_values);
		$statement = $_REQUEST['tb_name'];
		date_default_timezone_set('Asia/Calcutta');
		$time = date('y-m-d H:i');
		$insert="insert into $statement($insert_keys,Created_at)values('".implode("','",$slice_values)."','$time')";
		$ins = mysql_query($insert) or die(mysql_error());
			if($ins)
			 {
				$id1 = mysql_query('SELECT '.$row[0]['Field'].' FROM {$statement} ORDER BY '.$row[0]['Field'].' ASCE LIMIT 1');
				$id = mysql_insert_id();
				$tab = $_REQUEST['tb_name'];
				date_default_timezone_set('Asia/Calcutta');
				$time = date('y-m-d H:i');
				$name =  $_SESSION['useremail'];
				$affect = "insert into zrow(created_at,time,username,tablename)values('$id','$time','$name','$tab')";
				$ins = mysql_query($affect) or die(mysql_error());
				$admin = mysql_query("select * from zrow ");
				$result = mysql_fetch_array($admin);
				@header('Location:listadd.php?action=success');
			}
		else{
					@header('Location:listadd.php?action=failure');
			}
	}
	if(isset($_POST['Save2'])=='Save and add another')
				{
					extract($_POST);
					$keys = array_keys($_POST);
					$values = array_values($_POST);
					$slice_values = array_slice($values,1,2);
					$slices_keys = array_slice($keys,1,2);
					$insert_keys = implode(",",$slices_keys);
					$statement = $_REQUEST['tb_name'];
					date_default_timezone_set('Asia/Calcutta');
					$time = date('y-m-d H:i');
					$insert="insert into $statement($insert_keys,Created_at)values('".implode("','",$slice_values)."','$time')";
					$ins = mysql_query($insert) or die(mysql_error());
					if($ins)
					{
						$id1 = mysql_query('SELECT '.$row[0]['Field'].' FROM {$statement} ORDER BY '.$row[0]['Field'].' ASCE LIMIT 1');
						$id = mysql_insert_id();
						$tab = $_REQUEST['tb_name'];
						date_default_timezone_set('Asia/Calcutta');
						$time = date('y-m-d H:i');
						$name =  $_SESSION['useremail'];
						$affect = "insert into zrow(created_at,time,username,tablename)values('$id','$time','$name','$tab')";
						$ins = mysql_query($affect) or die(mysql_error());
						$admin = mysql_query("select * from zrow ");
						$result = mysql_fetch_array($admin);
					}
					echo '<script type="text/javascript">
							$(document).ready(function(){
								$("#add").trigger("click");
							});
						</script>';
				}
	if(isset($_POST['Save3'])=='Save and edit')
				{
					extract($_POST);
					$keys = array_keys($_POST);
					$values = array_values($_POST);
					$slice_values = array_slice($values,1,2);
					$slices_keys = array_slice($keys,1,2);
					$insert_keys = implode(",",$slices_keys);
					$statement = $_REQUEST['tb_name'];
					date_default_timezone_set('Asia/Calcutta');
					$time = date('y-m-d H:i');
					$insert="insert into $statement($insert_keys,Created_at)values('".implode("','",$slice_values)."','$time')";
					$ins = mysql_query($insert) or die(mysql_error());
					if($ins)
					{
						$id1 = mysql_query('SELECT '.$row[0]['Field'].' FROM {$statement} ORDER BY '.$row[0]['Field'].' ASCE LIMIT 1');
						$id = mysql_insert_id();
						$tab = $_REQUEST['tb_name'];
						date_default_timezone_set('Asia/Calcutta');
						$time = date('y-m-d H:i');
						$name =  $_SESSION['useremail'];
						$affects = "insert into zrow(created_at,time,username,tablename)values('$id','$time','$name','$tab')";
						$ins = mysql_query($affects) or die(mysql_error());
					    $user_id=mysql_query("SELECT * FROM ".$_REQUEST['tb_name']." where ".$row[0]['Field']." ='".$id."'");
						$user_id= mysql_fetch_array($user_id);
						$admin = mysql_query("select * from zrow ");
						$result = mysql_fetch_array($admin);
						echo "<script>document.location.href='show_edit.php?action=change&tb_name=".$_REQUEST['tb_name']."&id=".$user_id["".$row[0]['Field'].""]."'</script>";
					}
			}
					?>
 <?	if($_GET['action'] == "delete")
	 { ?>
                <div class="alert alert-success" style="width:500px;margin-left:350px;margin-bottom:-70px;text-align:center;">
                <a class="close" data-dismiss="alert">&amp;times;</a>
                <strong>Well !</strong> Your information successfully deleted.
                </div>
<? }
?>
<div id="right_part">
        <div id="php_dash_header">
        	<h3>PHP Administration</h3>
        </div>
        <div id="bread">
            <ul class="breadcrumb">
                <li><a href="dashboard.php">Dashboard</a> <span class="divider">/</span></li>
                <li class="active" id="board"><? echo $_REQUEST['tb_name']; ?> </li>
                <li class="board3" style="display:none;"><a href=""><? echo $_REQUEST['tb_name']; ?></a></li>
                <li class="board2" style="display:none;"><span class="divider">/</span>Add New</li>
                <li class="board4" style="display:none;"><span class="divider">/</span>Export</li>
                <li class="board5" style="display:none;"><span class="divider">/</span>History</li>
            </ul>
        </div>
        <div id="rightnav">
        <ul class="nav nav-pills filter" >
            <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Add filter <b class="caret"></b></a>
                <ul class="dropdown-menu myclass">
			<? for($i=0;$i<count($row[$i])-1;$i++) {
                    if($row[$i][Field] !=$row[2][Field]){ ?>
                    <li id="<? echo  $row[$i]['Field']; ?>"><a href="<? echo  $row[$i][Field]; ?>"  data-toggle="tab"><? echo $row[$i][Field];  ?></a></li>
                    <? 	}
                    }  ?>
                </ul>
            </li>
            <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Selected items <b class="caret"></b></a>
                <ul id="menu3" class="dropdown-menu" style="margin-right:-60px;">
                <li><a href="?action=export_tab&amp;tb_name=<? echo $_REQUEST['tb_name'] ; ?>">Export selected <?  echo $_REQUEST['tb_name'] ; ?></a></li>
                <li class="dele"><a href="#" class="delet" >Delete selected <? echo $_REQUEST['tb_name'];  ?></a></li>
                </ul>
            </li>
        </ul> <!-- /tabs -->

        </div><!--right nav-->

        <div class="tabbable" style="margin-bottom: 9px;">
            <ul id="tab" class="nav nav-tabs hello">
                <li class="active" ><a href="#home "  data-toggle="tab" id="list"><i class="icon-th-list"></i>List</a></li>
                <li class="add" ><a href="#profile"  data-toggle="tab"  id="add" ><i class="icon-plus"></i>Add new</a></li>
                <li class="export"><a href="#export" data-toggle="tab" id="exports" class="export_select" ><i class="icon-share"></i>Export</a></li>
                <li class="history"><a href="#History"   data-toggle="tab" id="hist"><i class="icon-book"></i>History</a></li>
            </ul>
        </div><!--tabbale-->

        <div class="del" style="display:none;">
				<?php
                if(isset($_GET['act']) && ($_GET['act']=='remove'))
                {
                $squ =  mysql_query("DELETE  FROM '".$_REQUEST['tb_name']."'");
                while($result5 = mysql_fetch_assoc($squ)){
                }
                @header("Location:listadd.php");
                echo "<script>document.location.href='listadd.php'";
                }
                ?>
                <span id="inform"><? echo $_REQUEST['tb_name']; ?></span><br><br>
                <?
                $res24 = mysql_query('SELECT * FROM '.$_REQUEST['tb_name'].'');

                while($row3 = mysql_fetch_array($res24)){ ?>
                <span class ="remov" ><b><? echo $_REQUEST['tb_name']; ?> </b></span>&amp;nbsp;
                <a href="listadd.php?tb_name=<? echo $_REQUEST['tb_name']; ?>"><? echo $_REQUEST['tb_name']; ?> #<?php echo $row3[0]; ?><br><br></a>
                <? } ?>
                <div id="block">
                    <p>
                        <a href="listadd.php?tb_name=<? echo $_REQUEST['tb_name']; ?>&amp;act=remove" class="btn btn-danger"><i class="icon-white icon-ok"></i>Yes, I'm sure</a>
                        <a href="listadd.php?tb_name=<? echo $_REQUEST['tb_name']; ?>" class="btn"><i class="icon-remove"></i>cancel</a>
                    </p>
                </div>
        </div>
        <div id="myTabContent" class="tab-content">
                    <div class="tab-pane fade in active home1" id="home">
                            <div id="refresh">
                                    <form method="post" action="" name="search_form" id="search_form">

                                            <div  id="search_block" style="display:none;">
                                                    <p>
                                                            <span class="label label-info form-label" id="myspan" style="padding:10px;"><a href="?row=<?  ?>&amp;tb_name=<?php echo $_REQUEST['tb_name'];  ?>" ><i class="icon-trash icon-white"></i>
                                                            </a><span id="span_search"> </span>
                                                            </span>&amp;nbsp;
                                                            <input type="hidden" name="table_name" id="table_name" value="<?php echo $_REQUEST['tb_name']; ?>" />
                                                            <input type="hidden" id="search_key" name="search_key" value="" />
                                                            <input class="input-small"  id="search_value" type="text"  style="margin-top:10px;" />
                                                    </p>
                                            </div>
                                    <input class="input-small filter" type="text" placeholder="Filter" style="margin-top:10px;">
                                    <button class="btn btn-primary filter_submit" type="submit" data-disable-with="<i class='icon-white icon-refresh'></i> Refresh"><i class="icon-white icon-refresh"></i>Refresh</button>
                                    <a class="btn  btn-info" href="listadd.php?action=export_tab&amp;tb_name=<?php echo $_REQUEST['tb_name']; ?>" style="float:right; margin-top:10px;">Export found <? echo $_REQUEST['tb_name']; ?> </a>
                            </form>

                            </div><!--refresh-->

                    <div id="data1">
                                    <table class="table table-bordered table-striped" style="margin-left:0px;" >
                                            <tr>
                                            <?
                                            $tab_result = 'DESCRIBE '.$_REQUEST['tb_name'];
                                             $tab_query = mysql_query($tab_result);
                                             $row2 = mysql_fetch_array($tab_query);
                                            for($i=0;$i<count($row2);$i++) {
                                            if($row2[$i] === '' || $row2[$i] === 'NULL'){?>
                                                <th id="info1" style="padding-left:15px;">
                                                        <? echo ucwords($row[$i][Field]); ?>
                                                        <a id="cart_sort" href="?sort=<? echo  $row[$i][Field]; ?>&amp;tb_name=<? echo $_REQUEST['tb_name'] ;?>" style="text-decoration:none; color:black;margin-right:10px;"><span class="caret car1" style="margin-right:-20px;margin-top:10px;"></span></a>
                                                </th>
                                            <?
                                            }}	 ?>
                                            </tr><tr>
                                                    <?php
                                                    $page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
                                                    $limit = 4;
                                                    $startpoint = ($page * $limit) - $limit;
                                                    //to make pagination
                                                    $statement = $_REQUEST['tb_name'];
                                                    $tab_result = 'SELECT * FROM '.$_REQUEST['tb_name']." limit $startpoint, $limit";
                                                    $tab_query = mysql_query($tab_result);
                                                    $i=0;
                                                    while($tab_details = mysql_fetch_row($tab_query)){
                                                            $tab_row[$i] = $tab_details;
                                                            foreach($tab_row as $table_row){
                                                            $i++;
                                                    } for($i=0;$i<count($table_row);$i++) {
                                                            ?>
                                                            <td data="<? echo $table_row[$i]; ?>">
                                                            <?php
                                                            echo $table_row[$i];
                                                            ?>
                                                            </td>
                                                    <?   } ?>
                                             <td>
                                            <ul style="list-style:none">
                                                    <li style=" display: inline-block;">
                                                    <a href="show_edit.php?id=<? echo $table_row[0] ?>&amp;tb_name=<? echo $_REQUEST['tb_name']; ?>" rel="tooltip" title="show"><i class="icon-info-sign"></i>
                                                    <span style="display:none">show</span></a>
                                                    </li>
                                                    <li style=" display: inline-block;">
                                                    <a href="show_edit.php?action=change&amp;id=<? echo $table_row[0] ?>&amp;tb_name=<? echo $_REQUEST['tb_name']; ?>" rel="tooltip" title="Edit">
                                                    <i class="icon-pencil"></i>
                                                    <span style="display:none">Edit</span></a>
                                                    </li>
                                                    <li style=" display: inline-block;">
                                                    <a href="show_edit.php?action=remove&amp;id=<? echo $table_row[0]  ?>&amp;tb_name=<? echo $_REQUEST['tb_name']; ?>" rel="tooltip" title="Delete"> <i class="icon-remove"></i>
                                                    <span style="display:none">Delete</span></a>
                                                    </li>
                                                    <li style=" display: inline-block;">
                                                    <a href="show_edit.php?action=history&amp;id=<? echo $table_row[0] ?>&amp;tb_name=<? echo $_REQUEST['tb_name']; ?>" rel="tooltip" title="history">
                                                    <i class="icon-book"></i>
                                                    <span style="display:none">History</span></a>
                                                    </li>
                                            </ul>
                                            </td>
                                         </tr>
                                    <? }?>
                                    </table>
                                    <?php
                                        echo pagination($statement,$limit,$page  );
                                    ?>
                    </div><!--data1-->
                             <input type="submit" class="btn all" value="Show all" style="margin-top:10px;"/> <br /><br />
                            <div id="data2" style="display:none;">
                                    <table class="table table-bordered table-striped" style="margin-left:0px;">
                                       <tr>
                                            <? for($i=0;$i<count($row)-1;$i++) { ?>
                                                    <th id="info1" style="padding-left:15px;">
                                                        <a href="" style="text-decoration:none; color:black;margin-right:15px;">
                                                        <? echo $row[$i][Field]; ?>
                                                        <span class="caret car1" style="margin-right:-10px;margin-top:10px;"></span></a>
                                                    </th>
                                            <? } ?>
                                     </tr>
                                    <tr>
                                        <?php

                                        $tab_result = 'SELECT * FROM '.$_REQUEST['tb_name'].' ';
                                        $tab_query = mysql_query($tab_result);
                                        $i=0;
                                        while($tab_details = mysql_fetch_row($tab_query)){
                                            $tab_row[$i] = $tab_details;
                                            foreach($tab_row as $table_row){
                                            $i++;
                                        } 	for($i=0;$i<count($table_row);$i++) { ?>
                                        <td>
                                            <?php   echo $table_row[$i];
                                        } ?>
                                        </td>
                                        <td>
                                        <ul style="list-style:none">
                                                <li style=" display: inline-block;">
                                                    <a href="show_edit.php?id=<? echo $table_row[0] ?>&amp;tb_name=<? echo $_REQUEST['tb_name']; ?>" rel="tooltip" title="show"><i class="icon-info-sign"></i>
                                                    <span style="display:none">show</span></a>
                                                </li>
                                                <li style=" display: inline-block;">
                                                    <a href="show_edit.php?id=<? echo $table_row[0] ?>&amp;tb_name=<? echo $_REQUEST['tb_name']; ?>" rel="tooltip" title="add new">
                                                    <i class="icon-pencil"></i>
                                                    <span style="display:none">Edit</span></a>
                                                </li>
                                                <li style=" display: inline-block;">
                                                    <a href="show_edit.php?id=<? echo $table_row[0]  ?>&amp;tb_name=<? echo $_REQUEST['tb_name']; ?>" rel="tooltip" title="export"> <i class="icon-remove"></i>
                                                    <span style="display:none">Delete</span></a>
                                                </li>
                                                <li style=" display: inline-block;">
                                                    <a href="show_edit.php?id=<? echo $table_row[0] ?>&amp;tb_name=<? echo $_REQUEST['tb_name']; ?>" rel="tooltip" title="history">
                                                    <i class="icon-book"></i>
                                                    <span style="display:none">History</span></a>
                                                </li>
                                        </ul>
                                        </td>
                                    </tr>
                                    <? }
                                    ?>
                                    </table>
                            </div><!--show all-->
                    </div><!--home-->


        <div class="tab-pane fade" id="profile">
                    <p id="user_informatiom">
                            <form class="form-inline userinfo" name="form" method="post" onSubmit="validate();" action="" >
                                <fieldset>
                                        		<label><h4> &nbsp;&nbsp;&nbsp;<? echo $_REQUEST['tb_name']; ?></h4></label>
                                        <input type="hidden" name="users_login" id="users_login" value="users_login">
                                        <div class="login_user">
                                                <!--user qualification field-->
                                                <p>
                                                <? for($i=1;$i<count($row[$i])-3;$i++) {?>
                                                        <label for="<? echo $row[$i][Field]; ?>">&amp;nbsp;<? echo ucwords($row[$i][Field]); ?></label>:<br />
                                                        <input type="text" id="<? echo $row[$i][Field]; ?>" class="myDiv"  maxlenght="50" name="<? echo $row[$i][Field]; ?>" required="required"/><br>

                                                <? } ?>
                                                </p>
                                        </div>
                                        <!--  submit button for user-->
                                        <div class="allow">
                                            <p>
                                                <div class="content3">
                                                    <input type="submit" id="fat-btn" data-loading-text="loading..." class="btn btn-primary " value="Save" name="save1" data-disable-with="<i class='icon-white icon-ok'></i> Save"/>
                                                    <input type="submit" class="btn btn-info " value="Save and add another" name="Save2" />
                                                    <input type="submit" class="btn btn-info " value="Save and edit" name="Save3" />
                                                    <a href="listadd.php?tb_name=<? echo $_REQUEST['tb_name']; ?>" class="btn"><i class="icon-remove"></i>Cancel</a>
                                                </div>
                                            </p>
                                        </div>
                                </fieldset>
                            </form>
                    </p><!--add new-->
        </div><!--add new-->


        <div class="tab-pane fade" id="export">
                    <p>
                        <div>
                        <a id="toggle1" href=""  style="color:#333; font-size:18px; ">
                        <i class="icon-chevron-down"></i> Select fields to export
                        </a>
                            <div id="tog1" style="border-top:1px solid #ccc; margin-top:10px;">
                                <div class="control-group" style="margin-left:90px; margin-top:10px;">
                                <label class="control-label" for="optionsCheckboxList">Fields from <? echo $_REQUEST['tb_name']; ?></label>
                                    <div class="controls" style="margin-left:170px; margin-top:-30px;">
                                        <label class="checkbox">
                                        <? for($i=1;$i<count($row[$i]);$i++) {?>
                                            <input type="checkbox" name="optionsCheckboxList1" value="option1" checked>
                                            <? echo $row[$i][Field]; ?><br>
                                            </label>
                                        <? } ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                        <a id="toggle2" href="" style="color:#333; font-size:18px; ">
                        <i class="icon-chevron-down"></i>Options for csv
                        </a>
                            <div id="tog2" style="border-top:1px solid #ccc; margin-top:10px;">
                                <div class="control-group" style="margin-left:90px;margin-top:20px;">
                                <label class="control-label" for="select01">Select list</label>
                                    <div class="controls" style="margin-left:90px; margin-top:-25px;">
                                        <select id="select01">
                                        <option></option>
                                        <option> <comma> ','</option>
                                        <option> <semicolon> ';'</option>
                                        <option> <tabs> </option>
                                        </select><br />
                                        Leave blank for default (',')
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <a href="csv.php?tb_name=<? echo $_REQUEST['tb_name']; ?>" class="btn btn-primary"><i class="icon-white icon-ok"></i>Export to csv</a>
                            <a class="btn btn-small btn-info" href="json.php?tb_name=<? echo $_REQUEST['tb_name']; ?>"> Export to json</a>
                            <a class="btn btn-small btn-info" href="xml.php?tb_name=<? echo $_REQUEST['tb_name']; ?>"> Export to xml</a>
                            <a href="listadd.php?tb_name=<? echo $_REQUEST['tb_name']; ?>" class="btn"><i class="icon-remove"></i>cancel</a>
                        </div>
                    </p><!--export-->
        </div><!--EXPORT TAB-->

        <div class="tab-pane fade" id="History" >
                <div class="span8" >
                <?
                $result = "SELECT * FROM  zrow ORDER BY row_id DESC ";
                $que = mysql_query($result);
                $i=0;
                while($tabdetails = mysql_fetch_assoc($que)){
                    $row[$i] = $tabdetails;
                    $i++;
                }
                ?>
                        <div id="green-contents">
                                <table class="table2 table-striped" style="margin-left:10px;" id="mt">
                                    <thead>
                                        <tr>
                                            <th>Date/Time</th>
                                            <th>Users</th>
                                            <th>Item</th>
                                            <th>Message</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                    <?php
                                        $result_table = mysql_query('SELECT * FROM '.$_REQUEST['tb_name'].'');
                                        while($row_history = mysql_fetch_array($result_table)){
                                            for($i=0;$i<count($row_history[$i]);$i++) {
                                                ?>
                                                <td><?php echo "".date("M d ,Y", strtotime( $row[$i]['time'])).""; ?></td>
                                                <td><?php echo $row[$i]['username']; ?></td>
                                                <td><?php echo $row_history[$i]; ?></td>
                                                <td>Created  #<?php echo $row_history[$i]; ?></td>
                                    </tr>
                                            <?
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                                    <div id="green" style="margin:auto;">
                                    </div>
                        </div>
                </div><!--span8-->
        </div><!-- History TAB-->

        </div><!--myTabContent-->
        <div id="footer" style="clear:both; margin-left:20px;">
            &copy; PHPAdmin 2012
        </div>
</div><!--main-->
</body>
</html>