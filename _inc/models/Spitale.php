<?php
class Spitale extends Db{
    public function __construct(){
        parent::__construct();
    }
    public function getSpitale(){
        $query= "SELECT * FROM `spitale`";
        $rezultat = $this->getQuerry($query);
        $spitale = $this->getArray($rezultat);
        return $spitale;
    }
    public function getSpitalByName($nume){
        $query= "SELECT `spitale`.`id` FROM `spitale`
        WHERE `spitale`.`nume` ='".$nume."'";
        $rezultat = $this->getQuerry($query);
        $spital = $this->getRow($rezultat);
        return $spital["id"];
    }

}
?>