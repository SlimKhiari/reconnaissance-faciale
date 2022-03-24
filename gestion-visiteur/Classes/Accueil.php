<?php

    class Accueil extends User {

        //ATTRIBUTES
       // protected $conge;
        //CONSTRUCTORS

        public function __construct()
        {
            parent::__construct();
            $this->setDescription('ACC');
          //  $this->conge = null;


        }

        //SETTERS
     //   public function setConge($conge) : void { $this->conge = $conge; }

        //GETTERS
     //   public function getConge() : string { return $this->conge; }





    }

?>
