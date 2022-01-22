import mysql.connector
import pymysql
pymysql.install_as_MySQLdb()
from mysql.connector import errorcode
from datetime import datetime

#connexion avec la DB
try :
	cnx = mysql.connector.connect(user='root', password='Slimetsalambo123&', host='localhost',database='gestionnaire_abscence',auth_plugin='mysql_native_password'
	)
except mysql.connector.Error as err:
	if err.errno == errorcode.ER_ACCESS_DENIED_ERROR:
		print("L'utilsiateur ou le mot de passe n'est pas correct")
	elif err.errno == errorcode.ER_BAD_DB_ERROR:
		print("La base de données n'existe pas")
	else:
		print(err)
	
	exit()

#date actuelle de l'appel
now = datetime.now()
formatted_date = now.strftime('%Y-%m-%d')

#reconnaitre l'id de la personne détectée
string1 = []
string2 = []
maxboucle=0
taille_de_nom_fichier=1
id_personne_interne=0
cursorSel = cnx.cursor()

nom_du_visage="/faces/chahed.jpg" #exemple d'une personne interne détectée
selectAction = ("SELECT idpersonnesInternes, nom_du_fichier FROM personnesInternes")
cursorSel.execute(selectAction)
resultatSelect = cursorSel.fetchall()

for i in resultatSelect: 
	for  c in i[1]:
		string2.append(c) 
	for  c in nom_du_visage:
		string1.append(c) 
	
	if len(string2) < len(string1) : maxboucle = len(string2)
	else :  maxboucle = len(string1)
	
	for j in  range(maxboucle):
		if string1[j] == string2[j] : taille_de_nom_fichier = taille_de_nom_fichier+ 1

	if(taille_de_nom_fichier == maxboucle+1): id_personne_interne = i[0];	
	string1 = []
	string2 = []
	maxboucle = 0
	taille_de_nom_fichier = 1

print(id_personne_interne)

#nbr total des personnes internes
query = "SELECT COUNT(*) from personnesInternes" 
cursorSel.execute(query)            
res = cursorSel.fetchone()
nbr_total_personnes_internes = res[0] 
print(nbr_total_personnes_internes)

#initialisation de la presence des pesonnes internes (presence = false)
#for i in range(nbr_total_personnes_internes):
#	ajoutPresence = "INSERT INTO presencePersonnesInternes (idpersonnesInterne, date_presence,present_e) VALUES (%s, %s,%s)"
#	val = (i,formatted_date,'0')
#	cursorSel.execute(ajoutPresence, val)
#	cnx.commit()

#mise à jour de la bd dans le cas ou il y a une reconnaissance (exmemple ici: nom_du_visage)
sql = "UPDATE presencePersonnesInternes SET present_e = %s WHERE date_presence = %s AND idpersonnesInterne = %s "
value = ("1",formatted_date,id_personne_interne)
cursorSel.execute(sql,value)
cnx.commit()




cursorSel.close()
cnx.close()
