#!/bin/bash

# Check if gedit is running
# -x flag only match processes whose name (or command line if -f is
# specified) exactly match the pattern. 

if pgrep -f "php artisan queue:work" > /dev/null
then
    echo "Running"
else
    php artisan queue:work  &
fi
