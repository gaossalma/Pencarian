<?php

use App\Models\Destinasi;
use App\Repositories\DestinasiRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DestinasiRepositoryTest extends TestCase
{
    use MakeDestinasiTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var DestinasiRepository
     */
    protected $destinasiRepo;

    public function setUp()
    {
        parent::setUp();
        $this->destinasiRepo = App::make(DestinasiRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateDestinasi()
    {
        $destinasi = $this->fakeDestinasiData();
        $createdDestinasi = $this->destinasiRepo->create($destinasi);
        $createdDestinasi = $createdDestinasi->toArray();
        $this->assertArrayHasKey('id', $createdDestinasi);
        $this->assertNotNull($createdDestinasi['id'], 'Created Destinasi must have id specified');
        $this->assertNotNull(Destinasi::find($createdDestinasi['id']), 'Destinasi with given id must be in DB');
        $this->assertModelData($destinasi, $createdDestinasi);
    }

    /**
     * @test read
     */
    public function testReadDestinasi()
    {
        $destinasi = $this->makeDestinasi();
        $dbDestinasi = $this->destinasiRepo->find($destinasi->id);
        $dbDestinasi = $dbDestinasi->toArray();
        $this->assertModelData($destinasi->toArray(), $dbDestinasi);
    }

    /**
     * @test update
     */
    public function testUpdateDestinasi()
    {
        $destinasi = $this->makeDestinasi();
        $fakeDestinasi = $this->fakeDestinasiData();
        $updatedDestinasi = $this->destinasiRepo->update($fakeDestinasi, $destinasi->id);
        $this->assertModelData($fakeDestinasi, $updatedDestinasi->toArray());
        $dbDestinasi = $this->destinasiRepo->find($destinasi->id);
        $this->assertModelData($fakeDestinasi, $dbDestinasi->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteDestinasi()
    {
        $destinasi = $this->makeDestinasi();
        $resp = $this->destinasiRepo->delete($destinasi->id);
        $this->assertTrue($resp);
        $this->assertNull(Destinasi::find($destinasi->id), 'Destinasi should not exist in DB');
    }
}
