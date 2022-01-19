import face_recognition
import cv2
import numpy as np
import os
import glob
import time 

#-----------------------------------------------IMPORTATION DES IMAGES-----------------------------------------------------#
encodages_des_visages = []
noms_des_visages = []
repertoire_courant = os.getcwd() 
path = os.path.join(repertoire_courant, 'visages_des_employes/')
liste_des_fichiers = [f for f in glob.glob(path+'*.jpg')]
nombre_de_fichiers = len(liste_des_fichiers)
noms = liste_des_fichiers.copy()

#---------------------------------------------------FORMATION LES VISAGES--------------------------------------------------#
#entrainement des images 
for i in range(nombre_de_fichiers):
    globals()['image_{}'.format(i)] = face_recognition.load_image_file(liste_des_fichiers[i])
    globals()['image_encoding_{}'.format(i)] = face_recognition.face_encodings(globals()['image_{}'.format(i)])[0]
    encodages_des_visages.append(globals()['image_encoding_{}'.format(i)])
# création du tableau avec les noms connus
    noms[i] = noms[i].replace(repertoire_courant, "")  
    noms_des_visages.append(noms[i])

#---------------------------------------------------RECONNAISSANCE DE VISAGE------------------------------------------------#
emplacements_des_visages = []
encodages_des_visages_captes = []
noms_des_visages_captures = []
traiter_ce_cadre = True
video_capture = cv2.VideoCapture(0)

while True:

	#saisir une seule image video
	ret, frame = video_capture.read()
	
	#redimensionner l'image de la vidéo à 1/4 pour un traitement de reconnaissance faciale plus rapide
	small_frame = cv2.resize(frame, (0, 0), fx=0.25, fy=0.25)
	
	#de la couleur BGR utilisée par OpenCV à la couleur RVB utilisée par face_recognition
	rgb_small_frame = small_frame[:, :, ::-1]
	
	
	if traiter_ce_cadre:
			#trouver tous les visages et encodages de visage dans l'image actuelle de la vidéo
			emplacements_des_visages = face_recognition.face_locations( rgb_small_frame)
			encodages_des_visages_captes = face_recognition.face_encodings( rgb_small_frame, emplacements_des_visages)
			
			noms_des_visages_captures = []
			
			#la phase de la comparaison - voir si le visage correspond à l'image actuelle de la vidéo
			#pour comparer, le package utilise l'un des classificateurs SVM linéaires les plus courants des méthodes de la machine learning.
			#nous pouvons utiliser la fonction compare_faces pour savoir si les visages correspondent. Cette fonction renvoie Vrai ou Faux
			#nous pouvons utiliser la fonction face_distance pour déterminer la probabilité que les visages correspondent en termes de nombres,utile lorsqu'il y a plusieurs visages à détecter
			for encodage_visage_capture in encodages_des_visages_captes:
			       
				correspondances = face_recognition.compare_faces (encodages_des_visages, encodage_visage_capture)
				face_distances = face_recognition.face_distance(encodages_des_visages, encodage_visage_capture)
				indice_du_meilleur_visage_correspondant = np.argmin(face_distances)
				nom_du_visage="refuse(e)"
				if correspondances[indice_du_meilleur_visage_correspondant ]:
					print("*************************************************");
					print("Personne autorisée à entrer dans le batiment.");
					print("Ouverture automatique des portes, veuillez entrer >");
					#time.sleep(5)
					print("Fermeture automatique des portes.");
					print("*************************************************\n\n");
					nom_du_visage = noms_des_visages[indice_du_meilleur_visage_correspondant]
				else:	
					print("*************************************************");
					print("Personne non autorisée à entrer dans le batiment, portes bloquées.");
					print("*************************************************\n\n");
					#time.sleep(5)
				noms_des_visages_captures.append(nom_du_visage)
			
	traiter_ce_cadre = not traiter_ce_cadre
	
	# affichage des résultats
	for (top, right, bottom, left), nom_du_visage in zip(emplacements_des_visages, noms_des_visages_captures):
		# mettre à l'échelle les emplacements de sauvegarde puisque la trame dans laquelle nous avons détecté a été mise à l'échelle à 1/4 de taille
		top *= 4
		right *= 4
		bottom *= 4
		left *= 4
			
		# tracer un carré au tour du visage
		cv2.rectangle(frame, (left, top), (right, bottom), (0, 255, 0), 1)

		# étiquette de texte d'entrée avec un nom sous le visage
		cv2.rectangle(frame, (left, bottom - 35), (right, bottom), (0, 255, 0), cv2.FILLED)
		font = cv2.FONT_HERSHEY_DUPLEX
		cv2.putText(frame, nom_du_visage, (left + 6, bottom - 6), font, 1.0, (255, 255, 255), 1)
		
	# afficher l'image résultante
	cv2.imshow('Video', frame)
	
	# Appuyez sur « q » sur le clavier pour quitter !
	if cv2.waitKey(1) & 0xFF == ord('q'):
		break
			
