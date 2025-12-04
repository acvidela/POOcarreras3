<?php
// tests/smoke_random.php
//
// Requisitos: servidor corriendo y base.json con credenciales válidas.
// APP_BASE puede sobreescribir la URL base (por defecto http://localhost/POOcarreras3/app).

$base = rtrim(getenv('APP_BASE') ?: 'http://localhost/POOcarreras3/app', '/');

// DB
$cfg = json_decode(file_get_contents(__DIR__ . '/../app/backend/config/base.json'), true);
$dsn = "pgsql:host={$cfg['host']};port={$cfg['port']};dbname={$cfg['database']}";
$pdo = new PDO($dsn, $cfg['user'], $cfg['password'], [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

function post($url, $data) {
    $opts = ['http'=>[
        'method'=>'POST',
        'header'=>"Content-Type: application/x-www-form-urlencoded\r\n",
        'content'=>http_build_query($data),
        'ignore_errors'=>true
    ]];
    $ctx = stream_context_create($opts);
    $res = @file_get_contents($url,false,$ctx);
    $status = $http_response_header[0] ?? 'HTTP/0 000';
    return [$status, $res];
}

$carrerasCreadas = [];
$numCarreras = 5;   // súbelo a 10 si quieres
$numAtletas = 15;

// 1) Crear varias carreras
for ($i = 0; $i < $numCarreras; $i++) {
    $rand = substr(md5(uniqid('', true)),0,6);
    $carreraNombre = "Test-$rand-$i";
    $carreraFecha = date('Y-m-d', strtotime("+".(7+$i)." days"));
    $carreraCircuito = "Circuito $rand";
    $carreraPrecio = rand(500, 1500); // entero

    echo "Creando carrera $carreraNombre...\n";
    list($h1,$r1) = post("$base/index.php?action=guardarCarrera", [
      'nombre'=>$carreraNombre,
      'fecha'=>$carreraFecha,
      'circuito'=>$carreraCircuito,
      'precio'=>$carreraPrecio,
    ]);
    echo "$h1\n";
    echo "Respuesta crear carrera: " . substr($r1, 0, 120) . "\n";

    $stmt = $pdo->prepare("SELECT id FROM carreras WHERE nombre = :n AND fecha = :f ORDER BY id DESC LIMIT 1");
    $stmt->execute([':n'=>$carreraNombre, ':f'=>$carreraFecha]);
    $carreraId = $stmt->fetchColumn();
    if ($carreraId) {
        $carrerasCreadas[] = $carreraId;
        echo "Carrera ID: $carreraId\n";
    } else {
        echo "No se pudo obtener el ID de la carrera $carreraNombre\n";
    }
}

if (count($carrerasCreadas) === 0) {
    die("No se crearon carreras, abortando pruebas de atletas.\n");
}

// 2) Preinscribir atletas en las carreras creadas
$generos = ['M','F','X'];
$ultimoAtleta = null;
for ($a = 0; $a < $numAtletas; $a++) {
    $rand = substr(md5(uniqid('', true)),0,6);
    $dni = "DNI$rand$a";
    $carreraId = $carrerasCreadas[$a % count($carrerasCreadas)];
    $atleta = [
      'nombre'=>"Nombre$rand",
      'apellido'=>"Apellido$a",
      'dni'=>$dni,
      'email'=>"atleta$rand@test.com",
      'telefono'=>"11".rand(10000000,99999999),
      'genero'=>$generos[$a % count($generos)],
      'fechadenacimiento'=>'1990-01-01',
      'carrera_id'=>$carreraId,
    ];
    echo "Preinscribiendo atleta {$atleta['nombre']} en carrera $carreraId...\n";
    list($h2,$r2) = post("$base/index.php?action=guardarPreinscripcion", $atleta);
    echo "$h2\n"; var_dump(json_decode($r2, true) ?: $r2);
    $ultimoAtleta = $atleta;
}

// 3) Intento de duplicado del ultimo atleta en la misma carrera para validar rechazo
echo "Intento de duplicado mismo atleta/carrera...\n";
list($h3,$r3) = post("$base/index.php?action=guardarPreinscripcion", $ultimoAtleta);
echo "$h3\n"; var_dump(json_decode($r3, true) ?: $r3);

// Limpieza opcional: descomenta para borrar datos de prueba
// foreach ($carrerasCreadas as $cid) {
//     $pdo->prepare("DELETE FROM inscripciones WHERE carrera_id = :cid")->execute([':cid'=>$cid]);
//     $pdo->prepare("DELETE FROM carreras WHERE id = :cid")->execute([':cid'=>$cid]);
// }
// Nota: los atletas quedan si no se limpian; agrega DELETE si quieres removerlos.
