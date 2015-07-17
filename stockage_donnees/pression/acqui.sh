#!/bin/bash
let "code = 0"

until [ $code -eq 666 ]; do

sudo /root/433Utils/RPi_utils/./RFSniffer > /root/meteo/pression/log


code=`cut -c 10-12 /root/meteo/pression/log`
done
cut -c 13-  /root/meteo/pression/log | cat
