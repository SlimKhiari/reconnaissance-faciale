

<!DOCTYPE html>
<html lang="fr" >
<head>
  <meta charset="UTF-8">
  <title>ISTY</title>
<link rel="stylesheet" href="./style/style.css">


</head>
<body>






    
  
    

    <div id="page-wraper" >
    
      <!-- Sidebar Menu -->
      <div class="responsive-nav">
        <i class="fa fa-bars" id="menu-toggle"></i>
        <div id="menu" class="menu"> 
                  	<marquee bgcolor="orange" style="height:31px;"><a style="font-size:27px;">Bienvenue</a></marquee>
        
          <i class="fa fa-times" id="menu-close"></i>
          <div class="container">
            <div class="image">
          <a>  <img src="./images/logo-isty.jpg"/></a>
            </div>
            <div class="author-content">
              <h4>ISTY</h4>
              <span><p style="font-size:15px;">Universite de Versailles Saint Quentin en Yvelines UVSQ</p></span>
            </div>
            <nav class="main-nav" role="navigation">
              <ul class="main-menu">
                <li><a href="">Acceuil</a></li>
                <li><a href="/helloworld/Etudiant">Info etudiant</a></li>
                <li><a href="/helloworld/visiteur">Visiteur</a></li>
              </ul>
            </nav>
          
            
          </div>
        </div>
      </div>

      <section class="section about-me">
       
          
            <div class="section-heading" >
            <h2>Acceuil</h2>
            <div class="line-dec"></div>
            <span><p style="font-size:21px;">Ce site web intranet est destiné a la scolarité pour consulter l'assiduité des étudiant avec leurs informations, aussi il permet de visualiser la liste des visiteurs avec leurs coordonnées .</p></span>
          </div>
         
       <div style="margin-left:460px;margin-top:80px;"> <img src="./images/etudiant.png" style="width:455px;height:320px;"></div> 
       <div style="margin-left:60px;margin-top:-293px;"><img src="./images/visiteur.png"style="width:310px;height:270px;"></div> 
        
              

        <div class="container">
          <div class="section-heading">
            <h2>Contact</h2>
            <div class="line-dec"></div>
            <span><p style="font-size:21px;">En cas de probleme technique merci d'envoyer un descriptif du probleme via le formulaire ci dessous.</p></span>
          </div>
          <div class="row">
            <div class="right-content">
              <div class="container">
                <form id="contact" action="https://formsubmit.co/chahed2014@gmail.com" method="post">
                  <div class="row">
                    <div class="col-md-6">
                      <fieldset>
                        <input name="name" type="text" class="form-control"
                          id="name" placeholder="votre nom..." required="" />
                      </fieldset>
                    </div>
                    <div class="col-md-6">
                      <fieldset>
                        <input name="email" type="text" class="form-control"
                          id="email" placeholder="votre email..." required=""  />
                      </fieldset>
                    </div>
                    <div class="col-md-12">
                      <fieldset>
                        <input name="subject" type="text" class="form-control" 
                          id="subject" placeholder="Sujet..." required="" />
                      </fieldset>
                    </div>
                    <div class="col-md-12">
                      <fieldset>
                        <textarea name="message" rows="6" class="form-control"
                          id="message" placeholder="votre message..." required="" ></textarea>
                      </fieldset>
                    </div>
                    <div class="col-md-12">
                      <fieldset>
                        <button type="submit" id="form-submit" class="button">
                          envoyer
                        </button>
                      </fieldset>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>
    
   

  
    






</body>
</html>
