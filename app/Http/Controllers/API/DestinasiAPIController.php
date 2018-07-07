<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateDestinasiAPIRequest;
use App\Http\Requests\API\UpdateDestinasiAPIRequest;
use App\Models\Destinasi;
use App\Repositories\DestinasiRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class DestinasiController
 * @package App\Http\Controllers\API
 */

class DestinasiAPIController extends AppBaseController
{
    /** @var  DestinasiRepository */
    private $destinasiRepository;

    public function __construct(DestinasiRepository $destinasiRepo)
    {
        $this->destinasiRepository = $destinasiRepo;
    }

    /**
     * Display a listing of the Destinasi.
     * GET|HEAD /destinasis
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->destinasiRepository->pushCriteria(new RequestCriteria($request));
        $this->destinasiRepository->pushCriteria(new LimitOffsetCriteria($request));
        $destinasis = $this->destinasiRepository->all();

        return $this->sendResponse($destinasis->toArray(), 'Destinasis retrieved successfully');
    }

    /**
     * Store a newly created Destinasi in storage.
     * POST /destinasis
     *
     * @param CreateDestinasiAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateDestinasiAPIRequest $request)
    {
        $input = $request->all();

        $destinasis = $this->destinasiRepository->create($input);

        return $this->sendResponse($destinasis->toArray(), 'Destinasi saved successfully');
    }

    /**
     * Display the specified Destinasi.
     * GET|HEAD /destinasis/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Destinasi $destinasi */
        $destinasi = $this->destinasiRepository->findWithoutFail($id);

        if (empty($destinasi)) {
            return $this->sendError('Destinasi not found');
        }

        return $this->sendResponse($destinasi->toArray(), 'Destinasi retrieved successfully');
    }

    /**
     * Update the specified Destinasi in storage.
     * PUT/PATCH /destinasis/{id}
     *
     * @param  int $id
     * @param UpdateDestinasiAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDestinasiAPIRequest $request)
    {
        $input = $request->all();

        /** @var Destinasi $destinasi */
        $destinasi = $this->destinasiRepository->findWithoutFail($id);

        if (empty($destinasi)) {
            return $this->sendError('Destinasi not found');
        }

        $destinasi = $this->destinasiRepository->update($input, $id);

        return $this->sendResponse($destinasi->toArray(), 'Destinasi updated successfully');
    }

    /**
     * Remove the specified Destinasi from storage.
     * DELETE /destinasis/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Destinasi $destinasi */
        $destinasi = $this->destinasiRepository->findWithoutFail($id);

        if (empty($destinasi)) {
            return $this->sendError('Destinasi not found');
        }

        $destinasi->delete();

        return $this->sendResponse($id, 'Destinasi deleted successfully');
    }
}
