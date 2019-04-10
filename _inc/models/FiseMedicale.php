<?php 

class FiseMedicale extends Db{
    public function __construct(){
        parent::__construct();
    }
    public function addFisa($post){
        $query= "INSERT INTO `fise_medicale` SET 
        `observatii` ='".$this->getClean($post['observatii'])."',
        `tip_fisa` ='".$this->getClean($post['tip_fisa'])."',
        `id_pacient` ='".$this->getClean($post['id_pacient'])."',
        `id_spital` ='".$this->getClean($post['id_spital'])."',
        `id_utilizator` = '".$this->getClean($post["id_utilizator"])."'";

        $rezultat = $this->getQuerry($query);
        return $this->getLastId();
    }
    public function editFisa($id,$data){

    }
    public function getPacientFise($id){
        $query= "SELECT * FROM `fise_medicale` WHERE `id_pacient`='".$id."'";
        $rezultat = $this->getQuerry($query);
        return  $this->getArray($rezultat);       
    }
}
?>