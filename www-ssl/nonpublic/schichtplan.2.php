<?php

include ("../../includes/funktion_schichtplan_aray.php");


if( isset ($Room))
{
	echo "<h4>&nbsp;Raum&uuml;bersicht</h4>\n";
	echo "\t<ul>\n";

	$ToDate = (isset($ausdatum)==TRUE)
			? "ausdatum=$ausdatum&amp;"
			: "";

	foreach( $Room as $RoomEntry  )
	{
		echo "\t\t<li><a href='./schichtplan.php?". $ToDate. "raum=". $RoomEntry["RID"]. "'>".
			$RoomEntry["Name"]. "</a></li>\n";
	}
	echo "\t</ul>\n";

	echo "\t<ul>\n";
	echo "\t\t<li><a href='./schichtplan.php?". $ToDate. "raum=-1'>alle</a></li>\n";
	echo "\t</ul>\n";
}
?>
