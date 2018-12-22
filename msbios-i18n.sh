#!/bin/bash

ASCIILOGO = $( cd "$( dirname "${BASH_SOURCE[0]}" )" >/dev/null && pwd )/msbios.sh;

if [-f $ASCIILOGO]; then
    bash $ASCIILOGO;
else
    bash $(pwd)/vendor/bin/msbios.sh
fi

find $(pwd) -name \*.po -execdir sh -c 'msgfmt "$0" -o `basename $0 .po`.mo' '{}' \;
echo "Generate Language Files Done!";