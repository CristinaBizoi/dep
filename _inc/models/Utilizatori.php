<?php
class Utilizatori extends Db{
    public function __construct(){
        parent::__construct();
    }
    public function addUtilizator($post){
        $query= "INSERT INTO `utilizatori` SET 
            `nume` ='".$post['nume_utilizator']."',
            `prenume`='".$post['prenume_utilizator']."',
            `parola` ='".md5($post['parola'])."',
            `specializare` = '".$post["specializare"]."',
            `telefon` = '".$post["telefon"]."',
            `email` = '".$post["email"]."',
            `rol` = '".$post["rol"]."',
            `id_spital` = '".$post["id_spital"]."'
            ";
        $rezultat = $this->getQuerry($query);
    }
    public function getUtilizatori(){
        $query= "SELECT `utilizatori`.`id`, `utilizatori`.`rol`,`utilizatori`.`nume`, `utilizatori`.`prenume`, `utilizatori`.`specializare`, `utilizatori`.`telefon`, `utilizatori`.`id_spital`, `spitale`.`nume`  AS `nume_spital`
          FROM `utilizatori`
          LEFT JOIN `spitale` ON `utilizatori`.`id_spital` = `spitale`.`id`
          WHERE 1";
        $rezultat = $this->getQuerry($query);
        $utilizatori = $this->getArray($rezultat);
        return $utilizatori;
    }
    public function getUtilizator($id){
        $query = "SELECT * FROM `utilizatori`
                WHERE `utilizatori`.`id`='".$id."'";
        $rezultat = $this->getQuerry($query);
        $utilizator = $this->getRow($rezultat);
        return $utilizator;
    }
    public function loginUtilizator($email){
        $query = "SELECT * FROM `utilizatori`
                WHERE `utilizatori`.`email`='".$email."'";
        // echo $query;
        // echo "</br>";
        $rezultat = $this->getQuerry($query);

        // var_dump($rezultat);
        $utilizator = $this->getRow($rezultat);
        return $utilizator;
    }
    public function editUtilizator($id, $post){
        $query = "UPDATE `utilizatori` SET 
            `nume` ='".$post['nume_utilizator']."',
            `prenume`='".$post['prenume_utilizator']."',
            `specializare` = '".$post["specializare"]."',
            `telefon` = '".$post["telefon"]."',
            `email` = '".$post["email"]."',
            `rol` = '".$post["rol"]."',
            `id_spital` = '".$post["id_spital"]."'
         WHERE `id`='".$id."'";
         $rezultat = $this->getQuerry($query);
    }
    public function editUtilizatorParola($id, $post){
        $query = "UPDATE `utilizatori` SET 
            `parola` = '".$post["parola_noua"]."'
            WHERE `id`='".$id."'";
        $rezultat = $this->getQuerry($query);
    }
    public function deleteUtilizator($id){
        $query = "DELETE FROM `utilizatori` 
        WHERE `id`='".$id."'";
        $rezultat = $this->getQuerry($query);

    }    
}
?>