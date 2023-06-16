from machine import Pin, PWM
import network   #import des fonction lier au wifi
import urequests #import des fonction lier au requetes http
import utime #import des fonction lier au temps
import ujson #import des fonction lier aà la convertion en Json

tab = [PWM(Pin(18,mode=Pin.OUT)),PWM(Pin(17,mode=Pin.OUT)), PWM(Pin(16,mode=Pin.OUT))]

for i in tab:
    i.freq(1_000)
    i.duty_u16(255)

def changeColorByRVB(r,g,b):
    tab[0].duty_u16(r*255)
    tab[1].duty_u16(g*255)
    tab[2].duty_u16(b*255)

colortype = {
            "Actualités":(0, 0, 255),
            "Inspiration": (255, 255, 0),
            "Technologie": (128, 128, 128),
            "Cuisine": (255, 0, 0),
            "Art": (138, 43, 226),
            "Voyage": (0, 128, 0),
            "Mode": (255, 105, 180),
            "Sport": (255, 165, 0),
            "Humour": (173, 216, 230),
            "Santé": (144, 238, 144),
            
            }


wlan = network.WLAN(network.STA_IF) # met la raspi en mode client wifi
wlan.active(True) # active le mode client wifi

ssid = 'OrangePro'
password = 'TORRY546KWAZER135000'
wlan.connect(ssid, password) # connecte la raspi au réseau
url = "http://192.168.0.48/renduaxe/getONE.php"

while not wlan.isconnected():
    print("pas co")
    utime.sleep(1)
    pass

blink_interval = 0.01  
is_led_on = True    


while(True):
    try:
        print("GET")
        r = urequests.get(url) # lance une requete sur l'url
        element = (r.json()["tag"]) # traite sa reponse en Json
        print(element)
        print(colortype[element])
        color = (colortype[element])
        changeColorByRVB(color[0],color[1],color[2],)
        r.close() # ferme la demande
        utime.sleep(1)
        
        is_led_on = not is_led_on
        if is_led_on:
            changeColorByRVB(color[0], color[1], color[2])
        else:
            changeColorByRVB(0, 0, 0)
            
        utime.sleep(blink_interval)

    except Exception as e:
        print(e)