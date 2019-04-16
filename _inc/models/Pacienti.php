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
            `pin` = '".md5($post["pin"])."',
            `telefon` = '".$post["telefon"]."',
            `email` = '".$post["email"]."',
            `data_nastere` = '".$post["data_nastere"]."',
            `sex` = '".$post["sex"]."'
              ";
        $rezultat = $this->getQuerry($query);
    }
    public function getPacienti($where){
        $query= "SELECT * FROM `pacienti`
            WHERE ".$where;
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
    public function loginPacient($cnp){
        $query = "SELECT * FROM `pacienti`
                WHERE `pacienti`.`cnp`='".$cnp."'";
        // echo $query;
        // echo "</br>";
        $rezultat = $this->getQuerry($query);

        // var_dump($rezultat);
        $pacient = $this->getRow($rezultat);
        return $pacient;
    }
    public function editPacient($id, $post){
        $query = "UPDATE `pacienti` SET 
        `nume` ='".$post['nume_pacient']."',
            `prenume`='".$post['prenume_pacient']."',
            `cnp` = '".$post["cnp"]."',
            `pin` = '".md5($post["pin"])."',
            `telefon` = '".$post["telefon"]."',
            `email` = '".$post["email"]."',
            `data_nastere` = '".$post["data_nastere"]."',
            `sex` = '".$post["sex"]."'
         WHERE `id`='".$id."'";
         $rezultat = $this->getQuerry($query);
    }
    public function editPacientPin($id, $post){
        $query = "UPDATE `pacienti` SET 
            `pin` = '".md5($post["pin"])."'
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