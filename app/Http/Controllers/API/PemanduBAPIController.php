<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePemanduBAPIRequest;
use App\Http\Requests\API\UpdatePemanduBAPIRequest;
use App\Models\PemanduB;
use App\Repositories\PemanduBRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class PemanduBController
 * @package App\Http\Controllers\API
 */

class PemanduBAPIController extends AppBaseController
{
    /** @var  PemanduBRepository */
    private $pemanduBRepository;

    public function __construct(PemanduBRepository $pemanduBRepo)
    {
        $this->pemanduBRepository = $pemanduBRepo;
    }

    /**
     * Display a listing of the PemanduB.
     * GET|HEAD /pemanduBs
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->pemanduBRepository->pushCriteria(new RequestCriteria($request));
        $this->pemanduBRepository->pushCriteria(new LimitOffsetCriteria($request));
        $pemanduBs = $this->pemanduBRepository->all();

        return $this->sendResponse($pemanduBs->toArray(), 'Pemandu Bs retrieved successfully');
    }

    /**
     * Store a newly created PemanduB in storage.
     * POST /pemanduBs
     *
     * @param CreatePemanduBAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatePemanduBAPIRequest $request)
    {
        $input = $request->all();

        $pemanduBs = $this->pemanduBRepository->create($input);

        return $this->sendResponse($pemanduBs->toArray(), 'Pemandu B saved successfully');
    }

    /**
     * Display the specified PemanduB.
     * GET|HEAD /pemanduBs/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var PemanduB $pemanduB */
        $pemanduB = $this->pemanduBRepository->findWithoutFail($id);

        if (empty($pemanduB)) {
            return $this->sendError('Pemandu B not found');
        }

        return $this->sendResponse($pemanduB->toArray(), 'Pemandu B retrieved successfully');
    }

    /**
     * Update the specified PemanduB in storage.
     * PUT/PATCH /pemanduBs/{id}
     *
     * @param  int $id
     * @param UpdatePemanduBAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePemanduBAPIRequest $request)
    {
        $input = $request->all();

        /** @var PemanduB $pemanduB */
        $pemanduB = $this->pemanduBRepository->findWithoutFail($id);

        if (empty($pemanduB)) {
            return $this->sendError('Pemandu B not found');
        }

        $pemanduB = $this->pemanduBRepository->update($input, $id);

        return $this->sendResponse($pemanduB->toArray(), 'PemanduB updated successfully');
    }

    /**
     * Remove the specified PemanduB from storage.
     * DELETE /pemanduBs/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var PemanduB $pemanduB */
        $pemanduB = $this->pemanduBRepository->findWithoutFail($id);

        if (empty($pemanduB)) {
            return $this->sendError('Pemandu B not found');
        }

        $pemanduB->delete();

        return $this->sendResponse($id, 'Pemandu B deleted successfully');
    }
}
