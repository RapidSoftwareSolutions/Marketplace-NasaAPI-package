<?php

$app->post('/api/NasaAPI/getEarthAssets', function ($request, $response, $args) {
    $settings = $this->settings;

    $data = $request->getBody();

    if ($data == '') {
        $post_data = $request->getParsedBody();
    } else {
        $toJson = $this->toJson;
        $data = $toJson->normalizeJson($data);
        $data = str_replace('\"', '"', $data);
        $post_data = json_decode($data, true);
    }

    if (json_last_error() != 0) {
        $error[] = json_last_error_msg() . '. Incorrect input JSON. Please, check fields with JSON input.';
    }

    if (!empty($error)) {
        $result['callback'] = 'error';
        $result['contextWrites']['to']['status_code'] = 'JSON_VALIDATION';
        $result['contextWrites']['to']['status_msg'] = implode(',', $error);
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($result);
    }

    $error = [];
    if (empty($post_data['args']['coordinate']) && (empty($post_data['args']['latitude']) || empty($post_data['args']['longitude']))) {
        $error[] = 'coordinate';
    }

    if (!empty($error)) {
        $result['callback'] = 'error';
        $result['contextWrites']['to']['status_code'] = "REQUIRED_FIELDS";
        $result['contextWrites']['to']['status_msg'] = "Please, check and fill in required fields.";
        $result['contextWrites']['to']['fields'] = $error;
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($result);
    }

    $query_str = 'https://api.nasa.gov/planetary/earth/assets';

    if (!empty($post_data['args']['coordinate'])) {
        $body['lat'] = explode(',', $post_data['args']['coordinate'])[0];
        $body['lon'] = explode(',', $post_data['args']['coordinate'])[1];
    } else {
        $body['lat'] = $post_data['args']['latitude'];
        $body['lon'] = $post_data['args']['longitude'];
    }

    if (empty($post_data['args']['apiKey'])) {
        $body['api_key'] = 'DEMO_KEY';
    } else {
        $body['api_key'] = $post_data['args']['apiKey'];
    }
    if (!empty($post_data['args']['begin'])) {
        $dateTime = new DateTime($post_data['args']['begin']);
        $body['begin'] = $dateTime->format('Y-m-d');
    }
    if (!empty($post_data['args']['end'])) {
        $dateTime = new DateTime($post_data['args']['end']);
        $body['end'] = $dateTime->format('Y-m-d');
    }

    $client = $this->httpClient;

    try {

        $resp = $client->get($query_str,
            [
                'query' => $body
            ]);
        $responseBody = $resp->getBody()->getContents();

        if ($resp->getStatusCode() == '200') {
            $result['callback'] = 'success';
            $result['contextWrites']['to'] = is_array($responseBody) ? $responseBody : json_decode($responseBody);
        } else {
            $result['callback'] = 'error';
            $result['contextWrites']['to']['status_code'] = 'API_ERROR';
            $result['contextWrites']['to']['status_msg'] = is_array($responseBody) ? $responseBody : json_decode($responseBody);
        }

    } catch (\GuzzleHttp\Exception\ClientException $exception) {

        $responseBody = $exception->getResponse()->getBody()->getContents();
        if (empty(json_decode($responseBody))) {
            $out = $responseBody;
        } else {
            $out = json_decode($responseBody);
        }
        $result['callback'] = 'error';
        $result['contextWrites']['to']['status_code'] = 'API_ERROR';
        $result['contextWrites']['to']['status_msg'] = $out;

    } catch (GuzzleHttp\Exception\ServerException $exception) {

        $responseBody = $exception->getResponse()->getBody()->getContents();
        if (empty(json_decode($responseBody))) {
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
