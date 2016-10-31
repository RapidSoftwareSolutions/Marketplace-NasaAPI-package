<?php

$app->post('/api/NasaAPI/getEarthAssets', function ($request, $response, $args) {
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
    
    $error = [];
    if(empty($post_data['args']['latitude'])) {
        $error[] = 'latitude cannot be empty';
    }
    if(empty($post_data['args']['longitude'])) {
        $error[] = 'longitude cannot be empty';
    }
    
    if(!empty($error)) {
        $result['callback'] = 'error';
        $result['contextWrites']['to'] = implode(',', $error);
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($result);
    }
    
    $query_str = 'https://api.nasa.gov/planetary/earth/assets';
    
    $body['lat'] = $post_data['args']['latitude'];
    $body['lon'] = $post_data['args']['longitude'];
    if(empty($post_data['args']['apiKey'])) {
        $body['api_key'] = 'DEMO_KEY';
    } else {
        $body['api_key'] = $post_data['args']['apiKey'];
    }
    if(!empty($post_data['args']['begin'])) {
        $body['begin'] = $post_data['args']['begin'];
    }
    if(!empty($post_data['args']['end'])) {
        $body['end'] = $post_data['args']['end'];
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
            $result['contextWrites']['to'] = is_array($responseBody) ? $responseBody : json_decode($responseBody);
        } else {
            $result['callback'] = 'error';
            $result['contextWrites']['to'] = is_array($responseBody) ? $responseBody : json_decode($responseBody);
        }

    } catch (\GuzzleHttp\Exception\ClientException $exception) {

        $responseBody = $exception->getResponse()->getBody();
        $result['callback'] = 'error';
        $result['contextWrites']['to'] = json_decode($responseBody);

    } catch (GuzzleHttp\Exception\ServerException $exception) {

        $responseBody = $exception->getResponse()->getBody(true);
        $result['callback'] = 'error';
        $result['contextWrites']['to'] = json_decode($responseBody);

    } catch (GuzzleHttp\Exception\BadResponseException $exception) {

        $responseBody = $exception->getResponse()->getBody(true);
        $result['callback'] = 'error';
        $result['contextWrites']['to'] = json_decode($responseBody);

    }
    
    return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($result);
});
