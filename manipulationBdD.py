import mysql.connector
from datetime import date
import os


conn = mysql.connector.connect(host="localhost",user="root",password="", database="gestion_presence")
cursor = conn.cursor()
cursor.execute("SELECT chemin_image FROM USER")
rows = cursor.fetchall()
iD_visage_accept=0;

for row in rows:
   #Comparer les chemin de visage recuperer avec le visage capter
   if row == nom_du_visage :
        cursor.execute("SELECT Id_user FROM USER where chemin_image = %s",nom_du_visage);
        iD_visage_accept = cursor.fetchall() 
        break;

Presence = (iD_visage_accept,date.today(),1)
cursor.execute("""INSERT INTO Presence (ID_User,Date,present) VALUES(%s,%s,%s)""", Presence)


conn.commit()
conn.close()




