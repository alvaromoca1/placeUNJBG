<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDiscotecasRequest;
use App\Http\Requests\UpdateDiscotecasRequest;
use App\Repositories\DiscotecasRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class DiscotecasController extends AppBaseController
{
    /** @var  DiscotecasRepository */
    private $discotecasRepository;

    public function __construct(DiscotecasRepository $discotecasRepo)
    {
        $this->discotecasRepository = $discotecasRepo;
    }

    /**
     * Display a listing of the Discotecas.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $discotecas = $this->discotecasRepository->all();

        return view('discotecas.index')
            ->with('discotecas', $discotecas);
    }

    /**
     * Show the form for creating a new Discotecas.
     *
     * @return Response
     */
    public function create()
    {
        return view('discotecas.create');
    }

    /**
     * Store a newly created Discotecas in storage.
     *
     * @param CreateDiscotecasRequest $request
     *
     * @return Response
     */
    public function store(CreateDiscotecasRequest $request)
    {
        $input = $request->all();

        $discotecas = $this->discotecasRepository->create($input);

        Flash::success('Discotecas saved successfully.');

        return redirect(route('discotecas.index'));
    }

    /**
     * Display the specified Discotecas.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $discotecas = $this->discotecasRepository->find($id);

        if (empty($discotecas)) {
            Flash::error('Discotecas not found');

            return redirect(route('discotecas.index'));
        }

        return view('discotecas.show')->with('discotecas', $discotecas);
    }

    /**
     * Show the form for editing the specified Discotecas.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $discotecas = $this->discotecasRepository->find($id);

        if (empty($discotecas)) {
            Flash::error('Discotecas not found');

            return redirect(route('discotecas.index'));
        }

        return view('discotecas.edit')->with('discotecas', $discotecas);
    }

    /**
     * Update the specified Discotecas in storage.
     *
     * @param int $id
     * @param UpdateDiscotecasRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDiscotecasRequest $request)
    {
        $discotecas = $this->discotecasRepository->find($id);

        if (empty($discotecas)) {
            Flash::error('Discotecas not found');

            return redirect(route('discotecas.index'));
        }

        $discotecas = $this->discotecasRepository->update($request->all(), $id);

        Flash::success('Discotecas updated successfully.');

        return redirect(route('discotecas.index'));
    }

    /**
     * Remove the specified Discotecas from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $discotecas = $this->discotecasRepository->find($id);

        if (empty($discotecas)) {
            Flash::error('Discotecas not found');

            return redirect(route('discotecas.index'));
        }

        $this->discotecasRepository->delete($id);

        Flash::success('Discotecas deleted successfully.');

        return redirect(route('discotecas.index'));
    }
}
