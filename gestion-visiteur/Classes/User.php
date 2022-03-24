<?php

    class User extends Model {

        //ATTRIBUTES

        protected $ID;
        protected $nom;
        protected $prenom;
        protected $dateN;
        protected $telephone;
        protected $email;
        protected $password;
        protected $description;
        protected $Sex;
        protected $piece_identite;
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
            $this->password = null;
            $this->description=null;
            $this->Sex = null;
            $this->piece_identite = null;
        }

        /////////////////////////////////////////////////////////////////////////////////////
        //SETTERS

        public function setID($ID) : void { $this->ID = $ID; }
        public function setNom($nom) : void { $this->nom = $nom; }
        public function setPrenom($prenom) : void { $this->prenom = $prenom; }
        public function setDateN($dateN) : void { $this->dateN = $dateN; }
        public function setTelephone($telephone) : void { $this->telephone = $telephone; }
        public function setEmail($email) : void { $this->email = $email; }
        public function setPassword($password) : void { $this->password = $password; }
        public function setSex($Sex) : void { $this->Sex = $Sex; }
        public function setDescription($description) : void { $this->description = $description; }
        public function setPiece_identite($piece_identite) : void { $this->piece_identite = $piece_identite; }

        /////////////////////////////////////////////////////////////////////////////////////
        //GETTERS

        public function getID() : string { return $this->ID; }
        public function getNom() : string { return $this->nom; }
        public function getPrenom() : string { return $this->prenom; }
        public function getDateN() : string { return $this->dateN; }
        public function getTelephone() : string { return $this->telephone; }
        public function getEmail() : string { return $this->email; }
        public function getPassword() : string { return $this->password; }
        public function getSex() : string { return $this->Sex; }
        public function getDescription() : string { return $this->description; }
        public function getPiece_identite() : string { return $this->piece_identite; }

        /////////////////////////////////////////////////////////////////////////////////////
        //METHODS

        //Get User By id
        public static function findBy($value, $column = 'idpersonnesInternes', $table_name = 'personnesinternes') {
            $data = parent::findBy($value, $column, $table_name);

              if($data != null){
                if($table_name=="personnesinternes") {

                  switch($data['Description']) {
                    case 'EMP':
                      $user = new Employeur();
                      /*$Emp = parent::findBy($data['idpersonnesInternes'],'Id_emp',$data['Description']);
                      $user->setSpecialite($Emp['specialite']);
                      $user->setNuMedeID($Emp['Nu_medeID']);
                      $user->setConge($Emp['en_conge']);*/
                      break;
                    case 'ACC':
                      $user = new Accueil();
                      //$Acc = parent::findBy($data['idpersonnesInternes'],'Id_acc',$data['Description']);
                      break;
                    case 'ADM':
                      $user = new Administrateur();
                      break;
                  }

                  $user->setID($data['idpersonnesInternes']);
                  $user->setNom($data['Nom']);
                  $user->setPrenom($data['Prenom']);
                  $user->setDateN($data['Date_de_naissance']);
                  $user->setTelephone($data['phone']);
                  $user->setEmail($data['email']);
                  $user->setPassword($data['mot_de_passe']);
                  $user->setSex($data['Sex']);
                  $user->setPiece_identite($data['nom_du_fichier']);
                    return $user;
              }else{
              /*  if($table_name=="Emp"){
                  $user = new Employeur();
                  $user->setID($data['ID']);
                  /*$user->setSpecialite($data['specialite']);
                  $user->setNuMedeID($data['Nu_medeID']);
                  $user->setConge($data['en_conge']);
                    return $user;

                }else{
                  if($table_name=="Acc"){
                      $user = new Accueil();
                  /*  $user->setID($data['ID']);
                    $user->setSex($data['sex']);
                      return $user;
                  }
                  }*/
                }
              }
              return null;
          }

        //Get all users
        public static function findAll($table_name = 'personnesinternes') {
            $data = parent::findAll($table_name);

            if($data != null) {

                $users = array(count($data));

                for($i = 0; $i < count($data); $i++) {

                    $info = $data[$i];
                    switch($info['description']) {
                        case 'EMP':
                          $user = new Employeur();
                          $Emp = parent::findBy($info['idpersonnesInternes'],'Id_emp',$info['Description']);
                          /*$user->setSpecialite($Emp['specialite']);
                          $user->setNuMedeID($Emp['Nu_medeID']);
                          $user->setConge($Emp['en_conge']);*/
                          break;
                        case 'ACC':
                          $user = new Accueil();
                          $FT = parent::findBy($info['idpersonnesInternes'],'Id_acc',$info['Description']);
                        //  $user->setSex($FT["sex"]);
                          break;
                        case 'ADM':
                          $user = new Administrateur();
                          break;
                    }

                    $user->setID($info['idpersonnesInternes']);
                    $user->setNom($info['Nom']);
                    $user->setPrenom($info['Prenom']);
                    $user->setDateN($info['Date_de_naissance']);
                    $user->setTelephone($info['phone']);
                    $user->setEmail($info['email']);
                    $user->setPassword($info['mot_de_passe']);
                    $user->setSex($info['Sex']);
                    $user->setPiece_identite($info['nom_du_fichier']);

                    $users[$i] = $user;
                }

                return $users;

            } else {
                return null;
            }
        }



/*
        //Add new user
        public static function addUser($user) : bool {
            $query = 'insert into user (ID,Nom,Prenom,Date_naissance,telephone,Email,Password,Sex,description) values (?, ?, ?, ?, ?, ?, ?, ?, ?)';
            $params = [
                $user->getID(),
                $user->getNom(),
                $user->getPrenom(),
                $user->getDateN(),
                $user->getTelephone(),
                $user->getEmail(),
                $user-> sha1(getPassword()),
                $user->getSex(),
                $user->getDescription(),
                $user->getPiece_identite()
            ];

            $addToUser = parent::submitData($query, $params);
     
            return $addToUser && $addToObject;

        }
*/

        //Update User
       public static function updateUser($user) : bool {
           $query = "update personnesinternes set Nom = ?, Prenom = ?, Date_de_naissance = ? , email = ?, mot_de_passe = ?, nom_du_fichier = ?, phone = ? where idpersonnesInternes = ?";
           $params = [
               $user->getNom(),
               $user->getPrenom(),
               $user->getDateN(),
               $user->getEmail(),
               $user->getPassword(),
               $user->getPiece_identite(),
               $user->getTelephone(),
               $user->getID()
           ];
           $UPDToUser = parent::submitData($query, $params);
           
          return $UPDToUser;
       }

   
  

      //Delete User
     public static function DELUser($user) : bool {
       //delite user from ALL table "on delite cascade"
       $query = "delete from personnesinternes where idpersonnesInternes = ?";
       $params = [
           $user->getID()
       ];
       $DELToUser = parent::submitData($query, $params);
       return $DELToUser;

     }

}
 ?>
