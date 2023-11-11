<?php

namespace Tests\Unit\Domain\Entity;

use Core\Domain\Entity\Category;
use PHPUnit\Framework\TestCase;

class CategoryUnitTest extends TestCase
{
  public function test_attributes()
  {
    $category = new Category(
      id: "123",
      name: "New Cat",
      description: "New description",
      isActive: true
    );

    $this->assertEquals("New Cat", $category->name);
    $this->assertEquals("New description", $category->description);
    $this->assertEquals(true, $category->isActive);
  }
}