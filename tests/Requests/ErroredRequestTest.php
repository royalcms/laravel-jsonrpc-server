<?php

declare(strict_types=1);

namespace Royalcms\Laravel\JsonRpcServer\Tests\Requests;

use Illuminate\Support\Str;
use InvalidArgumentException;
use Royalcms\Laravel\JsonRpcServer\Tests\AbstractTestCase;
use Royalcms\Laravel\JsonRpcServer\Requests\ErroredRequest;
use Royalcms\Laravel\JsonRpcServer\Errors\InvalidParamsError;
use Royalcms\Laravel\JsonRpcServer\Errors\InvalidRequestError;
use Royalcms\Laravel\JsonRpcServer\Requests\ErroredRequestInterface;

/**
 * @covers \Royalcms\Laravel\JsonRpcServer\Requests\ErroredRequest<extended>
 */
class ErroredRequestTest extends AbstractTestCase
{
    /**
     * @var ErroredRequest
     */
    protected $request;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->request = new ErroredRequest(new InvalidParamsError, Str::random());
    }

    /**
     * @coversNothing
     *
     * @return void
     */
    public function testInterfaces(): void
    {
        $this->assertInstanceOf(ErroredRequestInterface::class, $this->request);
    }

    /**
     * @return void
     */
    public function testIdGetter(): void
    {
        foreach ([Str::random(), null, \random_int(1, 999)] as $id) {
            $this->assertSame($id, (new ErroredRequest(new InvalidParamsError, $id))->getId());
        }
    }

    /**
     * @return void
     */
    public function testErrorGetter(): void
    {
        $error = new InvalidParamsError;

        $this->assertSame($error, (new ErroredRequest($error))->getError());
    }

    /**
     * @return void
     */
    public function testInvalidIdPassingIntoConstructor(): void
    {
        foreach ([M_PI, [], new \stdClass, \tmpfile(), true] as $wrong_id) {
            $catch = false;

            try {
                new ErroredRequest(new InvalidRequestError, $wrong_id);
            } catch (InvalidArgumentException $e) {
                $catch = true;
            }

            $this->assertTrue($catch);
        }
    }
}
