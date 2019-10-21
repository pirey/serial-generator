## Code Generator

Generate code with prefix, usefull for serial id replacement.

```
format of the code is
{prefix} {zeros} {code}

e.g. INV000023, PRD0000032
```

## Usage

```
<?php

require_once "./vendor/autoload.php";

echo CodeGenerator\Generator::first('INV') . PHP_EOL;
echo CodeGenerator\Generator::next('INV000002', 'INV') . PHP_EOL;
```
