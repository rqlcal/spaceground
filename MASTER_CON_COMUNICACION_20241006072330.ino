#include <esp_now.h>
#include <WiFi.h>
#include <WebServer.h>

//Global Var
uint8_t Received_Mac[6] = {0};
uint8_t R_flag=0;
uint8_t Win_loose=0;

//PIN DEF
int redPin = 25;    // Conecta el pin rojo a GPIO25
int greenPin = 26;  // Conecta el pin verde a GPIO26
int bluePin = 27;   // Conecta el pin azul a GPIO27
#define TRIG 4
#define BUZZER 23
//COMUNIACION WEB
const char* ssid = "Bazinga";
const char* password = "holiiii1";
WebServer server(80);

int devices=2;
// Array to store slave MAC addresses (up to 10 devices)
uint8_t slaveAddresses[2][6] = {
    {0xE0, 0x5A, 0x1B, 0xCB, 0x1F, 0x9C}, // Slave 1
    {0xA0, 0xB7, 0x65, 0xF4, 0x4D, 0xFC}, // Slave 2
    // Add other slave MAC addresses here...
};

void ejecutarFuncion(char caracter) {
  Serial.println("Recibido en Funcion");
  Serial.println(caracter);
  if (caracter == 'a') {
    wifi_disconect();
    delay(100);
    Game_One();
  } else if (caracter == 'b') {
    wifi_disconect();
    delay(100);
    Game_Two();
  } else {
    Win_loose = -1;  // Si no se reconoce el carácter
  }
}

void handleClient() {
  // Permitir solicitudes CORS
  server.sendHeader("Access-Control-Allow-Origin", "*");

  if (server.hasArg("caracter")) {
    String caracter = server.arg("caracter");
    ejecutarFuncion(caracter.charAt(0));  // Ejecuta la función con el primer carácter
    //server.send(200, "text/plain", String(Win_loose));  // Enviar el resultado al cliente
  }
}


// Callback when data is sent
void OnDataSent(const uint8_t *mac_addr, esp_now_send_status_t status) {
  Serial.print("Send Status to ");
  for (int i = 0; i < 6; i++) {
    Serial.print(mac_addr[i], HEX);
    if (i < 5) Serial.print(":");
  }
  Serial.println(status == ESP_NOW_SEND_SUCCESS ? " Success" : " Fail");
}

// Callback when data is received
void OnDataRecv(const esp_now_recv_info *info, const uint8_t *incomingData, int len) {
  R_flag=1;
  Serial.print("Data received from: ");
  for (int i = 0; i < 6; i++) {
    Received_Mac[i]=info->src_addr[i];
    Serial.print(info->src_addr[i], HEX);
    if (i < 5) Serial.print(":");
  }
  Serial.println();
  // Print received message
  Serial.print("Message: ");
  Serial.println((char *)incomingData);
}

void setup() {
  // Initialize Serial Monitor
  Serial.begin(115200);

  // Set ESP32 as a Wi-Fi station
  WiFi.mode(WIFI_STA);
  // Iniciar el servidor y definir la ruta
  server.on("/enviar", handleClient);
  server.begin();
  Serial.println("Servidor web iniciado!");

  // Pinmode
  pinMode(redPin, OUTPUT);
  pinMode(greenPin, OUTPUT);
  pinMode(bluePin, OUTPUT);
  pinMode(BUZZER, OUTPUT);
  pinMode(TRIG, INPUT);

  wifi_connect();
}

void loop() {
  server.handleClient();
}

void Game_One()
{
  int random_module=0;
  int max_level=8;
  int base_delay=5000.0;
  unsigned long delayer=0;
  int level=0;
  for(level=1; level<=max_level; level++)
  {
    randomSeed(esp_random());
    delayer=base_delay*pow(0.8,level-1);
    random_module=(random(1,4));
    //random_module=2;
    LED_ON(random_module);
    unsigned long start=millis();
    if(random_module==3)
    {
      while(digitalRead(TRIG)==1){delay(1);}
      setColor(0,0,0);
      if(millis()-start>delayer)
      {
        Serial.println("Loose");
        Win_loose=0; //loose
        R_flag=0;
        break;
      }
    else
    {
      Serial.println("Win");
      Win_loose=1; //Win
      R_flag=0;
      delay(1000);
    }
    }
    else
    {
    while(R_flag==0){delay(1);}
    if(millis()-start>delayer)
      {
        Serial.println("Loose");
        Win_loose=0; //loose
        R_flag=0;
        break;
      }
    else
    {
      Serial.println("Win");
      Win_loose=1; //Win
      R_flag=0;
      delay(1000);
    }
    }
  }
  if(Win_loose==0)
    {
      Serial.print("Level Failed ");
      Serial.println(level);
    }
    else
    {
      Serial.print("Game Win ");
      Serial.println(level);
    }
}
void Game_Two()
{
  int random_module=0;
  int max_level=8;
  int base_delay=5000.0;
  unsigned long delayer=0;
  int level=0;
  for(level=1; level<=max_level; level++)
  {
    randomSeed(esp_random());
    delayer=base_delay*pow(0.8,level-1);
    random_module=(random(1,4));
    //random_module=2;
    BUZZER_ON(random_module);
    unsigned long start=millis();
    if(random_module==3)
    {
      while(digitalRead(TRIG)==1){delay(1);}
      analogWrite(BUZZER,0);
      if(millis()-start>delayer)
      {
        Serial.println("Loose");
        Win_loose=0; //loose
        R_flag=0;
        break;
      }
    else
    {
      Serial.println("Win");
      Win_loose=1; //Win
      R_flag=0;
      delay(1000);
    }
    }
    else
    {
    while(R_flag==0){delay(1);}
    if(millis()-start>delayer)
      {
        Serial.println("Loose");
        Win_loose=0; //loose
        R_flag=0;
        break;
      }
    else
    {
      Serial.println("Win");
      Win_loose=1; //Win
      R_flag=0;
      delay(1000);
    }
    }
  }
  if(Win_loose==0)
    {
      Serial.print("Level Failed ");
      Serial.println(level);
    }
    else
    {
      Serial.print("Game Win ");
      Serial.println(level);
    }
}
void LED_ON(int module)
{
  char* message="L";
  if(module==1)
  {
    esp_now_send(slaveAddresses[0], (uint8_t *) message, sizeof(message));
  }
  else if(module==2)
  {
    esp_now_send(slaveAddresses[1], (uint8_t *) message, sizeof(message));
  }
  else if(module==3)
  {
    setColor(255,255,0);
  }
}
void setColor(int red, int green, int blue) {
  analogWrite(redPin, red);
  analogWrite(greenPin, green);
  analogWrite(bluePin, blue);
}
void BUZZER_ON(int module)
{
  char* message="B";
  if(module==1)
  {
    esp_now_send(slaveAddresses[0], (uint8_t *) message, sizeof(message));
  }
  else if(module==2)
  {
    esp_now_send(slaveAddresses[1], (uint8_t *) message, sizeof(message));
  }
  else if(module==3)
  {
    analogWrite(BUZZER,64);
  }
}
void wifi_connect()
{
    // Conectar a la red WiFi
  WiFi.begin(ssid, password);
  while (WiFi.status() != WL_CONNECTED) {
    delay(1000);
    Serial.println("Conectando a WiFi...");
  }
  Serial.println("Conectado a WiFi!");

  Serial.println("Conectado a WiFi!");
  Serial.print("Dirección IP del ESP32: ");
  Serial.println(WiFi.localIP());  // Aquí se imprime la IP local del ESP32
}

void wifi_disconect() 
{
  // Desconectar de cualquier red Wi-Fi
  WiFi.disconnect(true);  
  delay(100);  // Espera un momento para asegurar que la desconexión sea efectiva

  // Apagar el Wi-Fi completamente
  WiFi.mode(WIFI_OFF);
  delay(100);  // Espera para asegurar que el Wi-Fi se apague

  // Configurar el Wi-Fi en modo estación
  WiFi.mode(WIFI_STA);
  delay(100);  // Espera un momento antes de inicializar ESP-NOW

  // Inicializar ESP-NOW
  if (esp_now_init() != ESP_OK) {
    Serial.println("Error initializing ESP-NOW");
    return;
  }

  // Añadir peers (todos los dispositivos esclavos)
  for (int i = 0; i < devices; i++) {
    esp_now_peer_info_t peerInfo;
    memset(&peerInfo, 0, sizeof(peerInfo)); // Limpiar estructura de peerInfo
    memcpy(peerInfo.peer_addr, slaveAddresses[i], 6);
    peerInfo.channel = 0;  // Usar canal predeterminado
    peerInfo.encrypt = false; // Sin cifrado

    // Añadir peer
    if (esp_now_add_peer(&peerInfo) != ESP_OK) {
      Serial.println("Failed to add peer");
      return;  // Salir si hay un error al añadir el peer
    }
  }

  Serial.println("Wi-Fi apagado y ESP-NOW inicializado correctamente.");
}