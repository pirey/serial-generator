## Code Generator

Generate code with prefix, usefull for serial id replacement.

```
format of the code is
{prefix} {zeros} {code}

e.g. INV000023, PRD0000032
```

## Installation

```
composer require pirey/code-generator
```

## Usage

```php
<?php

require_once "./vendor/autoload.php";

echo Pirey\CodeGenerator::first('INV') . PHP_EOL;
echo Pirey\CodeGenerator::next('INV000002', 'INV') . PHP_EOL;

// override length
echo Pirey\CodeGenerator::first('PRD', 20) . PHP_EOL;
echo Pirey\CodeGenerator::next('INV000002', 'INV', 30) . PHP_EOL;

// throws InvalidArgumentException when given custom code
echo Pirey\CodeGenerator::next('xf86000ABC', 'INV') . PHP_EOL;
```
