<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegionControllerTest extends TestCase
{
    use DatabaseTransactions;

    protected function setUp(): void
    {
        parent::setUp();
        $this->url = '/regions';
        $this->data = [
            'name' => 'Central Office',
            'sequence' => 19,
            'area' => 'L',
            'active' => 1
        ];
        $this->user = factory(\App\User::class)->create();
        $this->invalid = [
            'name' => '',
            'sequence' => 0,
            'area' => 'X',
            'active' => 2
        ];
    }

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testCreateRegionWithMiddleware()
    {
        $this->post($this->url, $this->data)->assertStatus(302)->assertRedirect('/email/verify');
    }

    public function testCreateRegion()
    {
        $response = $this->actingAs($this->user)->post($this->url, $this->data);
        $this->assertDatabaseHas('regions', $this->data);
        $response->assertStatus(302)->assertRedirect($this->url);
        $response->assertSessionHas('message', 'Task was completed.');
    }

    public function testCreateRegionWithValidation()
    {
        $response = $this->actingAs($this->user)->post($this->url, $this->invalid);
        $response->assertStatus(302);
        $response->assertSessionHasErrors([
            'name' => 'The name field is required.',
            'sequence' => 'The sequence must be at least 1.',
            'area' => 'The selected area is invalid.',
            'active' => 'The active field must be true or false.'
        ]);
    }

    public function testIndexRegionWithMiddleware()
    {
        $this->get($this->url)->assertStatus(302)->assertRedirect('/email/verify');
    }

    public function testIndexRegion()
    {
        $response = $this->actingAs($this->user)->get($this->url);
        $response->assertStatus(200);
        $response->assertViewIs('region.index');
    }
}
