<?php 

class Tratament extends Db{
    public function __construct(){
        parent::__construct();
    }
    public function addTratament($post){
        $query= "INSERT INTO `tratamente` SET 
        `cod` ='".$this->getClean($post['cod'])."',
        `denumire` ='".$this->getClean($post['denumire'])."',
        `id_fisa` ='".$this->getClean($post['id_fisa'])."'";

            echo $query ."</br>";
        $rezultat = $this->getQuerry($query);
    }
    public function removeTratament(){

    }
    public function getTratamenteByFisa($id){
        //verific daca a fost trimis un id valid (daca nu e gol si daca e int) 
        if(empty((int)$id) ){
           return array();
       }
       $query= "SELECT * FROM `tratamente` WHERE `id_fisa`='".$id."'";
       $rezultat = $this->getQuerry($query);
       return  $this->getArray($rezultat); 
   }
}

?>