# humansix test technique
https://github.com/humansix/test-technique

Framwork: Symfony (+twig)

BDD: MySQL (Wamp)

Logiciel: PHPStorm (IntelliJ)

Intallation du projet => à copier/coller dans le Terminal après clone du projet:

composer update

php bin/console doctrine:database:create

php bin/console doctrine:schema:update --force

php bin/console doctrine:fixtures:load
