import qrcode
# Link for website
import qrcode as qrcode
import random
import string

def getChaineRandom(length):
    """Générer une chaîne aléatoire de longueur fixe"""
    str = string.ascii_lowercase
    return ''.join(random.choice(str) for i in range(length))

input_nom_visiteur="Marouane EL BAROUDI "
input_data=" /// "+getChaineRandom(100)

qr = qrcode.QRCode(
        version=1,
        box_size=10,
        border=5)

qr.add_data(input_nom_visiteur+input_data)
qr.make(fit=True)
img = qr.make_image(fill='black', back_color='white')
imgEnregistrer="QRcode_"+input_nom_visiteur+".png"
img.save(imgEnregistrer)