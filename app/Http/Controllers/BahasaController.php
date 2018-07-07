<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBahasaRequest;
use App\Http\Requests\UpdateBahasaRequest;
use App\Repositories\BahasaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class BahasaController extends AppBaseController
{
    /** @var  BahasaRepository */
    private $bahasaRepository;

    public function __construct(BahasaRepository $bahasaRepo)
    {
        $this->bahasaRepository = $bahasaRepo;
    }

    /**
     * Display a listing of the Bahasa.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->bahasaRepository->pushCriteria(new RequestCriteria($request));
        $bahasas = $this->bahasaRepository->all();

        return view('bahasas.index')
            ->with('bahasas', $bahasas);
    }

    /**
     * Show the form for creating a new Bahasa.
     *
     * @return Response
     */
    public function create()
    {
        return view('bahasas.create');
    }

    /**
     * Store a newly created Bahasa in storage.
     *
     * @param CreateBahasaRequest $request
     *
     * @return Response
     */
    public function store(CreateBahasaRequest $request)
    {
        $input = $request->all();

        $bahasa = $this->bahasaRepository->create($input);

        Flash::success('Bahasa saved successfully.');

        return redirect(route('bahasas.index'));
    }

    /**
     * Display the specified Bahasa.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $bahasa = $this->bahasaRepository->findWithoutFail($id);

        if (empty($bahasa)) {
            Flash::error('Bahasa not found');

            return redirect(route('bahasas.index'));
        }

        return view('bahasas.show')->with('bahasa', $bahasa);
    }

    /**
     * Show the form for editing the specified Bahasa.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $bahasa = $this->bahasaRepository->findWithoutFail($id);

        if (empty($bahasa)) {
            Flash::error('Bahasa not found');

            return redirect(route('bahasas.index'));
        }

        return view('bahasas.edit')->with('bahasa', $bahasa);
    }

    /**
     * Update the specified Bahasa in storage.
     *
     * @param  int              $id
     * @param UpdateBahasaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBahasaRequest $request)
    {
        $bahasa = $this->bahasaRepository->findWithoutFail($id);

        if (empty($bahasa)) {
            Flash::error('Bahasa not found');

            return redirect(route('bahasas.index'));
        }

        $bahasa = $this->bahasaRepository->update($request->all(), $id);

        Flash::success('Bahasa updated successfully.');

        return redirect(route('bahasas.index'));
    }

    /**
     * Remove the specified Bahasa from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $bahasa = $this->bahasaRepository->findWithoutFail($id);

        if (empty($bahasa)) {
            Flash::error('Bahasa not found');

            return redirect(route('bahasas.index'));
        }

        $this->bahasaRepository->delete($id);

        Flash::success('Bahasa deleted successfully.');

        return redirect(route('bahasas.index'));
    }
}
