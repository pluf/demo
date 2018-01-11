#!/bin/bash

cd vendor/pluf

for file in `find . -maxdepth 1 -mindepth 1 -type d`
do
	package=`basename $file`
	rm -fR "$file"
	ln -s ~/git/pluf/${package}
	echo "$package		.......................[ok]"
done
