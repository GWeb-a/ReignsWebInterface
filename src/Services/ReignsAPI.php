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
        $this->apiAddress = 'http://6272d9ff.ngrok.io';
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

    /*
     * Example of card json value
     * {
          "name": "card_test",
          "character": "card_test",
          "description": "a simple test",
          "answer_yes": "Oui",
          "answer_no": "Non",
          "effect_generale": {
            "religion": 0,
            "army": 0,
            "population": 0,
            "argent": 0
          },
          "effect_yes": {
            "religion": 0,
            "army": 0,
            "population": 0,
            "argent": 10
          },
          "effect_no": {
            "religion": 0,
            "army": 0,
            "population": 0,
            "argent": 0
          },
          "condition": {
            "religion": 10,
            "army": 0,
            "population": 0,
            "argent": 0
          },
          "nextCard": {
            "yes": "",
            "no": ""
          }
        }
     */

    /**
     * @param string $name
     * @param string $jsonData
     * @throws \Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface
     */
    public function addComponent(string $name, string $jsonData) {
        $this->httpClient->request('POST', $this->apiAddress.'/'.$name, [
            'headers' => [
                'Content-Type' => 'application/json'
            ],
            'body' => $jsonData
        ]);
    }
}