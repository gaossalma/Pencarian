<?php

use App\Models\DestinasiPemandu;
use App\Repositories\DestinasiPemanduRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DestinasiPemanduRepositoryTest extends TestCase
{
    use MakeDestinasiPemanduTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var DestinasiPemanduRepository
     */
    protected $destinasiPemanduRepo;

    public function setUp()
    {
        parent::setUp();
        $this->destinasiPemanduRepo = App::make(DestinasiPemanduRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateDestinasiPemandu()
    {
        $destinasiPemandu = $this->fakeDestinasiPemanduData();
        $createdDestinasiPemandu = $this->destinasiPemanduRepo->create($destinasiPemandu);
        $createdDestinasiPemandu = $createdDestinasiPemandu->toArray();
        $this->assertArrayHasKey('id', $createdDestinasiPemandu);
        $this->assertNotNull($createdDestinasiPemandu['id'], 'Created DestinasiPemandu must have id specified');
        $this->assertNotNull(DestinasiPemandu::find($createdDestinasiPemandu['id']), 'DestinasiPemandu with given id must be in DB');
        $this->assertModelData($destinasiPemandu, $createdDestinasiPemandu);
    }

    /**
     * @test read
     */
    public function testReadDestinasiPemandu()
    {
        $destinasiPemandu = $this->makeDestinasiPemandu();
        $dbDestinasiPemandu = $this->destinasiPemanduRepo->find($destinasiPemandu->id);
        $dbDestinasiPemandu = $dbDestinasiPemandu->toArray();
        $this->assertModelData($destinasiPemandu->toArray(), $dbDestinasiPemandu);
    }

    /**
     * @test update
     */
    public function testUpdateDestinasiPemandu()
    {
        $destinasiPemandu = $this->makeDestinasiPemandu();
        $fakeDestinasiPemandu = $this->fakeDestinasiPemanduData();
        $updatedDestinasiPemandu = $this->destinasiPemanduRepo->update($fakeDestinasiPemandu, $destinasiPemandu->id);
        $this->assertModelData($fakeDestinasiPemandu, $updatedDestinasiPemandu->toArray());
        $dbDestinasiPemandu = $this->destinasiPemanduRepo->find($destinasiPemandu->id);
        $this->assertModelData($fakeDestinasiPemandu, $dbDestinasiPemandu->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteDestinasiPemandu()
    {
        $destinasiPemandu = $this->makeDestinasiPemandu();
        $resp = $this->destinasiPemanduRepo->delete($destinasiPemandu->id);
        $this->assertTrue($resp);
        $this->assertNull(DestinasiPemandu::find($destinasiPemandu->id), 'DestinasiPemandu should not exist in DB');
    }
}
