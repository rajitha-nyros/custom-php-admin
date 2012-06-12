<?
include("includes/config_db.php");
//connect

$link = mysql_connect($server,$username,$password);
mysql_select_db($database,$link);

//get all the tables
$query ="".$_REQUEST['tb_name']."";
exportMysqlToXml($query);
function exportMysqlToXml($query,$filename = 'export.xml')
{
 $sql_query = "select * from ".$_REQUEST['tb_name']. ""; 
 $result = mysql_query($sql_query); 
if(mysql_num_rows($result))
{
	//prep output
	$tab = "\t";
	$br = "\n";
	$xml = '<?xml version="1.0" encoding="UTF-8"?>'.$br;
	$xml.= '<database name="'.$database.'">'.$br;
	
	//for every table...
	$table = mysql_fetch_row($result);
	//{
		//prep table out
		$xml.= $tab.'<table name= " '.$query .'" >' .$br;
		
		//get the rows
		$query3 = 'SELECT * FROM '. $query;
		$records = mysql_query($query3) or die('cannot select from table:'.$query);
		
		//table attributes
		$attributes = array('users_id','users_info_qualification','users_info_working','Created_at','Updated_at');
		$xml.= $tab.$tab.'<columns>'.$br;
		$x = 0;
		while($x < mysql_num_fields($records))
		{
			$meta = mysql_fetch_field($records,$x);
			$xml.= $tab.$tab.$tab.'<column ';
			foreach($attributes as $attribute)
			{
				$xml.= $attribute.'="'.$meta->$attribute.'" ';
			}
			$xml.= '/>'.$br;
			$x++;
		}
		$xml.= $tab.$tab.'</columns>'.$br;
		
		//stick the records
		$xml.= $tab.$tab.'<records>'.$br;
		while($record = mysql_fetch_assoc($records))
		{
			$xml.= $tab.$tab.$tab.'<record>'.$br;
			foreach($record as $key=>$value)
			{
				$xml.= $tab.$tab.$tab.$tab.'<'.$key.'>'.htmlspecialchars(stripslashes($value)).'</'.$key.'>'.$br;
			}
			$xml.= $tab.$tab.$tab.'</record>'.$br;
		}
		$xml.= $tab.$tab.'</records>'.$br;
		$xml.= $tab.'</table>'.$br;
	//}
	$xml.= '</database>';
	
	//save file
	$handle = fopen($name.'-backup-'.time().'.xml','w+');
	fwrite($handle,$xml);
	fclose($handle);
	@header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
	@header("Content-Length: " . strlen($xml));
	// Output to browser with appropriate mime type, you choose ;)
	@header("Content-type: text/x-xml");
	@header("Content-type: text/xml");
	@header("Content-type: application/xml");
	@header("Content-Disposition: attachment; filename=$filename");
	echo $xml;
}
}
?>