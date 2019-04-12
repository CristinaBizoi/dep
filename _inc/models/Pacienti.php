<?php
class Pacienti extends Db{
    public function __construct(){
        parent::__construct();
    }
    public function addPacient($post){
        $query= "INSERT INTO `pacienti` SET 
            `nume` ='".$post['nume_pacient']."',
            `prenume`='".$post['prenume_pacient']."',
            `cnp` = '".$post["cnp"]."',
            `telefon` = '".$post["telefon"]."',
            `email` = '".$post["email"]."',
            `data_nastere` = '".$post["data_nastere"]."',
            `sex` = '".$post["sex"]."'
              ";
        $rezultat = $this->getQuerry($query);
    }
    public function getPacienti($where){
        $query= "SELECT * FROM `pacienti`
            WHERE ".$where."'";
        $rezultat = $this->getQuerry($query);
        $pacienti = $this->getArray($rezultat);
        return $pacienti;
    }
    public function getPacient($id){
        $query = "SELECT * FROM `pacienti`
                WHERE `pacienti`.`id`='".$id."'";
        $rezultat = $this->getQuerry($query);
        $pacient = $this->getRow($rezultat);
        return $pacient;
    }
    public function editPacient($id, $post){
        $query = "UPDATE `pacienti` SET 
        `nume` ='".$post['nume_pacient']."',
            `prenume`='".$post['prenume_pacient']."',
            `cnp` = '".$post["cnp"]."',
            `telefon` = '".$post["telefon"]."',
            `email` = '".$post["email"]."',
            `data_nastere` = '".$post["data_nastere"]."',
            `sex` = '".$post["sex"]."'
         WHERE `id`='".$id."'";
         $rezultat = $this->getQuerry($query);
    }
    public function deletePacient($id){
        $query = "DELETE FROM `pacienti` 
        WHERE `id`='".$id."'";
        $rezultat = $this->getQuerry($query);

    }
    
    
}
?>