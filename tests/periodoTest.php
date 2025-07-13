<?php

use PHPUnit\Framework\TestCase;
use GuzzleHttp\Client;

class PeriodoTest extends TestCase
{
    private Client $client;
    private string $baseUrl = 'http://localhost/wp-json/periodo/v1/dados';

    protected function setUp(): void
    {
        $this->client = new Client([
            'base_uri' => $this->baseUrl,
            'http_errors' => false,
        ]);
    }

    public function testPeriodoDadosVazios()
    {
        $response = $this->client->get('');
        $body = json_decode($response->getBody(), true);
        $this->assertEquals('É necessário informar pelo menos uma data.', $body['message']);
    }

    public function testPeriodoInicioFaltando()
    {
        $response = $this->client->get('?fim=2023-10-01');
        $body = json_decode($response->getBody(), true);
        $this->assertEquals('É necessário informar a data de início.', $body['message']);
    }

    public function testPeriodoInicioMaiorFim()
    {
        $response = $this->client->get('?inicio=2023-10-02&fim=2023-10-01');
        $body = json_decode($response->getBody(), true);
        $this->assertEquals('A data de início não pode ser maior que a data de fim.', $body['message']);
    }

    public function testPeriodoComAnosEMeses()
    {
        $response = $this->client->get('?inicio=2020-01-01&fim=2023-10-01');
        $body = json_decode($response->getBody(), true);
        $this->assertEquals('3 anos e 9 meses', $body);
    }

    public function testPeriodoComAnosFim()
    {
        $response = $this->client->get('?inicio=2020-01-01&fim=2021-01-01');
        $body = json_decode($response->getBody(), true);
        $this->assertEquals('1 ano', $body);
    }

    public function testPeriodoComMesesFim()
    {
        $response = $this->client->get('?inicio=2023-01-01&fim=2023-10-01');
        $body = json_decode($response->getBody(), true);
        $this->assertEquals('9 meses', $body);
    }

    public function testPeriodoComInicioSemFim()
    {
        $response = $this->client->get('?inicio=2023-10-01');
        $body = json_decode($response->getBody(), true);
        $data_inicio = new DateTime('2023-10-01');
        $data_fim = new DateTime();
        $intervalo = $data_inicio->diff($data_fim);
        $anos = $intervalo->y;
        $meses = $intervalo->m;
        $partes = [];
        if ($anos > 0) {
            $partes[] = $anos . " " . ($anos == 1 ? "ano" : "anos");
        }
        if ($meses > 0) {
            $partes[] = $meses . " " . ($meses == 1 ? "mês" : "meses");
        }
        if (empty($partes)) {
            $partes[] = "menos de um mês";
        }
        $periodo = implode(" e ", $partes);
        $this->assertEquals($periodo, $body);
    }
}