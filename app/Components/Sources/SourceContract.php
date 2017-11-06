<?php

namespace App\Components\Sources;

use Illuminate\Support\Collection;

interface SourceContract
{
    /**
     * @param string $request
     * @return Collection
     */
    public function search(string $request): Collection;
}