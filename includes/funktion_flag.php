<?PHP

if( strpos( $_SERVER["REQUEST_URI"], "?") >0)
	$URL = $_SERVER["REQUEST_URI"]. "&SetLanguage=";
else
	$URL = $_SERVER["REQUEST_URI"]. "?SetLanguage=";

echo "\t<a href=\"". $URL. "DE\"><img src=\"". $url. $ENGEL_ROOT. "pic/flag/de.gif\" alt=\"DE\"></a>\n";
echo "\t<a href=\"". $URL. "EN\"><img src=\"". $url. $ENGEL_ROOT. "pic/flag/en.gif\" alt=\"EN\"></a>\n";

?>
