from machine import Pin
import network   #import des fonction lier au wifi
import urequests #import des fonction lier au requetes http
import utime #import des fonction lier au temps
import ujson #import des fonction lier aà la convertion en Json


def envoie_message():
    post_msg = urequests.post(URL, json=message)
    print("Le message a été envoyé.")
    post_msg.close()
    




URL="http://192.168.0.48/renduaxe/get_button.php"

message = {
    
    "contenu": "Bonjour tout le monde",
    "tagtype": "Santé"
}

#Activation de la connexion
wlan = network.WLAN(network.STA_IF) # met la raspi en mode client wifi
wlan.active(True) # active le mode client wifi
ssid = 'OrangePro'
password = 'TORRY546KWAZER135000'
wlan.connect(ssid, password) # connecte la raspi au réseau

#Initialisation du bouton
pin_button = Pin(14,mode=Pin.IN,pull=Pin.PULL_UP)
print("v=",pin_button.value())
oldState=1

while True:
    utime.sleep(.1)
    
    if pin_button.value() == 0 and oldState == 1:
        envoie_message()
    oldState = pin_button.value()
    utime.sleep(0.1)
    



