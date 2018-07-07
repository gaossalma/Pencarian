<?php

use Faker\Factory as Faker;
use App\Models\BahasaPemandu;
use App\Repositories\BahasaPemanduRepository;

trait MakeBahasaPemanduTrait
{
    /**
     * Create fake instance of BahasaPemandu and save it in database
     *
     * @param array $bahasaPemanduFields
     * @return BahasaPemandu
     */
    public function makeBahasaPemandu($bahasaPemanduFields = [])
    {
        /** @var BahasaPemanduRepository $bahasaPemanduRepo */
        $bahasaPemanduRepo = App::make(BahasaPemanduRepository::class);
        $theme = $this->fakeBahasaPemanduData($bahasaPemanduFields);
        return $bahasaPemanduRepo->create($theme);
    }

    /**
     * Get fake instance of BahasaPemandu
     *
     * @param array $bahasaPemanduFields
     * @return BahasaPemandu
     */
    public function fakeBahasaPemandu($bahasaPemanduFields = [])
    {
        return new BahasaPemandu($this->fakeBahasaPemanduData($bahasaPemanduFields));
    }

    /**
     * Get fake data of BahasaPemandu
     *
     * @param array $postFields
     * @return array
     */
    public function fakeBahasaPemanduData($bahasaPemanduFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'id_pemanduB' => $fake->randomDigitNotNull,
            'id_bahasa' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $bahasaPemanduFields);
    }
}
