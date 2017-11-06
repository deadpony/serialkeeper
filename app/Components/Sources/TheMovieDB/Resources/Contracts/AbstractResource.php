<?php

namespace App\Components\Sources\TheMovieDB\Resources\Contracts;

use GuzzleHttp\Client;
use Illuminate\Support\Collection;
use Psr\Http\Message\ResponseInterface;

abstract class AbstractResource implements ResourceContract
{
    /** @var Client */
    private $agent;

    public function __construct()
    {
        $this->agent = new Client([
            'base_uri' => env('THEMOVIEDB_API_URL'),
        ]);
    }

    /**
     * @param Client $agent
     */
    final protected function setAgent(Client $agent)
    {
        $this->agent = $agent;
    }

    /**
     * @param string $url
     * @param array $params
     * @return array
     */
    final protected function request(string $url, array $params)
    {
        $response = $this->agent->request('GET', $url,
            ['query' => array_merge($params, ['api_key' => env('THEMOVIEDB_API_KEY')])]);
        return $this->hydrate($response);
    }

    /**
     * @param ResponseInterface $response
     * @return array
     */
    final private function hydrate(ResponseInterface $response)
    {
        return json_decode($response->getBody(), true);
    }

    /**
     * @param array $results
     * @return Collection
     */
    abstract protected function results(array $results): Collection;
}