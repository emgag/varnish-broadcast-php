.PHONY: analyse format test

all: analyse format test

analyse:
	vendor/bin/phpstan analyse -l max src/ tests/

format:
	vendor/bin/php-cs-fixer fix

test:
	vendor/bin/phpunit --coverage-text --coverage-clover coverage.xml
