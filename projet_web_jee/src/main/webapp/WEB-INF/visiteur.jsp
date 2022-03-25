<!--%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
%
% le code du page : visiteur 
%
% Auteur : Benslama Chahed (IATIC-4)
%
% Nom du projet : Reconnaissance faciale serrure connectée gestion présences
%
%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%-->


<%@ taglib prefix="c" uri="http://java.sun.com/jsp/jstl/core" %>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8" />
    <title>Visiteurs</title>
    <link href="./style/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="./style/style.css">  
  </head>

  <body>
      <div class="responsive-nav">
        <i class="fa fa-bars" id="menu-toggle"></i>
        <div id="menu" class="menu">
          <i class="fa fa-times" id="menu-close"></i>
          <div class="container">
            <div class="image">
          <a>  <img src="./images/logo-isty.jpg" style="width:330px;"/></a>
            </div>
            <div class="author-content">
              <h4>ISTY</h4>
              <span><p style="font-size:15px;">Universite de Versailles Saint Quentin en Yvelines UVSQ</p></span>
            </div>
            <nav class="main-nav" role="navigation">
              <ul class="main-menu">
                <li><a href="/projet_web_jee/Acceuil">Acceuil</a></li>
                <li><a href="/projet_web_jee/Etudiant">Info etudiants</a></li>
                <li><a href="/projet_web_jee/visiteur">Visiteurs</a></li>
              </ul>
            </nav>
          
            
          </div>
        </div>
      </div>

      <section class="section about-me" >
            <div class="section-heading">      
            <h2>Visiteurs</h2>
            <div class="line-dec"></div>
            <table border="5" >
            <tbody>
            <td><h5>ID</h1></td>
            <td><h5>NOM</h1></td>
            <td><h5>PRENOM</h1></td>
            <td><h5>DATE DE NAISSANCE</h1></td>
            <td><h5>TELEPHONE</h1></td>
            <td><h5>EMAIL</h1></td>
            <td><h5>ACCEPTATION</h1></td>
            <td><h5>MOTIF</h1></td>
            <td><h5>PIECE D'IDENTITE</h1></td>
            
<c:forEach var="list2" items="${list2}">

<tr height="100px">
<td><h5>${ list2.getId() }</h3></td>


<td><h5>${ list2.getNom() } </h3></td>

<td><h5>${ list2.getPrenom() }</h3></td>

<td><h5>${ list2.getDate_de_naissance() }</h3></td>

<td><h5>${ list2.getTelephone() }</h3></td>

<td><h5>${ list2.getEmail() }</h5></td>

<td><h5>${ list2.getacceptation() }</h3></td>

<td><h5>${ list2.getMotif() }</h3></td>

<td><h5>${ list2.getPiece_identite() }</h3></td>

</tr>
</tbody>
<br>

</c:forEach>
</table>
<br>                  
</section>
  </body>
</html>
