<?php

namespace ProChile;

use GuzzleHttp\Client;

class Biometry
{
    /**
     * @var Client
     */
    private $client;

    /**
     * Biometry constructor.
     */
    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => env('BIOMETRY_URL'),
        ]);
    }

    /**
     * @param $assistance
     */
    public function create($assistance)
    {
        $this->client->post('createOrUpdatePerson/', [
            'form_params' => [
                'secret_key' => env('BIOMETRY_KEY'),
                'client'     => env('BIOMETRY_CLIENT'),
                'place'      => env('BIOMETRY_PLACE'),
                'action'     => 'add',
                'passport'   => $assistance->rut,
                'first_name' => $assistance->first_name,
                'last_name'  => $assistance->male_surname,
            ],
        ])->getBody();
    }

    /**
     * @param $assistance
     */
    public function delete($assistance)
    {
        $this->client->post('createOrUpdatePerson', [
            'form_params' => [
                'secret_key' => env('BIOMETRY_KEY'),
                'client'     => env('BIOMETRY_CLIENT'),
                'place'      => env('BIOMETRY_PLACE'),
                'action'   => 'delete',
                'passport' => $assistance->rut,
            ],
        ])->getBody();
    }
}
