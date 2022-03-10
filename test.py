from nanpy import ArduinoApi, SerialManager
from time import sleep                       # Importation fonction sleep()

port = SerialManager(device='COM3')          # Sélection du port série à modifier
uno = ArduinoApi(connection=port)            # Déclaration de la carte Arduino Uno

pinLed = 1                                  # Led branchée sur broche 3
uno.pinMode(pinLed, uno.OUTPUT)              # Broche Led en sortie

for i in range(100):                   # Boucle : répéter 100 fois
   uno.digitalWrite(pinLed, 0)         # Led éteinte
   sleep(1)                            # Attendre 1 s
   uno.digitalWrite(pinLed, 1)         # Led allumée
   sleep(1)                            # Attendre 1 s