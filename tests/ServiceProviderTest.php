<?php

declare(strict_types=1);

namespace Royalcms\Laravel\JsonRpcServer\Tests;

use Royalcms\Laravel\JsonRpcServer\Kernel;
use Royalcms\Laravel\JsonRpcServer\Router\Router;
use Royalcms\Laravel\JsonRpcServer\KernelInterface;
use Royalcms\Laravel\JsonRpcServer\Router\RouterInterface;
use Royalcms\Laravel\JsonRpcServer\Factories\RequestFactory;
use Royalcms\Laravel\JsonRpcServer\Factories\FactoryInterface;

/**
 * @covers \Royalcms\Laravel\JsonRpcServer\ServiceProvider<extended>
 */
class ServiceProviderTest extends AbstractTestCase
{
    /**
     * @return void
     */
    public function testDiRegistration(): void
    {
        $this->assertInstanceOf(RequestFactory::class, $this->app->make(FactoryInterface::class));
        $this->assertInstanceOf(Kernel::class, $this->app->make(KernelInterface::class));
        $this->assertInstanceOf(Router::class, $this->app->make(RouterInterface::class));
    }

    /**
     * @return void
     */
    public function testKernelBindedAsSingleton(): void
    {
        $instance_1 = $this->app->make(KernelInterface::class);
        $instance_2 = $this->app->make(KernelInterface::class);

        $this->assertSame($instance_1, $instance_2);
    }

    /**
     * @return void
     */
    public function testRouterBindedAsSingleton(): void
    {
        $instance_1 = $this->app->make(RouterInterface::class);
        $instance_2 = $this->app->make(RouterInterface::class);

        $this->assertSame($instance_1, $instance_2);
    }
}
