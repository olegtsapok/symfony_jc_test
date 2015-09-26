# symfony_jc_test

Installation

1) Create database in your mysql server
2) Update database settings in app/config/patameters.php
3) import DB from dump/symfony_test.sql or run "php app/console doctrine:schema:create"
4) Run "composer update" for getting all needed vendors
5) Setup web host with root directory in "web" or run "php app/console server:run"
6) On index page use navigation to all entities and rest api