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
        $this->apiAddress = 'http://d988c7b4.ngrok.io';
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

    /**
     * @param string $type
     * @param array $data
     * @return array
     */
    public function getJsonFormat(string $type, array $data) : array {
        if ($type == 'cards') {
            $jsonArray = [
                'name' => $data['name'],
                'queryName' => $data['name'],
                'character' => $data['name'],
                'description' => $data['description'],
                'yes' => $data['yes'],
                'no' => $data['no'],
                'effectgen' => [
                    'religion' => $data['effectgen_religion'],
                    'army' => $data['effectgen_army'],
                    'population' => $data['effectgen_population'],
                    'argent' => $data['effectgen_money']
                ],
                'effectyes' => [
                    'religion' => $data['effectyes_religion'],
                    'army' => $data['effectyes_army'],
                    'population' => $data['effectyes_population'],
                    'argent' => $data['effectyes_money']
                ],
                'effectno' => [
                    'religion' => $data['effectno_religion'],
                    'army' => $data['effectno_army'],
                    'population' => $data['effectno_population'],
                    'argent' => $data['effectno_money']
                ],
                'condition' => [
                    'religion' => $data['condition_religion'],
                    'army' => $data['condition_army'],
                    'population' => $data['condition_population'],
                    'argent' => $data['condition_money']
                ],
                'nextCard' => [
                    'yes' => $data['next_card_yes'],
                    'no' => $data['next_card_no']
                ]
            ];
        }
        else if ($type == 'characters') {
            $jsonArray = [
                'name' => $data['name'],
                'queryName' => $data['name'],
                'description' => $data['description'],
                'img' => $data['img_address']
            ];
        }
        else if ($type == 'ends') {
            $jsonArray = [
                'name' => $data['name'],
                'queryName' => $data['name'],
                'desfr' => $data['description'],
                'img' => $data['img_address']
            ];
        }
        else if ($type == 'objects') {
            $jsonArray = [
                'name' => $data['name'],
                'queryName' => $data['name'],
                'description' => $data['description'],
                'effect' => [
                    'religion' => $data['effect_religion'],
                    'army' => $data['effect_army'],
                    'population' => $data['effect_population'],
                    'argent' => $data['effect_money']
                ],
            ];
        }

        return $jsonArray;
    }
}