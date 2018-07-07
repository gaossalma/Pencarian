<?php

use Faker\Factory as Faker;
use App\Models\Wisatawan;
use App\Repositories\WisatawanRepository;

trait MakeWisatawanTrait
{
    /**
     * Create fake instance of Wisatawan and save it in database
     *
     * @param array $wisatawanFields
     * @return Wisatawan
     */
    public function makeWisatawan($wisatawanFields = [])
    {
        /** @var WisatawanRepository $wisatawanRepo */
        $wisatawanRepo = App::make(WisatawanRepository::class);
        $theme = $this->fakeWisatawanData($wisatawanFields);
        return $wisatawanRepo->create($theme);
    }

    /**
     * Get fake instance of Wisatawan
     *
     * @param array $wisatawanFields
     * @return Wisatawan
     */
    public function fakeWisatawan($wisatawanFields = [])
    {
        return new Wisatawan($this->fakeWisatawanData($wisatawanFields));
    }

    /**
     * Get fake data of Wisatawan
     *
     * @param array $postFields
     * @return array
     */
    public function fakeWisatawanData($wisatawanFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'fullname' => $fake->word,
            'email' => $fake->word,
            'jenis_kelamin' => $fake->word,
            'negara' => $fake->word,
            'tanggal_lahir' => $fake->word,
            'nomor_tlp' => $fake->word,
            'longitude' => $fake->word,
            'latitude' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $wisatawanFields);
    }
}
