![PHP Composer](https://github.com/jeyroik/extas-configs/workflows/PHP%20Composer/badge.svg?branch=master)
![codecov.io](https://codecov.io/gh/jeyroik/extas-configs/coverage.svg?branch=master)

[![Latest Stable Version](https://poser.pugx.org/jeyroik/extas-configs/v)](//packagist.org/packages/jeyroik/extas-jsonrpc)
[![Total Downloads](https://poser.pugx.org/jeyroik/extas-configs/downloads)](//packagist.org/packages/jeyroik/extas-jsonrpc)
[![Dependents](https://poser.pugx.org/jeyroik/extas-configs/dependents)](//packagist.org/packages/jeyroik/extas-jsonrpc)


# extas-configs

Библиотека для стандартизации API по обработке конфигов, т.е. когда на основании конфигурации надо либо что-то сделать, либо создать какой-то объект.

Принцип работы с библиотекой:

```php

use jeyroik\components\configs\ConfigDispatcher;
use jeyroik\components\THasAttributes;

class MyDispatcher extends ConfigDispatcher
{
    public function __invoke(): IConfigResult
    {
        // Разбираем конфиг.
        ...

        // Конструируем и возвращаем результат
        return $this->createSuccessResult(...);
    }
}

// где-то в коде

$cfg = [...];
$dispatcher = new MyDispatcher($cfg);
$result = $dispatcher();

if ($result->hasError()) {
    list($message, $code) = $result->getError();
} else {
    return $result->getValue(); // то, что получилось после разбора конфигурации
}
```
