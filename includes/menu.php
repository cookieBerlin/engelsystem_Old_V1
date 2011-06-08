<?PHP
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
		echo "<div id=\"submenu". $index_nummer. "\" class=\"menu\">\n";
		include ("./".$filepost.".".$index_nummer.$filepre);
		echo "</div>\n";
	}
}

include("funktion_activeUser.php");

?>
