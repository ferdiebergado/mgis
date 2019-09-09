<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegionControllerTest extends TestCase
{
    use DatabaseTransactions, WithFaker;

    protected $data;
    protected $url;
    protected $user;
    protected $region;
    protected $newData;
    protected $invalid;
    protected $validationErrors;

    protected function setUp(): void
    {
        parent::setUp();
        $this->url = '/regions';
        $this->data = [
            'sequence' => $this->faker->randomNumber(),
            'name' => $this->faker->name,
            'area' => $this->faker->randomElement(['L', 'V', 'M']),
        ];
        $this->user = factory(\App\User::class)->make();
        $this->region = factory(\App\Region::class)->create();
        $this->invalid = [
            'name' => '',
            'sequence' => 0,
            'area' => 'X',
        ];
        $this->validationErrors = [
            'name' => 'The name field is required.',
            'sequence' => 'The sequence must be at least 1.',
            'area' => 'The selected area is invalid.',
        ];
        $this->newData = [
            'sequence' => $this->faker->randomNumber(),
            'name' => $this->faker->name,
            'area' => $this->faker->randomElement(['L', 'V', 'M']),
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
        $response->assertSessionHasErrors($this->validationErrors);
    }

    public function testIndexRegionWithMiddleware()
    {
        $this->get($this->url)->assertStatus(302)->assertRedirect('/email/verify');
    }

    public function testIndexRegionAsView()
    {
        $response = $this->actingAs($this->user)->get($this->url);
        $response->assertStatus(200);
        $response->assertViewIs('region.index');
    }
    public function testIndexRegionAsJson()
    {
        $response = $this->actingAs($this->user)->json('GET', $this->url);
        // $response->assertStatus(200);
        $response->assertJsonStructure([[
            "id",
            "sequence",
            "name",
            "area",
            "active",
            "created_at",
            "updated_at"
        ]]);
    }

    public function testUpdateRegionWithMiddleware()
    {
        $response = $this->put($this->url . '/' . $this->region->id, $this->newData);

        $this->assertDatabaseMissing('regions', array_merge($this->data, ['id' => $this->region->id]));

        $response->assertStatus(302)->assertRedirect('/email/verify');
    }

    public function testUpdateRegion()
    {
        $response = $this->actingAs($this->user)->put($this->url . '/' . $this->region->id, $this->newData);

        $updated = array_merge(['id' => $this->region->id], $this->newData);

        $this->assertDatabaseHas('regions', $updated);

        $response->assertStatus(302)->assertRedirect($this->url);
    }

    public function testDeleteRegionWithMiddleware()
    {
        $response = $this->delete($this->url . '/' . $this->region->id);

        $response->assertStatus(302)->assertRedirect('/email/verify');
        $this->assertDatabaseHas('regions', $this->region->toArray());
    }

    public function testDeleteRegion()
    {
        $response = $this->actingAs($this->user)->delete($this->url . '/' . $this->region->id);

        // $response->assertStatus(200);

        $this->assertDatabaseMissing('regions', $this->region->toArray());
    }
}
