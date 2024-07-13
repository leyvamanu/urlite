#!/bin/bash

# Detectar el sistema operativo
OS="$(uname -s)"
case "${OS}" in
    Linux*)     machine=Linux;;
    Darwin*)    machine=Mac;;
    CYGWIN*|MINGW32*|MSYS*|MINGW*) machine=Windows;;
    *)          machine="UNKNOWN:${OS}"
esac

echo "Sistema operativo detectado: ${machine}"

# Comandos para Linux
if [ "${machine}" = "Linux" ]; then
    phpstorm . &
    docker-compose up -d
    symfony server:start -d
    symfony open:local
    npm run dev-server
# Comandos para Windows
elif [ "${machine}" = "Windows" ]; then
    start PhpStorm.cmd .
    docker-compose up -d
    symfony server:start -d
    symfony open:local
    npm run dev-server
else
    echo "Sistema operativo no soportado"
    exit 1
fi