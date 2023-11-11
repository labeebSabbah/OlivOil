<?php 

namespace App\Interfaces;

use App\Http\Requests\StoreOrderRequest;
use Illuminate\Http\Request;

interface OrderRepositoryInterface
{
    public function index();
    public function create();
    public function store(StoreOrderRequest $request);
    public function show(Request $request);
    public function search();
    public function update($id);
    public function busy();
    public function done();
}