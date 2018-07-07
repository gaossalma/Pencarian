<?php

use App\Models\Wisatawan;
use App\Repositories\WisatawanRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class WisatawanRepositoryTest extends TestCase
{
    use MakeWisatawanTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var WisatawanRepository
     */
    protected $wisatawanRepo;

    public function setUp()
    {
        parent::setUp();
        $this->wisatawanRepo = App::make(WisatawanRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateWisatawan()
    {
        $wisatawan = $this->fakeWisatawanData();
        $createdWisatawan = $this->wisatawanRepo->create($wisatawan);
        $createdWisatawan = $createdWisatawan->toArray();
        $this->assertArrayHasKey('id', $createdWisatawan);
        $this->assertNotNull($createdWisatawan['id'], 'Created Wisatawan must have id specified');
        $this->assertNotNull(Wisatawan::find($createdWisatawan['id']), 'Wisatawan with given id must be in DB');
        $this->assertModelData($wisatawan, $createdWisatawan);
    }

    /**
     * @test read
     */
    public function testReadWisatawan()
    {
        $wisatawan = $this->makeWisatawan();
        $dbWisatawan = $this->wisatawanRepo->find($wisatawan->id);
        $dbWisatawan = $dbWisatawan->toArray();
        $this->assertModelData($wisatawan->toArray(), $dbWisatawan);
    }

    /**
     * @test update
     */
    public function testUpdateWisatawan()
    {
        $wisatawan = $this->makeWisatawan();
        $fakeWisatawan = $this->fakeWisatawanData();
        $updatedWisatawan = $this->wisatawanRepo->update($fakeWisatawan, $wisatawan->id);
        $this->assertModelData($fakeWisatawan, $updatedWisatawan->toArray());
        $dbWisatawan = $this->wisatawanRepo->find($wisatawan->id);
        $this->assertModelData($fakeWisatawan, $dbWisatawan->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteWisatawan()
    {
        $wisatawan = $this->makeWisatawan();
        $resp = $this->wisatawanRepo->delete($wisatawan->id);
        $this->assertTrue($resp);
        $this->assertNull(Wisatawan::find($wisatawan->id), 'Wisatawan should not exist in DB');
    }
}
