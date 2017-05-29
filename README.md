# TMBC
A comment system for a website.

## Stack

Laravel 5.4 + VueJS + Docker + LAMP

## Install

See install steps: [INSTALL](INSTALL.md)

## Testing

I used PHPUnit for Unit/Feature tests and Dusk for Browser testing

``` bash
$ composer test # All tests
$ composer test-unit
$ composer test-feature
$ composer test-browser
```

Browser testing :

http://g.recordit.co/TCDXgdax9A.gif

## Code quality

I used PHP Code Sniffer to check code quality:

``` bash
$ composer check-style
$ composer fix-style
```

## Database and Seeding

To init database/tables and adding some data:

``` bash
$ php artisan migrate:refresh --seed
```
