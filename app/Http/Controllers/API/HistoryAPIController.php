<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateHistoryAPIRequest;
use App\Http\Requests\API\UpdateHistoryAPIRequest;
use App\Models\History;
use App\Repositories\HistoryRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class HistoryController
 * @package App\Http\Controllers\API
 */

class HistoryAPIController extends AppBaseController
{
    /** @var  HistoryRepository */
    private $historyRepository;

    public function __construct(HistoryRepository $historyRepo)
    {
        $this->historyRepository = $historyRepo;
    }

    /**
     * Display a listing of the History.
     * GET|HEAD /histories
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->historyRepository->pushCriteria(new RequestCriteria($request));
        $this->historyRepository->pushCriteria(new LimitOffsetCriteria($request));
        $histories = $this->historyRepository->all();

        return $this->sendResponse($histories->toArray(), 'Histories retrieved successfully');
    }

    /**
     * Store a newly created History in storage.
     * POST /histories
     *
     * @param CreateHistoryAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateHistoryAPIRequest $request)
    {
        $input = $request->all();

        $histories = $this->historyRepository->create($input);

        return $this->sendResponse($histories->toArray(), 'History saved successfully');
    }

    /**
     * Display the specified History.
     * GET|HEAD /histories/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var History $history */
        $history = $this->historyRepository->findWithoutFail($id);

        if (empty($history)) {
            return $this->sendError('History not found');
        }

        return $this->sendResponse($history->toArray(), 'History retrieved successfully');
    }

    /**
     * Update the specified History in storage.
     * PUT/PATCH /histories/{id}
     *
     * @param  int $id
     * @param UpdateHistoryAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateHistoryAPIRequest $request)
    {
        $input = $request->all();

        /** @var History $history */
        $history = $this->historyRepository->findWithoutFail($id);

        if (empty($history)) {
            return $this->sendError('History not found');
        }

        $history = $this->historyRepository->update($input, $id);

        return $this->sendResponse($history->toArray(), 'History updated successfully');
    }

    /**
     * Remove the specified History from storage.
     * DELETE /histories/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var History $history */
        $history = $this->historyRepository->findWithoutFail($id);

        if (empty($history)) {
            return $this->sendError('History not found');
        }

        $history->delete();

        return $this->sendResponse($id, 'History deleted successfully');
    }
}
