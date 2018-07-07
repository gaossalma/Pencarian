<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class BahasaPemanduApiTest extends TestCase
{
    use MakeBahasaPemanduTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateBahasaPemandu()
    {
        $bahasaPemandu = $this->fakeBahasaPemanduData();
        $this->json('POST', '/api/v1/bahasaPemandus', $bahasaPemandu);

        $this->assertApiResponse($bahasaPemandu);
    }

    /**
     * @test
     */
    public function testReadBahasaPemandu()
    {
        $bahasaPemandu = $this->makeBahasaPemandu();
        $this->json('GET', '/api/v1/bahasaPemandus/'.$bahasaPemandu->id);

        $this->assertApiResponse($bahasaPemandu->toArray());
    }

    /**
     * @test
     */
    public function testUpdateBahasaPemandu()
    {
        $bahasaPemandu = $this->makeBahasaPemandu();
        $editedBahasaPemandu = $this->fakeBahasaPemanduData();

        $this->json('PUT', '/api/v1/bahasaPemandus/'.$bahasaPemandu->id, $editedBahasaPemandu);

        $this->assertApiResponse($editedBahasaPemandu);
    }

    /**
     * @test
     */
    public function testDeleteBahasaPemandu()
    {
        $bahasaPemandu = $this->makeBahasaPemandu();
        $this->json('DELETE', '/api/v1/bahasaPemandus/'.$bahasaPemandu->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/bahasaPemandus/'.$bahasaPemandu->id);

        $this->assertResponseStatus(404);
    }
}
