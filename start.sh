#! /bin/bash

INIFILE="$(pwd)/server/server.ini"
DOCROOT="$(pwd)"
HOST=0.0.0.0
PORT=9191

PHP=$(which php)
if [ $? != 0 ] ; then
echo "Unable to find PHP"
exit 1
fi

$PHP -S $HOST:$PORT -c $INIFILE -t $DOCROOT src/web/index.php
