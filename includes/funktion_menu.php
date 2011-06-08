<?PHP


function ShowMenu( $MenuName)
{
	global $_SESSION, $DEBUG, $url, $ENGEL_ROOT, $Page;
	$Gefunden=FALSE;

	//Überschift
	$Text = "<div class=\"menutopic\">". Get_Text("$MenuName/"). "</div>\n";
	$Text .= "\t<ul>\n";
	
	//einträge
	foreach( $_SESSION['CVS'] as $Key => $Entry )
	{
		if( strpos( $Key, ".php") > 0)
		{
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
						$active = ($Page["Name"] == $Key) ? " class=\"active\" ": "";
						//sonderfälle:
						if( $Key=="admin/faq.php")
							$TempName .= " (". noAnswer(). ")";
						//ausgabe
						$Text .= "\t\t\t<li$active><a href=\"". $url. $ENGEL_ROOT. $Key. "\">$TempName</a></li>\n";
						$Gefunden = TRUE;
					}
				}
				elseif( $DEBUG ) 
				{
					$Gefunden = TRUE;
					$Text .= "\t\t\t<li>$TempName ($Key)</li>\n";
				}
			}
		}
	}
	$Text .= "\t</ul>\n";

	if( $Gefunden)
	{
		echo "<div id=\"submenu". $MenuName. "\" class=\"menu\">\n". $Text. "</div>\n";
	}
}//function ShowMenue

?>
