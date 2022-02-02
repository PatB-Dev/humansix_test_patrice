# humansix test technique
https://github.com/humansix/test-technique

Framework: Symfony (+twig)

BDD: MySQL (Wamp)

Logiciel: PHPStorm (IntelliJ)

Installation du projet => à copier/coller dans le Terminal dans le dossier du projet:

composer update

php bin/console doctrine:database:create

php bin/console doctrine:schema:update --force

php bin/console doctrine:fixtures:load
