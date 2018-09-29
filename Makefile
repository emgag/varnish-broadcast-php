.PHONY: csfix test

all: cs-fixer test

cs-fixer:
	php-cs-fixer fix --config .php_cs

test:
	vendor/bin/phpunit --coverage-text --coverage-clover coverage.xml
