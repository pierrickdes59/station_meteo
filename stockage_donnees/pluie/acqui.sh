#!/bin/bash
let "code = 0"

until [ $code -eq 777 ]; do

sudo /root/433Utils/RPi_utils/./RFSniffer > /root/meteo/pluie/log


code=`cut -c 10-12 /root/meteo/pluie/log`
done
cut -c 13-  /root/meteo/pluie/log | cat
