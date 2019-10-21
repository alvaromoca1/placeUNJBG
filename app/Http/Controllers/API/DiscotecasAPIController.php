<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateDiscotecasAPIRequest;
use App\Http\Requests\API\UpdateDiscotecasAPIRequest;
use App\Models\Discotecas;
use App\Repositories\DiscotecasRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class DiscotecasController
 * @package App\Http\Controllers\API
 */

class DiscotecasAPIController extends AppBaseController
{
    /** @var  DiscotecasRepository */
    private $discotecasRepository;

    public function __construct(DiscotecasRepository $discotecasRepo)
    {
        $this->discotecasRepository = $discotecasRepo;
    }

    /**
     * Display a listing of the Discotecas.
     * GET|HEAD /discotecas
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $discotecas = $this->discotecasRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($discotecas->toArray(), 'Discotecas retrieved successfully');
    }

    /**
     * Store a newly created Discotecas in storage.
     * POST /discotecas
     *
     * @param CreateDiscotecasAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateDiscotecasAPIRequest $request)
    {
        $input = $request->all();

        $discotecas = $this->discotecasRepository->create($input);

        return $this->sendResponse($discotecas->toArray(), 'Discotecas saved successfully');
    }

    /**
     * Display the specified Discotecas.
     * GET|HEAD /discotecas/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Discotecas $discotecas */
        $discotecas = $this->discotecasRepository->find($id);

        if (empty($discotecas)) {
            return $this->sendError('Discotecas not found');
        }

        return $this->sendResponse($discotecas->toArray(), 'Discotecas retrieved successfully');
    }

    /**
     * Update the specified Discotecas in storage.
     * PUT/PATCH /discotecas/{id}
     *
     * @param int $id
     * @param UpdateDiscotecasAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDiscotecasAPIRequest $request)
    {
        $input = $request->all();

        /** @var Discotecas $discotecas */
        $discotecas = $this->discotecasRepository->find($id);

        if (empty($discotecas)) {
            return $this->sendError('Discotecas not found');
        }

        $discotecas = $this->discotecasRepository->update($input, $id);

        return $this->sendResponse($discotecas->toArray(), 'Discotecas updated successfully');
    }

    /**
     * Remove the specified Discotecas from storage.
     * DELETE /discotecas/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Discotecas $discotecas */
        $discotecas = $this->discotecasRepository->find($id);

        if (empty($discotecas)) {
            return $this->sendError('Discotecas not found');
        }

        $discotecas->delete();

        return $this->sendResponse($id, 'Discotecas deleted successfully');
    }
}
