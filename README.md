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

echo Pirey\SerialGenerator::first('INV') . PHP_EOL;
echo Pirey\SerialGenerator::next('INV000002', 'INV') . PHP_EOL;

// override length
echo Pirey\SerialGenerator::first('PRD', 20) . PHP_EOL;
echo Pirey\SerialGenerator::next('INV000002', 'INV', 30) . PHP_EOL;

// throws InvalidArgumentException when given custom code
echo Pirey\SerialGenerator::next('xf86000ABC', 'INV') . PHP_EOL;
```
