<?php
// Autoriser la lecture du flux d'entrée JSON
$json_data = file_get_contents('php://input');

if ($json_data) {
    // Tenter d'écrire dans le fichier
    $result = file_put_contents('roadmap-data.json', $json_data);
    
    if ($result !== false) {
        echo json_encode(["status" => "success"]);
    } else {
        header('HTTP/1.1 500 Internal Server Error');
        echo json_encode(["status" => "error", "message" => "Écriture impossible"]);
    }
} else {
    header('HTTP/1.1 400 Bad Request');
    echo json_encode(["status" => "error", "message" => "Pas de données reçues"]);
}
?>