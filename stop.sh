#!/bin/bash

echo "Deteniendo el entorno de desarrollo..."
docker-compose stop
symfony server:stop