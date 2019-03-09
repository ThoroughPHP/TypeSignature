# TypeSignature - Type signature generator for PHP

[![Build Status](https://travis-ci.com/ThoroughPHP/TypeSignature.svg?branch=master)](https://travis-ci.com/ThoroughPHP/TypeSignature)
[![Coverage Status](https://coveralls.io/repos/github/ThoroughPHP/TypeSignature/badge.svg)](https://coveralls.io/github/ThoroughPHP/TypeSignature)
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)
[![PHPStan](https://img.shields.io/badge/PHPStan-enabled-brightgreen.svg?style=flat)](https://github.com/phpstan/phpstan)

## Features

Supports following PHP [types](http://php.net/manual/en/language.types.intro.php):

- [boolean](http://php.net/manual/en/language.types.boolean.php)
- [integer](http://php.net/manual/en/language.types.integer.php)
- [float](http://php.net/manual/en/language.types.float.php)
- [string](http://php.net/manual/en/language.types.string.php)
- [array](http://php.net/manual/en/language.types.array.php)

```php
TypeSignature::array('string'); // => 'string[]'
```

- [object](http://php.net/manual/en/language.types.object.php)
- [callable](http://php.net/manual/en/language.types.callable.php)
- [mixed](http://php.net/manual/en/language.pseudo-types.php#language.types.mixed)
- [number](http://php.net/manual/en/language.pseudo-types.php#language.types.number)

```php
TypeSignature::number(); // => 'integer|float|double'
```

- [callback](http://php.net/manual/en/language.pseudo-types.php#language.types.callback)
- [union types](https://ceylon-lang.org/documentation/1.3/tour/types/#union_types)

```php
TypeSignature::union(TypeSignature::integer(), TypeSignature::string()); // => 'integer|string'
```

- [intersection types](https://ceylon-lang.org/documentation/1.3/tour/types/#intersection_types)

```php
TypeSignature::intersection(\ArrayAccess::class, \Countable::class); // => 'ArrayAccess&Countable'
```

- [optional types](http://php.net/manual/en/migration71.new-features.php)

```php
TypeSignature::optional(TypeSignature::string()); => 'string
```

## TODO

- iterable
- [resource](http://php.net/manual/en/language.types.resource.php)