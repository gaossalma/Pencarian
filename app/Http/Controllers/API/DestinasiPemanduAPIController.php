<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateDestinasiPemanduAPIRequest;
use App\Http\Requests\API\UpdateDestinasiPemanduAPIRequest;
use App\Models\DestinasiPemandu;
use App\Repositories\DestinasiPemanduRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class DestinasiPemanduController
 * @package App\Http\Controllers\API
 */

class DestinasiPemanduAPIController extends AppBaseController
{
    /** @var  DestinasiPemanduRepository */
    private $destinasiPemanduRepository;

    public function __construct(DestinasiPemanduRepository $destinasiPemanduRepo)
    {
        $this->destinasiPemanduRepository = $destinasiPemanduRepo;
    }

    /**
     * Display a listing of the DestinasiPemandu.
     * GET|HEAD /destinasiPemandus
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->destinasiPemanduRepository->pushCriteria(new RequestCriteria($request));
        $this->destinasiPemanduRepository->pushCriteria(new LimitOffsetCriteria($request));
        $destinasiPemandus = $this->destinasiPemanduRepository->all();

        return $this->sendResponse($destinasiPemandus->toArray(), 'Destinasi Pemandus retrieved successfully');
    }

    /**
     * Store a newly created DestinasiPemandu in storage.
     * POST /destinasiPemandus
     *
     * @param CreateDestinasiPemanduAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateDestinasiPemanduAPIRequest $request)
    {
        $input = $request->all();

        $destinasiPemandus = $this->destinasiPemanduRepository->create($input);

        return $this->sendResponse($destinasiPemandus->toArray(), 'Destinasi Pemandu saved successfully');
    }

    public function getDestinasiPemandu(Request $request)
    {
        $data;
        $data = $request->id_destinasi;
        // dd($data);
        $destinasi;
        foreach ($data as $key => $value) {
        }
        $destinasi = DestinasiPemandu::with('pemandu','destinasi')->whereIn('id_destinasi',$data)->get();

        return $this->sendResponse($destinasi->toArray(), 'Cfs retrieved successfully');
    }

    /**
     * Display the specified DestinasiPemandu.
     * GET|HEAD /destinasiPemandus/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var DestinasiPemandu $destinasiPemandu */
        $destinasiPemandu = $this->destinasiPemanduRepository->findWithoutFail($id);

        if (empty($destinasiPemandu)) {
            return $this->sendError('Destinasi Pemandu not found');
        }

        return $this->sendResponse($destinasiPemandu->toArray(), 'Destinasi Pemandu retrieved successfully');
    }

    /**
     * Update the specified DestinasiPemandu in storage.
     * PUT/PATCH /destinasiPemandus/{id}
     *
     * @param  int $id
     * @param UpdateDestinasiPemanduAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDestinasiPemanduAPIRequest $request)
    {
        $input = $request->all();

        /** @var DestinasiPemandu $destinasiPemandu */
        $destinasiPemandu = $this->destinasiPemanduRepository->findWithoutFail($id);

        if (empty($destinasiPemandu)) {
            return $this->sendError('Destinasi Pemandu not found');
        }

        $destinasiPemandu = $this->destinasiPemanduRepository->update($input, $id);

        return $this->sendResponse($destinasiPemandu->toArray(), 'DestinasiPemandu updated successfully');
    }

    /**
     * Remove the specified DestinasiPemandu from storage.
     * DELETE /destinasiPemandus/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var DestinasiPemandu $destinasiPemandu */
        $destinasiPemandu = $this->destinasiPemanduRepository->findWithoutFail($id);

        if (empty($destinasiPemandu)) {
            return $this->sendError('Destinasi Pemandu not found');
        }

        $destinasiPemandu->delete();

        return $this->sendResponse($id, 'Destinasi Pemandu deleted successfully');
    }
}
