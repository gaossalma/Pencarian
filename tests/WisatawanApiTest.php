<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class WisatawanApiTest extends TestCase
{
    use MakeWisatawanTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateWisatawan()
    {
        $wisatawan = $this->fakeWisatawanData();
        $this->json('POST', '/api/v1/wisatawans', $wisatawan);

        $this->assertApiResponse($wisatawan);
    }

    /**
     * @test
     */
    public function testReadWisatawan()
    {
        $wisatawan = $this->makeWisatawan();
        $this->json('GET', '/api/v1/wisatawans/'.$wisatawan->id);

        $this->assertApiResponse($wisatawan->toArray());
    }

    /**
     * @test
     */
    public function testUpdateWisatawan()
    {
        $wisatawan = $this->makeWisatawan();
        $editedWisatawan = $this->fakeWisatawanData();

        $this->json('PUT', '/api/v1/wisatawans/'.$wisatawan->id, $editedWisatawan);

        $this->assertApiResponse($editedWisatawan);
    }

    /**
     * @test
     */
    public function testDeleteWisatawan()
    {
        $wisatawan = $this->makeWisatawan();
        $this->json('DELETE', '/api/v1/wisatawans/'.$wisatawan->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/wisatawans/'.$wisatawan->id);

        $this->assertResponseStatus(404);
    }
}
