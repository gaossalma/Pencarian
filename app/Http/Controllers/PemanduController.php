<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePemanduRequest;
use App\Http\Requests\UpdatePemanduRequest;
use App\Repositories\PemanduRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class PemanduController extends AppBaseController
{
    /** @var  PemanduRepository */
    private $pemanduRepository;

    public function __construct(PemanduRepository $pemanduRepo)
    {
        $this->pemanduRepository = $pemanduRepo;
    }

    /**
     * Display a listing of the Pemandu.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->pemanduRepository->pushCriteria(new RequestCriteria($request));
        $pemandus = $this->pemanduRepository->all();

        return view('pemandus.index')
            ->with('pemandus', $pemandus);
    }

    /**
     * Show the form for creating a new Pemandu.
     *
     * @return Response
     */
    public function create()
    {
        return view('pemandus.create');
    }

    /**
     * Store a newly created Pemandu in storage.
     *
     * @param CreatePemanduRequest $request
     *
     * @return Response
     */
    public function store(CreatePemanduRequest $request)
    {
        $input = $request->all();

        $pemandu = $this->pemanduRepository->create($input);

        Flash::success('Pemandu saved successfully.');

        return redirect(route('pemandus.index'));
    }

    /**
     * Display the specified Pemandu.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $pemandu = $this->pemanduRepository->findWithoutFail($id);

        if (empty($pemandu)) {
            Flash::error('Pemandu not found');

            return redirect(route('pemandus.index'));
        }

        return view('pemandus.show')->with('pemandu', $pemandu);
    }

    /**
     * Show the form for editing the specified Pemandu.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $pemandu = $this->pemanduRepository->findWithoutFail($id);

        if (empty($pemandu)) {
            Flash::error('Pemandu not found');

            return redirect(route('pemandus.index'));
        }

        return view('pemandus.edit')->with('pemandu', $pemandu);
    }

    /**
     * Update the specified Pemandu in storage.
     *
     * @param  int              $id
     * @param UpdatePemanduRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePemanduRequest $request)
    {
        $pemandu = $this->pemanduRepository->findWithoutFail($id);

        if (empty($pemandu)) {
            Flash::error('Pemandu not found');

            return redirect(route('pemandus.index'));
        }

        $pemandu = $this->pemanduRepository->update($request->all(), $id);

        Flash::success('Pemandu updated successfully.');

        return redirect(route('pemandus.index'));
    }

    /**
     * Remove the specified Pemandu from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $pemandu = $this->pemanduRepository->findWithoutFail($id);

        if (empty($pemandu)) {
            Flash::error('Pemandu not found');

            return redirect(route('pemandus.index'));
        }

        $this->pemanduRepository->delete($id);

        Flash::success('Pemandu deleted successfully.');

        return redirect(route('pemandus.index'));
    }
}
