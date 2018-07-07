<?php

use App\Models\BahasaPemandu;
use App\Repositories\BahasaPemanduRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class BahasaPemanduRepositoryTest extends TestCase
{
    use MakeBahasaPemanduTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var BahasaPemanduRepository
     */
    protected $bahasaPemanduRepo;

    public function setUp()
    {
        parent::setUp();
        $this->bahasaPemanduRepo = App::make(BahasaPemanduRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateBahasaPemandu()
    {
        $bahasaPemandu = $this->fakeBahasaPemanduData();
        $createdBahasaPemandu = $this->bahasaPemanduRepo->create($bahasaPemandu);
        $createdBahasaPemandu = $createdBahasaPemandu->toArray();
        $this->assertArrayHasKey('id', $createdBahasaPemandu);
        $this->assertNotNull($createdBahasaPemandu['id'], 'Created BahasaPemandu must have id specified');
        $this->assertNotNull(BahasaPemandu::find($createdBahasaPemandu['id']), 'BahasaPemandu with given id must be in DB');
        $this->assertModelData($bahasaPemandu, $createdBahasaPemandu);
    }

    /**
     * @test read
     */
    public function testReadBahasaPemandu()
    {
        $bahasaPemandu = $this->makeBahasaPemandu();
        $dbBahasaPemandu = $this->bahasaPemanduRepo->find($bahasaPemandu->id);
        $dbBahasaPemandu = $dbBahasaPemandu->toArray();
        $this->assertModelData($bahasaPemandu->toArray(), $dbBahasaPemandu);
    }

    /**
     * @test update
     */
    public function testUpdateBahasaPemandu()
    {
        $bahasaPemandu = $this->makeBahasaPemandu();
        $fakeBahasaPemandu = $this->fakeBahasaPemanduData();
        $updatedBahasaPemandu = $this->bahasaPemanduRepo->update($fakeBahasaPemandu, $bahasaPemandu->id);
        $this->assertModelData($fakeBahasaPemandu, $updatedBahasaPemandu->toArray());
        $dbBahasaPemandu = $this->bahasaPemanduRepo->find($bahasaPemandu->id);
        $this->assertModelData($fakeBahasaPemandu, $dbBahasaPemandu->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteBahasaPemandu()
    {
        $bahasaPemandu = $this->makeBahasaPemandu();
        $resp = $this->bahasaPemanduRepo->delete($bahasaPemandu->id);
        $this->assertTrue($resp);
        $this->assertNull(BahasaPemandu::find($bahasaPemandu->id), 'BahasaPemandu should not exist in DB');
    }
}
