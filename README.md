# Stringer (String Helper for PHP ≥ 7.4) 

> A string helper for PHP. It includes some useful methods and possibly other features.

Some of the methods from the Str class of the Laravel framework are also included in this library;
however, some of them have been modified.

## 🫡 Usage

### 🚀 Installation

You can install the package via composer:

```bash
composer require nabeghe/stringer
```

### Str Class

The main class that includes the useful methods is `Nabegh\String\Str`.

#### Example:

```php
use Nabeghe\Stringer\Str;

echo Str::random(32);
echo Str::random(32, '0123456789');
```

### UnicodeControls Class

A class that includes some Unicode control characters;
for example, the invisible character, or the right-to-left and left-to-right markers.

```php
use Nabeghe\Stringer\UnicodeControls;

echo UnicodeControls::ISS; // Invisible
```

### Stringer Class

A string class.

Accepts any value, converts it to a string via strval, stores it, and returns it via __toString.

It is possible to access the methods of the `Str` class through the `Stringer` object as well, with the difference that the main text parameter is no longer present.

```php
use Nabeghe\Stringer\Stringer;

$string = new Stringer('In programming, a string is a sequence of characters, and string manipulation processes these characters.');
echo $string->after('string ')->before(','); // `is a sequence of characters`
```

## 📖 License

Licensed under the MIT license, see [LICENSE.md](LICENSE.md) for details.