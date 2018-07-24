install:
	composer install
lint:
	vendor/bin/phpcs -- --standard=PSR2 src bin tests
test:
	vendor/bin/phpunit tests/
