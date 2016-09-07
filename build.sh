#!/usr/bin/env bash

if [ $# -eq 0 ]
  then
    tag='latest'
    echo "tag \"latest\" will be used"
  else
    tag=$1
fi

docker build -t dicoming/wkhtmltopdf-ws:$tag .