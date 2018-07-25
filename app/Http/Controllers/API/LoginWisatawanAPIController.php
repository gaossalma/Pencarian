<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateLoginWisatawanAPIRequest;
use App\Http\Requests\API\UpdateLoginWisatawanAPIRequest;
use App\Models\LoginWisatawan;
use App\Repositories\LoginWisatawanRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class LoginWisatawanController
 * @package App\Http\Controllers\API
 */

class LoginWisatawanAPIController extends AppBaseController
{
    /** @var  LoginWisatawanRepository */
    private $loginWisatawanRepository;

    public function __construct(LoginWisatawanRepository $loginWisatawanRepo)
    {
        $this->loginWisatawanRepository = $loginWisatawanRepo;
    }

    /**
     * Display a listing of the LoginWisatawan.
     * GET|HEAD /loginWisatawans
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->loginWisatawanRepository->pushCriteria(new RequestCriteria($request));
        $this->loginWisatawanRepository->pushCriteria(new LimitOffsetCriteria($request));
        $loginWisatawans = $this->loginWisatawanRepository->all();

        return $this->sendResponse($loginWisatawans->toArray(), 'Login Wisatawans retrieved successfully');
    }

    /**
     * Store a newly created LoginWisatawan in storage.
     * POST /loginWisatawans
     *
     * @param CreateLoginWisatawanAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateLoginWisatawanAPIRequest $request)
    {
        $input = $request->all();

        $loginWisatawans = $this->loginWisatawanRepository->create($input);

        return $this->sendResponse($loginWisatawans->toArray(), 'Login Wisatawan saved successfully');
    }

    /**
     * Display the specified LoginWisatawan.
     * GET|HEAD /loginWisatawans/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var LoginWisatawan $loginWisatawan */
        $loginWisatawan = $this->loginWisatawanRepository->findWithoutFail($id);

        if (empty($loginWisatawan)) {
            return $this->sendError('Login Wisatawan not found');
        }

        return $this->sendResponse($loginWisatawan->toArray(), 'Login Wisatawan retrieved successfully');
    }

    /**
     * Update the specified LoginWisatawan in storage.
     * PUT/PATCH /loginWisatawans/{id}
     *
     * @param  int $id
     * @param UpdateLoginWisatawanAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLoginWisatawanAPIRequest $request)
    {
        $input = $request->all();

        /** @var LoginWisatawan $loginWisatawan */
        $loginWisatawan = $this->loginWisatawanRepository->findWithoutFail($id);

        if (empty($loginWisatawan)) {
            return $this->sendError('Login Wisatawan not found');
        }

        $loginWisatawan = $this->loginWisatawanRepository->update($input, $id);

        return $this->sendResponse($loginWisatawan->toArray(), 'LoginWisatawan updated successfully');
    }

    /**
     * Remove the specified LoginWisatawan from storage.
     * DELETE /loginWisatawans/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var LoginWisatawan $loginWisatawan */
        $loginWisatawan = $this->loginWisatawanRepository->findWithoutFail($id);

        if (empty($loginWisatawan)) {
            return $this->sendError('Login Wisatawan not found');
        }

        $loginWisatawan->delete();

        return $this->sendResponse($id, 'Login Wisatawan deleted successfully');
    }
}
