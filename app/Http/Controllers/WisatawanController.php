<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateWisatawanRequest;
use App\Http\Requests\UpdateWisatawanRequest;
use App\Repositories\WisatawanRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class WisatawanController extends AppBaseController
{
    /** @var  WisatawanRepository */
    private $wisatawanRepository;

    public function __construct(WisatawanRepository $wisatawanRepo)
    {
        $this->wisatawanRepository = $wisatawanRepo;
    }

    /**
     * Display a listing of the Wisatawan.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->wisatawanRepository->pushCriteria(new RequestCriteria($request));
        $wisatawans = $this->wisatawanRepository->all();

        return view('wisatawans.index')
            ->with('wisatawans', $wisatawans);
    }

    /**
     * Show the form for creating a new Wisatawan.
     *
     * @return Response
     */
    public function create()
    {
        return view('wisatawans.create');
    }

    /**
     * Store a newly created Wisatawan in storage.
     *
     * @param CreateWisatawanRequest $request
     *
     * @return Response
     */
    public function store(CreateWisatawanRequest $request)
    {
        $input = $request->all();

        $wisatawan = $this->wisatawanRepository->create($input);

        Flash::success('Wisatawan saved successfully.');

        return redirect(route('wisatawans.index'));
    }

    /**
     * Display the specified Wisatawan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $wisatawan = $this->wisatawanRepository->findWithoutFail($id);

        if (empty($wisatawan)) {
            Flash::error('Wisatawan not found');

            return redirect(route('wisatawans.index'));
        }

        return view('wisatawans.show')->with('wisatawan', $wisatawan);
    }

    /**
     * Show the form for editing the specified Wisatawan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $wisatawan = $this->wisatawanRepository->findWithoutFail($id);

        if (empty($wisatawan)) {
            Flash::error('Wisatawan not found');

            return redirect(route('wisatawans.index'));
        }

        return view('wisatawans.edit')->with('wisatawan', $wisatawan);
    }

    /**
     * Update the specified Wisatawan in storage.
     *
     * @param  int              $id
     * @param UpdateWisatawanRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateWisatawanRequest $request)
    {
        $wisatawan = $this->wisatawanRepository->findWithoutFail($id);

        if (empty($wisatawan)) {
            Flash::error('Wisatawan not found');

            return redirect(route('wisatawans.index'));
        }

        $wisatawan = $this->wisatawanRepository->update($request->all(), $id);

        Flash::success('Wisatawan updated successfully.');

        return redirect(route('wisatawans.index'));
    }

    /**
     * Remove the specified Wisatawan from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $wisatawan = $this->wisatawanRepository->findWithoutFail($id);

        if (empty($wisatawan)) {
            Flash::error('Wisatawan not found');

            return redirect(route('wisatawans.index'));
        }

        $this->wisatawanRepository->delete($id);

        Flash::success('Wisatawan deleted successfully.');

        return redirect(route('wisatawans.index'));
    }
}
