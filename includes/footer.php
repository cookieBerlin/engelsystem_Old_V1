</div> <!-- END id="content" -->

<div id="shortnavi">
<?PHP 
If (IsSet($_SESSION['oldurl']))
	echo "\t\t<a href=\"". $_SESSION["oldurl"]. "\">".Get_Text("back")."</a>&nbsp;";
?>
		<a href="#top"><?PHP echo Get_Text("top"); ?></a>
</div>

</div> <!-- END id="main" -->

<div id="footer">
	&#169; copyleft - <a href="mailto:erzengel@lists.ccc.de">Kontakt</a><br>
	<?PHP include( "funktion_flag.php"); ?>
</div>

</BODY>
</HTML>
<?php
include( "funktion_counter.php");
mysql_close($con); 
?>
