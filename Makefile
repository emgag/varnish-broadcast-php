.PHONY: csfix test

all: cs-fixer test

cs-fixer:
	php-cs-fixer fix --rules=\@Symfony src/
	php-cs-fixer fix --rules=\@Symfony tests/

test:
	vendor/bin/phpunit --coverage-text --coverage-clover coverage.xml
