<?PHP

?>



<!-- anfang des footers //-->




		<br>
			<p align="center">
				<?PHP If (IsSet($_SESSION['oldurl']))
					echo "<a href=\"". $_SESSION["oldurl"]. "\">".Get_Text("back")."</a>&nbsp;";
				?>
				<a href="#top"><?PHP echo Get_Text("top"); ?></a>
			</p>
		</td>
	</tr>
</table>


	<div id=footer>
		<h5 align="center"> &#169; copyleft - <a href="mailto:erzengel@lists.ccc.de">Kontakt</a>
		<?PHP 
			include( "funktion_counter.php"); 
			include( "funktion_flag.php"); 
		?></h5>
	</div>

</div>

<?php mysql_close($con); ?>

</BODY>
</HTML>
