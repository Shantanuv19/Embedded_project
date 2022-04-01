/*
 * This ESP32 code is created by esp32io.com
 *
 * This ESP32 code is released in the public domain
 *
 * For more detail (instruction and wiring diagram), visit https://esp32io.com/tutorials/esp32-mysql
 */

#include <WiFi.h>
#include <HTTPClient.h>

const char WIFI_SSID[] = "AndroidAP";
const char WIFI_PASSWORD[] = "shantanu11";
 
const String HOST_NAME = "https://shantanuv19.000webhostapp.com";
//const String HOST_NAME = String HOST_NAME = tring HOST_NAME = ring HOST_NAME = ing HOST_NAME = ng HOST_NAME = g HOST_NAME =  HOST_NAME = HOST_NAME = OST_NAME = ST_NAME = T_NAME = _NAME = NAME = AME = "ME = "hE = "ht = "htt= "http "https://shantanuv19.000webhostapp.com"; // change to your PC's IP address
String PATH_NAME   = "/project/final.php";
String queryString = "?value=5";

void setup() {
  Serial.begin(9600); 

  WiFi.begin(WIFI_SSID, WIFI_PASSWORD);
  Serial.println("Connecting");
  while(WiFi.status() != WL_CONNECTED) {
    delay(5000);
    Serial.print(".");
  }

}

void loop() {
    Serial.println(" ");
  Serial.print("Connected to WiFi network with server. ");
  //Serial.println(WiFi.localIP());
  
  HTTPClient http;

  http.begin(HOST_NAME + PATH_NAME + queryString); //HTTP
  int httpCode = http.GET();

  // httpCode will be negative on error
  if(httpCode > 0) {
    // file found at server
    if(httpCode == HTTP_CODE_OK) {
      String payload = http.getString();
      Serial.println(payload);
    } else {
      // HTTP header has been send and Server response header has been handled
      Serial.printf("[HTTP] GET... code: %d\n", httpCode);
    }
  } else {
    Serial.printf("[HTTP] GET... failed, error: %s\n", http.errorToString(httpCode).c_str());
  }
delay(30000);
  http.end();
}
