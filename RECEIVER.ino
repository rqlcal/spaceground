#include <esp_now.h>
#include <WiFi.h>

//PROTOTIPES
void Game_One();
void Light_on();
void Light_off();

//PIN DEF
#define LED 18
#define TRIG 4
#define BUZZER 23

// Global var
uint8_t Master_address[6] = {0xCC, 0xDB, 0xA7, 0x2E, 0x22, 0x18};
uint8_t Receive_flag=0;
uint8_t Received_data='E';

void OnDataSent(const uint8_t *mac_addr, esp_now_send_status_t status) {
  Serial.print("Send Status to ");
  for (int i = 0; i < 6; i++) {
    Serial.print(mac_addr[i], HEX);
    if (i < 5) Serial.print(":");
  }
  Serial.println(status == ESP_NOW_SEND_SUCCESS ? " Success" : " Fail");
}

void OnDataRecv(const esp_now_recv_info *info, const uint8_t *incomingData, int len) {
  Serial.print("Data received from: ");
  for (int i = 0; i < 6; i++) {
    Serial.print(info->src_addr[i], HEX);
    if (i < 5) Serial.print(":");
  }
  
  Serial.println();
  Received_data=incomingData[0];
  Serial.print((char)Received_data);
  Receive_flag=1;
}

void setup() {
  //PIN 
  pinMode(LED, OUTPUT);
  pinMode(TRIG, INPUT);
  pinMode(BUZZER, OUTPUT);

  // Initialize Serial Monitor
  Serial.begin(115200);

  // Set ESP32 as a Wi-Fi station
  WiFi.mode(WIFI_STA);

  // Initialize ESP-NOW
  if (esp_now_init() != ESP_OK) {
    Serial.println("Error initializing ESP-NOW");
    return;
  }

  // Register receive callback
  esp_now_register_recv_cb(OnDataRecv);
  esp_now_register_send_cb(OnDataSent);
  esp_now_peer_info_t peerInfo;
  memcpy(peerInfo.peer_addr, Master_address, 6);
  peerInfo.channel = 0;
  peerInfo.encrypt = false;
  if (esp_now_add_peer(&peerInfo) != ESP_OK) {
      Serial.println("Failed to add peer");
      return;
  }
}

void loop() {
  // Just wait for data
  if(Receive_flag==1)
  {
    Serial.println("if1");
    if(Received_data=='L')
    {
      Serial.println("if2");
      delay(100);
      Game_One();
      Receive_flag=0;
    }
    if(Received_data=='B')
    {
      delay(100);
      Game_Two();
      Receive_flag=0;
    }
  }
}

void Light_on()
{
  digitalWrite(LED, HIGH);
}
void Light_off()
{
  digitalWrite(LED, LOW);
}
void Game_One()
{
  Light_on();
  while(digitalRead(TRIG)!=0){delay(1);}
  const char *message = "OK";
  esp_now_send(Master_address, (uint8_t *)message, strlen(message));
  Light_off();
}
void Game_Two()
{
  analogWrite(BUZZER,64);
  while(digitalRead(TRIG)!=0){delay(1);}
  const char *message = "OK";
  esp_now_send(Master_address, (uint8_t *)message, strlen(message));
  analogWrite(BUZZER,0);
}