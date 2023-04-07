<?php

use extas\components\configs\ConfigDispatcher;
use extas\interfaces\configs\IConfigResult;
use PHPUnit\Framework\TestCase;

class ConfigDispatcherTest extends TestCase
{
    public function testDefault()
    {
        $my = new class extends ConfigDispatcher {};

        $result = $my();
        $this->assertInstanceOf(IConfigResult::class, $result);
        $this->assertTrue($result->hasError());

        list($msg, $code) = $result->getError();
        $this->assertEquals('Dispatcher not implemented yet', $msg);
        $this->assertEquals(400, $code);
    }

    public function testStatuses()
    {
        $my = new class extends ConfigDispatcher {
            public function __invoke(): IConfigResult
            {
                return $this->createFailResult('some error', 100);
            }
        };

        $this->assertEquals(IConfigResult::STATUS__FAIL, $my()->getStatus());

        $my = new class extends ConfigDispatcher {
            public function __invoke(): IConfigResult
            {
                return $this->createSuccessResult(true);
            }
        };

        $this->assertEquals(IConfigResult::STATUS__SUCCESS, $my()->getStatus());
        $this->assertTrue($my()->getValue());
    }
}
