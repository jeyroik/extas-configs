<?php
namespace extas\interfaces\configs;

use jeyroik\interfaces\IHaveAttributes;

interface IConfigDispatcher extends IHaveAttributes
{
    public function __invoke(): IConfigResult;
}
