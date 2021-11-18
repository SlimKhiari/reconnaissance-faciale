
import face_recognition
import cv2
import numpy as np
import os
import glob

#IMPORTER DES IMAGES 
print("-- importation des images des images --")
faces_encodings = []
faces_names = []
cur_direc = os.getcwd()
path = os.path.join(cur_direc, 'faces/')
list_of_files = [f for f in glob.glob(path+'*.jpg')]
number_files = len(list_of_files)
names = list_of_files.copy()
print("-- opération réussie --")

#FORMER LES VISAGES
print("-- formation des images --")
for i in range(number_files):
    globals()['image_{}'.format(i)] = face_recognition.load_image_file(list_of_files[i])
    globals()['image_encoding_{}'.format(i)] = face_recognition.face_encodings(globals()['image_{}'.format(i)])[0]
    faces_encodings.append(globals()['image_encoding_{}'.format(i)])
# Create array of known names
    names[i] = names[i].replace(cur_direc, "")  
    faces_names.append(names[i])
print("-- opération réussie --")


#RECONNAISSANCE DE VISAGE
print("-- reconnaissance des visages --")
face_locations = []
face_encodings = []
face_names = []
process_this_frame = True
print("-- opération réussie --")

print("-- ouverture de la caméra --")
video_capture = cv2.VideoCapture(0)
print("-- opération réussie --")

while True:

	#saisir une seule image video
	ret, frame = video_capture.read()
	
	#resize frame of video to 1/4 for faster face recoginition processing
	small_frame = cv2.resize(frame, (0, 0), fx=0.25, fy=0.25)
	
	#de BGR color which OpenCV uses à RGB color  which face_recognition uses
	rgb_small_frame = small_frame[:, :, ::-1]
	
	
	if process_this_frame:
			#find all the faces and face encodings in the current frame of video	
			face_locations = face_recognition.face_locations( rgb_small_frame)
			face_encodings = face_recognition.face_encodings( rgb_small_frame, face_locations)
			
			face_names = []
			for face_encoding in face_encodings:
				#see if the face is a match for the current frame of video
				matches = face_recognition.compare_faces (faces_encodings, face_encoding)
				name = "Personne inconnue"
			
				face_distances = face_recognition.face_distance( faces_encodings, face_encoding)
				best_match_index = np.argmin(face_distances)
				if matches[best_match_index]:
					name = faces_names[best_match_index]
				
				face_names.append(name)
			
	process_this_frame = not process_this_frame
	
	# Display the results
	for (top, right, bottom, left), name in zip(face_locations, face_names):
		#scale back up locations since the frame we detected in was scaled to 1/4 size
		top *= 4
		right *= 4
		bottom *= 4
		left *= 4
			
		# Draw a rectangle around the face
		cv2.rectangle(frame, (left, top), (right, bottom), (0, 0, 255), 5)
		
		# Input text label with a name below the face
		cv2.rectangle(frame, (left, bottom - 35), (right, bottom), (0, 0, 255), cv2.FILLED)
		font = cv2.FONT_HERSHEY_DUPLEX
		cv2.putText(frame, name, (left + 6, bottom - 6), font, 1.0, (255, 255, 255), 1)
		
	# Display the resulting image
	cv2.imshow('Video', frame)
	
	# Hit 'q' on the keyboard to quit!
	if cv2.waitKey(1) & 0xFF == ord('q'):
		break
			
