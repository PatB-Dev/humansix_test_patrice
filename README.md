# humansix_test_patrice
https://github.com/humansix/test-technique

intallation du projet => à copier/coller dans le Terminal:

composer update

php bin/console doctrine:database:create

php bin/console doctrine:schema:update --force

php bin/console doctrine:fixtures:load
