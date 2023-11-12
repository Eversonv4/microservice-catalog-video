<?php

namespace Core\Domain\Validation;

use Core\Domain\Exception\EntityValidateException;

class DomainValidation
{
  public static function notNull(string $value, string $exceptionMessage = null)
  {
    if (empty($value)) {
      throw new EntityValidateException($exceptionMessage ?? "Should not be empty or null");
    }
  }

  public static function strMaxLength(string $value, int $length = 255, string $exceptionMessage = null)
  {
    if (strlen($value) > $length) {
      throw new EntityValidateException($exceptionMessage ?? "The value must not be greater than {$length} characters.");
    }
  }

  public static function strMinLength(string $value, int $length = 3, string $exceptionMessage = null)
  {
    if (strlen($value) < $length) {
      throw new EntityValidateException($exceptionMessage ?? "The value must not be smaller than {$length} characters.");
    }
  }

  public static function strCanBeNullAndMaxLength(string $value = "", int $length = 255, string $exceptionMessage = null)
  {
    if (!empty($value) && (strlen($value) > $length)) {
      throw new EntityValidateException($exceptionMessage ?? "The value must not be smaller than {$length} characters.");
    }
  }
}