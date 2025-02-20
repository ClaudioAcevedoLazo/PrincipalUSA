<?php
header("Access-Control-Allow-Origin: *"); // Permitir peticiones desde cualquier origen
header("Content-Type: application/json; charset=UTF-8"); // Formato JSON
header("Access-Control-Allow-Methods: GET"); // Solo permite método GET

// Obtener parámetros de la URL
$rutcliente = isset($_GET["rutcliente"]) ? $_GET["rutcliente"] : null;
$usuario = isset($_GET["usuario"]) ? $_GET["usuario"] : null;

// Simulación de datos en base al rutcliente
$clientes = [
    "12345678-9" => [
        "cliente" => "Juan Pérez",
        "usuario" => "jperez",
        "cuentas" => [
            ["id" => 101, "tipo" => "Ahorro", "saldo" => 5000],
            ["id" => 102, "tipo" => "Corriente", "saldo" => 12000]
        ]
    ],
    "98765432-1" => [
        "cliente" => "María González",
        "usuario" => "mgonzalez",
        "cuentas" => [
            ["id" => 201, "tipo" => "Ahorro", "saldo" => 8000]
        ]
    ]
];

// Validar si se envió un RUT válido
if ($rutcliente && isset($clientes[$rutcliente])) {
    echo json_encode($clientes[$rutcliente], JSON_PRETTY_PRINT);
} else {
    echo json_encode(["error" => "Cliente no encontrado"], JSON_PRETTY_PRINT);
}
?>
