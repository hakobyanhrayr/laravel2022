<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ModResource;
use App\Models\Mod;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class ModController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        return ModResource::collection(Mod::query()->get());
    }

    /**
     * @param Request $request
     * @return Response|ModResource
     */
    public function store(Request $request): Response|ModResource
    {
        $create_model = Mod::query()->create($request->only('name','auto_id'));
        return new ModResource($create_model);
    }

    /**
     * @param $id
     * @return ModResource
     */
    public function show($id): ModResource
    {
        return new ModResource(Mod::query()->findOrFail($id));
    }

    /**
     * @param Request $request
     * @param Mod $mod
     * @return ModResource
     */
    public function update(Request $request, Mod $mod): ModResource
    {
        $mod->update($request->only(['name','auto_id']));

        return new ModResource($mod);
    }

    /**
     * @param Mod $mod
     * @return Application|ResponseFactory|Response
     */
    public function destroy(Mod $mod)
    {
        $mod->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
