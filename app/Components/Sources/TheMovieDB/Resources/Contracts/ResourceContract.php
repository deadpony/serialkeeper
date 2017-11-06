<?php

namespace App\Components\Sources\TheMovieDB\Resources\Contracts;

use Illuminate\Support\Collection;

interface ResourceContract
{
    /**
     * @return string
     */
    public function type(): string;

    /**
     * @param string $request
     * @return Collection
     */
    public function call(string $request): Collection;
}