A quick startup web app.

使用silex、doctrine ORM、vue来快速进行web app原型开发，站在巨人的肩膀上。

run server `php -S localhost:8199 -t public/`

代码目录是Top目录，composer.json里已经写了
```
"autoload": {
        "psr-4": {
            "Top\\": "Top/"
        }
    },
```

关于dbschema类生成，大部分情况下通过在开发环境用phpmyadmin等可视化数据库客户端里建好表，然后我们通过orm:convert:mapping这类命令导出表结构为php的dbschema类，然后把这些类分享给别人。

doctrine
```
#数据库表结构导入导出相关
vendor/bin/doctrine orm:convert:mapping --force --from-database annotation ./dbSchema/

vendor/bin/doctrine orm:generate-entities ./ --generate-annotations=true


vendor/bin/doctrine orm:schema-tool:drop --force
vendor/bin/doctrine help orm:schema-tool:create
vendor/bin/doctrine orm:schema-tool:create
Or
vendor/bin/doctrine orm:schema-tool:update --force



#数据迁移相关
php vendor/bin/doctrine-migrations  migrations:generate  --configuration="dbMigration/migrations.yml"  --db-configuration="dbMigration/migrations-db.php"

php vendor/bin/doctrine-migrations   migrations:status   --configuration="dbMigration/migrations.yml"  --db-configuration="dbMigration/migrations-db.php"

php vendor/bin/doctrine-migrations   migrations:migrate --dry-run   --configuration="dbMigration/migrations.yml"  --db-configuration="dbMigration/migrations-db.php"

php vendor/bin/doctrine-migrations   migrations:migrate   --configuration="dbMigration/migrations.yml"  --db-configuration="dbMigration/migrations-db.php"

php vendor/bin/doctrine-migrations   migrations:migrate --no-interaction  --configuration="dbMigration/migrations.yml"  --db-configuration="dbMigration/migrations-db.php"

php vendor/bin/doctrine-migrations   migrations:migrate --write-sql  --configuration="dbMigration/migrations.yml"  --db-configuration="dbMigration/migrations-db.php"

php vendor/bin/doctrine-migrations  help migrations:migrate



# migrations:diff --filter-expression[=FILTER-EXPRESSION] , $this->addSql('ALTER TABLE users ADD test VARCHAR(255) NOT NULL');



```



