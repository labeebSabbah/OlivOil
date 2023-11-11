<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Interfaces\OrderRepositoryInterface;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    private OrderRepositoryInterface $orderRepository;

    public function __construct(OrderRepositoryInterface $orderRepository) {
        $this->orderRepository = $orderRepository;
    }

    public function index()
    {
        return $this->orderRepository->index();
    }

    public function create()
    {
        return $this->orderRepository->create();
    }

    public function store(StoreOrderRequest $request)
    {
        return $this->orderRepository->store($request);
    }

    public function show(Request $request)
    {
        return $this->orderRepository->show($request);
    }

    public function search()
    {
        return $this->orderRepository->search();
    }

    public function update($id)
    {
        return $this->orderRepository->update($id);
    }

    public function busy()
    {
        return $this->orderRepository->busy();
    }

    public function done()
    {
        return $this->orderRepository->done();
    }

}
