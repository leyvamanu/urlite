#!/bin/bash

echo "Deteniendo el entorno de desarrollo..."

echo "Deteniendo los contenedores de Docker..."
docker-compose down

echo "Deteniendo el servidor de Symfony..."
symfony server:stop

echo "Deteniendo Webpack Encore..."
# Aquí necesitarás encontrar el proceso de Webpack y matarlo.
# Esto puede variar dependiendo de cómo se esté ejecutando Webpack.
# Un enfoque simple es usar pkill para matar el proceso por nombre, por ejemplo:
pkill -f "encore"

echo "Todos los servicios han sido detenidos."
