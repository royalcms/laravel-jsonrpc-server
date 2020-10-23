<?php

declare(strict_types=1);

namespace Royalcms\Laravel\JsonRpcServer\Tests\Traits;

use Illuminate\Support\Str;
use InvalidArgumentException;
use Royalcms\Laravel\JsonRpcServer\Tests\AbstractTestCase;
use Royalcms\Laravel\JsonRpcServer\Traits\ValidateNonStrictValuesTrait;

/**
 * @covers \Royalcms\Laravel\JsonRpcServer\Traits\ValidateNonStrictValuesTrait<extended>
 */
class ValidateNonStrictValuesTraitTest extends AbstractTestCase
{
    use ValidateNonStrictValuesTrait;

    /**
     * @return void
     */
    public function testValidateIdValue(): void
    {
        foreach ([Str::random(), null, \random_int(1, 999)] as $id) {
            $this->assertTrue($this->validateIdValue($id));
        }

        foreach ([M_PI, [], new \stdClass, \tmpfile(), true] as $wrong_id) {
            $this->assertFalse($this->validateIdValue($wrong_id));
        }
    }

    /**
     * @return void
     */
    public function testValidateIdValueThrowsAnException(): void
    {
        foreach ([M_PI, [], new \stdClass, \tmpfile(), true] as $wrong_id) {
            $catch = false;

            try {
                $this->validateIdValue($wrong_id, true);
            } catch (InvalidArgumentException $e) {
                $catch = true;
            }
            $this->assertTrue($catch);
        }
    }

    /**
     * @return void
     */
    public function testValidateResultValue(): void
    {
        foreach ([[], true, M_PI, \random_int(1, 999), new \stdClass, Str::random(), null] as $result) {
            $this->assertTrue($this->validateResultValue($result));
        }

        foreach ([\tmpfile()] as $wrong_result) {
            $this->assertFalse($this->validateResultValue($wrong_result));
        }
    }

    /**
     * @return void
     */
    public function testValidateResultValueThrowsAnException(): void
    {
        foreach ([\tmpfile()] as $wrong_id) {
            $catch = false;

            try {
                $this->validateResultValue($wrong_id, true);
            } catch (InvalidArgumentException $e) {
                $catch = true;
            }

            $this->assertTrue($catch);
        }
    }

    /**
     * @return void
     */
    public function testValidateErrorDataValue(): void
    {
        foreach ([[], true, M_PI, \random_int(1, 999), new \stdClass, Str::random(), null] as $data) {
            $this->assertTrue($this->validateErrorDataValue($data));
        }

        foreach ([\tmpfile()] as $wrong_data) {
            $this->assertFalse($this->validateErrorDataValue($wrong_data));
        }
    }

    /**
     * @return void
     */
    public function testValidateErrorDataValueThrowsAnException(): void
    {
        foreach ([\tmpfile()] as $wrong_data) {
            $catch = false;

            try {
                $this->validateErrorDataValue($wrong_data, true);
            } catch (InvalidArgumentException $e) {
                $catch = true;
            }

            $this->assertTrue($catch);
        }
    }

    /**
     * @return void
     */
    public function testValidateParamsValue(): void
    {
        foreach ([[], new \stdClass, null] as $data) {
            $this->assertTrue($this->validateParamsValue($data));
        }

        foreach ([\tmpfile(), true, M_PI, \random_int(1, 999), Str::random()] as $wrong_data) {
            $this->assertFalse($this->validateParamsValue($wrong_data));
        }
    }

    /**
     * @return void
     */
    public function testValidateParamsValueThrowsAnException(): void
    {
        foreach ([\tmpfile(), true, M_PI, \random_int(1, 999), Str::random()] as $wrong_data) {
            $catch = false;

            try {
                $this->validateParamsValue($wrong_data, true);
            } catch (InvalidArgumentException $e) {
                $catch = true;
            }

            $this->assertTrue($catch);
        }
    }
}
