#!/bin/bash

attempt_counter=0
max_attempts=5

# Migrate db
cd "/var/www"
./flyway validate
exit_status=$?
echo $exit_status 
until [ $exit_status -eq 1 ] || [ $exit_status -eq 0 ]; do
    if [ ${attempt_counter} -eq ${max_attempts} ];then
      echo "Max attempts reached"
      exit 1
    fi
    printf '.'
    attempt_counter=$(($attempt_counter+1))
    sleep 60
    
    echo "Attempt ${attempt_counter}"
	./flyway validate
	exit_status=$?
	echo $exit_status 
done
if [ $exit_status -ne 0 ]; then
	echo "Flyway repairing..."
	./flyway repair
	echo "Flyway migrating..."
	./flyway migrate
fi

chmod 777 /var/www/storage/
chmod 777 /var/www/logs/
rm -rf /tmp/Pluf*
# Run Apcache2 froground application
cd "/var/www/html"
apache2-foreground
