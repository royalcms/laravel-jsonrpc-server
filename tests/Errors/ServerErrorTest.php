<?php

declare(strict_types=1);

namespace Royalcms\Laravel\JsonRpcServer\Tests\Errors;

use Royalcms\Laravel\JsonRpcServer\Errors\ServerError;

/**
 * @covers \Royalcms\Laravel\JsonRpcServer\Errors\ServerError<extended>
 */
class ServerErrorTest extends AbstractErrorTestCase
{
    /**
     * @return void
     */
    public function testDefaultMessage(): void
    {
        $this->assertSame('Server Error', ($error = $this->errorFactory(null))->getMessage());
        $this->assertInstanceOf(ServerError::class, $error);
    }

    /**
     * {@inheritdoc}
     *
     * @return ServerError
     */
    protected function errorFactory(...$arguments)
    {
        return new ServerError(...$arguments);
    }
}
