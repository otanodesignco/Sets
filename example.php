<?php

include("set.php");

$set = new Set();

if( $set->IsEmpty() )
{
	$set->Add( "First Name", "Itachi" );
	$set->Add( "Last Name", "Uchiha" );
	$set->Add( "Village", "Leaf" );
	$set->Add( "Rank", "Anbu" );
	
	echo "Show sets as an array <br />";
	
	print_r( $set->Sets() );
	
	echo "<br />" . $set->ToJson();

	echo "<br /> Number of Sets " . $set->Total();
	
	echo "<br /> erase the rank set";
	
	$set->Delete( "Rank" );
	
	echo "<br /> Re-do print sets and json";
	
	echo "<br />";
	
	print_r( $set->Sets() );
	
	echo "<br />" . $set->ToJson();
	
	echo "<br /> now we're done so lets clear the sets";
	
	$set->Clear();
	
	if($set->IsEmpty())
	{
		echo "<br /> set list empty";
	}
	else
	{
		echo "<br /> set list not empty";
	}
	
	echo "<br /> add new sets and show array and json for them";
	
	$set->Add( "First Name", "Madara" );
	$set->Add( "Last Name", "Uchiha" );
	$set->Add( "Village", "Leaf" );
	$set->Add( "Rank", "Jounin" );
	
	echo "<br />";
	
	print_r( $set->Sets() );
	
	echo "<br />" . $set->ToJson();
	
	echo "<br /> lets get all the keys, Keys : " . $set->Keys();
	
	echo "<br /> now lets change the values of all the sets and show the array and json for the changes";
	$set->Change( "First Name", "Hashirama" );
	$set->Change( "Last Name","Senju" );
	$set->Change( "Rank", "Hokage" );
	
	echo "<br />";
	
	print_r( $set->Sets() );
	
	echo "<br />" . $set->ToJson();
		
}

?>
