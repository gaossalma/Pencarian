<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class BahasaApiTest extends TestCase
{
    use MakeBahasaTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateBahasa()
    {
        $bahasa = $this->fakeBahasaData();
        $this->json('POST', '/api/v1/bahasas', $bahasa);

        $this->assertApiResponse($bahasa);
    }

    /**
     * @test
     */
    public function testReadBahasa()
    {
        $bahasa = $this->makeBahasa();
        $this->json('GET', '/api/v1/bahasas/'.$bahasa->id);

        $this->assertApiResponse($bahasa->toArray());
    }

    /**
     * @test
     */
    public function testUpdateBahasa()
    {
        $bahasa = $this->makeBahasa();
        $editedBahasa = $this->fakeBahasaData();

        $this->json('PUT', '/api/v1/bahasas/'.$bahasa->id, $editedBahasa);

        $this->assertApiResponse($editedBahasa);
    }

    /**
     * @test
     */
    public function testDeleteBahasa()
    {
        $bahasa = $this->makeBahasa();
        $this->json('DELETE', '/api/v1/bahasas/'.$bahasa->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/bahasas/'.$bahasa->id);

        $this->assertResponseStatus(404);
    }
}
