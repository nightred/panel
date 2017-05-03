<?php

/**
 * Description of api
 *
 * @author krisa
 */
class api {

    /*
     * @param string $method POST PUT GET
     * @param string $url The URI that will be called
     * @param array $data The parameters to pass through the url
     *      Formated as ("param" => "value") to ?param=value
     * @param array $headers The parameters to be added to the header
     *      Formated as ("header:data")
     */
    public static function callApi(
            $method,
            $url,
            $data = false,
            $headers = false
            ) {

        $curl = curl_init();

        switch ($method) {
            case "POST":
                curl_setopt($curl, CURLOPT_POST, true);
                if ($data) {
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                }
                break;

            case "PUT":
                curl_setopt($curl, CURLOPT_PUT, $data);
                break;

            default:
                if ($data) {
                    $url = sprintf("%s?%s", $url, http_build_query($data));
                }

        };

        if ($headers) {
            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        }

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST,false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER,false);

        $result = curl_exec($curl);

        curl_close($curl);

        return $result;
    }

}
