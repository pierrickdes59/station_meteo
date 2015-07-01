#!/bin/bash
let "code = 0"

until [ $code -eq 999 ]; do

sudo /root/433Utils/RPi_utils/./RFSniffer > /root/meteo/temperature/log
code=`cut -c 10-12 /root/meteo/temperature/log`
done
cut -c 13-  /root/meteo/temperature/log | cat
