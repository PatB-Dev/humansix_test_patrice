# humansix_test_patrice
Terminal:

composer update

php bin/console doctrine:database:create

php bin/console doctrine:schema:update --force

php bin/console doctrine:fixtures:load
