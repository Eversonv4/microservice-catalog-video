<?php

namespace Tests\Unit\Domain\Entity;

use Core\Domain\Entity\Category;
use PHPUnit\Framework\TestCase;

class CategoryUnitTest extends TestCase
{
  public function test_attributes()
  {
    $category = new Category(
      name: "New Cat",
      description: "New description",
      isActive: true
    );

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
}