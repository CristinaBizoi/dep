<?php 

class Diagnostic extends Db{
    public function __construct(){
        parent::__construct();
    }
    public function addDiagnostic($post){
        $query= "INSERT INTO `diagnostice` SET 
            `cod` ='".$this->getClean($post['cod'])."',
            `denumire` ='".$this->getClean($post['denumire'])."',
            `id_fisa` ='".$this->getClean($post['id_fisa'])."'";

            echo $query ."</br>";
        $rezultat = $this->getQuerry($query);
    }
    public function removeDiagnostic(){

    }
    public function getDiagnostice(){
        
    }
}

?>