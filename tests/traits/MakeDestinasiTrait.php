<?php

use Faker\Factory as Faker;
use App\Models\Destinasi;
use App\Repositories\DestinasiRepository;

trait MakeDestinasiTrait
{
    /**
     * Create fake instance of Destinasi and save it in database
     *
     * @param array $destinasiFields
     * @return Destinasi
     */
    public function makeDestinasi($destinasiFields = [])
    {
        /** @var DestinasiRepository $destinasiRepo */
        $destinasiRepo = App::make(DestinasiRepository::class);
        $theme = $this->fakeDestinasiData($destinasiFields);
        return $destinasiRepo->create($theme);
    }

    /**
     * Get fake instance of Destinasi
     *
     * @param array $destinasiFields
     * @return Destinasi
     */
    public function fakeDestinasi($destinasiFields = [])
    {
        return new Destinasi($this->fakeDestinasiData($destinasiFields));
    }

    /**
     * Get fake data of Destinasi
     *
     * @param array $postFields
     * @return array
     */
    public function fakeDestinasiData($destinasiFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'kode' => $fake->word,
            'nama' => $fake->word,
            'deskripsi' => $fake->word,
            'longitude' => $fake->word,
            'latitude' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $destinasiFields);
    }
}
