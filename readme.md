## xdebug
port: 9009 <br>
ssh port: 12000 <br>
xdebug tunnel: ssh -R 9009:127.0.0.1:9009 xdebug@<remote-address> -p 12000 <br>
remote project files path /var/www/php <br>
ssh xdebug password (for tunnel): xdebug <br>

### nginx configuration
changed config to <br>
location / { <br>
  &nbsp;  try_files $uri $uri/ /index.php?$args; <br>
} <br>
and persisted to existing nginx image (php_nginx:latest)


### xml, json and csv
saving to them works fine, but data from them is never fetched ot displayed(no joins) <br>
So strategy works just fine (service can save to any of those files and doesn't even know to which one is saving), <br>
but we use default strategy (ReservationRepository) everywhere, so it checks if we can call this method (in case if we use different one) <br>
Also only sql supports joins, and we use relationships e.g. to display reservations owner so changing strategy will break app right now.

### autoloading
autoload.php requires types.php file in root folder
