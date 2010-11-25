<?PHP
include ("../../includes/funktion_schichtplan_aray.php");

if( isset ($VeranstaltungsTage))
{
	echo "<h4>&nbsp;Tage</h4>\n";

	echo "\t<ul>\n";
	foreach( $VeranstaltungsTage as $k => $Datum)
	{
		echo "\t\t<li><a href='./schichtplan.php?ausdatum=$Datum";
		// ist ein raum gesetzt?
		if (IsSet($raum)) 
			echo "&amp;raum=$raum";
		echo "'>$Datum</a></li>\n";
	}
	echo "\t</ul>\n";
}

?>
