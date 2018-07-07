<?php

use Faker\Factory as Faker;
use App\Models\History;
use App\Repositories\HistoryRepository;

trait MakeHistoryTrait
{
    /**
     * Create fake instance of History and save it in database
     *
     * @param array $historyFields
     * @return History
     */
    public function makeHistory($historyFields = [])
    {
        /** @var HistoryRepository $historyRepo */
        $historyRepo = App::make(HistoryRepository::class);
        $theme = $this->fakeHistoryData($historyFields);
        return $historyRepo->create($theme);
    }

    /**
     * Get fake instance of History
     *
     * @param array $historyFields
     * @return History
     */
    public function fakeHistory($historyFields = [])
    {
        return new History($this->fakeHistoryData($historyFields));
    }

    /**
     * Get fake data of History
     *
     * @param array $postFields
     * @return array
     */
    public function fakeHistoryData($historyFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'id_pemandu' => $fake->randomDigitNotNull,
            'id_destinasi' => $fake->randomDigitNotNull,
            'id_pemanduB' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $historyFields);
    }
}
