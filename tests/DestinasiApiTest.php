<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DestinasiApiTest extends TestCase
{
    use MakeDestinasiTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateDestinasi()
    {
        $destinasi = $this->fakeDestinasiData();
        $this->json('POST', '/api/v1/destinasis', $destinasi);

        $this->assertApiResponse($destinasi);
    }

    /**
     * @test
     */
    public function testReadDestinasi()
    {
        $destinasi = $this->makeDestinasi();
        $this->json('GET', '/api/v1/destinasis/'.$destinasi->id);

        $this->assertApiResponse($destinasi->toArray());
    }

    /**
     * @test
     */
    public function testUpdateDestinasi()
    {
        $destinasi = $this->makeDestinasi();
        $editedDestinasi = $this->fakeDestinasiData();

        $this->json('PUT', '/api/v1/destinasis/'.$destinasi->id, $editedDestinasi);

        $this->assertApiResponse($editedDestinasi);
    }

    /**
     * @test
     */
    public function testDeleteDestinasi()
    {
        $destinasi = $this->makeDestinasi();
        $this->json('DELETE', '/api/v1/destinasis/'.$destinasi->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/destinasis/'.$destinasi->id);

        $this->assertResponseStatus(404);
    }
}
