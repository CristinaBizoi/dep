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
    public function getDiagnosticeByFisa($id){
         //verific daca a fost trimis un id valid (daca nu e gol si daca e int) 
         if(empty((int)$id) ){
            return array();
        }
        $query= "SELECT * FROM `diagnostice` WHERE `id_fisa`='".$id."'";
        $rezultat = $this->getQuerry($query);
        return  $this->getArray($rezultat); 
    }
}

?>