<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AutoResource;
use App\Http\Resources\DateResource;
use App\Models\Auto;
use App\Models\Date;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class AutoController extends Controller
{
    /**
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        return AutoResource::collection(Auto::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return AutoResource|Response
     */
    public function store(Request $request)
    {
        $create_auto = Auto::query()->create($request->only('brand'));

        return new AutoResource($create_auto);

    }

    /**
     * @param $id
     * @return AutoResource
     */
    public function show($id): AutoResource
    {
       return new AutoResource(Auto::query()->findOrFail($id));
    }

    /**
     * @param Request $request
     * @param Auto $auto
     * @return AutoResource|void
     */
    public function update(Request $request, Auto $auto)
    {
        $auto->update($request->only('brand'));
        return new AutoResource($auto);
    }

    /**
     * @param Auto $auto
     * @return Application|ResponseFactory|Response
     */
    public function destroy(Auto $auto)
    {
       $auto->delete();

       return response(null, Response::HTTP_NO_CONTENT);
    }
}
