<?php

declare(strict_types=1);

namespace Royalcms\Laravel\JsonRpcServer\Tests;

use Royalcms\Laravel\JsonRpcServer\RpcRouter;
use Royalcms\Laravel\JsonRpcServer\Router\RouterInterface;

/**
 * @covers \AvtoDev\JsonRpc\RpcRouter<extended>
 */
class RpcRouterTest extends AbstractTestCase
{
    /**
     * @return void
     */
    public function testAccess(): void
    {
        $this->assertInstanceOf(RouterInterface::class, RpcRouter::getFacadeRoot());
    }
}
