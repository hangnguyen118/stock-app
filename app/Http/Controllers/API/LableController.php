<?php

namespace App\Http\Controllers\API;

use App\Contracts\interfaces\LableRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\Lable\LableRequest;
use App\Models\Lable;
use Illuminate\Http\Request;

class LableController extends Controller
{
    protected $lableRepository;
    public function __construct(LableRepositoryInterface $lableRepository)
    {
        $this->lableRepository = $lableRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lables = $this->lableRepository->getAll();
        return response()->json($lables);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LableRequest $request)
    {
        $lable = $this->lableRepository->store($request->all());
        return response($lable, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Lable $lable)
    {
        return $lable;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LableRequest $request, Lable $lable)
    {
        $lableUpdate = $this->lableRepository->update($lable, $request->all());
        return response($lableUpdate, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lable $lable)
    {
        $this->lableRepository->delete($lable);
        return response('delete success!', 200);
    }
}
