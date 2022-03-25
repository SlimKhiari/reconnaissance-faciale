<?php

    class Visiteur_Accepted extends visiteur {

        //ATTRIBUTES
      //  private $qrcode;
      private $dateAcceptation;


        //CONSTRUCTOR
        public function __construct() {
           // $this->qrcode = 0;
            $this->dateAcceptation = date('d-m-Y H:i:s');
        }

        //GETTERS
        public function getDateAcceptation() { return $this->dateAcceptation; }

        //SETTERS
        public function setDateAcceptationt($dateAcceptation) { $this->dateAcceptation = $dateAcceptation; }

        //METHODS

        //Get All accepted visiteurs
        public static function findAll($table_name = 'visiteur_accepter')
        {
            $data = Model::findAll($table_name);

            $acceptedVisiteurs = array();

            if($data == null) return $acceptedVisiteurs;

            foreach($data as $info) {

                $visiteur = new Visiteur_Accepted();

                $visiteur->setDateAcceptation($info['Date_Acceptation']);

                array_push($acceptedVisiteurs, $visiteur);

            }

            return $acceptedVisiteurs;
        }
        
      
    

      //Send mail RDV //
        public static function sendEmailAcception($Visiteur) : bool {

          //  $Visiteur = parent::findBy($Visiteur);

            $to = $Visiteur->getEmail();
           // $to = "marouaneelbaroudi@gmail.com";
            $from = "<ISTY@newsletter.com>";
            $subject = 'ISTY NEWSLETTER : Demande';
            $message = '
            <html>
               <head>
                  <style>
                     .banner-color {
                     background-color: #69043b;
                     }
                     .title-color {
                     color: #7fb924;
                     }
                     .button-color {
                     background-color: #7fb924;
                     }
                     @media screen and (min-width: 500px) {
                     .banner-color {
                     background-color: #7fb924;
                     }
                     .title-color {
                     color: #69043b;
                     }
                     .button-color {
                     background-color: #69043b;
                     }
                     }
                  </style>
               </head>
               <body>
                  <div style="background-color:#ececec;padding:0;margin:0 auto;font-weight:200;width:100%!important">
                     <table align="center" border="0" cellspacing="0" cellpadding="0" style="table-layout:fixed;font-weight:200;font-family:Helvetica,Arial,sans-serif" width="100%">
                        <tbody>
                           <tr>
                              <td align="center">
                                 <center style="width:100%">
                                    <table bgcolor="#FFFFFF" border="0" cellspacing="0" cellpadding="0" style="margin:0 auto;max-width:512px;font-weight:200;width:inherit;font-family:Helvetica,Arial,sans-serif" width="512">
                                       <tbody>
                                          <tr>
                                             <td bgcolor="#F3F3F3" width="100%" style="background-color:#f3f3f3;padding:12px;border-bottom:1px solid #ececec">
                                                <table border="0" cellspacing="0" cellpadding="0" style="font-weight:200;width:100%!important;font-family:Helvetica,Arial,sans-serif;min-width:100%!important" width="100%">
                                                   <tbody>
                                                      <tr>
                                                         <td valign="middle" width="50%" align="right" style="padding:0 0 0 10px"><span style="margin:0;color:#4c4c4c;white-space:normal;display:inline-block;text-decoration:none;font-size:12px;line-height:20px">'.date("Y-m-d").'</span></td>
                                                         <td width="1">&nbsp;</td>
                                                      </tr>
                                                   </tbody>
                                                </table>
                                             </td>
                                          </tr>
                                          <tr>
                                             <td align="left">
                                                <table border="0" cellspacing="0" cellpadding="0" style="font-weight:200;font-family:Helvetica,Arial,sans-serif" width="100%">
                                                   <tbody>
                                                      <tr>
                                                         <td width="100%">
                                                            <table border="0" cellspacing="0" cellpadding="0" style="font-weight:200;font-family:Helvetica,Arial,sans-serif" width="100%">
                                                               <tbody>
                                                                  <tr>
                                                                     <td align="center" bgcolor="#8BC34A" style="padding:20px 48px;color:#ffffff" class="banner-color">
                                                                        <table border="0" cellspacing="0" cellpadding="0" style="font-weight:200;font-family:Helvetica,Arial,sans-serif" width="100%">
                                                                           <tbody>
                                                                              <tr>
                                                                                 <td align="center" width="100%">
                                                                                  <img src="../img/logo-accueil.png" alt="UVSQ - Institut des Sciences et Techniques des Yvelines (ISTY)">
                                                                                 </td>
                                                                              </tr>
                                                                           </tbody>
                                                                        </table>
                                                                     </td>
                                                                  </tr>
                                                                  <tr>
                                                                     <td align="center" style="padding:20px 0 10px 0">
                                                                        <table border="0" cellspacing="0" cellpadding="0" style="font-weight:200;font-family:Helvetica,Arial,sans-serif" width="100%">
                                                                           <tbody>
                                                                              <tr>
                                                                                 <td align="center" width="100%" style="padding: 0 15px;text-align: justify;color: rgb(76, 76, 76);font-size: 12px;line-height: 18px;">
                                                                                    <h3 style="font-weight: 600; padding: 0px; margin: 0px; font-size: 16px; line-height: 24px; text-align: center;" class="title-color">Bonjour '.$Visiteur->getNom().',</h3>
                                                                                    <p style="margin: 20px 0 30px 0;font-size: 15px;text-align: center;">La demande que vous avez effectué a été accepter</p>
                                                                                    <div style="font-weight: 200; text-align: center; margin: 25px;"><a style="padding:0.6em 1em;border-radius:600px;color:#ffffff;font-size:14px;text-decoration:none;font-weight:bold" class="button-color">la porte sera ouverte dans quelqu\'instant</a></div>
                                                                                 </td>
                                                                              </tr>
                                                                           </tbody>
                                                                        </table>
                                                                     </td>
                                                                  </tr>
                                                                  <tr>
                                                                  </tr>
                                                                  <tr>
                                                                  </tr>
                                                               </tbody>
                                                            </table>
                                                         </td>
                                                      </tr>
                                                   </tbody>
                                                </table>
                                             </td>
                                          </tr>
                                          <tr>
                                             <td align="left">
                                                <table bgcolor="#FFFFFF" border="0" cellspacing="0" cellpadding="0" style="padding:0 24px;color:#999999;font-weight:200;font-family:Helvetica,Arial,sans-serif" width="100%">
                                                   <tbody>
                                                      <tr>
                                                         <td align="center" width="100%">
                                                            <table border="0" cellspacing="0" cellpadding="0" style="font-weight:200;font-family:Helvetica,Arial,sans-serif" width="100%">
                                                               <tbody>
                                                                  <tr>
                                                                     <td align="center" valign="middle" width="100%" style="border-top:1px solid #d9d9d9;padding:12px 0px 20px 0px;text-align:center;color:#4c4c4c;font-weight:200;font-size:12px;line-height:18px">Regards,
                                                                        <br><b>The IATIC4 Team</b>
                                                                     </td>
                                                                  </tr>
                                                               </tbody>
                                                            </table>
                                                         </td>
                                                      </tr>
                                                      <tr>
                                                         <td align="center" width="100%">
                                                            <table border="0" cellspacing="0" cellpadding="0" style="font-weight:200;font-family:Helvetica,Arial,sans-serif" width="100%">
                                                               <tbody>
                                                                  <tr>
                                                                     <td align="center" style="padding:0 0 8px 0" width="100%"></td>
                                                                  </tr>
                                                               </tbody>
                                                            </table>
                                                         </td>
                                                      </tr>
                                                   </tbody>
                                                </table>
                                             </td>
                                          </tr>
                                       </tbody>
                                    </table>
                                 </center>
                              </td>
                           </tr>
                        </tbody>
                     </table>
                  </div>
               </body>
            </html>';

            //from w3schools
            $headers = 'From: ' . $from . "\r\n".
            "MIME-Version: 1.0" . "\r\n" .
            "Content-type: text/html; charset=UTF-8" . "\r\n";

            if(mail($to, $subject, $message, $headers))
                //Email Sended
                return true;
            else
                return false;

       }


         //Accept visiteur
        public static function addVisiteurAccepted($visiteur) : bool {
            if(Model::submitData(
                'insert into visiteur_accepter (ID_Va, Date_Acceptation) values (?, ?)',
                [
                    $visiteur->getID(),
                    date("Y-m-d H:i:s")
                ]
            )){
                if(Visiteur_Accepted::sendEmailAcception($visiteur)){
                    return true;
                }else{
                    return false;
                }
               
            }else{
                return false;
            }   
           

        }

    }

?>