from tkinter import*
from PIL import Image
from PIL import ImageTk
import cv2
import imutils
import time


root=Tk()
root.title("gestion de presence")
root.geometry("850x550")
root.resizable(width=False,height=False)
log=Label(root,text="gestion de presence",font=('arial',19,'bold'))
root.config(background='#46B8E1')
label_title = Label(root,text="Bienvenue sur RF-projet",font=("Arial",40),bg="#46B8E1",fg="white")
label_title.grid(column=3,row=0,padx=5,pady=5)

#variables changeables apres la detection
ID = 1
prenom = "ELHASSANE"
nom = "TALHA"
date = "25/03/2022"
statut = "AUTORISE"
now = time.strftime("%d-%m-%Y",time.localtime())

btn_id = Button(root,text=ID ,state="disable",bg="white")
btn_id.grid(column=4,row=1,padx=2,pady=2)
btn_id.config(width=20)

btn_date_Ac = Button(root,text=now ,state="disable",bg="white")
btn_date_Ac.grid(column=4,row=2,padx=2,pady=2)
btn_date_Ac.config(width=20)

btn_nom = Button(root,text=nom ,state="disable",bg="white")
btn_nom.grid(column=4,row=3,padx=5,pady=5)
btn_nom.config(width=20)

btn_prenom = Button(root,text=prenom ,state="disable",bg="white")
btn_prenom.grid(column=4,row=4,padx=5,pady=5)
btn_prenom.config(width=20)

btn_date = Button(root,text=date ,state="disable",bg="white")
btn_date.grid(column=4,row=5,padx=5,pady=5)
btn_date.config(width=20)

btn_statut = Button(root,text=statut ,state="disable",bg="white")
btn_statut.grid(column=4,row=6,padx=5,pady=5)
btn_statut.config(width=20)

label =Label(root)
label.grid(row=1, column=3,rowspan=8)
cap= cv2.VideoCapture(0)
# fonction pour ouvrir la frame qui contient la camera 
def show_frames():
   cv2image= cv2.cvtColor(cap.read()[1],cv2.COLOR_BGR2RGB)
   img = Image.fromarray(cv2image)
   imgtk = ImageTk.PhotoImage(image = img)
   label.imgtk = imgtk
   label.configure(image=imgtk)
   label.after(20, show_frames)

show_frames()
root.mainloop() 


