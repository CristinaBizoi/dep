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
    public function getPacientFise($id){
        $query= "SELECT fm.`id`,fm.`data_adaugare`, fm.`observatii`, fm.`tip_fisa`, fm.`id_spital`, s.`nume`  AS `nume_spital`
         FROM `fise_medicale` as fm
        LEFT JOIN `spitale` as s ON (`fm`.`id_spital` = s.`id`)
        WHERE `id_pacient`='".$id."' ORDER BY `data_adaugare` DESC";
        $rezultat = $this->getQuerry($query);
        return  $this->getArray($rezultat);       
    }
    public function getFisa($id){
        //verific daca a fost trimis un id valid (daca nu e gol si daca e int) 
        if(empty((int)$id) ){
            return array();
        }
        $query = " SELECT fm.`data_adaugare`, fm.`observatii`, fm.`tip_fisa`, fm.`id_spital`, s.`nume`  AS `nume_spital`,
            p.`nume` as nume_pacient, p.`prenume` as prenume_pacient, p.`cnp`, p.`data_nastere`, p.`sex`, p.`telefon`, p.`email`,
            u.`id` as id_user, u.`nume` as nume_utilizator, u.`prenume` as prenume_utilizator
        FROM `fise_medicale` as fm
        LEFT JOIN `pacienti` as p ON (fm.`id_pacient` = p.`id`)
        LEFT JOIN `utilizatori` as u ON (fm.`id_utilizator` = u.`id`)
        LEFT JOIN `spitale` as s ON `fm`.`id_spital` = s.`id`
        WHERE fm.`id` = '".$id."'
        ";

        // echo  $query;
          $rezultat = $this->getQuerry($query);

          //pentru ca returnam doar un rand (fiind o relatie de one to one intre toate tabelele)
          return  $this->getRow($rezultat);  
    }
}
?>