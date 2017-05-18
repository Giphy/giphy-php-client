#!/bin/bash

LANG=php
CONFIG=config.json
SRC=public.yaml

swagger-codegen generate \
	-i $SRC \
	-l $LANG \
	-c $CONFIG \
	-o "."

