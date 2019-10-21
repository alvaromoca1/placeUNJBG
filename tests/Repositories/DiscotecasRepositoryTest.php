<?php namespace Tests\Repositories;

use App\Models\Discotecas;
use App\Repositories\DiscotecasRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class DiscotecasRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var DiscotecasRepository
     */
    protected $discotecasRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->discotecasRepo = \App::make(DiscotecasRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_discotecas()
    {
        $discotecas = factory(Discotecas::class)->make()->toArray();

        $createdDiscotecas = $this->discotecasRepo->create($discotecas);

        $createdDiscotecas = $createdDiscotecas->toArray();
        $this->assertArrayHasKey('id', $createdDiscotecas);
        $this->assertNotNull($createdDiscotecas['id'], 'Created Discotecas must have id specified');
        $this->assertNotNull(Discotecas::find($createdDiscotecas['id']), 'Discotecas with given id must be in DB');
        $this->assertModelData($discotecas, $createdDiscotecas);
    }

    /**
     * @test read
     */
    public function test_read_discotecas()
    {
        $discotecas = factory(Discotecas::class)->create();

        $dbDiscotecas = $this->discotecasRepo->find($discotecas->id);

        $dbDiscotecas = $dbDiscotecas->toArray();
        $this->assertModelData($discotecas->toArray(), $dbDiscotecas);
    }

    /**
     * @test update
     */
    public function test_update_discotecas()
    {
        $discotecas = factory(Discotecas::class)->create();
        $fakeDiscotecas = factory(Discotecas::class)->make()->toArray();

        $updatedDiscotecas = $this->discotecasRepo->update($fakeDiscotecas, $discotecas->id);

        $this->assertModelData($fakeDiscotecas, $updatedDiscotecas->toArray());
        $dbDiscotecas = $this->discotecasRepo->find($discotecas->id);
        $this->assertModelData($fakeDiscotecas, $dbDiscotecas->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_discotecas()
    {
        $discotecas = factory(Discotecas::class)->create();

        $resp = $this->discotecasRepo->delete($discotecas->id);

        $this->assertTrue($resp);
        $this->assertNull(Discotecas::find($discotecas->id), 'Discotecas should not exist in DB');
    }
}
