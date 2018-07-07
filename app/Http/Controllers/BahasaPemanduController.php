<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBahasaPemanduRequest;
use App\Http\Requests\UpdateBahasaPemanduRequest;
use App\Repositories\BahasaPemanduRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class BahasaPemanduController extends AppBaseController
{
    /** @var  BahasaPemanduRepository */
    private $bahasaPemanduRepository;

    public function __construct(BahasaPemanduRepository $bahasaPemanduRepo)
    {
        $this->bahasaPemanduRepository = $bahasaPemanduRepo;
    }

    /**
     * Display a listing of the BahasaPemandu.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->bahasaPemanduRepository->pushCriteria(new RequestCriteria($request));
        $bahasaPemandus = $this->bahasaPemanduRepository->all();

        return view('bahasa_pemandus.index')
            ->with('bahasaPemandus', $bahasaPemandus);
    }

    /**
     * Show the form for creating a new BahasaPemandu.
     *
     * @return Response
     */
    public function create()
    {
        return view('bahasa_pemandus.create');
    }

    /**
     * Store a newly created BahasaPemandu in storage.
     *
     * @param CreateBahasaPemanduRequest $request
     *
     * @return Response
     */
    public function store(CreateBahasaPemanduRequest $request)
    {
        $input = $request->all();

        $bahasaPemandu = $this->bahasaPemanduRepository->create($input);

        Flash::success('Bahasa Pemandu saved successfully.');

        return redirect(route('bahasaPemandus.index'));
    }

    /**
     * Display the specified BahasaPemandu.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $bahasaPemandu = $this->bahasaPemanduRepository->findWithoutFail($id);

        if (empty($bahasaPemandu)) {
            Flash::error('Bahasa Pemandu not found');

            return redirect(route('bahasaPemandus.index'));
        }

        return view('bahasa_pemandus.show')->with('bahasaPemandu', $bahasaPemandu);
    }

    /**
     * Show the form for editing the specified BahasaPemandu.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $bahasaPemandu = $this->bahasaPemanduRepository->findWithoutFail($id);

        if (empty($bahasaPemandu)) {
            Flash::error('Bahasa Pemandu not found');

            return redirect(route('bahasaPemandus.index'));
        }

        return view('bahasa_pemandus.edit')->with('bahasaPemandu', $bahasaPemandu);
    }

    /**
     * Update the specified BahasaPemandu in storage.
     *
     * @param  int              $id
     * @param UpdateBahasaPemanduRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBahasaPemanduRequest $request)
    {
        $bahasaPemandu = $this->bahasaPemanduRepository->findWithoutFail($id);

        if (empty($bahasaPemandu)) {
            Flash::error('Bahasa Pemandu not found');

            return redirect(route('bahasaPemandus.index'));
        }

        $bahasaPemandu = $this->bahasaPemanduRepository->update($request->all(), $id);

        Flash::success('Bahasa Pemandu updated successfully.');

        return redirect(route('bahasaPemandus.index'));
    }

    /**
     * Remove the specified BahasaPemandu from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $bahasaPemandu = $this->bahasaPemanduRepository->findWithoutFail($id);

        if (empty($bahasaPemandu)) {
            Flash::error('Bahasa Pemandu not found');

            return redirect(route('bahasaPemandus.index'));
        }

        $this->bahasaPemanduRepository->delete($id);

        Flash::success('Bahasa Pemandu deleted successfully.');

        return redirect(route('bahasaPemandus.index'));
    }
}
