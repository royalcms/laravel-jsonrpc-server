<?php

declare(strict_types=1);

namespace Royalcms\Laravel\JsonRpcServer\Tests\Errors;

use Royalcms\Laravel\JsonRpcServer\Errors\MethodNotFoundError;

/**
 * @covers \Royalcms\Laravel\JsonRpcServer\Errors\MethodNotFoundError<extended>
 */
class MethodNotFoundErrorTest extends AbstractErrorTestCase
{
    /**
     * @return void
     */
    public function testDefaultMessage(): void
    {
        $this->assertSame('Method not found', ($error = $this->errorFactory(null))->getMessage());
        $this->assertInstanceOf(MethodNotFoundError::class, $error);
    }

    /**
     * {@inheritdoc}
     *
     * @return MethodNotFoundError
     */
    protected function errorFactory(...$arguments)
    {
        return new MethodNotFoundError(...$arguments);
    }
}
