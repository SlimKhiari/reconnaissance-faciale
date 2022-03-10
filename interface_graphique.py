import mysql.connector
import tkinter as tk
from tkinter import ttk
from tkinter import *

root = tk.Tk()
root.title('Espace administration')
root.geometry('1200x800')
		
connexion_bd = mysql.connector.connect(user='root', password='Slimetsalambo123&',host='localhost',database='systeme_gestionnaire_abscence',auth_plugin='mysql_native_password')
selection = connexion_bd.cursor()

selection.execute("SELECT * FROM personnesinternes")

s=ttk.Style(root)
s.theme_use("classic")

tree=ttk.Treeview(root)
tree['show']='headings'

tree["columns"] = ("Numéro","Nom","Prénom","Date de naissance","Mail","Mot de passe","Sexe","Téléphone portable")

tree.column("Numéro",width=66,minwidth=66,anchor=tk.W)
tree.column("Nom",width=100,minwidth=100,anchor=tk.CENTER)
tree.column("Prénom",width=100,minwidth=100,anchor=tk.CENTER)
tree.column("Date de naissance",width=150,minwidth=150,anchor=tk.CENTER)
tree.column("Mail",width=200,minwidth=200,anchor=tk.CENTER)
tree.column("Mot de passe",width=150,minwidth=150,anchor=tk.CENTER)
tree.column("Sexe",width=50,minwidth=50,anchor=tk.CENTER)
tree.column("Téléphone portable",width=150,minwidth=150,anchor=tk.CENTER)

tree.heading("Numéro",text="Numéro de l'étudiant",anchor=tk.W)
tree.heading("Nom",text="Nom",anchor=tk.CENTER)
tree.heading("Prénom",text="Prénom",anchor=tk.CENTER)
tree.heading("Date de naissance",text="Date de naissance",anchor=tk.CENTER)
tree.heading("Mail",text="Mail",anchor=tk.CENTER)
tree.heading("Mot de passe",text="Mot de passe",anchor=tk.CENTER)
tree.heading("Sexe",text="Sexe",anchor=tk.CENTER)
tree.heading("Téléphone portable",text="Téléphone portable",anchor=tk.CENTER)

contents = text.get(1.0, END)

i=0
for personne in selection:
	tree.insert('',i,text="",values=(personne[0],personne[1],personne[2],personne[3],personne[4],personne[5],personne[7],personne[9]))
	i=i+1	


tree.pack()

root.mainloop()
