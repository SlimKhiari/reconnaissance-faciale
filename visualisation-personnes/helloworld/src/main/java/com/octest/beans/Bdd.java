package com.octest.beans;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.ArrayList;
import java.util.List;

public class Bdd {
	private Connection connexion;
	  public List<Utilisateur> recupererUtilisateurs1() {
	        List<Utilisateur> utilisateurs = new ArrayList<Utilisateur>();
	        Statement statement = null;
	        ResultSet resultat = null;

	        // Chargement du driver
	        try {
	            Class.forName("com.mysql.jdbc.Driver");
	        } catch (ClassNotFoundException e) {
	        }

	        try {
	            connexion = DriverManager.getConnection("jdbc:mysql://localhost:3306/reconnaissance", "root", "Slimetsalambo123&");
	        } catch (SQLException e) {
	            e.printStackTrace();
	        }
	        
	        try {
	            statement = connexion.createStatement();

	            // Ex�cution de la requ�te
	            resultat = statement.executeQuery("select idpersonnesInternes, Nom, Prenom, Date_de_naissance, email, nom_du_fichier, sex, Description, phone  from personnesinternes;");

	            // R�cup�ration des donn�es
	            while (resultat.next()) {
	                
	                int idpersonnesInternes = resultat.getInt("idpersonnesInternes");
	                String nom = resultat.getString("Nom");
	                String prenom = resultat.getString("Prenom");
	                String Date_de_naissance = resultat.getString("Date_de_naissance");
	                String email = resultat.getString("email");
	                String nom_du_fichier = resultat.getString("nom_du_fichier");
	                String sex = resultat.getString("sex");
	                String Description = resultat.getString("Description");
	                String phone = resultat.getString("phone");


	                
	                Utilisateur utilisateur = new Utilisateur();
	                utilisateur.setId(idpersonnesInternes);
	                utilisateur.setNom(nom);
	                utilisateur.setPrenom(prenom);
	                utilisateur.setDate_de_naissance(Date_de_naissance);
	                utilisateur.setEmail(email);
	                utilisateur.setnom_du_fichier(nom_du_fichier);
	                utilisateur.setsexe(sex);
	                utilisateur.setDescription(Description);
	                utilisateur.setTelephone(phone);

	                
	                utilisateurs.add(utilisateur);
	            }
	        } catch (SQLException e) {
	        } finally {
	            // Fermeture de la connexion
	            try {
	                if (resultat != null)
	                    resultat.close();
	                if (statement != null)
	                    statement.close();
	                if (connexion != null)
	                    connexion.close();
	            } catch (SQLException ignore) {
	            }
	        }
	        
	        return utilisateurs;
	    }
	  
	  
	  public List<Utilisateur> recupererUtilisateurs2() {
	        List<Utilisateur> utilisateurs = new ArrayList<Utilisateur>();
	        Statement statement = null;
	        ResultSet resultat = null;

	        // Chargement du driver
	        try {
	            Class.forName("com.mysql.jdbc.Driver");
	        } catch (ClassNotFoundException e) {
	        }

	        try {
	            connexion = DriverManager.getConnection("jdbc:mysql://localhost:3306/reconnaissance", "root", "Slimetsalambo123&");
	        } catch (SQLException e) {
	            e.printStackTrace();
	        }
	        
	        try {
	            statement = connexion.createStatement();

	            // Ex�cution de la requ�te
	            resultat = statement.executeQuery("select * from visiteur;");

	            // R�cup�ration des donn�es
	            while (resultat.next()) {
	                
	                int idpersonnesInternes = resultat.getInt("ID_v");
	                String nom = resultat.getString("Nom");
	                String prenom = resultat.getString("Prenom");
	                String phone = resultat.getString("Telephone");
	                String email = resultat.getString("Email");
	                String Piece_identite = resultat.getString("Piece_identite");
	                String Motif = resultat.getString("Motif");
	                String  Date_de_naissance = resultat.getString("Date_de_naissance");
	                String acceptation = resultat.getString("acceptation");


	                
	                Utilisateur utilisateur = new Utilisateur();
	                utilisateur.setId(idpersonnesInternes);
	                utilisateur.setNom(nom);
	                utilisateur.setPrenom(prenom);
	                utilisateur.setDate_de_naissance(Date_de_naissance);
	                utilisateur.setEmail(email);
	                utilisateur.setPiece_identite(Piece_identite);
	                utilisateur.setacceptation(acceptation);
	                utilisateur.setMotif(Motif);
	                utilisateur.setTelephone(phone);

	                

	                
	                utilisateurs.add(utilisateur);
	            }
	        } catch (SQLException e) {
	        } finally {
	            // Fermeture de la connexion
	            try {
	                if (resultat != null)
	                    resultat.close();
	                if (statement != null)
	                    statement.close();
	                if (connexion != null)
	                    connexion.close();
	            } catch (SQLException ignore) {
	            }
	        }
	        
	        return utilisateurs;
	    }
	  
	  
	  
	  
	  
	  public List<Utilisateur> recuperer_presence(int id) {
	        List<Utilisateur> utilisateurs = new ArrayList<Utilisateur>();


	        Statement statement = null;
	        ResultSet resultat = null;

	        // Chargement du driver
	        try {
	            Class.forName("com.mysql.jdbc.Driver");
	        } catch (ClassNotFoundException e) {
	        }

	        try {
	            connexion = DriverManager.getConnection("jdbc:mysql://localhost:3306/reconnaissance", "root", "Slimetsalambo123&");
	        } catch (SQLException e) {
	            e.printStackTrace();
	        }
	        
	        try {
	            statement = connexion.createStatement();

	            // Ex�cution de la requ�te
	            resultat = statement.executeQuery("select * from presencepersonnesinternes where idpersonnesInterne="+id+";");

	            // R�cup�ration des donn�es
	            while (resultat.next()) {
	                Utilisateur utilisateur = new Utilisateur();

	                int idpersonnesInterne = resultat.getInt("idpersonnesInterne");
	                int idpresencePersonnesInternes = resultat.getInt("idpresencePersonnesInternes");
	                String date_presence = resultat.getString("date_presence");
	                int present_e = resultat.getInt("present_e");
	               


	                utilisateur.setId(idpersonnesInterne);
	                utilisateur.setIdpresencePersonnesInternes(idpresencePersonnesInternes);
	                utilisateur.setDate_presence(date_presence);
	                utilisateur.setPresent_e(present_e);
	                
	               
	              

	                utilisateurs.add(utilisateur);
	                
	            }
	        } catch (SQLException e) {
	        } finally {
	            // Fermeture de la connexion
	            try {
	                if (resultat != null)
	                    resultat.close();
	                if (statement != null)
	                    statement.close();
	                if (connexion != null)
	                    connexion.close();
	            } catch (SQLException ignore) {
	            }
	        }
			return utilisateurs;
	        
	    }
	  
}
