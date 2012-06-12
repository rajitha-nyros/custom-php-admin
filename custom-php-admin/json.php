<?
include("includes/config_db.php");
if (!function_exists('json_encode'))
{
  function json_encode($a=false)
  {
    if (is_null($a)) return 'null';
    if ($a === false) return 'false';
    if ($a === true) return 'true';
    if (is_scalar($a))
    {
      if (is_float($a))
      {
        // Always use "." for floats.
        return floatval(str_replace(",", ".", strval($a)));
      }

      if (is_string($a))
      {
        static $jsonReplaces = array(array("\\", "/", "\n", "\t", "\r", "\b", "\f", '"'), array('\\\\', '\\/', '\\n', '\\t', '\\r', '\\b', '\\f', '\"'));
        return '"' . str_replace($jsonReplaces[0], $jsonReplaces[1], $a) . '"';
      }
      else
        return $a;
    }
    $isList = true;
    for ($i = 0, reset($a); $i < count($a); $i++, next($a))
    {
      if (key($a) !== $i)
      {
        $isList = false;
        break;
      }
    }
    $result = array();
    if ($isList)
    {
      foreach ($a as $v) $result[] = json_encode($v);
      return '[' . join(',', $result) . ']';
    }
    else
    {
      foreach ($a as $k => $v) $result[] = json_encode($k).':'.json_encode($v);
      return '{' . join(',', $result) . '}';
    }
  }
}
$quer = "".$_REQUEST['tb_name']."";
exportMysqlTojson($quer);
function exportMysqlTojson($quer,$filename = 'export.json')
{
$query = mysql_query("SELECT * FROM " . $quer);
$rows = array();
while($row = mysql_fetch_assoc($query)) {
    $rows[] = $row;
}
	@header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
	@header("Content-Length: " . strlen($rows));
	// Output to browser with appropriate mime type, you choose ;)
	@header("Content-type: text/x-json");
	@header("Content-type: text/json");
	@header("Content-type: application/json");
	@header("Content-Disposition: attachment; filename=$filename");
	echo json_encode($rows);
}
?>