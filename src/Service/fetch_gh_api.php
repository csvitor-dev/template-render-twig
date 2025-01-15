<?php
    use GuzzleHttp\Client;

    function fetch_gh_api($username) {
        $url = "https://api.github.com/users/" . $username;
        $client = new Client();

        $response = $client->request('GET', $url);
        
        if ($response->getStatusCode() !== 200) {
            die("Fail to fetch data.");
        }
        $json = json_decode($response->getBody(), true);

        return $json;
    }