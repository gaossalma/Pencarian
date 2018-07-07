<?php

use Faker\Factory as Faker;
use App\Models\Bahasa;
use App\Repositories\BahasaRepository;

trait MakeBahasaTrait
{
    /**
     * Create fake instance of Bahasa and save it in database
     *
     * @param array $bahasaFields
     * @return Bahasa
     */
    public function makeBahasa($bahasaFields = [])
    {
        /** @var BahasaRepository $bahasaRepo */
        $bahasaRepo = App::make(BahasaRepository::class);
        $theme = $this->fakeBahasaData($bahasaFields);
        return $bahasaRepo->create($theme);
    }

    /**
     * Get fake instance of Bahasa
     *
     * @param array $bahasaFields
     * @return Bahasa
     */
    public function fakeBahasa($bahasaFields = [])
    {
        return new Bahasa($this->fakeBahasaData($bahasaFields));
    }

    /**
     * Get fake data of Bahasa
     *
     * @param array $postFields
     * @return array
     */
    public function fakeBahasaData($bahasaFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'kode' => $fake->word,
            'bahasa' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $bahasaFields);
    }
}
