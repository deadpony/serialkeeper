<?php

namespace App\Components\Sources\TheMovieDB;

use App\Components\Sources\SourceContract;
use App\Components\Sources\TheMovieDB\Resources\Contracts\ResourceContract;
use App\Components\Sources\TheMovieDB\Resources\TvResource;
use Illuminate\Support\Collection;

class TheMovieDB implements SourceContract
{
    /** @var Collection */
    private $resources;

    public function __construct()
    {
        $this->resources = collect([
            TvResource::class
        ])->map(function(string $className) {
            return app($className);
        });
    }

    /**
     * @inheritDoc
     */
    public function search(string $request): Collection
    {
        $results = collect();

        $this->resources->each(function(ResourceContract $resource) use ($request, &$results) {
            $results->put($resource->type(), $resource->call($request));
        });

        return $results;
    }
}