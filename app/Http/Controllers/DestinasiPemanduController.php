<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDestinasiPemanduRequest;
use App\Http\Requests\UpdateDestinasiPemanduRequest;
use App\Repositories\DestinasiPemanduRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class DestinasiPemanduController extends AppBaseController
{
    /** @var  DestinasiPemanduRepository */
    private $destinasiPemanduRepository;

    public function __construct(DestinasiPemanduRepository $destinasiPemanduRepo)
    {
        $this->destinasiPemanduRepository = $destinasiPemanduRepo;
    }

    /**
     * Display a listing of the DestinasiPemandu.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->destinasiPemanduRepository->pushCriteria(new RequestCriteria($request));
        $destinasiPemandus = $this->destinasiPemanduRepository->all();

        return view('destinasi_pemandus.index')
            ->with('destinasiPemandus', $destinasiPemandus);
    }

    /**
     * Show the form for creating a new DestinasiPemandu.
     *
     * @return Response
     */
    public function create()
    {
        return view('destinasi_pemandus.create');
    }

    /**
     * Store a newly created DestinasiPemandu in storage.
     *
     * @param CreateDestinasiPemanduRequest $request
     *
     * @return Response
     */
    public function store(CreateDestinasiPemanduRequest $request)
    {
        $input = $request->all();

        $destinasiPemandu = $this->destinasiPemanduRepository->create($input);

        Flash::success('Destinasi Pemandu saved successfully.');

        return redirect(route('destinasiPemandus.index'));
    }

    /**
     * Display the specified DestinasiPemandu.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $destinasiPemandu = $this->destinasiPemanduRepository->findWithoutFail($id);

        if (empty($destinasiPemandu)) {
            Flash::error('Destinasi Pemandu not found');

            return redirect(route('destinasiPemandus.index'));
        }

        return view('destinasi_pemandus.show')->with('destinasiPemandu', $destinasiPemandu);
    }

    /**
     * Show the form for editing the specified DestinasiPemandu.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $destinasiPemandu = $this->destinasiPemanduRepository->findWithoutFail($id);

        if (empty($destinasiPemandu)) {
            Flash::error('Destinasi Pemandu not found');

            return redirect(route('destinasiPemandus.index'));
        }

        return view('destinasi_pemandus.edit')->with('destinasiPemandu', $destinasiPemandu);
    }

    /**
     * Update the specified DestinasiPemandu in storage.
     *
     * @param  int              $id
     * @param UpdateDestinasiPemanduRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDestinasiPemanduRequest $request)
    {
        $destinasiPemandu = $this->destinasiPemanduRepository->findWithoutFail($id);

        if (empty($destinasiPemandu)) {
            Flash::error('Destinasi Pemandu not found');

            return redirect(route('destinasiPemandus.index'));
        }

        $destinasiPemandu = $this->destinasiPemanduRepository->update($request->all(), $id);

        Flash::success('Destinasi Pemandu updated successfully.');

        return redirect(route('destinasiPemandus.index'));
    }

    /**
     * Remove the specified DestinasiPemandu from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $destinasiPemandu = $this->destinasiPemanduRepository->findWithoutFail($id);

        if (empty($destinasiPemandu)) {
            Flash::error('Destinasi Pemandu not found');

            return redirect(route('destinasiPemandus.index'));
        }

        $this->destinasiPemanduRepository->delete($id);

        Flash::success('Destinasi Pemandu deleted successfully.');

        return redirect(route('destinasiPemandus.index'));
    }
}
