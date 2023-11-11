<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\StoreOilRequest;
use App\Interfaces\OilRepositoryInterface;

class OilController extends Controller
{
    private OilRepositoryInterface $oilRepository;

    public function __construct(OilRepositoryInterface $oilRepository) {
        $this->oilRepository = $oilRepository;
    }

    public function index()
    {
        return $this->oilRepository->index();
    }

    public function create()
    {
        return $this->oilRepository->create();
    }

    public function store(StoreOilRequest $request)
    {
        return $this->oilRepository->store($request);
    }

    public function show(Request $request)
    {
        return $this->oilRepository->show($request);
    }

    public function search()
    {
        return $this->oilRepository->search();
    }

    public function update($id)
    {
        return $this->oilRepository->update($id);
    }

    public function busy()
    {
        return $this->oilRepository->busy();
    }

    public function done()
    {
        return $this->oilRepository->done();
    }
}
