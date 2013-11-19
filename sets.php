<?php
// class the implements sets as a key value pair using numeric arrays
class Set
{
	// private assets first
	private $list;
	private $added;
	private $deleted;
	private $changed;
	
	// construtor has no arguements and sets the $list variable as an array
	public function _construct()
	{
		$this->list = array();
		$this->deleted = false;
		$this->added = false;
		$this->changed = false;
	}
	
	// method that adds a set to the set list
	public function Add( $key, $value )
	{
		if( $this->HasKey( $key ) ) // key exits no duplicates
		{
			$this->added = false; // set added flag to false, set not added
		}
		else // key doesn't exits add set
		{
			$this->list[] = array( $key, $value ); // add set
			$this->added = true; // set added flag to true, set added
		}
	}
	
	public function Delete( $key )
	{
		$setCount = count( $this->list ); // set count
		$i = 0; // loop iterator
		
		if( $setCount > 0 ) // check if we have at least 1 set
		{
			// we have at least one set so perform delete if possible
			for( $i = 0; $i < $setCount; $i++ ) // search sets for key to remove
			{
				if( $this->list[$i][0] == $key ) // if key to set is found..
				{
					unset( $this->list[$i] ); // remove set
					array_values( $this->list ); //order array so number count is correct for indexing loops
					$this->deleted = true; // set delete flag to true, set deleted
					break; // get out of the for loop because the value was done so theres no need to continue searching
				}
				else
				{
					$this->deleted = false; // set delete flag to false, set either didn't exist or was not deleted
				}
			}
		}
		else // no elements either all deleted or none added
		{
			$this->deleted = false; // set delete flag to false, added check to make sure flag is set to default
		}
	}
	
	// method that returns if a set has been added
	public function Added()
	{
		return $this->added;
	}
	
	// method that checks if set was deleted
	public function Deleted()
	{
		return $this->deleted;
	}
	
	// method that empties an array
	public function Clear()
	{
		unset( $this->list ); // clear list
		$this->list = array(); // reset list of sets as an array
	}
	
	// method that checks if sets are empty
	public function IsEmpty()
	{
		return ( ( $this->Total() > 0 ) ? false : true );
	}
	
	// method that returns all the keys to every Set as a string
	public function Keys()
	{
		$setCount = count( $this->list ); // number of sets
		$i = 0; // loop iterator
		$tmp = ""; // tmp variable that holds the keys
		
		for( $i = 0; $i < $setCount; $i++) // loop through sets
		{
			$tmp .= $this->list[$i][0] . ", "; // add sets to tmp variable
		}
	
		return $tmp;
	}
	
	// method that checks if a key to a set exits in the set list
	public function HasKey( $key )
	{
		$keyCount = count( $this->list );
		$i = 0;
		$rtn = false;
		
		if( $keyCount > 0 )
		{
			// key count is greater than 0 so we have at least one key, check if it matches the lookup key
			for( $i = 0; $i < $keyCount; $i++ ) // loop through sets
			{
				if($this->list[$i][0] == $key) // key exits
				{
					$rtn = true; // set return variable to true
					break; // stop loop
				}
				else
				{
					$rtn = false; // key not found
				}
			}
		}
		else // no sets
		{
			$rtn = false; // set return variable to false, no sets
		}
		
		return $rtn;
	}
	
	// method that returns all sets as an array
	public function Sets()
	{
		return $this->list;
	}
	
	// returns the number of sets
	public function Total()
	{
		return count( $this->list );
	}
	
	// method that turns the sets into a json string
	public function ToJson()
	{
		$setCount = count( $this->list ); // number of sets
		$i = 0; // loop iterating variable
		$json = "{ "; // creates json string with opener
		
		if( $setCount > 0 ) // checks if we have at least 1 set
		{
			for( $i = 0; $i < $setCount; $i++ ) // loop through the sets and create json elements
			{
				if( $i != $setCount - 1) // sets all of the json elements to have an ending , as long as its not the last element
				{
					$json .= "\"" . $this->list[$i][0] . "\"" . " : " . "\"" . $this->list[$i][1] . "\", ";
				}
				else // last element of the json string, does not add the , for format correctness
				{
					$json .= "\"" . $this->list[$i][0] . "\"" . " : " . "\"" . $this->list[$i][1] . "\"";
				}
			
			}
		}
		
		$json .= " }"; // adds the closer to the json string
		
		return $json; // returns either a full json string or an empty json string with no elements
	}
	
	// changes the value of a set to a new one
	public function Change( $key, $value )
	{
		$setCount = count( $this->list ); // number of sets
		$i = 0; // loop Iterator
		
		if($setCount > 0) // has at least 1 set
		{
			for( $i = 0; $i < $setCount; $i++ )
			{
				if($this->list[$i][0] == $key) // key exists change it's value
				{
					$this->list[$i][1] = $value; // change value of set
					$this->changed = true; // set changed flag to true, value changed on set
					break; // exit loop
				}
				else // key does not exist
				{
					$this->changed = false; // set not changed changed flag set to false
				}
			}
		}
		else // no sets
		{
			$this->changed = false; // no sets set changed flag to false
		}
	}
	
	// shows if set was changed of not;
	public function Changed()
	{
		return $this->changed;
	}
	
}
	 
?>
