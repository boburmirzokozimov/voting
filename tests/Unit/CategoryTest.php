<?php

namespace Tests\Unit;


use App\Models\Category;
use App\Models\Idea;
use Facades\Tests\Setup\IdeaFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic unit test example.
     */
    public function test_can_have_ideas(): void
    {
        $category = Category::factory()->create();

        $idea = IdeaFactory::withCategory($category)->create();

        $this->assertInstanceOf(Idea::class, $idea);
    }
}
