#!/bin/bash

echo "Iniciando el entorno de desarrollo..."

echo "Arrancando los contenedores de Docker..."
docker-compose up -d

echo "Arrancando el servidor de Symfony..."
symfony server:start -d

echo "Abriendo el navegador..."
symfony open:local

echo "Arrancando Webpack Encore..."
npm run dev-server