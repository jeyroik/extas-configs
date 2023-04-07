<?php
namespace extas\components\configs;

use jeyroik\components\THasAttributes;
use extas\interfaces\configs\IConfigDispatcher;
use extas\interfaces\configs\IConfigResult;

abstract class ConfigDispatcher implements IConfigDispatcher
{
    use THasAttributes;

    public function __invoke(): IConfigResult
    {
        return $this->createFailResult('Dispatcher not implemented yet', 400);
    }

    protected function createFailResult(string $message, int $code): IConfigResult
    {
        $result = new ConfigResult([]);
        $result->setStatus($result::STATUS__FAIL);
        $result->setError($message, $code);

        return $result;
    }

    protected function createSuccessResult(mixed $value): IConfigResult
    {
        $result = new ConfigResult([]);
        $result->setStatus($result::STATUS__SUCCESS);
        $result->setValue($value);

        return $result;
    }
}
