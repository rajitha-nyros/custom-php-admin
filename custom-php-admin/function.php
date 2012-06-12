<?php 
include("includes/config_db.php");
	if(isset($_POST['search_key']) != '' && isset($_POST['search_value']) != ''  ){
					extract ($_POST);
					print_r($_POST);
				 $query = "select * from $table_name where ".$search_key ."='". $search_value ."'" ;
					$result = mysql_query($query) or die(mysql_error());
					$i=0;
					while($rows= mysql_fetch_assoc($result)){
						$i++; ?>
                       
                                <tr >
                                <?	foreach($rows as $filter_rows){
                                
                                        for($i=0;$i<count($filter_rows);$i++) { 	?>
                                        
                                            <td class="table table-striped" style="padding-left:20px;width:90px; border-bottom:1px solid #ccc;">
                                     <?    echo $filter_rows;
                                                }
                                      
                                    ?>
                                            </td>
                                            <? } ?>
                                             <td style=" border-bottom:1px solid #ccc;">
                                        <ul style="list-style:none">
                                            <li style=" display: inline-block;">
                                                <a href="show_edit.php?id=<? echo $filter_rows[0] ?>&tb_name=<? echo $_REQUEST['tb_name']; ?>" rel="tooltip" title="show"><i class="icon-info-sign"></i>
                                                <span style="display:none">show</span></a>
                                            </li>
                                            <li style=" display: inline-block;">
                                                <a href="show_edit.php?id=<? echo $table_row[0] ?>&tb_name=<? echo $_REQUEST['tb_name']; ?>"rel="tooltip" title="add new">
                                                <i class="icon-pencil"></i>
                                                <span style="display:none">Edit</span></a>
                                            </li>
                                            <li style=" display: inline-block;">
                                                <a href="show_edit.php?id=<? echo $table_row[0]  ?>&tb_name=<? echo $_REQUEST['tb_name']; ?>" rel="tooltip" title="export"> <i class="icon-remove"></i>
                                                <span style="display:none">Delete</span></a>
                                            </li>
                                            <li style=" display: inline-block;">
                                                <a href="show_edit.php?id=<? echo $table_row[0] ?>&tb_name=<? echo $_REQUEST['tb_name']; ?>"rel="tooltip" title="history">
                                                <i class="icon-book"></i>
                                                <span style="display:none">History</span></a>
                                            </li>
                                        </ul>
                                    </td>
                                           
                                </tr>
                            
							<? 
					}
	}
?>
