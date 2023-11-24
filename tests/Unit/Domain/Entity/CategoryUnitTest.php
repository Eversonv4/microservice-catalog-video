<?php

namespace Tests\Unit\Domain\Entity;

use Core\Domain\Entity\Category;
use Core\Domain\Exception\EntityValidateException;
use PHPUnit\Framework\TestCase;
use Ramsey\Uuid\Uuid;

class CategoryUnitTest extends TestCase
{
  public function test_attributes()
  {
    $category = new Category(
      name: "New Cat",
      description: "New description",
      isActive: true
    );

    $this->assertNotEmpty($category->createdAt());
    $this->assertNotEmpty($category->id());
    $this->assertEquals("New Cat", $category->name);
    $this->assertEquals("New description", $category->description);
    $this->assertEquals(true, $category->isActive);
  }

  public function test_activated()
  {
    $category = new Category(
      name: "New Cat",
      isActive: false
    );

    $this->assertFalse($category->isActive);
    $category->activate();
    $this->assertTrue($category->isActive);
  }

  public function test_disabled()
  {
    $category = new Category(
      name: "New Cat"
    );

    $this->assertTrue($category->isActive);
    $category->disable();
    $this->assertFalse($category->isActive);
  }

  public function test_update()
  {
    $uuid = (string) Uuid::uuid4()->toString();

    $category = new Category(
      id: $uuid,
      name: "New Cat",
      description: "New description",
      isActive: true,
      createdAt: "2023-11-24 00:16:12"
    );

    $category->update(
      name: "new name",
      description: "new description",
    );

    $this->assertEquals($uuid, $category->id());
    $this->assertEquals("new name", $category->name);
    $this->assertEquals("new description", $category->description);
  }

  public function test_exception_name()
  {
    try {
      $category = new Category(
        name: "Ne",
        description: "qualquer",
      );

      $this->assertTrue(false);
    } catch (\Throwable $th) {
      $this->assertInstanceOf(EntityValidateException::class, $th);
    }
  }

  public function test_exception_description()
  {
    try {
      $category = new Category(
        name: "New Cat",
        description: random_bytes(9999)
      );

      $this->assertTrue(false);
    } catch (\Throwable $th) {
      $this->assertInstanceOf(EntityValidateException::class, $th);
    }
  }
}