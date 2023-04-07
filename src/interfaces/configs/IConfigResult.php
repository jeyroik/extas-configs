<?php
namespace extas\interfaces\configs;

use jeyroik\interfaces\IHaveAttributes;

interface IConfigResult extends IHaveAttributes
{
    public const FIELD__ERROR = 'error';
    public const FIELD__STATUS = 'status';
    public const FIELD__VALUE = 'value';

    public const STATUS__SUCCESS = 'success';
    public const STATUS__FAIL = 'fail';

    public function setError(string $message, int $code): static;
    public function setStatus(string $status): static;
    public function setValue(mixed $value): static;

    public function getError(): array;
    public function getStatus(): string;
    public function getValue(): mixed;

    public function hasError(): bool;
}
