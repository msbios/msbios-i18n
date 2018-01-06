#!/bin/bash

# COLORS
# Reset
Color_Off='\033[0m' # Text Reset

# Regular Colors
Red='\033[0;31m' # Red
Green='\033[0;32m' # Green
Yellow='\033[0;33m' # Yellow
Purple='\033[0;35m' # Purple
Cyan='\033[0;36m' # Cyan

echo "[--------------------------------[`date +%F-%H:%M:%S`]--------------------------]"
echo "     ____.         .___      .__    .__            _____  .__.__                 "
echo "    |    |__ __  __| _/______|  |__ |__| ____     /     \ |__|  |   ____   ______"
echo "    |    |  |  \/ __ |\___   /  |  \|  |/    \   /  \ /  \|  |  | _/ __ \ /  ___/"
echo "/\__|    |  |  / /_/ | /    /|   Y  \  |   |  \ /    Y    \  |  |_\  ___/ \___ \ "
echo "\________|____/\____ |/_____ \___|  /__|___|  / \____|__  /__|____/\___  >____  >"
echo " info[at]msbios.com \/      \/    \/        \/          \/             \/     \/ "

dir=$(pwd);
find $dir -name \*.po -execdir sh -c 'msgfmt "$0" -o `basename $0 .po`.mo' '{}' \;

echo "Done!";