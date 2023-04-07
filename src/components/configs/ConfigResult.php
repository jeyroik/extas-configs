<?php
namespace extas\components\configs;

use jeyroik\components\THasAttributes;
use extas\interfaces\configs\IConfigResult;

class ConfigResult implements IConfigResult
{
    use THasAttributes;

    public function hasError(): bool
    {
        $error = $this->getError();

        return $error[0] ? true : false;
    }

    public function getError(): array
    {
        return $this->attributes[static::FIELD__ERROR] ?? ['', 0];
    }

    public function getStatus(): string
    {
        return $this->attributes[static::FIELD__STATUS] ?? '';
    }

    public function getValue(): mixed
    {
        return $this->attributes[static::FIELD__VALUE] ?? null;
    }

    public function setError(string $message, int $code): static
    {
        $this->attributes[static::FIELD__ERROR] = [$message, $code];

        return $this;
    }

    public function setStatus(string $status): static
    {
        $this->attributes[static::FIELD__STATUS] = $status;

        return $this;
    }

    public function setValue(mixed $value): static
    {
        $this->attributes[static::FIELD__VALUE] = $value;

        return $this;
    }
}
