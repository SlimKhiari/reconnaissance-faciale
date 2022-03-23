//Programme Déverrouillage serrure solénoïde 12V

const int RELAY_PIN = A5;  //La Pin A5 de la carte Arduino se connecte sur l'entrée IN de la carte relai

//Fonction d'initialisation
void setup() {

  pinMode(RELAY_PIN, OUTPUT);
}

//Fonction de boucle
void loop() {
  digitalWrite(RELAY_PIN, HIGH); // Déverrouille la serrure
  delay(5000); // Délai de 5s
  digitalWrite(RELAY_PIN, LOW);  // Verrouille la porte
  delay(5000); //Dévérouille la porte
} 
