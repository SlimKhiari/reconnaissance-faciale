Cette application a été développer en php +5.1, sur le serveur wamp 3.2.6
formulaire_visiteur.php : ce fichier permet à les differents visiteurs à effectuer leurs demande pour entrer au batiment.
index.php : ce fichier comporte une page de connexion dédié au personne d'acceuil pour s'authentifier.
home.php: à travers ce fichier, la personne d'accueil peut gerer les differents demandes envoyés par les visiteurs, si la demande a été accepter ou rejeter, un mail automatique sera envoyé au visiteur pour lui informer.
Et pour réaliser cette tache d'envoie des mails automatique, il vous suffit juste de faire quelque petite modification sur le fichier php.ini (C:\wamp64\bin\apache\apache2.4.51\bin) et le fichier sendmail.ini (C:\wamp64\sendmail).

pour sendmail.ini:
smtp_server=smtp.gmail.com
smtp_port=587
error_logfile=error.log
debug_logfile=debug.log
auth_username=VotreGmailId@gmail.com
auth_password=Votre-MotDePasse-Gmail
force_sender=VotreGmailId@gmail.com(optionnel)

pour le php.ini :

SMTP=smtp.gmail.com
smtp_port=587
sendmail_from = VotreGmailId@gmail.com
sendmail_path = "\"C:\wamp64\sendmail\sendmail.exe\" -t"
