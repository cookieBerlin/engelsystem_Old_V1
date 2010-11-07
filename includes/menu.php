
<!-- anfang des menue parts //-->

<div id="menu">
<?PHP
$MenueTableStart = "<div id=\"submenu\" class=\"menu\">\n";
/* old:
	"\n<table align=\"center\" class=\"border\" cellpadding=\"3\" cellspacing=\"1\">\n".
	"\t<tr>\n".
	"\t\t<td width=\"160\" class=\"menu\">\n";
*/ 
$MenueTableEnd = "</div>\n";
/* old:
	"\n".
	"\t\t\t\t<br>\n".
	"\t\t</td>\n".
	"\t</tr>\n".
	"</table><br>\n";
*/

ShowMenu("");
ShowMenu("nonpublic");
ShowMenu("admin");

if( !isset($submenus))
	$submenus = 0;

if ($submenus >= 1 ) 
{
	$inc_name=$_SERVER['PHP_SELF'];
	$filenamepos=strrpos($inc_name, '/');
	$filenamepos+=1;
	$filename = substr ($inc_name, $filenamepos );
	$filepost = substr ($filename, 0, -4);
	$filepre = substr ($filename, -4 );
	$verzeichnis = substr ($inc_name, 0 , $filenamepos);
  
	for ($index_nummer=1; $index_nummer <= $submenus; $index_nummer++) 
	{
		echo "<div id=\"submenu\" class=\"menu\">\n";
		include ("./".$filepost.".".$index_nummer.$filepre);
		echo "</div>\n";
	}
}

echo "<div id=\"submenu\" class=\"menu\">\n";
include("funktion_activeUser.php");
echo "</div>\n";

?>
<table align="center" class="border" cellpadding="3" cellspacing="1">
	<tr>
		<td width="160" class="menu">
		<?php include("funktion_activeUser.php"); ?>
		</td>
	</tr>
</table>


</div>
<!-- ende des menue parts //-->
