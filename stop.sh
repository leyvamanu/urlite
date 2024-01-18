#!/bin/bash

echo "Deteniendo el entorno de desarrollo..."

echo "Deteniendo los contenedores de Docker..."
docker-compose down

echo "Deteniendo el servidor de Symfony..."
symfony server:stop

echo "Todos los servicios han sido detenidos."
