<?PHP 
include ("header_start.php");

?>
<!DOCTYPE html>
<HTML>
<HEAD>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?PHP
echo "\t<TITLE>--- $title ---</TITLE>\n";
?>
	<meta name="description" content="The Angel System will be used to centrally coordinate shifts and Chaos Angels.">
	<meta name="keywords" content="Angel System, Engel, Himmelsverwaltung">
	<meta name="robots" content="index, nofollow">
	
<!--
	<script type="text/javascript" src="<?PHP echo $url. $ENGEL_ROOT; ?>/css/tablecloth.js"></script>
	<link rel="stylesheet" type="text/css" href="<?PHP echo $url. $ENGEL_ROOT; ?>/css/tablecloth.css" media="screen" />
-->

	<script type="text/javascript" src="<?PHP echo $url. $ENGEL_ROOT; ?>/css/grossbild.js"></script>
	<link rel=stylesheet type="text/css" href="<?PHP echo $url. $ENGEL_ROOT; ?>css/layout.css" media="screen">
<?PHP
if (!IsSet($_SESSION['color'])) 
	$_SESSION['color'] =  "6"; 
echo "<link rel=stylesheet type=\"text/css\" href=\"". $url. $ENGEL_ROOT. "css/style". $_SESSION['color']. ".css\">";

if (isset($reload)) 
{
	if ($reload=="") 
	{
		$reload=3330;
	}	
	echo "\t<meta http-equiv=\"refresh\" content=\"".$reload.
	"; URL=./?reload=".$reload."\">\n";
}

if (isset($Page["AutoReload"])) 
{
	echo "\t<meta http-equiv=\"refresh\" content=\"". $Page["AutoReload"].
		"; URL=". $url. $ENGEL_ROOT. $Page["Name"]."\">\n";
}

echo "</HEAD>\n\n";

/////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////// B O D Y
/////////////////////////////////////////////////////////////////////////////////////////////
echo "<BODY>\n";

echo "<div id=\"header\">\n";
echo 	"\t<div id=\"logo\">\n".
	"\t\t<a id=\"top\" name=\"top\">Himmelsverwaltung</a>\n".
	"\t</div>\n";

echo "\t<div id=\"message\">\n";
//ausgabe new message
if( isset($_SESSION['CVS']["nonpublic/messages.php"]) && ( $_SESSION['CVS']["nonpublic/messages.php"] == "Y") )
{
	$SQL = "SELECT `Datum` FROM `Messages` WHERE `RUID`=". $_SESSION["UID"]. " AND `isRead`='N'";
	$erg = mysql_query($SQL, $con);
	if( mysql_num_rows( $erg ) > 0 )
	{
		echo 	"\t\t<a href=\"". $url. $ENGEL_ROOT. "nonpublic/messages.php\">". Get_Text("pub_messages_new1").
			" ".  mysql_num_rows( $erg ). " ". Get_Text("pub_messages_new2"). "</a>\n";
	}
}
echo "\t</div>\n";

echo "</div>\n\n";

//ausgaeb Menu
if( isset($_SESSION['Menu']) && $_SESSION['Menu'] == "R")
{
	$ClassMenu = "menu-right";
	$ClassMain = "main-left";
}
else
{
	$ClassMenu = "menu-left";
	$ClassMain = "main-right";
}

echo "<div id=\"navi\" class=\"$ClassMenu\">\n";
include("menu.php");
echo "</div>\n";

// ---------------------------------
// - DIV MAIN START
// ---------------------------------
echo "<div id=\"main\" class=\"$ClassMain\">\n";

// main Table
echo	"<div id=\"contenttopic\">\n";
if( strlen( $header) == 0 )
	echo "\t<b>". Get_Text($Page["Name"]). "</b>\n";
else
	echo "\t<b>$header</b>\n";
echo "</div>\n";


if (IsSet($_SESSION['UID'])) {
	if( isset($_SESSION['oldurl']))
		$BACKUP_SESSION_OLDURL = $_SESSION['oldurl'];
	if( isset($_SESSION['newurl']))
		$_SESSION['oldurl'] = $_SESSION['newurl'];
	$_SESSION['newurl'] = $_SERVER["REQUEST_URI"];
} 


function SetHeaderGo2Back ()
{
	global $BACKUP_SESSION_OLDURL;
	$_SESSION['oldurl'] = $BACKUP_SESSION_OLDURL;
}

echo "<div id=\"content\">\n";

if ( $Page["CVS"] != "Y" ) 
{
        echo "Du besitzt kein Rechte für diesen Bereich.<br>\n";
	echo "<a href=\"". $url. $ENGEL_ROOT. "\">".Get_Text("back")."</a> geht's zur&uuml;ck...\n";
	
	include("footer.php");
        exit ();
}

?>

