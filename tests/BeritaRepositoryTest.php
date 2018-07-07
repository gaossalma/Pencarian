<?php

use App\Models\Berita;
use App\Repositories\BeritaRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class BeritaRepositoryTest extends TestCase
{
    use MakeBeritaTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var BeritaRepository
     */
    protected $beritaRepo;

    public function setUp()
    {
        parent::setUp();
        $this->beritaRepo = App::make(BeritaRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateBerita()
    {
        $berita = $this->fakeBeritaData();
        $createdBerita = $this->beritaRepo->create($berita);
        $createdBerita = $createdBerita->toArray();
        $this->assertArrayHasKey('id', $createdBerita);
        $this->assertNotNull($createdBerita['id'], 'Created Berita must have id specified');
        $this->assertNotNull(Berita::find($createdBerita['id']), 'Berita with given id must be in DB');
        $this->assertModelData($berita, $createdBerita);
    }

    /**
     * @test read
     */
    public function testReadBerita()
    {
        $berita = $this->makeBerita();
        $dbBerita = $this->beritaRepo->find($berita->id);
        $dbBerita = $dbBerita->toArray();
        $this->assertModelData($berita->toArray(), $dbBerita);
    }

    /**
     * @test update
     */
    public function testUpdateBerita()
    {
        $berita = $this->makeBerita();
        $fakeBerita = $this->fakeBeritaData();
        $updatedBerita = $this->beritaRepo->update($fakeBerita, $berita->id);
        $this->assertModelData($fakeBerita, $updatedBerita->toArray());
        $dbBerita = $this->beritaRepo->find($berita->id);
        $this->assertModelData($fakeBerita, $dbBerita->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteBerita()
    {
        $berita = $this->makeBerita();
        $resp = $this->beritaRepo->delete($berita->id);
        $this->assertTrue($resp);
        $this->assertNull(Berita::find($berita->id), 'Berita should not exist in DB');
    }
}
