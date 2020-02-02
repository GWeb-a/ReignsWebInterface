<?php
/**
 * Created by PhpStorm.
 * User: Gianni GIUDICE
 * Date: 14/01/2020
 * Time: 14:01
 */

namespace App\Services;


use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\Validator\Constraints\Json;

class ReignsAPI {
    private $httpClient;
    private $apiAddress;

    public function __construct() {
        $this->httpClient = HttpClient::create();
        $this->apiAddress = 'http://0848ae37.ngrok.io';
    }

    /**
     * @param string $name
     * @return array
     * @throws \Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface
     */
    public function getComponent(string $name) {
        return $this->httpClient->request('GET', $this->apiAddress.'/'.$name)->toArray();
    }

    /**
     * @param string $name
     * @param array $jsonData
     * @throws \Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface
     */
    public function addComponent(string $name, array $jsonData) {
        $this->httpClient->request('POST', $this->apiAddress.'/'.$name, [
            'body' => $jsonData
        ]);
    }
}