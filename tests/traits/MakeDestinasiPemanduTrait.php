<?php

use Faker\Factory as Faker;
use App\Models\DestinasiPemandu;
use App\Repositories\DestinasiPemanduRepository;

trait MakeDestinasiPemanduTrait
{
    /**
     * Create fake instance of DestinasiPemandu and save it in database
     *
     * @param array $destinasiPemanduFields
     * @return DestinasiPemandu
     */
    public function makeDestinasiPemandu($destinasiPemanduFields = [])
    {
        /** @var DestinasiPemanduRepository $destinasiPemanduRepo */
        $destinasiPemanduRepo = App::make(DestinasiPemanduRepository::class);
        $theme = $this->fakeDestinasiPemanduData($destinasiPemanduFields);
        return $destinasiPemanduRepo->create($theme);
    }

    /**
     * Get fake instance of DestinasiPemandu
     *
     * @param array $destinasiPemanduFields
     * @return DestinasiPemandu
     */
    public function fakeDestinasiPemandu($destinasiPemanduFields = [])
    {
        return new DestinasiPemandu($this->fakeDestinasiPemanduData($destinasiPemanduFields));
    }

    /**
     * Get fake data of DestinasiPemandu
     *
     * @param array $postFields
     * @return array
     */
    public function fakeDestinasiPemanduData($destinasiPemanduFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'id_pemanduB' => $fake->randomDigitNotNull,
            'id_destinasi' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $destinasiPemanduFields);
    }
}
