<?php

namespace App\Interfaces;

use App\Http\Requests\StoreOilRequest;
use Illuminate\Http\Request;

interface OilRepositoryInterface
{
    public function index();
    public function create();
    public function store(StoreOilRequest $request);
    public function show(Request $request);
    public function search();
    public function update($id);
    public function busy();
    public function done();
}