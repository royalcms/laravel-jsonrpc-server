<?php

declare(strict_types=1);

namespace Royalcms\Laravel\JsonRpcServer\Tests\Errors;

use Royalcms\Laravel\JsonRpcServer\Errors\InvalidParamsError;

/**
 * @covers \Royalcms\Laravel\JsonRpcServer\Errors\InvalidParamsError<extended>
 */
class InvalidParamsErrorTest extends AbstractErrorTestCase
{
    /**
     * @return void
     */
    public function testDefaultMessage(): void
    {
        $this->assertSame('Invalid params', ($error = $this->errorFactory(null))->getMessage());
        $this->assertInstanceOf(InvalidParamsError::class, $error);
    }

    /**
     * {@inheritdoc}
     *
     * @return InvalidParamsError
     */
    protected function errorFactory(...$arguments)
    {
        return new InvalidParamsError(...$arguments);
    }
}
