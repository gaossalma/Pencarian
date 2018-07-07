<?php

use App\Models\Pemandu;
use App\Repositories\PemanduRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PemanduRepositoryTest extends TestCase
{
    use MakePemanduTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var PemanduRepository
     */
    protected $pemanduRepo;

    public function setUp()
    {
        parent::setUp();
        $this->pemanduRepo = App::make(PemanduRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatePemandu()
    {
        $pemandu = $this->fakePemanduData();
        $createdPemandu = $this->pemanduRepo->create($pemandu);
        $createdPemandu = $createdPemandu->toArray();
        $this->assertArrayHasKey('id', $createdPemandu);
        $this->assertNotNull($createdPemandu['id'], 'Created Pemandu must have id specified');
        $this->assertNotNull(Pemandu::find($createdPemandu['id']), 'Pemandu with given id must be in DB');
        $this->assertModelData($pemandu, $createdPemandu);
    }

    /**
     * @test read
     */
    public function testReadPemandu()
    {
        $pemandu = $this->makePemandu();
        $dbPemandu = $this->pemanduRepo->find($pemandu->id);
        $dbPemandu = $dbPemandu->toArray();
        $this->assertModelData($pemandu->toArray(), $dbPemandu);
    }

    /**
     * @test update
     */
    public function testUpdatePemandu()
    {
        $pemandu = $this->makePemandu();
        $fakePemandu = $this->fakePemanduData();
        $updatedPemandu = $this->pemanduRepo->update($fakePemandu, $pemandu->id);
        $this->assertModelData($fakePemandu, $updatedPemandu->toArray());
        $dbPemandu = $this->pemanduRepo->find($pemandu->id);
        $this->assertModelData($fakePemandu, $dbPemandu->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletePemandu()
    {
        $pemandu = $this->makePemandu();
        $resp = $this->pemanduRepo->delete($pemandu->id);
        $this->assertTrue($resp);
        $this->assertNull(Pemandu::find($pemandu->id), 'Pemandu should not exist in DB');
    }
}
