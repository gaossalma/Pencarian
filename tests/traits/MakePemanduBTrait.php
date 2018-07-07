<?php

use Faker\Factory as Faker;
use App\Models\PemanduB;
use App\Repositories\PemanduBRepository;

trait MakePemanduBTrait
{
    /**
     * Create fake instance of PemanduB and save it in database
     *
     * @param array $pemanduBFields
     * @return PemanduB
     */
    public function makePemanduB($pemanduBFields = [])
    {
        /** @var PemanduBRepository $pemanduBRepo */
        $pemanduBRepo = App::make(PemanduBRepository::class);
        $theme = $this->fakePemanduBData($pemanduBFields);
        return $pemanduBRepo->create($theme);
    }

    /**
     * Get fake instance of PemanduB
     *
     * @param array $pemanduBFields
     * @return PemanduB
     */
    public function fakePemanduB($pemanduBFields = [])
    {
        return new PemanduB($this->fakePemanduBData($pemanduBFields));
    }

    /**
     * Get fake data of PemanduB
     *
     * @param array $postFields
     * @return array
     */
    public function fakePemanduBData($pemanduBFields = [])
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
            'password' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $pemanduBFields);
    }
}
