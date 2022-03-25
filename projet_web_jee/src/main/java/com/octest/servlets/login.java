/**%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
%
% le code du servlet : login
%
% Auteur : Benslama Chahed (IATIC-4)
%
% Nom du projet : Reconnaissance faciale serrure connectée gestion présences
%
%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/


package com.octest.servlets;

import jakarta.servlet.RequestDispatcher;
import jakarta.servlet.ServletException;
import jakarta.servlet.annotation.WebServlet;
import jakarta.servlet.http.HttpServlet;
import jakarta.servlet.http.HttpServletRequest;
import jakarta.servlet.http.HttpServletResponse;
import java.io.IOException;
import javax.swing.JOptionPane;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.sql.Connection;
import java.sql.DriverManager;



/**
 * Servlet implementation class Login
 */
public class login extends HttpServlet {
	private static final long serialVersionUID = 1L;
	private	Connection connexion;


       
    /**
     * @see HttpServlet#HttpServlet()
     */
    public login() {
        super();
        // TODO Auto-generated constructor stub
    }

	/**
	 * @see HttpServlet#doGet(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub

		
		
		this.getServletContext().getRequestDispatcher("/WEB-INF/log.jsp").forward(request,response);
	}

	/**
	 * @see HttpServlet#doPost(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
		
		/*
		String name = request.getParameter("username");
		String pass = request.getParameter("pass");
		int login=0;
		int test_mail=0;
		int test_passe=0;


		Statement statement = null;
		ResultSet resultat = null;
		// Chargement du driver
		try {
		    Class.forName("com.mysql.jdbc.Driver");
		} catch (ClassNotFoundException e) {
		}

		try {
		    connexion = DriverManager.getConnection("jdbc:mysql://localhost:3306/projet_inter", "root", "root");
		} catch (SQLException e) {
		    e.printStackTrace();
		}

		try {
		    statement = connexion.createStatement();

		    // Exécution de la requête
		    resultat = statement.executeQuery("select email, mot_de_passe  from personnesinternes;");

		    // Récupération des données
		    while (resultat.next())
		    {
		    	 String email = resultat.getString("email");
		         String mot_de_passe = resultat.getString("mot_de_passe");
		         
		         if (email.equalsIgnoreCase(name))
		         {
		        	 test_mail=1;
		         }

		         if (mot_de_passe.equalsIgnoreCase(name))
		         {
		        	 test_passe=1;
		         }
		         
		       
		    }
		} catch (SQLException e) {
		}finally {
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
		

		
	      if (test_mail==1 && test_passe==1)
	     	{
	     	login=1;
	     	request.setAttribute("login", login);
			this.getServletContext().getRequestDispatcher("/WEB-INF/log.jsp").forward(request,response);

	     	}*/
	     
	     	
	     
	}

}
