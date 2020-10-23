<?php

declare(strict_types=1);

namespace Royalcms\Laravel\JsonRpcServer\Tests\Events;

use Illuminate\Support\Str;
use Royalcms\Laravel\JsonRpcServer\Tests\AbstractTestCase;
use Royalcms\Laravel\JsonRpcServer\Requests\ErroredRequest;
use Royalcms\Laravel\JsonRpcServer\Errors\InvalidParamsError;
use Royalcms\Laravel\JsonRpcServer\Events\ErroredRequestDetectedEvent;

/**
 * @covers \Royalcms\Laravel\JsonRpcServer\Events\ErroredRequestDetectedEvent<extended>
 */
class ErroredRequestDetectedEventTest extends AbstractTestCase
{
    /**
     * {@inheritdoc}
     */
    public function testConstructor(): void
    {
        $event = new ErroredRequestDetectedEvent($error = new ErroredRequest(
            new InvalidParamsError,
            $id = Str::random()
        ));

        $this->assertSame($error, $event->error);
    }
}
