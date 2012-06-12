<? session_start();?>
<? include("includes/config_db.php"); ?> 	
<!--Include Head Part Content-->
<?php include("includes/header.php"); ?>
<!--Include Left Side bar Content-->
<?php include("includes/leftbar.php"); ?>
<!--right part dashboard-->
    <div id="right_part">
            <div id="php_dash_header" style="width:680px;">
            		<h3>PHP Administration</h3>
            </div>
            <div id="bread" style="width:680px;margin-right:30px;">
                <ul class="breadcrumb">
                        <li><a href="" id="dash">Dashboard</a></li>
                </ul>
            </div> 
        <div class="span4">
            <div class="tabbable" style="margin-bottom: 9px;width:680px;">
                <ul class="nav nav-tabs">
                		<li class="active"><a href="#1" data-toggle="tab"><i class="icon-home"></i>Dashboard</a></li>
                </ul>
                    <div class="tab-content">
                    	<div class="tab-pane active" id="1">
                                                <p>
                                                    <?php
                                                    
                                                    $result = "SHOW TABLE STATUS FROM $database ";
                                                    $que = mysql_query($result);
                                                    $i=0;
                                                    while($tabdetails = mysql_fetch_assoc($que)){
                                                        $row[$i] = $tabdetails;
                                                        $i++;
                                                    }
                                                    $result = "SHOW TABLES";
                                                    $que = mysql_query($result);
                                                    $i=0;
                                                    while($tab_details = mysql_fetch_assoc($que)){
                                                        $row2[$i] = $tab_details;
                                                        $i++;
                                                    }
                                                    ?>
                                                    <table class="table table-bordered table-striped" style="width:680px;">
                                                        <tr>
                                                            <th>Table name</th>
                                                            <th>Create at</th>
                                                            <th>Update at</th>
                                                            <th >Records</th>
                                                            <th></th>
                                                        </tr>
                                                        <tr>
															<?php for($i=0;$i<count($row);$i++) { 
                                                            if($row2[$i]['Tables_in_custom_php_admin'] != "zrow"  ) {  ?>
                                                            <td><a href="listadd.php?tb_name=<? echo ucwords($row2[$i]['Tables_in_custom_php_admin']); ?>"><? echo ucwords($row2[$i]['Tables_in_custom_php_admin']); ?></a>
                                                            </td>
                                                            <td><?php echo $row[$i]['Create_time']; ?></td>
                                                            <td><?php echo $row[$i]['Update_time']; ?></td>
                                                            <td>
                                                                <div class="progress">
                                                                    <div class="bar"
                                                                        style="width:0%;background:<? 
																		if($row[$i]['Rows'] < 10){ 
																					?> #999999 <? 
																		 }
                                                                        else if($row[$i]['Rows'] >10 && $row[$i]['Rows'] <20){
																					 ?> #F89406 <? 
																		 } 
                                                                        else{ 
																					?> green <? 
																		 }  ?> " data="<?php echo $row[$i]['Rows'
																		]*10; ?>"data="<?php echo $row[$i]['Rows']*3; ?>">
                                                                        <?php echo $row[$i]['Rows']; ?>
                                                                    </div>
                                                                </div> 
                                                            </td>
                                                            <td> 
                                                            <ul style="list-style:none">
                                                                <li style=" display: inline-block;">
                                                                <a href="listadd.php?tb_name=<?php echo ucwords($row2[$i]['Tables_in_custom_php_admin']); ?>" title="List"><i class="icon-th-list"></i>
                                                                <span style="display:none">List</span></a>
                                                                </li>
                                                                <li style=" display: inline-block;">
                                                                <a href="listadd.php?tb_name=<?php echo ucwords($row2[$i]['Tables_in_custom_php_admin']); ?>&action=add" rel="tooltip" id="new" title="add new"><i
                                                                class="icon-plus"></i>
                                                                <span style="display:none">Add new</span></a>
                                                                </li>
                                                                <li style=" display: inline-block;">
                                                                <a href="listadd.php?tb_name=<?php echo ucwords($row2[$i]['Tables_in_custom_php_admin']); ?>&action=export"rel="tooltip" title="export"><i class="icon-share"></i>
                                                                <span style="display:none">Export</span></a>
                                                                </li>
                                                                <li style=" display: inline-block;">
                                                                <a href="listadd.php?tb_name=<?php echo ucwords($row2[$i]['Tables_in_custom_php_admin']); ?>&action=hist" rel="tooltip" title="history"><i
                                                                class="icon-book"></i>
                                                                <span style="display:none">History</span></a>
                                                                </li>
                                                            </ul>
                                                            </td>
                                                        </tr>
                                                    <?php  }}?>
                                                    </table> 
                                                </p>
                        </div><!--id 1-->
                    </div><!--tab-content-->
                </div><!--tabbble-->
            </div><!--span4-->
            </div><!--rightpart-->
<?
$result7 = "SELECT * FROM  zrow ORDER BY row_id DESC";
$que7 = mysql_query($result7);
$i=0;
while($tabdetails7 = mysql_fetch_assoc($que7)){
	$row7[$i] = $tabdetails7;
	$i++;
}
?>
            <div id="report" id="green-contents" >
                                         <h2>History</h2>
                                <table class="table table-striped" style="margin-top:10px; margin-right:0px;width:680px;" id="mt">
                                    <tr>
                                    
                                        <th><?php echo ucwords($row[0]['Name']); ?></th>
                                        <th>Changes</th>
                                    </tr>
                                    <tr>
                                        <?php for($i=0;$i<count($row7);$i++) { ?>
                                        <td><?php echo   $row7[$i]['username']; ?> </td>
                                        <td> <?php echo $row7[$i]['tablename'] ;?> ,Updated # <?php echo $row7[$i]['updated_id'] ;?>   ,Deleted # <?php echo $row7[$i]['deleted_id'] ;?>, Created # <?php echo $row7[$i]['created_at'] ;?> </td>
                                        
                                    </tr>
                                <?php  } ?>
                                </table>
                        <div id="green" style="">
                        </div>
            </div>
            
            <div id="footer" style="clear:both; margin-left:300px;">
            &copy; PHPAdmin 2012
            </div> 
