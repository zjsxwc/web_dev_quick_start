A quick startup web app.

使用silex、doctrine ORM、vue来快速进行web app原型开发，站在巨人的肩膀上。

run server `php -S localhost:8199 -t public/`


doctrine
```
vendor/bin/doctrine orm:convert:mapping --force --from-database annotation ./dbSchema/

vendor/bin/doctrine orm:generate-entities ./ --generate-annotations=true

vendor/bin/doctrine orm:schema-tool:drop --force
vendor/bin/doctrine orm:schema-tool:create
Or
vendor/bin/doctrine orm:schema-tool:update --force




php vendor/bin/doctrine-migrations  migrations:generate  --configuration="dbMigration/migrations.yml"  --db-configuration="dbMigration/migrations-db.php"

php vendor/bin/doctrine-migrations   migrations:status   --configuration="dbMigration/migrations.yml"  --db-configuration="dbMigration/migrations-db.php"

php vendor/bin/doctrine-migrations   migrations:migrate --dry-run   --configuration="dbMigration/migrations.yml"  --db-configuration="dbMigration/migrations-db.php"

php vendor/bin/doctrine-migrations   migrations:migrate   --configuration="dbMigration/migrations.yml"  --db-configuration="dbMigration/migrations-db.php"

php vendor/bin/doctrine-migrations   migrations:migrate --no-interaction  --configuration="dbMigration/migrations.yml"  --db-configuration="dbMigration/migrations-db.php"

php vendor/bin/doctrine-migrations   migrations:migrate --write-sql  --configuration="dbMigration/migrations.yml"  --db-configuration="dbMigration/migrations-db.php"

php vendor/bin/doctrine-migrations  help migrations:migrate




```

代码目录是Top目录，composer.json里已经写了
```
"autoload": {
        "psr-4": {
            "Top\\": "Top/"
        }
    },
```

