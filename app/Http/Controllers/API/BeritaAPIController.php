<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateBeritaAPIRequest;
use App\Http\Requests\API\UpdateBeritaAPIRequest;
use App\Models\Berita;
use App\Repositories\BeritaRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class BeritaController
 * @package App\Http\Controllers\API
 */

class BeritaAPIController extends AppBaseController
{
    /** @var  BeritaRepository */
    private $beritaRepository;

    public function __construct(BeritaRepository $beritaRepo)
    {
        $this->beritaRepository = $beritaRepo;
    }

    /**
     * Display a listing of the Berita.
     * GET|HEAD /beritas
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->beritaRepository->pushCriteria(new RequestCriteria($request));
        $this->beritaRepository->pushCriteria(new LimitOffsetCriteria($request));
        $beritas = $this->beritaRepository->all();

        return $this->sendResponse($beritas->toArray(), 'Beritas retrieved successfully');
    }

    /**
     * Store a newly created Berita in storage.
     * POST /beritas
     *
     * @param CreateBeritaAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateBeritaAPIRequest $request)
    {
        $input = $request->all();

        $beritas = $this->beritaRepository->create($input);

        return $this->sendResponse($beritas->toArray(), 'Berita saved successfully');
    }

    /**
     * Display the specified Berita.
     * GET|HEAD /beritas/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Berita $berita */
        $berita = $this->beritaRepository->findWithoutFail($id);

        if (empty($berita)) {
            return $this->sendError('Berita not found');
        }

        return $this->sendResponse($berita->toArray(), 'Berita retrieved successfully');
    }

    /**
     * Update the specified Berita in storage.
     * PUT/PATCH /beritas/{id}
     *
     * @param  int $id
     * @param UpdateBeritaAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBeritaAPIRequest $request)
    {
        $input = $request->all();

        /** @var Berita $berita */
        $berita = $this->beritaRepository->findWithoutFail($id);

        if (empty($berita)) {
            return $this->sendError('Berita not found');
        }

        $berita = $this->beritaRepository->update($input, $id);

        return $this->sendResponse($berita->toArray(), 'Berita updated successfully');
    }

    /**
     * Remove the specified Berita from storage.
     * DELETE /beritas/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Berita $berita */
        $berita = $this->beritaRepository->findWithoutFail($id);

        if (empty($berita)) {
            return $this->sendError('Berita not found');
        }

        $berita->delete();

        return $this->sendResponse($id, 'Berita deleted successfully');
    }
}
