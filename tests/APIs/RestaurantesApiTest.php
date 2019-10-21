<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Restaurantes;

class RestaurantesApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_restaurantes()
    {
        $restaurantes = factory(Restaurantes::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/restaurantes', $restaurantes
        );

        $this->assertApiResponse($restaurantes);
    }

    /**
     * @test
     */
    public function test_read_restaurantes()
    {
        $restaurantes = factory(Restaurantes::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/restaurantes/'.$restaurantes->id
        );

        $this->assertApiResponse($restaurantes->toArray());
    }

    /**
     * @test
     */
    public function test_update_restaurantes()
    {
        $restaurantes = factory(Restaurantes::class)->create();
        $editedRestaurantes = factory(Restaurantes::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/restaurantes/'.$restaurantes->id,
            $editedRestaurantes
        );

        $this->assertApiResponse($editedRestaurantes);
    }

    /**
     * @test
     */
    public function test_delete_restaurantes()
    {
        $restaurantes = factory(Restaurantes::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/restaurantes/'.$restaurantes->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/restaurantes/'.$restaurantes->id
        );

        $this->response->assertStatus(404);
    }
}
