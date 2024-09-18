<?php

namespace App\Http\Controllers\API;

use App\Contracts\Interfaces\TagRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\Tag\TagRequest;
use App\Models\Tag;

class TagController extends Controller
{
    protected $tagRepository;
    public function __construct(TagRepositoryInterface $tagRepository)
    {
        $this->tagRepository = $tagRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tag = $this->tagRepository->getAll();
        return response()->json($tag);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TagRequest $request)
    {
        $tag = $this->tagRepository->store($request->all());
        return response($tag, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        return $tag;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TagRequest $request, Tag $tag)
    {
        $tagUpdate = $this->tagRepository->update($tag, $request->all());
        return response($tagUpdate, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        $this->tagRepository->delete($tag);
        return response('delete success!', 200);
    }
}
