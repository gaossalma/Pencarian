<?php

use App\Models\Bahasa;
use App\Repositories\BahasaRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class BahasaRepositoryTest extends TestCase
{
    use MakeBahasaTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var BahasaRepository
     */
    protected $bahasaRepo;

    public function setUp()
    {
        parent::setUp();
        $this->bahasaRepo = App::make(BahasaRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateBahasa()
    {
        $bahasa = $this->fakeBahasaData();
        $createdBahasa = $this->bahasaRepo->create($bahasa);
        $createdBahasa = $createdBahasa->toArray();
        $this->assertArrayHasKey('id', $createdBahasa);
        $this->assertNotNull($createdBahasa['id'], 'Created Bahasa must have id specified');
        $this->assertNotNull(Bahasa::find($createdBahasa['id']), 'Bahasa with given id must be in DB');
        $this->assertModelData($bahasa, $createdBahasa);
    }

    /**
     * @test read
     */
    public function testReadBahasa()
    {
        $bahasa = $this->makeBahasa();
        $dbBahasa = $this->bahasaRepo->find($bahasa->id);
        $dbBahasa = $dbBahasa->toArray();
        $this->assertModelData($bahasa->toArray(), $dbBahasa);
    }

    /**
     * @test update
     */
    public function testUpdateBahasa()
    {
        $bahasa = $this->makeBahasa();
        $fakeBahasa = $this->fakeBahasaData();
        $updatedBahasa = $this->bahasaRepo->update($fakeBahasa, $bahasa->id);
        $this->assertModelData($fakeBahasa, $updatedBahasa->toArray());
        $dbBahasa = $this->bahasaRepo->find($bahasa->id);
        $this->assertModelData($fakeBahasa, $dbBahasa->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteBahasa()
    {
        $bahasa = $this->makeBahasa();
        $resp = $this->bahasaRepo->delete($bahasa->id);
        $this->assertTrue($resp);
        $this->assertNull(Bahasa::find($bahasa->id), 'Bahasa should not exist in DB');
    }
}
