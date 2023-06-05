<?php

namespace Tests\Unit;


use App\Models\Idea;
use App\Models\Status;
use Facades\Tests\Setup\IdeaFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StatusTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic unit test example.
     */
    public function test_can_have_ideas(): void
    {
        $this->withoutExceptionHandling();
        
        $status = Status::factory()->create();

        IdeaFactory::withStatus($status->id)->create();

        $this->assertInstanceOf(Idea::class, $status->ideas->first());
    }
}
