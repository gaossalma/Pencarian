<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DestinasiPemanduApiTest extends TestCase
{
    use MakeDestinasiPemanduTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateDestinasiPemandu()
    {
        $destinasiPemandu = $this->fakeDestinasiPemanduData();
        $this->json('POST', '/api/v1/destinasiPemandus', $destinasiPemandu);

        $this->assertApiResponse($destinasiPemandu);
    }

    /**
     * @test
     */
    public function testReadDestinasiPemandu()
    {
        $destinasiPemandu = $this->makeDestinasiPemandu();
        $this->json('GET', '/api/v1/destinasiPemandus/'.$destinasiPemandu->id);

        $this->assertApiResponse($destinasiPemandu->toArray());
    }

    /**
     * @test
     */
    public function testUpdateDestinasiPemandu()
    {
        $destinasiPemandu = $this->makeDestinasiPemandu();
        $editedDestinasiPemandu = $this->fakeDestinasiPemanduData();

        $this->json('PUT', '/api/v1/destinasiPemandus/'.$destinasiPemandu->id, $editedDestinasiPemandu);

        $this->assertApiResponse($editedDestinasiPemandu);
    }

    /**
     * @test
     */
    public function testDeleteDestinasiPemandu()
    {
        $destinasiPemandu = $this->makeDestinasiPemandu();
        $this->json('DELETE', '/api/v1/destinasiPemandus/'.$destinasiPemandu->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/destinasiPemandus/'.$destinasiPemandu->id);

        $this->assertResponseStatus(404);
    }
}
