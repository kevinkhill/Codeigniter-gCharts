#!/bin/bash

TARGET="/cygdrive/c/xampp/htdocs/sandbox/test/application/"
cd /cygdrive/c/xampp/htdocs/Codeigniter-gCharts

cp -r config/ $TARGET
cp -r controllers/ $TARGET
cp -r helpers/ $TARGET
cp -r libraries/ $TARGET
cp -r views/ $TARGET
