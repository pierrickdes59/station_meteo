#!/bin/bash
let "code = 0"

until [ $code -eq 555 ]; do

sudo /root/433Utils/RPi_utils/./RFSniffer > /root/meteo/humidite/log


code=`cut -c 10-12 /root/meteo/humidite/log`
done
cut -c 13-  /root/meteo/humidite/log | cat
