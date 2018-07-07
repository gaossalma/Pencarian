<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateBahasaAPIRequest;
use App\Http\Requests\API\UpdateBahasaAPIRequest;
use App\Models\Bahasa;
use App\Repositories\BahasaRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class BahasaController
 * @package App\Http\Controllers\API
 */

class BahasaAPIController extends AppBaseController
{
    /** @var  BahasaRepository */
    private $bahasaRepository;

    public function __construct(BahasaRepository $bahasaRepo)
    {
        $this->bahasaRepository = $bahasaRepo;
    }

    /**
     * Display a listing of the Bahasa.
     * GET|HEAD /bahasas
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->bahasaRepository->pushCriteria(new RequestCriteria($request));
        $this->bahasaRepository->pushCriteria(new LimitOffsetCriteria($request));
        $bahasas = $this->bahasaRepository->all();

        return $this->sendResponse($bahasas->toArray(), 'Bahasas retrieved successfully');
    }

    /**
     * Store a newly created Bahasa in storage.
     * POST /bahasas
     *
     * @param CreateBahasaAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateBahasaAPIRequest $request)
    {
        $input = $request->all();

        $bahasas = $this->bahasaRepository->create($input);

        return $this->sendResponse($bahasas->toArray(), 'Bahasa saved successfully');
    }

    /**
     * Display the specified Bahasa.
     * GET|HEAD /bahasas/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Bahasa $bahasa */
        $bahasa = $this->bahasaRepository->findWithoutFail($id);

        if (empty($bahasa)) {
            return $this->sendError('Bahasa not found');
        }

        return $this->sendResponse($bahasa->toArray(), 'Bahasa retrieved successfully');
    }

    /**
     * Update the specified Bahasa in storage.
     * PUT/PATCH /bahasas/{id}
     *
     * @param  int $id
     * @param UpdateBahasaAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBahasaAPIRequest $request)
    {
        $input = $request->all();

        /** @var Bahasa $bahasa */
        $bahasa = $this->bahasaRepository->findWithoutFail($id);

        if (empty($bahasa)) {
            return $this->sendError('Bahasa not found');
        }

        $bahasa = $this->bahasaRepository->update($input, $id);

        return $this->sendResponse($bahasa->toArray(), 'Bahasa updated successfully');
    }

    /**
     * Remove the specified Bahasa from storage.
     * DELETE /bahasas/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Bahasa $bahasa */
        $bahasa = $this->bahasaRepository->findWithoutFail($id);

        if (empty($bahasa)) {
            return $this->sendError('Bahasa not found');
        }

        $bahasa->delete();

        return $this->sendResponse($id, 'Bahasa deleted successfully');
    }
}
