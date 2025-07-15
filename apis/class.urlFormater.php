<?php
class UrlFormater
{
    public function registrarRotas()
    {
        register_rest_route("url/v1", "/formatar", [
            "methods" => "GET",
            "callback" => [$this, "formatUrlInfo"],
            "permission_callback" => "__return_true",
        ]);
    }

    public function formatUrlInfo($request)
    {
        $url = $request["url"];

        if (empty($url)) {
            return new WP_Error("missing_url", "URL não fornecida", ["status" => 400]);
        }

        // Remove protocolo (http, https, etc.)
        $host = parse_url($url, PHP_URL_HOST);

        // Remove "www." se existir
        $host = preg_replace('/^www\./', '', $host);

        // Extrai o nome do site antes do primeiro ponto
        $nameParts = explode('.', $host);
        $siteName = ucfirst($nameParts[0]); // Primeira letra maiúscula
        $response = "$siteName: $host";

        return new WP_REST_Response($response, 200);
    }
}