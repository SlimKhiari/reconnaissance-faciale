<?php

    class Visiteur extends Model {

        //ATTRIBUTES

        protected $ID;
        protected $nom;
        protected $prenom;
        protected $dateN;
        protected $telephone;
        protected $email;
        protected $Motif;
        protected $piece_identite;
        protected $acceptation;

        /////////////////////////////////////////////////////////////////////////////////////
        //CONSTRUCTORS

        public function __construct()
        {
            $this->ID = null;
            $this->nom = null;
            $this->prenom = null;
            $this->dateN = null;
            $this->telephone = null;
            $this->email = null;
            $this->Motif = null;
            $this->piece_identite = null;
            $this->acceptation = null;
        }

        /////////////////////////////////////////////////////////////////////////////////////
        //SETTERS

        public function setID($ID) : void { $this->ID = $ID; }
        public function setNom($nom) : void { $this->nom = $nom; }
        public function setPrenom($prenom) : void { $this->prenom = $prenom; }
        public function setDateN($dateN) : void { $this->dateN = $dateN; }
        public function setTelephone($telephone) : void { $this->telephone = $telephone; }
        public function setEmail($email) : void { $this->email = $email; }
        public function setMotif($Motif) : void { $this->Motif = $Motif; }
        public function setPiece_identite($piece_identite) : void { $this->piece_identite = $piece_identite; }
        public function setAcceptation($acceptation) : void { $this->acceptation = $acceptation; }

        /////////////////////////////////////////////////////////////////////////////////////
        //GETTERS

        public function getID() : string { return $this->ID; }
        public function getNom() : string { return $this->nom; }
        public function getPrenom() : string { return $this->prenom; }
        public function getDateN() : string { return $this->dateN; }
        public function getTelephone() : string { return $this->telephone; }
        public function getEmail() : string { return $this->email; }
        public function getMotif() : string { return $this->Motif; }
        public function getPiece_identite() : string { return $this->piece_identite; }
        public function getAcceptation() : string { return $this->acceptation; }

        /////////////////////////////////////////////////////////////////////////////////////
        //METHODS

        //Get Visiteur By id
        public static function findBy($value, $column = 'ID_v', $table_name = 'visiteur') {
            $data = parent::findBy($value, $column, $table_name);

              if($data != null){
                if($table_name=="visiteur") {

                  $vis = new visiteur();
                  $vis->setID($data['ID_v']);
                  $vis->setNom($data['Nom']);
                  $vis->setPrenom($data['Prenom']);
                  $vis->setDateN($data['Date_de_naissance']);
                  $vis->setTelephone($data['Telephone']);
                  $vis->setEmail($data['Email']);
                  $vis->setMotif($data['Motif']);
                  $vis->setPiece_identite($data['Piece_identite']);
                  $vis->setAcceptation($data['acceptation']);
                    return $vis;
              }
              }
              return null;
          }

        //Get all viss
        public static function findAll($table_name = 'visiteur') {
            $data = parent::findAll($table_name);

            if($data != null) {

                $viss = array(count($data));

                for($i = 0; $i < count($data); $i++) {

                    $info = $data[$i];
                    $vis = new visiteur();
                    $vis->setID($info['ID_v']);
                    $vis->setNom($info['Nom']);
                    $vis->setPrenom($info['Prenom']);
                    $vis->setDateN($info['Date_de_naissance']);
                    $vis->setTelephone($info['Telephone']);
                    $vis->setEmail($info['Email']);
                    $vis->setMotif($info['Motif']);
                    $vis->setPiece_identite($info['Piece_identite']);
                    $vis->setAcceptation($info['acceptation']);

                    $viss[$i] = $vis;
                }

                return $viss;

            } else {
                return null;
            }
        }

        
        public static function getAllVisiteur() {

            $allvisiteur = visiteur::findAll();
            $afficher_Vis= array();
  
            if($allvisiteur == null) return $afficher_Vis;
  
            foreach($allvisiteur as $visiteur) {
                if($visiteur->getAcceptation()=="en attente"){
                    array_push($afficher_Vis, $visiteur);
                }
            }
  
            return $afficher_Vis;
  
        }
        public static function getVisiteur_rejeter() {

            $allvisiteur = visiteur::findAll();
            $afficher_Vis= array();
  
            if($allvisiteur == null) return $afficher_Vis;
  
            foreach($allvisiteur as $visiteur) {
                if($visiteur->getAcceptation()=="rejeter"){
                    array_push($afficher_Vis, $visiteur);
                }
            }
  
            return $afficher_Vis;
  
        }
        public static function getVisiteur_accepter() {

            $allvisiteur = visiteur::findAll();
            $afficher_Vis= array();
  
            if($allvisiteur == null) return $afficher_Vis;
  
            foreach($allvisiteur as $visiteur) {
                if($visiteur->getAcceptation()=="accepter"){
                    array_push($afficher_Vis, $visiteur);
                }
            }
  
            return $afficher_Vis;
  
        }
        public static function UpdVisiteur($visiteur) : bool {
            $query = "update visiteur set acceptation = ? where ID_v = ?";
            $params = [
                $visiteur->getAcceptation(),
                $visiteur->getID()
            ];
            $UpdtoVisi = Model::submitData($query, $params);
            return $UpdtoVisi;
 
          }
       

               
    

     



        //Add new vis
        public static function addVisiteur($vis) : bool {
            $query = 'insert into visiteur (Nom,Prenom,Telephone,Email,Piece_identite,Motif,Date_de_naissance,acceptation) values (?, ?, ?, ?, ?, ?, ?, ?)';
            $params = [
                $vis->getNom(),
                $vis->getPrenom(),
                $vis->getTelephone(),
                $vis->getEmail(),
                $vis->getPiece_identite(),
                $vis->getMotif(),
                $vis->getDateN(),
                $vis->getAcceptation()
            ];
            $addTovis = Model::submitData($query, $params);
            if($addTovis){
                return true;
            }else{
                return false;
            }
           // return $addTovis && $addToObject;

        }

   
  


}
 ?>
