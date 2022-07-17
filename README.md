## Serial Generator

Generate code with prefix, usefull for serial id replacement.

```
format of the code is
{prefix} {zeros} {code}

e.g. INV000023, PRD0000032
```

## Installation

```
composer require pirey/serial-generator
```

## Usage

```php
<?php

require_once "./vendor/autoload.php";

echo Pirey\SerialGenerator::first('INV') . PHP_EOL; // INV0000001
echo Pirey\SerialGenerator::next('INV000002', 'INV') . PHP_EOL; // INV000003

// override length
echo Pirey\SerialGenerator::first('PRD', 5) . PHP_EOL; // PRD01
echo Pirey\SerialGenerator::next('INV00002', 'INV', 6) . PHP_EOL; // INV003

// throws InvalidArgumentException when given custom code
echo Pirey\SerialGenerator::next('xf86000ABC', 'INV') . PHP_EOL;
```
