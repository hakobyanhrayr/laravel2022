<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\DateResource;
use App\Models\Date;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class DateController extends Controller
{
    /**
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
       return DateResource::collection(Date::query()->get());
    }

    /**
     * @param Request $request
     * @return DateResource
     */
    public function store(Request $request): DateResource
    {
        $create_date =Date::query()->create($request->only('date','mod_id'));

        return new DateResource($create_date);
    }

    /**
     * @param Date $date
     * @return DateResource
     */
    public function show(Date $date): DateResource
    {
        return new DateResource($date);
    }

    /**
     * @param Request $request
     * @param Date $date
     * @return DateResource
     */
    public function update(Request $request, Date $date)
    {
        $date->update($request->only('date','mod_id'));

        return new DateResource($date);
    }

    /**
     * @param Date $date
     * @return Response|Application|ResponseFactory
     */
    public function destroy(Date $date): Response|Application|ResponseFactory
    {
        $date->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
