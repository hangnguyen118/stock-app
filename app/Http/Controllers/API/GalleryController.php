<?php

namespace App\Http\Controllers\API;

use App\Contracts\Interfaces\GalleryRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\Gallery\GalleryRequest;
use App\Models\Gallery;
use Auth;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    protected $galleryRepository;
    public function __construct(GalleryRepositoryInterface $galleryRepository)
    {
        $this->galleryRepository = $galleryRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $galleries = $this->galleryRepository->getAll();
        return response($galleries, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GalleryRequest $request)
    {
        $data = array_merge($request->only(['gallery_name']), [
            'customers_id' => Auth::user()->id
        ]);
        $gallery = $this->galleryRepository->store($data);
        return response($gallery, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Gallery $gallery)
    {
        if ($gallery->customers_id != Auth::user()->id) {
            return response('Unauthorized access.', 403);
        }
        return response($gallery, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GalleryRequest $request, Gallery $gallery)
    {
        if ($gallery->customers_id != Auth::user()->id) {
            return response('Unauthorized access.', 403);
        }
        $galleryUpdate = $this->galleryRepository->update($gallery, $request->only('gallery_name'));
        return response($galleryUpdate, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gallery $gallery)
    {
        if ($gallery->customers_id != Auth::user()->id) {
            return response('Unauthorized access.', 403);
        }
        $this->galleryRepository->delete($gallery);
        return response('delete gallery success!', 200);
    }
}
