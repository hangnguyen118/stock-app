<?php

namespace App\Http\Controllers\API;

use App\Contracts\Interfaces\ArtRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\Art\ArtRequest;
use App\Models\Art;
use App\Models\Gallery;
use Auth;

class ArtController extends Controller
{
    protected $artRepository;
    public function __construct(ArtRepositoryInterface $artRepository)
    {
        $this->artRepository = $artRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $arts = $this->artRepository->getAll();
        return response($arts, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArtRequest $request)
    {
        $gallery = Gallery::where('id', $request->only('galleries'))->first();
        if(!$gallery->customers_id==Auth::user()->id){
            return response('Unauthorized access', 403);
        }
        $file_cover = $request->file('cover_image');
        $file_preview = $request->file('preview_image');

        $save_path = 'arts/'. Auth::user()->id;
        $path_cover = $file_cover->store($save_path);
        $path_preview = $file_preview->store($save_path);
        $data = array_merge($request->only(['title', 'descriptions', 'price', 'display', 'watemark']), [
            'galleries_id' => $gallery->id,
            'customers_id' => Auth::user()->id,
            'url_cover_image' => $path_cover, 
            'url_preview_image' => $path_preview,
        ]);
        //return $data;
        $art = $this->artRepository->store($data);
        return response($art, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Art $art)
    {
        return response($art, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ArtRequest $request, Art $art)
    {
        $gallery = Gallery::where('id', $request->only('galleries'))->first();
        if(!$gallery->customers_id==Auth::user()->id){
            return response('Unauthorized access', 403);
        }
        $update = $this->artRepository->update($art, $request->only(['title', 'descriptions', 'price', 'display', 'watemark']));
        return response($update, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Art $art)
    {
        $gallery = $art->gallery;
        if(!$gallery->customers_id==Auth::user()->id){
            return response('Unauthorized access', 403);
        }
        $this->artRepository->delete($art);
        return response('delete success!', 200);
    }
}
