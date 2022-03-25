package com.octest.beans;

public class Utilisateur {
	private String Nom;
	private String Prenom;
	private int Id;
	private String sexe;
	private String Telephone;
	private String Email;
	private String Piece_identite;
	private String Motif;
	private String Date_de_naissance;
	private String acceptation;
	private String nom_du_fichier;
	private String Description;
	private int idpresencePersonnesInternes;
	private String date_presence;
	private int present_e;
	private String mot_de_passe;
	
	
	
	public String getNom() {
		return Nom;
	}
	public void setNom(String nom) {
		Nom = nom;
	}
	public String getPrenom() {
		return Prenom;
	}
	public void setPrenom(String prenom) {
		Prenom = prenom;
	}
	
	public int getId() {
		return Id;
	}
	
	public void setId(int idpersonnesInternes) {
		Id = idpersonnesInternes;
	}
	
	public String getTelephone() {
		return Telephone;
	}
	
	public void setTelephone(String Tel) {
		Telephone = Tel;
	}
	
	public String getEmail() {
		return Email;
	}
	
	public void setEmail(String Em) {
		Email = Em;
	}
	
	public String getPiece_identite() {
		
		return Piece_identite;
	}
	
	public void setPiece_identite(String  piece_id) {
		 Piece_identite = piece_id;
	}
	
	public String getMotif() {
		return Motif;
	}
	
	public void setMotif(String Mot) {
		Motif = Mot;
	}
	
	public String getDate_de_naissance() {
		return Date_de_naissance;
	}
	
	public void setDate_de_naissance(String naiss) {
		Date_de_naissance = naiss;
	}
	
	public String getacceptation() {
		return acceptation;
	}
	
	public void setacceptation(String accep) {
		acceptation = accep;
	}
	
	public String getnom_du_fichier() {
		return nom_du_fichier;
	}
	
	public void setnom_du_fichier(String fichier) {
		nom_du_fichier = fichier;
	}
	public String getsexe() {
		return sexe;
	}
	public void setsexe(String sex) {
		sexe = sex;
	}
	public String getDescription() {
		return Description;
	}
	public void setDescription(String description) {
		Description = description;
	}
	public int getIdpresencePersonnesInternes() {
		return idpresencePersonnesInternes;
	}
	public void setIdpresencePersonnesInternes(int idpresence) {
		idpresencePersonnesInternes = idpresence;
	}

	public int getPresent_e() {
		return present_e;
	}
	public void setPresent_e(int present) {
	     present_e = present;
	}
	public String getDate_presence() {
		return date_presence;
	}
	public void setDate_presence(String date_pre) {
		date_presence = date_pre;
	}
	public String getMot_de_passe() {
		return mot_de_passe;
	}
	public void setMot_de_passe(String passe) {
		mot_de_passe = passe;
	}
	
	
	 

}
