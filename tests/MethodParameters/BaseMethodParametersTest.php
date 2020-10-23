<?php

declare(strict_types=1);

namespace Royalcms\Laravel\JsonRpcServer\Tests\MethodParameters;

use Royalcms\Laravel\JsonRpcServer\Tests\AbstractTestCase;
use Royalcms\Laravel\JsonRpcServer\MethodParameters\BaseMethodParameters;

/**
 * @covers \Royalcms\Laravel\JsonRpcServer\MethodParameters\BaseMethodParameters<extended>
 */
class BaseMethodParametersTest extends AbstractTestCase
{
    /**
     * @return void
     */
    public function testParse(): void
    {
        $parameters = new BaseMethodParameters;
        $params     = ['foo' => 'bar', 'bar' => 'foo'];
        $parameters->parse($params);
        $this->assertSame($parameters->getParams(), $params);
    }

    /**
     * @return void
     */
    public function testParseNull(): void
    {
        $parameters = new BaseMethodParameters;
        $parameters->parse(null);
        $this->assertNull($parameters->getParams());
    }
}
