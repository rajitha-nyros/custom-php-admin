<?php
include("includes/config_db.php");
$database ="custom_php_admin";
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
                               if($row[$i]['Tables_in_custom_php_admin'] != "photo" && $row[$i]['Tables_in_custom_php_admin'] != "zrow" ) {  ?>
									<li><a href="listadd.php?tb_name=<?php echo ucwords($row[$i]['Tables_in_custom_php_admin']); ?>"><?php echo ucwords($row[$i]['Tables_in_custom_php_admin']); ?></a></li>
                          		   <?php }
								   } ?>
                                </ul>
                              </div><!--/.well -->
                            </div><!--/span-->
                        