### nginx configuration
changed config to <br>
location / { <br>
  &nbsp;  try_files $uri $uri/ /index.php?$args; <br>
} <br>
and persisted to existing nginx image (php_nginx:latest)