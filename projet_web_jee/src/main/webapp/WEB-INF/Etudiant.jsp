<!--%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
%
% le code du page : etudiant
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
    <title>Etudiants</title>
    <link href="./style/bootstrap.min.css" rel="stylesheet" />
	<link rel="stylesheet" href="./style/style.css">
	    
  </head>

  <body>
    <div id="page-wraper">
      <!-- Sidebar Menu -->
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
          
            <h2>Etudiants</h2>
            <div class="line-dec"></div>
            
<form method="post" >
<label><h5>Consulter l'assiduite d'un etudiant en saisissant son ID</h5></label>
<input type="number" name="id"/>
<input type="submit" value="rechercher"/>


</form>


          
            
<table border="5" >   
<tbody>

            
            <td><h5>ID</h1></td>
            <td><h5>NOM</h1></td>
            <td><h5>PRENOM</h1></td>
            <td><h5>SEXE</h21></td>
            <td><h5>TELEPHONE</h1></td>
            <td><h5>DESCRIPTION</h1></td>
            <td><h5>DATE DE NAISSANCE</h1></td>
            <td><h5>NOM DU FICHIER</h1></td>
            
<c:forEach var="list1" items="${list1}">
            <tr height="50px">

<td><h5>${ list1.getId() }</h1> </td>

<td><h5>${ list1.getNom() }</h1></td>
 
<td><h5>${ list1.getPrenom() }</h1></td>

<td><h5>${ list1.getsexe() }</h1> </td>

<td><h5>${ list1.getTelephone() }</h1> </td>

<td><h5>${ list1.getDescription() }</h1> </td>

<td><h5>${ list1.getDate_de_naissance() }</h1></td>

<td><h5>${ list1.getnom_du_fichier() }"</h1></td>

</tr>

</tbody>

<br>

</c:forEach>
</table>
<br>
<table border="5" width="80%" >
  <td><h5>ID_personnel</h5></td>
  <td><h5>ID_presence</h5></td>
  <td><h5>DATE_presence</h5></td>
  <td><h5>STATUT</h4></td>
<c:forEach var="presence" items="${presence}">
<tbody>
<tr height="50px">
<td><h5>${ presence.getId() }</h5></td>
<td><h5>${ presence.getIdpresencePersonnesInternes() }</h5></td>
<td><h5>${ presence.getDate_presence() }</h5></td>
<td><h5>${ presence.getPresent_e() }</h5></td>
</tr>

</tbody>

</c:forEach>
</table>

<br>            
         
      </section>

    
  </body>
</html>
