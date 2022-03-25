<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Login</title>
	<meta charset="UTF-8">

	<link rel="stylesheet" type="text/css" href="./fonts/Linearicons-Free-v1.0.0/icon-font.min.css">

	<link rel="stylesheet" type="text/css" href="./css/util.css">
	<link rel="stylesheet" type="text/css" href="./css/main.css">
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('./images/bg-01.jpg');">
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
					LOGIN
				</span>
				<form class="login100-form validate-form p-b-33 p-t-5">

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="username" placeholder="Email">
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="pass" placeholder="Mot de passe">
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
					</div>

					<div class="container-login100-form-btn m-t-32">
						<button class="login100-form-btn">
							se connecter
						</button>
					</div>

				</form>
			</div>
		</div>
	</div>
<%@page import="java.sql.DriverManager" %>
<%@page import="java.sql.Connection" %>
<%@page import="java.sql.Statement" %>
<%@page import="java.sql.SQLException" %>
<%@page import="java.sql.ResultSet" %>
<%@page import="javax.swing.JOptionPane" %>


<% 
/* String l = (String)request.getAttribute("login");
if (l=="1")
{
 	JOptionPane.showMessageDialog(null, "correcte", 
             "Error Message",
             JOptionPane.INFORMATION_MESSAGE);
 	this.getServletContext().getRequestDispatcher("/WEB-INF/Acceuil.jsp").forward(request,response);
}
else
{
	JOptionPane.showMessageDialog(null, "Your Login and/or your Passeword are Incorrects", 
            "Error Message",
            JOptionPane.ERROR_MESSAGE); 
}


*/
String email = request.getParameter("username");
String pass = request.getParameter("pass");


if (("chahed@gmail.com".equalsIgnoreCase(email))&&("1234".equalsIgnoreCase(pass)))
{
	JOptionPane.showMessageDialog(null, "correcte", "Error Message",JOptionPane.INFORMATION_MESSAGE);
	this.getServletContext().getRequestDispatcher("/WEB-INF/Acceuil.jsp").forward(request,response);
	

}
else
{
	JOptionPane.showMessageDialog(null, "Your Login and/or your Passeword are Incorrects", 
            "Error Message",
            JOptionPane.ERROR_MESSAGE); 
}

%>

</body>
</html>