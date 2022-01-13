import face_recognition
import cv2
import numpy as np
import os
import glob
import time 
#importation des images
print("-etape 1- importation des images des images --")
faces_encodings = []
faces_names = []
#getcwd() : pour obtenir le repertoire courant
cur_direc = os.getcwd() 
path = os.path.join(cur_direc, 'faces/')
list_of_files = [f for f in glob.glob(path+'*.jpg')]
number_files = len(list_of_files)
names = list_of_files.copy()
print("-- opération réussie --")
print("#################################################################################################################################")

#FORMER LES VISAGES
#entrainement des images 
print("-etape 2- formation des images --")
for i in range(number_files):
    globals()['image_{}'.format(i)] = face_recognition.load_image_file(list_of_files[i])
    globals()['image_encoding_{}'.format(i)] = face_recognition.face_encodings(globals()['image_{}'.format(i)])[0]
    faces_encodings.append(globals()['image_encoding_{}'.format(i)])
# Create array of known names
    names[i] = names[i].replace(cur_direc, "")  
    faces_names.append(names[i])
print("-- opération réussie --")
print("#################################################################################################################################")

#RECONNAISSANCE DE VISAGE
print("-etape 3- reconnaissance des visages --")
face_locations = []
face_encodings = []
face_names = []
process_this_frame = True
print("-- opération réussie --")
print("#################################################################################################################################")

print("-etape 4- ouverture de la caméra --")
video_capture = cv2.VideoCapture(0)
print("-- opération réussie --")
print("#################################################################################################################################")

while True:

	#saisir une seule image video
	ret, frame = video_capture.read()
	
	#redimensionner l'image de la vidéo à 1/4 pour un traitement de reconnaissance faciale plus rapide
	small_frame = cv2.resize(frame, (0, 0), fx=0.25, fy=0.25)
	
	#de la couleur BGR utilisée par OpenCV à la couleur RVB utilisée par face_recognition
	rgb_small_frame = small_frame[:, :, ::-1]
	
	
	if process_this_frame:
			#trouver tous les visages et encodages de visage dans l'image actuelle de la vidéo
			face_locations = face_recognition.face_locations( rgb_small_frame)
			face_encodings = face_recognition.face_encodings( rgb_small_frame, face_locations)
			
			face_names = []
			for face_encoding in face_encodings:
				#voir si le visage correspond à l'image actuelle de la vidéo
				matches = face_recognition.compare_faces (faces_encodings, face_encoding)
				name = "refuse"
			
				face_distances = face_recognition.face_distance( faces_encodings, face_encoding)
				best_match_index = np.argmin(face_distances)
				if matches[best_match_index]:
					print("*************************************************");
					print("Personne autorisée à entrer dans le batiment.");
					print("Ouverture automatique des portes, veuillez entrer >");
					#time.sleep(5)
					print("Fermeture automatique des portes.");
					print("*************************************************\n\n");
					name = faces_names[best_match_index]
				else:	
					print("*************************************************");
					print("Personne non autorisée à entrer dans le batiment, portes bloquées.");
					print("*************************************************\n\n");
					#time.sleep(5)
				face_names.append(name)
			
	process_this_frame = not process_this_frame
	
	# affichage des résultats
	for (top, right, bottom, left), name in zip(face_locations, face_names):
		# mettre à l'échelle les emplacements de sauvegarde puisque la trame dans laquelle nous avons détecté a été mise à l'échelle à 1/4 de taille
		top *= 4
		right *= 4
		bottom *= 4
		left *= 4
			
		# tracer un carré au tour du visage
		cv2.rectangle(frame, (left, top), (right, bottom), (0, 0, 255), 5)
		
		# étiquette de texte d'entrée avec un nom sous le visage
		cv2.rectangle(frame, (left, bottom - 35), (right, bottom), (0, 0, 255), cv2.FILLED)
		font = cv2.FONT_HERSHEY_DUPLEX
		cv2.putText(frame, name, (left + 6, bottom - 6), font, 1.0, (255, 255, 255), 1)
		
	# afficher l'image résultante
	cv2.imshow('Video', frame)
	
	# Appuyez sur « q » sur le clavier pour quitter !
	if cv2.waitKey(1) & 0xFF == ord('q'):
		break
			
