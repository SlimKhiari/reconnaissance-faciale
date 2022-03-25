import qrcode

qr = qrcode.QRCode(
    version=1,
    error_correction=qrcode.constants.ERROR_CORRECT_L, #other contstants (M, Q, H)
    box_size=10,
    border=4,
)

qr.add_data('http://192.168.43.228/gestion-visiteur/formulaire_visiteur.php')
qr.make(fit=True)

img = qr.make_image(fill_color='black', back_color='white')
img.save('OpenWebSite_QRcode.png')
