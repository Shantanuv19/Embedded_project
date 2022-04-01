#include<Adafruit_Fingerprint.h>
#include<HardwareSerial.h>
#include <HTTPClient.h>
#include<WiFi.h>

const char* NAME;
int ID;


const String HOST_NAME = "https://shantanuv19.000webhostapp.com";
String PATH_NAME   = "/project/final.php";


const char* ssid = "AndroidAP";
const char* password = "shantanu";

Adafruit_Fingerprint finger = Adafruit_Fingerprint(&Serial2);
void setup()
{
  pinMode(2, OUTPUT);
Serial.begin(115200);
//Serial2.begin(9600);
while (!Serial);
delay(100);
Serial.println("\n\nAdafruit finger detect test");
finger.begin(57600);
delay(5);
if(finger.verifyPassword()){
  Serial.println("Found fingerprint sensor!");
  }else{
    Serial.println("Did not find fingerprint sensor :(");
    while(1){
  delay(1);
  }
}

finger.getTemplateCount();
Serial.print("Sensor contains "); 
Serial.print(finger.templateCount); 
Serial.println("templates");
Serial.println("Waiting for void finger...");
Serial.print("Connecting to: ");
Serial.print(ssid);
WiFi.begin(ssid, password);
int timeout = 10 * 4;
while (WiFi.status() !=WL_CONNECTED && (timeout-- > 0)) {
delay(250);
Serial.print(".");
}
Serial.println("");
if(WiFi.status() !=WL_CONNECTED) {
Serial.println("Failed to connect, going back to sleep");
}
Serial.print("WiFi connected in: ");
Serial.print(millis());
Serial.print(", IP address: ");
Serial.println(WiFi.localIP());
}
void loop(){
getFingerprintIDez();
//Serial.print(a);
if (finger.fingerID) {
  ID=finger.fingerID;
if(finger.confidence >= 60) {
Serial.print("Attendance Marked for ");
makeIFTTTRequest();
}
}
finger.fingerID = 0;
}
uint8_t getFingerprintID() {
uint8_t p = finger.getImage();
  switch (p) {
    case FINGERPRINT_OK:
      Serial.println("Image taken");
      break;
    case FINGERPRINT_NOFINGER:
      Serial.println("No finger detected");
      return p;
    case FINGERPRINT_PACKETRECIEVEERR:
      Serial.println("Communication error");
      return p;
    case FINGERPRINT_IMAGEFAIL:
      Serial.println("Imaging error");
      return p;
    default:
  Serial.println("Unknown error");
      return p;
}

p = finger.image2Tz();
switch (p) {
case FINGERPRINT_OK:
  Serial.println("Image converted");
  break;
case FINGERPRINT_IMAGEMESS:
  Serial.println("Image too messy");
  return p;
case FINGERPRINT_PACKETRECIEVEERR:
  Serial.println("Communication error");
  return p;
case FINGERPRINT_FEATUREFAIL:
  Serial.println("Could not find fingerprint features");
  return p;
case FINGERPRINT_INVALIDIMAGE:
  Serial.println("Could not find fingerprint features");
  return p;
  default:
  Serial.println("Unknown error");
  return p;
}
// OK converted!
p = finger.fingerFastSearch();
if (p == FINGERPRINT_OK) {
  Serial.println("Nound a print match!");
}else if(p==FINGERPRINT_PACKETRECIEVEERR) {
Serial.println("Communication error");
return p;
}else if(p==FINGERPRINT_NOTFOUND) {
Serial.println("Did not find a match");
return p;
}else{
Serial.println("Unknown error");
return p;
}
// found a match!
Serial.print("Found ID #"); 
Serial.print(finger.fingerID);
Serial.print(" with confidence of "); 
Serial.println(finger.confidence);
return finger.fingerID;
}
// returns -1 if failed, otherwise return ID#
int getFingerprintIDez() {
uint8_t p = finger.getImage();
if (p != FINGERPRINT_OK) return -1;

p = finger.image2Tz();
if (p != FINGERPRINT_OK) return -1;

p = finger.fingerFastSearch();
if (p != FINGERPRINT_OK) return -1;
//found a match!
Serial.print("Found ID #"); 
Serial.print(finger.fingerID);
Serial.print("with confidence of "); 
Serial.println(finger.confidence);
return finger.fingerID;
}
//Make an HTTP request to the IFTTT web service
int makeIFTTTRequest(){
  Serial.print(ID);
  String queryString = "?value=";
  Serial.println(" ");
  Serial.print("Connected to WiFi network with server. ");
  //Serial.println(WiFi.localIP());
  
  HTTPClient http;

  http.begin(HOST_NAME + PATH_NAME + queryString + ID); //HTTP
  int httpCode = http.GET();

  // httpCode will be negative on error
  if(httpCode > 0) {
    // file found at server
    if(httpCode == HTTP_CODE_OK) {
      String payload = http.getString();
      Serial.println(payload);
      digitalWrite(2, HIGH);
  delay(1000);
  digitalWrite(2, LOW);
  delay(1000);
  digitalWrite(2, HIGH);
  delay(1000);
  digitalWrite(2, LOW);
    } else {
      // HTTP header has been send and Server response header has been handled
      Serial.printf("[HTTP] GET... code: %d\n", httpCode);
    }
  } else {
    Serial.printf("[HTTP] GET... failed, error: %s\n", http.errorToString(httpCode).c_str());
    return -1;
  }
delay(30000);
  http.end();
}
