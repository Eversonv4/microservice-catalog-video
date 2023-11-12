<?php

namespace Tests\Unit\Domain\Validation;

use Core\Domain\Exception\EntityValidateException;
use Core\Domain\Validation\DomainValidation;
use PhpParser\Node\Stmt\TryCatch;
use PHPUnit\Framework\TestCase;

class DomainValidationUnitTest extends TestCase
{
  public function test_not_null()
  {
    try {
      $value = "";
      DomainValidation::notNull($value, "asdf");
      $this->assertTrue(false);

    } catch (\Throwable $th) {
      $this->assertInstanceOf(EntityValidateException::class, $th);
    }
  }

  public function test_not_null_custom_message_exception()
  {
    try {
      $value = "";
      DomainValidation::notNull($value, "custom message error");
      $this->assertTrue(false);

    } catch (\Throwable $th) {
      $this->assertInstanceOf(EntityValidateException::class, $th, "custom message error");
    }
  }

  public function test_str_max_length()
  {
    try {
      $value = "testee";
      DomainValidation::strMaxLength($value, 5, "custom message error");
      $this->assertTrue(false);

    } catch (\Throwable $th) {
      $this->assertInstanceOf(EntityValidateException::class, $th, "custom message error");
    }
  }

  public function test_str_min_length()
  {
    try {
      $value = "teste";
      DomainValidation::strMinLength($value, 8, "custom message error");
      $this->assertTrue(false);

    } catch (\Throwable $th) {
      $this->assertInstanceOf(EntityValidateException::class, $th, "custom message error");
    }
  }

  public function test_str_can_be_null_and_max_length()
  {
    try {
      $value = "teste";
      DomainValidation::strCanBeNullAndMaxLength($value, 3, "custom message error");
      $this->assertTrue(false);
    } catch (\Throwable $th) {
      $this->assertInstanceOf(EntityValidateException::class, $th, "custom message error");
    }
  }
}