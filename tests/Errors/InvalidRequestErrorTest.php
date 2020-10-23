<?php

declare(strict_types=1);

namespace Royalcms\Laravel\JsonRpcServer\Tests\Errors;

use Royalcms\Laravel\JsonRpcServer\Errors\InvalidRequestError;

/**
 * @covers \Royalcms\Laravel\JsonRpcServer\Errors\InvalidRequestError<extended>
 */
class InvalidRequestErrorTest extends AbstractErrorTestCase
{
    /**
     * @return void
     */
    public function testDefaultMessage(): void
    {
        $this->assertSame('Invalid Request', ($error = $this->errorFactory(null))->getMessage());
        $this->assertInstanceOf(InvalidRequestError::class, $error);
    }

    /**
     * {@inheritdoc}
     *
     * @return InvalidRequestError
     */
    protected function errorFactory(...$arguments)
    {
        return new InvalidRequestError(...$arguments);
    }
}
