<?php

namespace App\Components\Keeper;

use App\Components\Sources\SourceContract;
use Illuminate\Support\Collection;

class Keeper
{
    /**
     * @var SourceContract
     */
    private $source;

    /**
     * @param SourceContract $source
     */
    public function __construct(SourceContract $source)
    {
        $this->source = $source;
    }

    /**
     * @inheritDoc
     */
    public function explore(string $request): Collection
    {
        return $this->source->search($request);
    }
}