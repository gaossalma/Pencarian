<?php

use Faker\Factory as Faker;
use App\Models\Pemandu;
use App\Repositories\PemanduRepository;

trait MakePemanduTrait
{
    /**
     * Create fake instance of Pemandu and save it in database
     *
     * @param array $pemanduFields
     * @return Pemandu
     */
    public function makePemandu($pemanduFields = [])
    {
        /** @var PemanduRepository $pemanduRepo */
        $pemanduRepo = App::make(PemanduRepository::class);
        $theme = $this->fakePemanduData($pemanduFields);
        return $pemanduRepo->create($theme);
    }

    /**
     * Get fake instance of Pemandu
     *
     * @param array $pemanduFields
     * @return Pemandu
     */
    public function fakePemandu($pemanduFields = [])
    {
        return new Pemandu($this->fakePemanduData($pemanduFields));
    }

    /**
     * Get fake data of Pemandu
     *
     * @param array $postFields
     * @return array
     */
    public function fakePemanduData($pemanduFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'fullname' => $fake->word,
            'email' => $fake->word,
            'negara' => $fake->word,
            'jenis_kelamin' => $fake->word,
            'tanggal_lahir' => $fake->word,
            'nomor_tlp' => $fake->word,
            'password' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $pemanduFields);
    }
}
