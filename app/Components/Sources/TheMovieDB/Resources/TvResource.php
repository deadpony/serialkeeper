<?php

namespace App\Components\Sources\TheMovieDB\Resources;

use App\Components\Sources\TheMovieDB\Resources\Contracts\AbstractResource;
use Illuminate\Support\Collection;

class TvResource extends AbstractResource
{
    /**
     * @inheritDoc
     */
    protected function results(array $results): Collection
    {
        return collect(array_get($results, 'results', []))->map(function (array $result) {
            return array_only($result, ['id', 'name', 'original_name', 'poster_path']);
        });
    }

    /**
     * @inheritDoc
     */
    public function type(): string
    {
        return 'tv';
    }

    /**
     * @inheritDoc
     */
    public function call(string $request): Collection
    {
        return $this->results($this->request('search/tv', [
            'query' => $request,
            'page' => 1,
        ]));
    }
}