<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePemanduAPIRequest;
use App\Http\Requests\API\UpdatePemanduAPIRequest;
use App\Models\Pemandu;
use App\Repositories\PemanduRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class PemanduController
 * @package App\Http\Controllers\API
 */

class PemanduAPIController extends AppBaseController
{
    /** @var  PemanduRepository */
    private $pemanduRepository;

    public function __construct(PemanduRepository $pemanduRepo)
    {
        $this->pemanduRepository = $pemanduRepo;
    }

    /**
     * Display a listing of the Pemandu.
     * GET|HEAD /pemandus
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->pemanduRepository->pushCriteria(new RequestCriteria($request));
        $this->pemanduRepository->pushCriteria(new LimitOffsetCriteria($request));
        $pemandus = $this->pemanduRepository->all();

        return $this->sendResponse($pemandus->toArray(), 'Pemandus retrieved successfully');
    }

    /**
     * Store a newly created Pemandu in storage.
     * POST /pemandus
     *
     * @param CreatePemanduAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatePemanduAPIRequest $request)
    {
        $input = $request->all();

        $pemandus = $this->pemanduRepository->create($input);

        return $this->sendResponse($pemandus->toArray(), 'Pemandu saved successfully');
    }

    /**
     * Display the specified Pemandu.
     * GET|HEAD /pemandus/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Pemandu $pemandu */
        $pemandu = $this->pemanduRepository->findWithoutFail($id);

        if (empty($pemandu)) {
            return $this->sendError('Pemandu not found');
        }

        return $this->sendResponse($pemandu->toArray(), 'Pemandu retrieved successfully');
    }

    /**
     * Update the specified Pemandu in storage.
     * PUT/PATCH /pemandus/{id}
     *
     * @param  int $id
     * @param UpdatePemanduAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePemanduAPIRequest $request)
    {
        $input = $request->all();

        /** @var Pemandu $pemandu */
        $pemandu = $this->pemanduRepository->findWithoutFail($id);

        if (empty($pemandu)) {
            return $this->sendError('Pemandu not found');
        }

        $pemandu = $this->pemanduRepository->update($input, $id);

        return $this->sendResponse($pemandu->toArray(), 'Pemandu updated successfully');
    }

    /**
     * Remove the specified Pemandu from storage.
     * DELETE /pemandus/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Pemandu $pemandu */
        $pemandu = $this->pemanduRepository->findWithoutFail($id);

        if (empty($pemandu)) {
            return $this->sendError('Pemandu not found');
        }

        $pemandu->delete();

        return $this->sendResponse($id, 'Pemandu deleted successfully');
    }
}
