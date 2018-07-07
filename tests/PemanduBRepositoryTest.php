<?php

use App\Models\PemanduB;
use App\Repositories\PemanduBRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PemanduBRepositoryTest extends TestCase
{
    use MakePemanduBTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var PemanduBRepository
     */
    protected $pemanduBRepo;

    public function setUp()
    {
        parent::setUp();
        $this->pemanduBRepo = App::make(PemanduBRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatePemanduB()
    {
        $pemanduB = $this->fakePemanduBData();
        $createdPemanduB = $this->pemanduBRepo->create($pemanduB);
        $createdPemanduB = $createdPemanduB->toArray();
        $this->assertArrayHasKey('id', $createdPemanduB);
        $this->assertNotNull($createdPemanduB['id'], 'Created PemanduB must have id specified');
        $this->assertNotNull(PemanduB::find($createdPemanduB['id']), 'PemanduB with given id must be in DB');
        $this->assertModelData($pemanduB, $createdPemanduB);
    }

    /**
     * @test read
     */
    public function testReadPemanduB()
    {
        $pemanduB = $this->makePemanduB();
        $dbPemanduB = $this->pemanduBRepo->find($pemanduB->id);
        $dbPemanduB = $dbPemanduB->toArray();
        $this->assertModelData($pemanduB->toArray(), $dbPemanduB);
    }

    /**
     * @test update
     */
    public function testUpdatePemanduB()
    {
        $pemanduB = $this->makePemanduB();
        $fakePemanduB = $this->fakePemanduBData();
        $updatedPemanduB = $this->pemanduBRepo->update($fakePemanduB, $pemanduB->id);
        $this->assertModelData($fakePemanduB, $updatedPemanduB->toArray());
        $dbPemanduB = $this->pemanduBRepo->find($pemanduB->id);
        $this->assertModelData($fakePemanduB, $dbPemanduB->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletePemanduB()
    {
        $pemanduB = $this->makePemanduB();
        $resp = $this->pemanduBRepo->delete($pemanduB->id);
        $this->assertTrue($resp);
        $this->assertNull(PemanduB::find($pemanduB->id), 'PemanduB should not exist in DB');
    }
}
