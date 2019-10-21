<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateRestaurantesAPIRequest;
use App\Http\Requests\API\UpdateRestaurantesAPIRequest;
use App\Models\Restaurantes;
use App\Repositories\RestaurantesRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class RestaurantesController
 * @package App\Http\Controllers\API
 */

class RestaurantesAPIController extends AppBaseController
{
    /** @var  RestaurantesRepository */
    private $restaurantesRepository;

    public function __construct(RestaurantesRepository $restaurantesRepo)
    {
        $this->restaurantesRepository = $restaurantesRepo;
    }

    /**
     * Display a listing of the Restaurantes.
     * GET|HEAD /restaurantes
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $restaurantes = $this->restaurantesRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($restaurantes->toArray(), 'Restaurantes retrieved successfully');
    }

    /**
     * Store a newly created Restaurantes in storage.
     * POST /restaurantes
     *
     * @param CreateRestaurantesAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateRestaurantesAPIRequest $request)
    {
        $input = $request->all();

        $restaurantes = $this->restaurantesRepository->create($input);

        return $this->sendResponse($restaurantes->toArray(), 'Restaurantes saved successfully');
    }

    /**
     * Display the specified Restaurantes.
     * GET|HEAD /restaurantes/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Restaurantes $restaurantes */
        $restaurantes = $this->restaurantesRepository->find($id);

        if (empty($restaurantes)) {
            return $this->sendError('Restaurantes not found');
        }

        return $this->sendResponse($restaurantes->toArray(), 'Restaurantes retrieved successfully');
    }

    /**
     * Update the specified Restaurantes in storage.
     * PUT/PATCH /restaurantes/{id}
     *
     * @param int $id
     * @param UpdateRestaurantesAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRestaurantesAPIRequest $request)
    {
        $input = $request->all();

        /** @var Restaurantes $restaurantes */
        $restaurantes = $this->restaurantesRepository->find($id);

        if (empty($restaurantes)) {
            return $this->sendError('Restaurantes not found');
        }

        $restaurantes = $this->restaurantesRepository->update($input, $id);

        return $this->sendResponse($restaurantes->toArray(), 'Restaurantes updated successfully');
    }

    /**
     * Remove the specified Restaurantes from storage.
     * DELETE /restaurantes/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Restaurantes $restaurantes */
        $restaurantes = $this->restaurantesRepository->find($id);

        if (empty($restaurantes)) {
            return $this->sendError('Restaurantes not found');
        }

        $restaurantes->delete();

        return $this->sendResponse($id, 'Restaurantes deleted successfully');
    }
}
