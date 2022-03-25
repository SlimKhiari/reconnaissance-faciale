package com.octest.servlets;

import jakarta.servlet.ServletException;
import jakarta.servlet.http.HttpServlet;
import jakarta.servlet.http.HttpServletRequest;
import jakarta.servlet.http.HttpServletResponse;
import java.io.IOException;
import java.util.ArrayList;
import java.util.List;

import com.octest.beans.Bdd;
import com.octest.beans.Utilisateur;

/**
 * Servlet implementation class Test
 */
public class Etudiant extends HttpServlet {
	private static final long serialVersionUID = 1L;
       
    /**
     * @see HttpServlet#HttpServlet()
     */
    public Etudiant() {
        super();
        // TODO Auto-generated constructor stub
    }

	/**
	 * @see HttpServlet#doGet(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
		
       
		Bdd b = new Bdd();
	

			request.setAttribute("list1", b.recupererUtilisateurs1());

		

			
			
	      
		
		
	
			
	       
		
		this.getServletContext().getRequestDispatcher("/WEB-INF/Etudiant.jsp").forward(request,response);
		
		
		
		
	}

	/**
	 * @see HttpServlet#doPost(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
		String i = request.getParameter("id");
		int id = Integer.parseInt(i);
		Bdd b= new Bdd();
		request.setAttribute("presence", b.recuperer_presence(id));
		this.getServletContext().getRequestDispatcher("/WEB-INF/Etudiant.jsp").forward(request,response);

	}

}
