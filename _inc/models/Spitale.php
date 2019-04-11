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

}
?>