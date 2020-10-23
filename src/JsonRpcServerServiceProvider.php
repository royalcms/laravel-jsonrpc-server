<?php

declare(strict_types=1);

namespace Royalcms\Laravel\JsonRpcServer;

use Royalcms\Laravel\JsonRpcServer\Router\Router;
use Royalcms\Laravel\JsonRpcServer\Router\RouterInterface;
use Royalcms\Laravel\JsonRpcServer\Factories\RequestFactory;
use Royalcms\Laravel\JsonRpcServer\Factories\FactoryInterface;

class JsonRpcServerServiceProvider extends \Illuminate\Support\ServiceProvider
{
    /**
     * Register RPC services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->registerJsonRpcRequestsFactory();
        $this->registerRpcKernel();
        $this->registerRpcRouter();
    }

    /**
     * Register Json RPC requests factory.
     *
     * @return void
     */
    protected function registerJsonRpcRequestsFactory(): void
    {
        $this->app->bindIf(FactoryInterface::class, RequestFactory::class);
    }

    /**
     * Register RPC kernel.
     *
     * @return void
     */
    protected function registerRpcKernel(): void
    {
        $this->app->singleton(KernelInterface::class, Kernel::class);
    }

    /**
     * Register RPC router.
     *
     * @return void
     */
    protected function registerRpcRouter(): void
    {
        $this->app->singleton(RouterInterface::class, Router::class);
    }
}
