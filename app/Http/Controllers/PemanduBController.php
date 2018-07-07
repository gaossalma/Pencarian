<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePemanduBRequest;
use App\Http\Requests\UpdatePemanduBRequest;
use App\Repositories\PemanduBRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class PemanduBController extends AppBaseController
{
    /** @var  PemanduBRepository */
    private $pemanduBRepository;

    public function __construct(PemanduBRepository $pemanduBRepo)
    {
        $this->pemanduBRepository = $pemanduBRepo;
    }

    /**
     * Display a listing of the PemanduB.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->pemanduBRepository->pushCriteria(new RequestCriteria($request));
        $pemanduBs = $this->pemanduBRepository->all();

        return view('pemandu_bs.index')
            ->with('pemanduBs', $pemanduBs);
    }

    /**
     * Show the form for creating a new PemanduB.
     *
     * @return Response
     */
    public function create()
    {
        return view('pemandu_bs.create');
    }

    /**
     * Store a newly created PemanduB in storage.
     *
     * @param CreatePemanduBRequest $request
     *
     * @return Response
     */
    public function store(CreatePemanduBRequest $request)
    {
        $input = $request->all();

        $pemanduB = $this->pemanduBRepository->create($input);

        Flash::success('Pemandu B saved successfully.');

        return redirect(route('pemanduBs.index'));
    }

    /**
     * Display the specified PemanduB.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $pemanduB = $this->pemanduBRepository->findWithoutFail($id);

        if (empty($pemanduB)) {
            Flash::error('Pemandu B not found');

            return redirect(route('pemanduBs.index'));
        }

        return view('pemandu_bs.show')->with('pemanduB', $pemanduB);
    }

    /**
     * Show the form for editing the specified PemanduB.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $pemanduB = $this->pemanduBRepository->findWithoutFail($id);

        if (empty($pemanduB)) {
            Flash::error('Pemandu B not found');

            return redirect(route('pemanduBs.index'));
        }

        return view('pemandu_bs.edit')->with('pemanduB', $pemanduB);
    }

    /**
     * Update the specified PemanduB in storage.
     *
     * @param  int              $id
     * @param UpdatePemanduBRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePemanduBRequest $request)
    {
        $pemanduB = $this->pemanduBRepository->findWithoutFail($id);

        if (empty($pemanduB)) {
            Flash::error('Pemandu B not found');

            return redirect(route('pemanduBs.index'));
        }

        $pemanduB = $this->pemanduBRepository->update($request->all(), $id);

        Flash::success('Pemandu B updated successfully.');

        return redirect(route('pemanduBs.index'));
    }

    /**
     * Remove the specified PemanduB from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $pemanduB = $this->pemanduBRepository->findWithoutFail($id);

        if (empty($pemanduB)) {
            Flash::error('Pemandu B not found');

            return redirect(route('pemanduBs.index'));
        }

        $this->pemanduBRepository->delete($id);

        Flash::success('Pemandu B deleted successfully.');

        return redirect(route('pemanduBs.index'));
    }
}
