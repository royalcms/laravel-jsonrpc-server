<?php

declare(strict_types=1);

namespace Royalcms\Laravel\JsonRpcServer\Tests\Responses;

use Illuminate\Support\Str;
use InvalidArgumentException;
use Royalcms\Laravel\JsonRpcServer\Tests\AbstractTestCase;
use Royalcms\Laravel\JsonRpcServer\Responses\SuccessResponse;
use Royalcms\Laravel\JsonRpcServer\Responses\SuccessResponseInterface;

/**
 * @covers \Royalcms\Laravel\JsonRpcServer\Responses\SuccessResponse<extended>
 */
class SuccessResponseTest extends AbstractTestCase
{
    /**
     * @var SuccessResponse
     */
    protected $response;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->response = new SuccessResponse(Str::random(), Str::random());
    }

    /**
     * @return void
     */
    public function testInterfaces(): void
    {
        $this->assertInstanceOf(SuccessResponseInterface::class, $this->response);
    }

    /**
     * @return void
     */
    public function testIdGetter(): void
    {
        foreach ([Str::random(), null, \random_int(1, 999)] as $id) {
            $this->assertSame($id, (new SuccessResponse($id, null))->getId());
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
                new SuccessResponse($wrong_id, null);
            } catch (InvalidArgumentException $e) {
                $catch = true;
            }

            $this->assertTrue($catch);
        }
    }

    /**
     * @return void
     */
    public function testResultGetter(): void
    {
        foreach ([[], true, M_PI, \random_int(1, 999), new \stdClass, Str::random(), null] as $result) {
            $this->assertSame($result, (new SuccessResponse(Str::random(), $result))->getResult());
        }
    }

    /**
     * @return void
     */
    public function testInvalidResultPassingIntoConstructor(): void
    {
        foreach ([\tmpfile()] as $wrong_id) {
            $catch = false;

            try {
                new SuccessResponse($wrong_id, null);
            } catch (InvalidArgumentException $e) {
                $catch = true;
            }

            $this->assertTrue($catch);
        }
    }
}
