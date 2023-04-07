![PHP Composer](https://github.com/jeyroik/extas-configs/workflows/PHP%20Composer/badge.svg?branch=master)
![codecov.io](https://codecov.io/gh/jeyroik/extas-configs/coverage.svg?branch=master)
<a href="https://codeclimate.com/github/jeyroik/extas-configs/maintainability"><img src="https://api.codeclimate.com/v1/badges/d03eb7574a62ed61bffc/maintainability" /></a>
[![Latest Stable Version](https://poser.pugx.org/jeyroik/extas-configs/v)](//packagist.org/packages/jeyroik/extas-configs)
[![Total Downloads](https://poser.pugx.org/jeyroik/extas-configs/downloads)](//packagist.org/packages/jeyroik/extas-configs)
[![Dependents](https://poser.pugx.org/jeyroik/extas-configs/dependents)](//packagist.org/packages/jeyroik/extas-configs)


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
