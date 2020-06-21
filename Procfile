release: composer install && npm install && composer prepare && php bin/console cache:clear && php bin/console cache:warmup
web: heroku-php-apache2 public/