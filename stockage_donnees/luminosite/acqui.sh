#!/bin/bash
let "code = 0"

until [ $code -eq 888 ]; do

sudo /root/433Utils/RPi_utils/./RFSniffer > /root/meteo/luminosite/log


code=`cut -c 10-12 /root/meteo/luminosite/log`
done
cut -c 13-  /root/meteo/luminosite/log | cat
