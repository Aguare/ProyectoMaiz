#!/bin/bash
echo "Eliminando el archivo si existe"
if [ -e /var/www/html/corn_project ]
then
	echo "La carpeta existe y se borra"
    sudo rm -rf /var/www/html/corn_project
fi

echo "Copiando la carpeta a /var/www/html/"
sudo cp -r corn_project /var/www/html/

echo "Proceso finalizado"
