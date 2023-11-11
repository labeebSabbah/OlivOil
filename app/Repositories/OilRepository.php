<?php

namespace App\Repositories;

use App\Http\Requests\StoreOilRequest;
use App\Interfaces\OilRepositoryInterface;
use Illuminate\Http\Request;
use App\Models\Oil;

class OilRepository implements OilRepositoryInterface
{
    public function index()
    {
        $orders = Oil::where("completed", "0")->get();
        return view('oil.index', compact('orders'));
    }
    public function create()
    {
        return view('oil.create');
    }

    public function store(StoreOilRequest $request)
    {
        $data = $request->validated();
        $data["created_at"] = date("Y-m-d");
        $data["amount"] = strtr($data["amount"], array('۰'=>'0', '۱'=>'1', '۲'=>'2', '۳'=>'3', '۴'=>'4', '۵'=>'5', '۶'=>'6', '۷'=>'7', '۸'=>'8', '۹'=>'9', '٠'=>'0', '١'=>'1', '٢'=>'2', '٣'=>'3', '٤'=>'4', '٥'=>'5', '٦'=>'6', '٧'=>'7', '٨'=>'8', '٩'=>'9'));
        $data["phone"] = strtr($data["phone"], array('۰'=>'0', '۱'=>'1', '۲'=>'2', '۳'=>'3', '۴'=>'4', '۵'=>'5', '۶'=>'6', '۷'=>'7', '۸'=>'8', '۹'=>'9', '٠'=>'0', '١'=>'1', '٢'=>'2', '٣'=>'3', '٤'=>'4', '٥'=>'5', '٦'=>'6', '٧'=>'7', '٨'=>'8', '٩'=>'9'));
        $order = Oil::create($data);
        return view('oil.show', compact('order'));
    }

    public function show(Request $request)
    {
        $id = strtr($request->id, array('۰'=>'0', '۱'=>'1', '۲'=>'2', '۳'=>'3', '۴'=>'4', '۵'=>'5', '۶'=>'6', '۷'=>'7', '۸'=>'8', '۹'=>'9', '٠'=>'0', '١'=>'1', '٢'=>'2', '٣'=>'3', '٤'=>'4', '٥'=>'5', '٦'=>'6', '٧'=>'7', '٨'=>'8', '٩'=>'9'));
        $order = Oil::where('id', $id)
            ->where('name', $request->name)
            ->firstOrFail();
        return view('oil.show', compact('order'));
    }

    public function search()
    {
        return view("oil.search");
    }

    public function update($id)
    {
        $order = Oil::findOrFail($id);
        $order->update([
            "completed" => true
        ]);
        $order->save();

        return redirect()->route('oil');
    }

    public function busy()
    {
        return view("oil.busy");
    }

    public function done()
    {
        $orders = Oil::where("completed", true)->get();
        return view('oil.done', compact('orders'));
    }
}