# Php Flash Messages

Simple PHP Flash Message for Lumen, Slim Frameworks

## Install

Via Composer

``` bash
$ composer require sarin/flash
```

## Usage

```php
$flash = new \Sarin\Flash\Messages();

// Add flash message
$flash->add($key, $message);

// Check if flash messages exists for key
$flash->has($key);

// Get flash messages by key
$flash->get($key);

// Get all flash messages
$flash->getAll();

```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
