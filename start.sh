#!/bin/bash

echo "Iniciando el entorno de desarrollo..."

echo "Arrancando los contenedores de Docker..."
docker-compose up -d

echo "Arrancando el servidor de Symfony..."
symfony server:start -d

echo "Arrancando Webpack Encore..."
npm run dev-server &

echo "Entorno de desarrollo iniciado."

# Esperar un poco para asegurarse de que el servidor está en funcionamiento
sleep 5

# Abrir el navegador con la URL del servidor Symfony usando Symfony CLI
echo "Abriendo el navegador..."
symfony open:local
