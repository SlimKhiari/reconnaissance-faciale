<?php

    class Employeur extends User {

        //ATTRIBUTES
       /* protected $specialite;
        protected $conge;*/
        //CONSTRUCTORS

        public function __construct()
        {
            parent::__construct();
            $this->setDescription('EMP');
         /*   $this->specialite = null;
            $this->conge = null;
        */


        }

        //SETTERS
    /*    public function setSpecialite($specialite) : void { $this->specialite = $specialite; }
        public function setConge($conge) : void { $this->conge = $conge; }

        //GETTERS
        public function getSpecialite() : string { return $this->specialite; }
        public function getConge() : string { return $this->conge; }
    */




    }

?>
