<?php

declare(strict_types=1);

namespace Royalcms\Laravel\JsonRpcServer\Tests\Responses;

use Illuminate\Support\Str;
use InvalidArgumentException;
use Royalcms\Laravel\JsonRpcServer\Tests\AbstractTestCase;
use Royalcms\Laravel\JsonRpcServer\Responses\ErrorResponse;
use Royalcms\Laravel\JsonRpcServer\Errors\MethodNotFoundError;
use Royalcms\Laravel\JsonRpcServer\Responses\ErrorResponseInterface;

/**
 * @covers \Royalcms\Laravel\JsonRpcServer\Responses\ErrorResponse<extended>
 */
class ErrorResponseTest extends AbstractTestCase
{
    protected $response;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->response = new ErrorResponse(null, new MethodNotFoundError);
    }

    /**
     * @return void
     */
    public function testInterfaces(): void
    {
        $this->assertInstanceOf(ErrorResponseInterface::class, $this->response);
    }

    /**
     * @return void
     */
    public function testIdGetter(): void
    {
        foreach ([Str::random(), null, \random_int(1, 999)] as $id) {
            $this->assertSame($id, (new ErrorResponse($id, new MethodNotFoundError))->getId());
        }
    }

    /**
     * @return void
     */
    public function testInvalidIdPassingIntoConstructor(): void
    {
        foreach ([M_PI, [], new \stdClass, \tmpfile(), true] as $wrong_id) {
            $catch = false;

            try {
                new ErrorResponse($wrong_id, new MethodNotFoundError);
            } catch (InvalidArgumentException $e) {
                $catch = true;
            }

            $this->assertTrue($catch);
        }
    }

    /**
     * @return void
     */
    public function testErrorGetter(): void
    {
        $error = new MethodNotFoundError;

        $this->assertSame($error, (new ErrorResponse(null, $error))->getError());
    }
}
