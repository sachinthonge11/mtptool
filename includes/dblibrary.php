<?php 

class DBlibrary
{
	public function fetch_array($result_set) {
		return $this->database->fetch_array($result_set);
	}
  
	public function num_rows($result_set) {
		return $this->database->num_rows($result_set);
	}
  
	public function insert_id() {
		// get the last id inserted over the current db connection
    	return $this->database->insert_id();
	}
  
	public function affected_rows() {
	    return $this->database->affected_rows();
	}	
	public function fetch_object($result_set)
	{
		return $this->database->fetch_object($result_set);
	}
	public function fetch_assoc($result_set)
	{
		return $this->database->fetch_assoc($result_set);
	}
	public function escape_string($value)
	{
		return $this->database->escape_string($value);
	}
	

}

?>