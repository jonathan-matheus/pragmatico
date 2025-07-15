<?php

use PHPUnit\Framework\TestCase;
use GuzzleHttp\Client;

class UrlFormaterTest extends TestCase
{
    private Client $client;
    private string $baseUrl = 'http://localhost/wp-json/url/v1/formatar';

    protected function setUp(): void
    {
        $this->client = new Client([
            'http_errors' => false,
        ]);
    }

    public function testUrlNaoFornecida()
    {
        $response = $this->client->get($this->baseUrl);
        $this->assertEquals(400, $response->getStatusCode());
        $body = (string) $response->getBody();
        $this->assertEquals('URL não fornecida', json_decode($body, true)['message']);
    }

    public function testUrlComWWW()
    {
        $response = $this->client->get($this->baseUrl, [
            'query' => ['url' => 'https://www.exemplo.com']
        ]);
        $this->assertEquals(200, $response->getStatusCode());
        $body = (string) $response->getBody();
        $this->assertStringContainsString('Exemplo: exemplo.com', $body);
    }

    public function testUrlSemWWW()
    {
        $response = $this->client->get($this->baseUrl, [
            'query' => ['url' => 'https://meusite.org']
        ]);
        $this->assertEquals(200, $response->getStatusCode());
        $body = (string) $response->getBody();
        $this->assertStringContainsString('Meusite: meusite.org', $body);
    }

    public function testUrlComSubdominio()
    {
        $response = $this->client->get($this->baseUrl, [
            'query' => ['url' => 'https://blog.exemplo.com']
        ]);
        $this->assertEquals(200, $response->getStatusCode());
        $body = (string) $response->getBody();
        $this->assertStringContainsString('Blog: blog.exemplo.com', $body);
    }
}