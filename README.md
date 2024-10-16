# Stringer (String Helper for PHP)

> A string helper for PHP. It includes some useful methods and possibly other features.

Some of the methods from the Str class of the Laravel framework are also included in this library;
however, some of them have been modified.

<hr>

## 🫡 Usage

### 🚀 Installation

You can install the package via composer:

```bash
composer require nabeghe/stringer
```

<hr>

### Str Class

The main class that includes the useful methods is `Nabegh\String\Str`.

#### Example:

```php
use Nabeghe\Stringer\Str;

echo Str::random(32);
echo Str::random(32, '0123456789');
```

<hr>

### UnicodeControls Class

A class that includes some Unicode control characters;
for example, the invisible character, or the right-to-left and left-to-right markers.

```php
use Nabeghe\Stringer\UnicodeControls;

echo UnicodeControls::ISS; // Invisible
```

### Stringer Class

A string class.
Accepts any value, converts it to a string via strval, stores it, and returns it via __toString

```php
use Nabeghe\Stringer\Stringer;

$string = new Stringer('nabeghe/stringer');
echo $string;
```

<hr>

## 📖 License

Copyright (c) 2024 Hadi Akbarzadeh

Licensed under the MIT license, see [LICENSE.md](LICENSE.md) for details.