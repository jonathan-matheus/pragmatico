<?php
class Periodo
{
    public function formatar($data_inicio, $data_fim = null)
    {
        $inicio = DateTime::createFromFormat("Y-m-d", $data_inicio);
        if (!$inicio)
            return '';

        $fim = $data_fim ? DateTime::createFromFormat("Y-m-d", $data_fim) : new DateTime();
        $label_fim = $data_fim ? $fim->format("M Y") : "Present";

        $data = $inicio->format("M Y") . " - " . $label_fim;
        $intervalo = $inicio->diff($fim);

        $partes = [];
        if ($intervalo->y > 0)
            $partes[] = "{$intervalo->y} ano" . ($intervalo->y > 1 ? "s" : "");
        if ($intervalo->m > 0)
            $partes[] = "{$intervalo->m} mês" . ($intervalo->m > 1 ? "es" : "");

        if ($partes) {
            $data .= " (" . implode(" e ", $partes) . ")";
        }

        return $data;
    }
}