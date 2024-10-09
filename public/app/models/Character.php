<?php
    class Character {
        private static $apiUrl = 'https://anapioficeandfire.com/api';
        public static function all() {
            $url = self::$apiUrl . '/characters?page=1&pageSize=10';
            $characters = self::makeRequest($url);
            return $characters;
        }
        public static function find($id) {
            $url = self::$apiUrl . "/characters/$id";
            $character = self::makeRequest($url);
            if ($character && isset($character['name'])) {
                return $character;
            } else {
                return null;
            }
        }
        private static function makeRequest($url) {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);
            curl_close($ch);
            return json_decode($response, true);
        }
    }