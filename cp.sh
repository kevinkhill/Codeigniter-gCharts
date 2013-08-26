#!/bin/bash

echo "Copying Codeigniter-gCharts into $1"
sleep 1

if [[ -d "$1" ]]
then
    cp -vr ./config/* $1
    cp -vr ./controllers/* $1
    cp -vr ./helpers/* $1
    cp -vr ./libraries/* $1
    cp -vr ./views/* $1
else
    echo "$1 is invalid, target must be a directory"
fi