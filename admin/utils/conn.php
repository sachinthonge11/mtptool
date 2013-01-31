<?php
class connection{
    var $host_name;
    var $user_name;
    var $pass;
    var $db_name;
    var $link;
    
    public function connect($set_hostname, $set_username, $password, $db_name)
    {
        $this->host_name = $set_hostname;
        $this->user_name = $set_username;
        $this->pass = $password;
        $this->db_name = $db_name;
        
        $this->link = mysql_connect($this->host_name, $this->user_name, $this->pass);
        if(!($this->link))
        {
            echo "Not Connected To Database";
        }
        else{
            //echo "Connected Successfully!!!!!";
        }
        
        if(!(mysql_select_db($this->db_name, $this->link)))
        {
            echo "Database Not Selected";
        }
        else{
            //echo "Database Selected Successfully";
        }
        
    }
    
    public function query($sql)
    {
        return mysql_query($sql);
    }
    
    public function num_rows($result)
    {
        return mysql_num_rows($result);
    }
    
    public function fetch($result)
    {
        return mysql_fetch_array($result);
    }
    
    
}

$object = new connection();
$object->connect('localhost', 'root','','manage_website');


?>