<?php

$app->post('/api/NasaAPI/getEPICEarthImagery', function ($request, $response, $args) {
    $settings =  $this->settings;
    
    $data = $request->getBody();

    if($data=='') {
        $post_data = $request->getParsedBody();
    } else {
        $toJson = $this->toJson;
        $data = $toJson->normalizeJson($data); 
        $data = str_replace('\"', '"', $data);
        $post_data = json_decode($data, true);
    }
    
    if(json_last_error() != 0) {
        $error[] = json_last_error_msg() . '. Incorrect input JSON. Please, check fields with JSON input.';
    }
    
    if(!empty($error)) {
        $result['callback'] = 'error';
        $result['contextWrites']['to']['status_code'] = 'JSON_VALIDATION';
        $result['contextWrites']['to']['status_msg'] = implode(',', $error);
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($result);
    }
    
    $query_str = 'https://api.nasa.gov/EPIC/api/natural';
    
    $body = [];
    if(empty($post_data['args']['apiKey'])) {
        $body['api_key'] = 'DEMO_KEY';
    } else {
        $body['api_key'] = $post_data['args']['apiKey'];
    }
    if(!empty($post_data['args']['date'])) {
        $dateTime = new DateTime($post_data['args']['date']);
        $body['date'] = $dateTime->format('Y-m-d');
    }
    if(!empty($post_data['args']['availableDates'])) {
        $body['available_dates'] = $post_data['args']['availableDates'];
    }
   
    $client = $this->httpClient;

    try {

        $resp = $client->get( $query_str, 
            [
                'query' => $body
            ]);
        $responseBody = $resp->getBody()->getContents();
  
        if($resp->getStatusCode() == '200') {
            $result['callback'] = 'success';
            if(!empty($post_data['args']['availableDates'])) {
                $res = substr($responseBody, 1, -1);
                $res = explode(',', $res);
                $out['dates'] = [];
                foreach($res as $item) {
                    $out['dates'][] = str_replace('"', '', $item);
                }
                $result['contextWrites']['to'] = $out;
            } else {
                $result['contextWrites']['to'] = is_array($responseBody) ? $responseBody : json_decode($responseBody);
            }
            if(empty($result['contextWrites']['to'])) {
                $result['callback'] = 'error';
                $result['contextWrites']['to']['status_code'] = 'API_ERROR';
                $result['contextWrites']['to']['status_msg'] = "Not found. Check request parameters.";
            }
        } else {
            $result['callback'] = 'error';
            $result['contextWrites']['to']['status_code'] = 'API_ERROR';
            $result['contextWrites']['to']['status_msg'] = is_array($responseBody) ? $responseBody : json_decode($responseBody);
        }

    } catch (\GuzzleHttp\Exception\ClientException $exception) {

        $responseBody = $exception->getResponse()->getBody()->getContents();
        if(empty(json_decode($responseBody))) {
            $out = $responseBody;
        } else {
            $out = json_decode($responseBody);
        }
        $result['callback'] = 'error';
        $result['contextWrites']['to']['status_code'] = 'API_ERROR';
        $result['contextWrites']['to']['status_msg'] = $out;

    } catch (GuzzleHttp\Exception\ServerException $exception) {

        $responseBody = $exception->getResponse()->getBody()->getContents();
        if(empty(json_decode($responseBody))) {
            $out = $responseBody;
        } else {
            $out = json_decode($responseBody);
        }
        $result['callback'] = 'error';
        $result['contextWrites']['to']['status_code'] = 'API_ERROR';
        $result['contextWrites']['to']['status_msg'] = $out;

    } catch (GuzzleHttp\Exception\ConnectException $exception) {

        $responseBody = $exception->getResponse()->getBody(true);
        $result['callback'] = 'error';
        $result['contextWrites']['to']['status_code'] = 'INTERNAL_PACKAGE_ERROR';
        $result['contextWrites']['to']['status_msg'] = 'Something went wrong inside the package.';

    }
    
    return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($result);
});
