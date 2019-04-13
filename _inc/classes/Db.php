<?php



class Db{
    private $con;
    public function __construct(){
        $this->Connect();
    }
    private function Connect(){
        global $username, $password, $db, $servername;
        $this->con = new mysqli($servername, $username, $password, $db);
        if ($this->con->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        } 
        // echo "Connected successfully";
    }
    public function getQuerry($query){
        $result = $this->con->query($query);
        if(!$result){
            var_dump($this->con->error);exit();
        }
        return $result;
    }
    public function getArray($rezultat){
        $re = array();
        if (mysqli_num_rows($rezultat) > 0){
            while($row = mysqli_fetch_assoc($rezultat)) {
                $re[]=$row;
            
            }
        }else{
            // echo "0 rezultate";
        }
        return $re;
        
    }
    public function getRow($result){
        $re = array();
        if (mysqli_num_rows($result) > 0) {
           // output data of each row
           while($row = mysqli_fetch_assoc($result)) {
               $re=$row;
              break; 
           }
       } else {
           // echo "0 results";
       }
       return $re;
    }
    public function getClean($entry){
        // echo "ceva";
        $result = $this->con->real_escape_string($entry);
        return $result;
    }
    public function closeDb(){
        $this->con->close();
    }
    //returnam ultimul id inserat
    protected function getLastId(){
        return $this->con->insert_id;
    }
}



?>