#include <ESP8266HTTPClient.h>
#include <ESP8266WiFi.h>
#include <ArduinoJson.h>
 
void setup() {
 
  Serial.begin(115200);                            //Serial connection
  WiFi.begin("Peerawit-WiFi", "p12345678");   //WiFi connection
 
  while (WiFi.status() != WL_CONNECTED) {  //Wait for the WiFI connection completion
 
    delay(500);
    Serial.println("Waiting for connection");
 
  }
 
}
 
void loop() {
 
  if (WiFi.status() == WL_CONNECTED) { //Check WiFi connection status
 
    StaticJsonBuffer<1000> JSONbuffer;   //Declaring static JSON buffer 
  JsonObject& root = JSONbuffer.createObject();

  JsonArray& valve_0 = root.createNestedArray("valve_0");
  JsonObject& valve_0_obj = valve_0.createNestedObject();
  valve_0_obj["status"] = 1;

  JsonArray& o_node_0 = root.createNestedArray("o_node_0");
  JsonObject& o_node_0_obj = o_node_0.createNestedObject();
  o_node_0_obj["air_temperature"] = 1;
  o_node_0_obj["air_humidity"] = 1;

  JsonArray& node_0 = root.createNestedArray("node_0");
  JsonObject& node_0_obj = node_0.createNestedObject();
  node_0_obj["air_temperature"] = 1;
  node_0_obj["air_humidity"] = 1;
  node_0_obj["soil_moisure"] = 1;
  node_0_obj["soil_temperature"] = 1;

  JsonArray& node_1 = root.createNestedArray("node_1");
  JsonObject& node_1_obj = node_1.createNestedObject();
  node_1_obj["air_temperature"] = 1;
  node_1_obj["air_humidity"] = 1;
  node_1_obj["soil_moisure"] = 1;
  node_1_obj["soil_temperature"] = 1;

  JsonArray& node_2 = root.createNestedArray("node_2");
  JsonObject& node_2_obj = node_2.createNestedObject();
  node_2_obj["air_temperature"] = 1;
  node_2_obj["air_humidity"] = 1;
  node_2_obj["soil_moisure"] = 1;
  node_2_obj["soil_temperature"] = 1;

    char JSONmessageBuffer[1000];
    root.prettyPrintTo(JSONmessageBuffer, sizeof(JSONmessageBuffer));
    Serial.println(JSONmessageBuffer);
 
    HTTPClient http;    //Declare object of class HTTPClient
 
    http.begin("http://smartfarm-api.herokuapp.com/server.php");      //Specify request destination
    http.addHeader("Content-Type", "application/json");  //Specify content-type header
 
    int httpCode = http.POST(JSONmessageBuffer);   //Send the request
    String payload = http.getString();                                        //Get the response payload
 
    Serial.println(httpCode);   //Print HTTP return code
    Serial.println(payload);    //Print request response payload
 
    http.end();  //Close connection
 
  } else {
 
    Serial.println("Error in WiFi connection");
 
  }
 
  delay(20000);  //Send a request every 30 seconds
 
}
