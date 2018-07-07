<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PemanduApiTest extends TestCase
{
    use MakePemanduTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatePemandu()
    {
        $pemandu = $this->fakePemanduData();
        $this->json('POST', '/api/v1/pemandus', $pemandu);

        $this->assertApiResponse($pemandu);
    }

    /**
     * @test
     */
    public function testReadPemandu()
    {
        $pemandu = $this->makePemandu();
        $this->json('GET', '/api/v1/pemandus/'.$pemandu->id);

        $this->assertApiResponse($pemandu->toArray());
    }

    /**
     * @test
     */
    public function testUpdatePemandu()
    {
        $pemandu = $this->makePemandu();
        $editedPemandu = $this->fakePemanduData();

        $this->json('PUT', '/api/v1/pemandus/'.$pemandu->id, $editedPemandu);

        $this->assertApiResponse($editedPemandu);
    }

    /**
     * @test
     */
    public function testDeletePemandu()
    {
        $pemandu = $this->makePemandu();
        $this->json('DELETE', '/api/v1/pemandus/'.$pemandu->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/pemandus/'.$pemandu->id);

        $this->assertResponseStatus(404);
    }
}
