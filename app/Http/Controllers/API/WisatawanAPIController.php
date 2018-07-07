<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateWisatawanAPIRequest;
use App\Http\Requests\API\UpdateWisatawanAPIRequest;
use App\Models\Wisatawan;
use App\Repositories\WisatawanRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class WisatawanController
 * @package App\Http\Controllers\API
 */

class WisatawanAPIController extends AppBaseController
{
    /** @var  WisatawanRepository */
    private $wisatawanRepository;

    public function __construct(WisatawanRepository $wisatawanRepo)
    {
        $this->wisatawanRepository = $wisatawanRepo;
    }

    /**
     * Display a listing of the Wisatawan.
     * GET|HEAD /wisatawans
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->wisatawanRepository->pushCriteria(new RequestCriteria($request));
        $this->wisatawanRepository->pushCriteria(new LimitOffsetCriteria($request));
        $wisatawans = $this->wisatawanRepository->all();

        return $this->sendResponse($wisatawans->toArray(), 'Wisatawans retrieved successfully');
    }

    /**
     * Store a newly created Wisatawan in storage.
     * POST /wisatawans
     *
     * @param CreateWisatawanAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateWisatawanAPIRequest $request)
    {
        $input = $request->all();

        $wisatawans = $this->wisatawanRepository->create($input);

        return $this->sendResponse($wisatawans->toArray(), 'Wisatawan saved successfully');
    }

    /**
     * Display the specified Wisatawan.
     * GET|HEAD /wisatawans/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Wisatawan $wisatawan */
        $wisatawan = $this->wisatawanRepository->findWithoutFail($id);

        if (empty($wisatawan)) {
            return $this->sendError('Wisatawan not found');
        }

        return $this->sendResponse($wisatawan->toArray(), 'Wisatawan retrieved successfully');
    }

    /**
     * Update the specified Wisatawan in storage.
     * PUT/PATCH /wisatawans/{id}
     *
     * @param  int $id
     * @param UpdateWisatawanAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateWisatawanAPIRequest $request)
    {
        $input = $request->all();

        /** @var Wisatawan $wisatawan */
        $wisatawan = $this->wisatawanRepository->findWithoutFail($id);

        if (empty($wisatawan)) {
            return $this->sendError('Wisatawan not found');
        }

        $wisatawan = $this->wisatawanRepository->update($input, $id);

        return $this->sendResponse($wisatawan->toArray(), 'Wisatawan updated successfully');
    }

    /**
     * Remove the specified Wisatawan from storage.
     * DELETE /wisatawans/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Wisatawan $wisatawan */
        $wisatawan = $this->wisatawanRepository->findWithoutFail($id);

        if (empty($wisatawan)) {
            return $this->sendError('Wisatawan not found');
        }

        $wisatawan->delete();

        return $this->sendResponse($id, 'Wisatawan deleted successfully');
    }
}
