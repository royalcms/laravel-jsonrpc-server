<?php

declare(strict_types=1);

namespace Royalcms\Laravel\JsonRpcServer\Tests\Events;

use Illuminate\Support\Str;
use Royalcms\Laravel\JsonRpcServer\Requests\Request;
use Royalcms\Laravel\JsonRpcServer\Errors\InternalError;
use Royalcms\Laravel\JsonRpcServer\Tests\AbstractTestCase;
use Royalcms\Laravel\JsonRpcServer\Events\RequestHandledExceptionEvent;

/**
 * @covers \Royalcms\Laravel\JsonRpcServer\Events\RequestHandledExceptionEvent<extended>
 */
class RequestHandledExceptionEventTest extends AbstractTestCase
{
    /**
     * {@inheritdoc}
     */
    public function testConstructor(): void
    {
        $event = new RequestHandledExceptionEvent(
            $request = new Request(Str::random(), Str::random(), []),
            $error = new InternalError
        );

        $this->assertSame($request, $event->request);
    }
}
