<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Discotecas;

class DiscotecasApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_discotecas()
    {
        $discotecas = factory(Discotecas::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/discotecas', $discotecas
        );

        $this->assertApiResponse($discotecas);
    }

    /**
     * @test
     */
    public function test_read_discotecas()
    {
        $discotecas = factory(Discotecas::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/discotecas/'.$discotecas->id
        );

        $this->assertApiResponse($discotecas->toArray());
    }

    /**
     * @test
     */
    public function test_update_discotecas()
    {
        $discotecas = factory(Discotecas::class)->create();
        $editedDiscotecas = factory(Discotecas::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/discotecas/'.$discotecas->id,
            $editedDiscotecas
        );

        $this->assertApiResponse($editedDiscotecas);
    }

    /**
     * @test
     */
    public function test_delete_discotecas()
    {
        $discotecas = factory(Discotecas::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/discotecas/'.$discotecas->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/discotecas/'.$discotecas->id
        );

        $this->response->assertStatus(404);
    }
}
