<?php

declare(strict_types=1);

namespace Royalcms\Laravel\JsonRpcServer\Tests\Events;

use Illuminate\Support\Str;
use Royalcms\Laravel\JsonRpcServer\Requests\Request;
use Royalcms\Laravel\JsonRpcServer\Tests\AbstractTestCase;
use Royalcms\Laravel\JsonRpcServer\Events\RequestHandledEvent;

/**
 * @covers \Royalcms\Laravel\JsonRpcServer\Events\RequestHandledEvent<extended>
 */
class RequestHandledEventTest extends AbstractTestCase
{
    /**
     * {@inheritdoc}
     */
    public function testConstructor(): void
    {
        $event = new RequestHandledEvent(
            $request = new Request(Str::random(), Str::random(), [])
        );

        $this->assertSame($request, $event->request);
    }
}
