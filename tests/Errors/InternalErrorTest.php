<?php

declare(strict_types=1);

namespace Royalcms\Laravel\JsonRpcServer\Tests\Errors;

use Royalcms\Laravel\JsonRpcServer\Errors\InternalError;

/**
 * @covers \Royalcms\Laravel\JsonRpcServer\Errors\InternalError<extended>
 */
class InternalErrorTest extends AbstractErrorTestCase
{
    /**
     * @return void
     */
    public function testDefaultMessage(): void
    {
        $this->assertSame('Internal error', ($error = $this->errorFactory(null))->getMessage());
        $this->assertInstanceOf(InternalError::class, $error);
    }

    /**
     * {@inheritdoc}
     *
     * @return InternalError
     */
    protected function errorFactory(...$arguments)
    {
        return new InternalError(...$arguments);
    }
}
