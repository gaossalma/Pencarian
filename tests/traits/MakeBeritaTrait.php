<?php

use Faker\Factory as Faker;
use App\Models\Berita;
use App\Repositories\BeritaRepository;

trait MakeBeritaTrait
{
    /**
     * Create fake instance of Berita and save it in database
     *
     * @param array $beritaFields
     * @return Berita
     */
    public function makeBerita($beritaFields = [])
    {
        /** @var BeritaRepository $beritaRepo */
        $beritaRepo = App::make(BeritaRepository::class);
        $theme = $this->fakeBeritaData($beritaFields);
        return $beritaRepo->create($theme);
    }

    /**
     * Get fake instance of Berita
     *
     * @param array $beritaFields
     * @return Berita
     */
    public function fakeBerita($beritaFields = [])
    {
        return new Berita($this->fakeBeritaData($beritaFields));
    }

    /**
     * Get fake data of Berita
     *
     * @param array $postFields
     * @return array
     */
    public function fakeBeritaData($beritaFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'judul' => $fake->word,
            'isi' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $beritaFields);
    }
}
