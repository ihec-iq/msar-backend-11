<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Stock\StockStoreRequest;
use App\Http\Resources\Stock\StockResource;
use App\Models\Stock;
use Illuminate\Support\Facades\Cache;

class StockController extends Controller
{
    public function index()
    {
        return $this->ok(StockResource::collection(Cache::rememberForever('stocks', function () {
            return Stock::get();
        })));
    }

    public function store(StockStoreRequest $request)
    {
        $data = Stock::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return $this->ok(new StockResource($data));
    }

    public function show(string $id)
    {
        return $this->ok(new StockResource(Stock::find($id)));
    }

    public function update(StockStoreRequest $request, string $id)
    {
        $data = Stock::find($id);
        $data->name = $request->name;
        $data->description = $request->description;
        $data->save();
        return $this->ok(new StockResource($data));
    }

    public function destroy(string $id)
    {
        $data = Stock::find($id);
        $data->delete();
        return $this->ok(null);
    }
}
