<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PemanduBApiTest extends TestCase
{
    use MakePemanduBTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatePemanduB()
    {
        $pemanduB = $this->fakePemanduBData();
        $this->json('POST', '/api/v1/pemanduBs', $pemanduB);

        $this->assertApiResponse($pemanduB);
    }

    /**
     * @test
     */
    public function testReadPemanduB()
    {
        $pemanduB = $this->makePemanduB();
        $this->json('GET', '/api/v1/pemanduBs/'.$pemanduB->id);

        $this->assertApiResponse($pemanduB->toArray());
    }

    /**
     * @test
     */
    public function testUpdatePemanduB()
    {
        $pemanduB = $this->makePemanduB();
        $editedPemanduB = $this->fakePemanduBData();

        $this->json('PUT', '/api/v1/pemanduBs/'.$pemanduB->id, $editedPemanduB);

        $this->assertApiResponse($editedPemanduB);
    }

    /**
     * @test
     */
    public function testDeletePemanduB()
    {
        $pemanduB = $this->makePemanduB();
        $this->json('DELETE', '/api/v1/pemanduBs/'.$pemanduB->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/pemanduBs/'.$pemanduB->id);

        $this->assertResponseStatus(404);
    }
}
