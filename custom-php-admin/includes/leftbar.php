<?php
include("includes/config_db.php");
$result = "SHOW TABLES from $database ";
$que = mysql_query($result);
$i=0;
while($tab_details = mysql_fetch_assoc($que)){
	$row[$i] = $tab_details;
	$i++;
}
?>
 							<div class="span3">
                              <div class="well sidebar-nav">
                                <ul class="nav nav-list">
                                 	<li class="nav-header">Navigation</li>
                               <?php for($i=0;$i<count($row); $i++) {
                               if($row[$i]['Tables_in_'.$database] != "photo" && $row[$i]['Tables_in_'.$database] != "zrow" ) {  ?>
									<li><a href="listadd.php?tb_name=<?php echo $row[$i]['Tables_in_'.$database]; ?>"><?php echo ucwords($row[$i]['Tables_in_'.$database]); ?></a></li>
                          		   <?php }
								   } ?>
                                </ul>
                              </div><!--/.well -->
                            </div><!--/span-->
