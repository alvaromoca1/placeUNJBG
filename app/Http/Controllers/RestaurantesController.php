<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRestaurantesRequest;
use App\Http\Requests\UpdateRestaurantesRequest;
use App\Repositories\RestaurantesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class RestaurantesController extends AppBaseController
{
    /** @var  RestaurantesRepository */
    private $restaurantesRepository;

    public function __construct(RestaurantesRepository $restaurantesRepo)
    {
        $this->restaurantesRepository = $restaurantesRepo;
    }

    /**
     * Display a listing of the Restaurantes.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $restaurantes = $this->restaurantesRepository->all();

        return view('restaurantes.index')
            ->with('restaurantes', $restaurantes);
    }

    /**
     * Show the form for creating a new Restaurantes.
     *
     * @return Response
     */
    public function create()
    {
        return view('restaurantes.create');
    }

    /**
     * Store a newly created Restaurantes in storage.
     *
     * @param CreateRestaurantesRequest $request
     *
     * @return Response
     */
    public function store(CreateRestaurantesRequest $request)
    {
        $input = $request->all();

        $restaurantes = $this->restaurantesRepository->create($input);

        Flash::success('Restaurantes saved successfully.');

        return redirect(route('restaurantes.index'));
    }

    /**
     * Display the specified Restaurantes.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $restaurantes = $this->restaurantesRepository->find($id);

        if (empty($restaurantes)) {
            Flash::error('Restaurantes not found');

            return redirect(route('restaurantes.index'));
        }

        return view('restaurantes.show')->with('restaurantes', $restaurantes);
    }

    /**
     * Show the form for editing the specified Restaurantes.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $restaurantes = $this->restaurantesRepository->find($id);

        if (empty($restaurantes)) {
            Flash::error('Restaurantes not found');

            return redirect(route('restaurantes.index'));
        }

        return view('restaurantes.edit')->with('restaurantes', $restaurantes);
    }

    /**
     * Update the specified Restaurantes in storage.
     *
     * @param int $id
     * @param UpdateRestaurantesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRestaurantesRequest $request)
    {
        $restaurantes = $this->restaurantesRepository->find($id);

        if (empty($restaurantes)) {
            Flash::error('Restaurantes not found');

            return redirect(route('restaurantes.index'));
        }

        $restaurantes = $this->restaurantesRepository->update($request->all(), $id);

        Flash::success('Restaurantes updated successfully.');

        return redirect(route('restaurantes.index'));
    }

    /**
     * Remove the specified Restaurantes from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $restaurantes = $this->restaurantesRepository->find($id);

        if (empty($restaurantes)) {
            Flash::error('Restaurantes not found');

            return redirect(route('restaurantes.index'));
        }

        $this->restaurantesRepository->delete($id);

        Flash::success('Restaurantes deleted successfully.');

        return redirect(route('restaurantes.index'));
    }
}
