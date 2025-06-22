<?php
class Periodo
{
    public static function registrarRotas()
    {
        register_rest_route("periodo/v1", "/dados", [
            "methods" => "GET",
            "callback" => [self::class, "getPeriodo"],
            "permission_callback" => "__return_true",
        ]);
    }

    public static function getPeriodo($request)
    {
        $inicio = $request["inicio"];
        $fim = isset($request["fim"]) ? $request["fim"] : null;

        if ($inicio && $fim) {
            // Validar datas
            if (strtotime($inicio) > strtotime($fim)) {
                return new WP_Error(
                    "invalid_dates",
                    "A data de início não pode ser maior que a data de fim.",
                    ["status" => 400]
                );
            }
        } elseif (!$inicio && !$fim) {
            return new WP_Error(
                "missing_dates",
                "É necessário informar pelo menos uma data.",
                ["status" => 400]
            );
        } elseif (!$inicio) {
            return new WP_Error(
                "missing_start_date",
                "É necessário informar a data de início.",
                ["status" => 400]
            );
        } else if (!$fim) {
            $fim = date('Y-m-d');
        }

        if ($fim) {
            $data_inicio = new DateTime($inicio);
            $data_fim = new DateTime($fim);
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

            return new WP_REST_Response($periodo, 200);
        }
    }
}
