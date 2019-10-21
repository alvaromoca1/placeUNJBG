<?php namespace Tests\Repositories;

use App\Models\Restaurantes;
use App\Repositories\RestaurantesRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class RestaurantesRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var RestaurantesRepository
     */
    protected $restaurantesRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->restaurantesRepo = \App::make(RestaurantesRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_restaurantes()
    {
        $restaurantes = factory(Restaurantes::class)->make()->toArray();

        $createdRestaurantes = $this->restaurantesRepo->create($restaurantes);

        $createdRestaurantes = $createdRestaurantes->toArray();
        $this->assertArrayHasKey('id', $createdRestaurantes);
        $this->assertNotNull($createdRestaurantes['id'], 'Created Restaurantes must have id specified');
        $this->assertNotNull(Restaurantes::find($createdRestaurantes['id']), 'Restaurantes with given id must be in DB');
        $this->assertModelData($restaurantes, $createdRestaurantes);
    }

    /**
     * @test read
     */
    public function test_read_restaurantes()
    {
        $restaurantes = factory(Restaurantes::class)->create();

        $dbRestaurantes = $this->restaurantesRepo->find($restaurantes->id);

        $dbRestaurantes = $dbRestaurantes->toArray();
        $this->assertModelData($restaurantes->toArray(), $dbRestaurantes);
    }

    /**
     * @test update
     */
    public function test_update_restaurantes()
    {
        $restaurantes = factory(Restaurantes::class)->create();
        $fakeRestaurantes = factory(Restaurantes::class)->make()->toArray();

        $updatedRestaurantes = $this->restaurantesRepo->update($fakeRestaurantes, $restaurantes->id);

        $this->assertModelData($fakeRestaurantes, $updatedRestaurantes->toArray());
        $dbRestaurantes = $this->restaurantesRepo->find($restaurantes->id);
        $this->assertModelData($fakeRestaurantes, $dbRestaurantes->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_restaurantes()
    {
        $restaurantes = factory(Restaurantes::class)->create();

        $resp = $this->restaurantesRepo->delete($restaurantes->id);

        $this->assertTrue($resp);
        $this->assertNull(Restaurantes::find($restaurantes->id), 'Restaurantes should not exist in DB');
    }
}
