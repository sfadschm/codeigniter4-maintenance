@echo off

echo Running PHPStan ...
call "./vendor/bin/phpstan" analyse

echo.
echo Running Rector ...
call "./vendor/bin/rector" process --clear-cache

echo.
echo Running PHP-CS-Fixer ...
call "./vendor/bin/php-cs-fixer" fix --ansi --verbose --using-cache=no

echo.
echo All checks completed.
pause