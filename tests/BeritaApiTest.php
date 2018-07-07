<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class BeritaApiTest extends TestCase
{
    use MakeBeritaTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateBerita()
    {
        $berita = $this->fakeBeritaData();
        $this->json('POST', '/api/v1/beritas', $berita);

        $this->assertApiResponse($berita);
    }

    /**
     * @test
     */
    public function testReadBerita()
    {
        $berita = $this->makeBerita();
        $this->json('GET', '/api/v1/beritas/'.$berita->id);

        $this->assertApiResponse($berita->toArray());
    }

    /**
     * @test
     */
    public function testUpdateBerita()
    {
        $berita = $this->makeBerita();
        $editedBerita = $this->fakeBeritaData();

        $this->json('PUT', '/api/v1/beritas/'.$berita->id, $editedBerita);

        $this->assertApiResponse($editedBerita);
    }

    /**
     * @test
     */
    public function testDeleteBerita()
    {
        $berita = $this->makeBerita();
        $this->json('DELETE', '/api/v1/beritas/'.$berita->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/beritas/'.$berita->id);

        $this->assertResponseStatus(404);
    }
}
