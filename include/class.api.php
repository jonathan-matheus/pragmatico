<?php
class Api
{
    public function urlFormater($url)
    {
        $url_request = get_site_url() . "/wp-json/url/v1/formatar?url=" . urlencode($url);
        $url_response = wp_remote_get($url_request);
        $formatted_url = json_decode(wp_remote_retrieve_body($url_response), true);
        return $formatted_url;
    }
}