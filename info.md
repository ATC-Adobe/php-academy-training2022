### nginx configuration
changed location config to <br>
location / { <br>
  &nbsp;  try_files $uri $uri/ /index.php?$args; <br>
}