<?PHP


function ShowMenu( $MenuName)
{
	global $MenueTableStart, $MenueTableEnd, $_SESSION, $DEBUG, $url, $ENGEL_ROOT;
	$Gefunden=FALSE;

	//Überschift
	$Text = "<h4 class=\"menu\">". Get_Text("$MenuName/"). "</h4>\n";
	$Text .= "\t<ul>\n";
	
	//einträge
	foreach( $_SESSION['CVS'] as $Key => $Entry )
		if( strpos( $Key, ".php") > 0)
			if( (strpos( "00$Key", "0$MenuName") > 0) ||
			    ((strlen($MenuName)==0) && (strpos( "0$Key", "/") == 0) ) )
			{
				$TempName = Get_Text($Key, TRUE);
				if(( TRUE||$DEBUG) && (strlen($TempName)==0) )
					$TempName = "not found: \"$Key\"";
				
				if( $Entry == "Y")
				{
					//zum absichtlkichen ausblenden von einträgen
					if( strlen($TempName)>1)
					{
						//sonderfälle:
						if( $Key=="admin/faq.php")
							$TempName .= " (". noAnswer(). ")";
						//ausgabe
						$Text .= "\t\t\t<li><a href=\"". $url. $ENGEL_ROOT. $Key. "\">$TempName</a></li>\n";
						$Gefunden = TRUE;
					}
				}
				elseif( $DEBUG ) 
				{
					$Gefunden = TRUE;
					$Text .= "\t\t\t<li>$TempName ($Key)</li>\n";
				}
			}
	$Text .= "\t</ul>\n";

	if( $Gefunden)
	{
		echo "<div id=\"submenu_". $MenuName. "\" class=\"menu\">\n";
		echo $MenueTableStart.$Text.$MenueTableEnd;
		echo "</div>\n";
	}
}//function ShowMenue

?>
