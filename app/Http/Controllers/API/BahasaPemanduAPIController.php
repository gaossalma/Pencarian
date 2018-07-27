<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateBahasaPemanduAPIRequest;
use App\Http\Requests\API\UpdateBahasaPemanduAPIRequest;
use App\Models\BahasaPemandu;
use App\Repositories\BahasaPemanduRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class BahasaPemanduController
 * @package App\Http\Controllers\API
 */

class BahasaPemanduAPIController extends AppBaseController
{
    /** @var  BahasaPemanduRepository */
    private $bahasaPemanduRepository;

    public function __construct(BahasaPemanduRepository $bahasaPemanduRepo)
    {
        $this->bahasaPemanduRepository = $bahasaPemanduRepo;
    }

    /**
     * Display a listing of the BahasaPemandu.
     * GET|HEAD /bahasaPemandus
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->bahasaPemanduRepository->pushCriteria(new RequestCriteria($request));
        $this->bahasaPemanduRepository->pushCriteria(new LimitOffsetCriteria($request));
        $bahasaPemandus = $this->bahasaPemanduRepository->all();

        return $this->sendResponse($bahasaPemandus->toArray(), 'Bahasa Pemandus retrieved successfully');
    }

    public function getBahasa(Request $request)
    {
        $data;
        $data = $request->id_bahasa;
        $bahasaPemandus;
        foreach ($data as $key => $value) {
        }

        $bahasaPemandus = BahasaPemandu::with('pemandu', 'bahasa')->whereIn('id_bahasa', $data)->get();
        return $this->sendResponse($bahasaPemandus->toArray(), 'bahasaPemandus retrieved successfully');
    }

    /**
     * Store a newly created BahasaPemandu in storage.
     * POST /bahasaPemandus
     *
     * @param CreateBahasaPemanduAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateBahasaPemanduAPIRequest $request)
    {
        $input = $request->all();

        $bahasaPemandus = $this->bahasaPemanduRepository->create($input);

        return $this->sendResponse($bahasaPemandus->toArray(), 'Bahasa Pemandu saved successfully');
    }

    /**
     * Display the specified BahasaPemandu.
     * GET|HEAD /bahasaPemandus/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var BahasaPemandu $bahasaPemandu */
        $bahasaPemandu = $this->bahasaPemanduRepository->findWithoutFail($id);

        if (empty($bahasaPemandu)) {
            return $this->sendError('Bahasa Pemandu not found');
        }

        return $this->sendResponse($bahasaPemandu->toArray(), 'Bahasa Pemandu retrieved successfully');
    }

    /**
     * Update the specified BahasaPemandu in storage.
     * PUT/PATCH /bahasaPemandus/{id}
     *
     * @param  int $id
     * @param UpdateBahasaPemanduAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBahasaPemanduAPIRequest $request)
    {
        $input = $request->all();

        /** @var BahasaPemandu $bahasaPemandu */
        $bahasaPemandu = $this->bahasaPemanduRepository->findWithoutFail($id);

        if (empty($bahasaPemandu)) {
            return $this->sendError('Bahasa Pemandu not found');
        }

        $bahasaPemandu = $this->bahasaPemanduRepository->update($input, $id);

        return $this->sendResponse($bahasaPemandu->toArray(), 'BahasaPemandu updated successfully');
    }

    /**
     * Remove the specified BahasaPemandu from storage.
     * DELETE /bahasaPemandus/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var BahasaPemandu $bahasaPemandu */
        $bahasaPemandu = $this->bahasaPemanduRepository->findWithoutFail($id);

        if (empty($bahasaPemandu)) {
            return $this->sendError('Bahasa Pemandu not found');
        }

        $bahasaPemandu->delete();

        return $this->sendResponse($id, 'Bahasa Pemandu deleted successfully');
    }
}
