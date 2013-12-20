#!/bin/bash

mkdir -p var/build

#OS X, prevent ._ files
export COPYFILE_DISABLE=true

tar -cvf var/build/Pulsestorm_Better404.tar app/code/community/Pulsestorm/Better404 app/etc/modules/Pulsestorm_Better404.xml app/design/frontend/base/default/template/pulsestorm_better404