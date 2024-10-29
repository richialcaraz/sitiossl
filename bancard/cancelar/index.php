<?php
    if ($_SERVER['REQUEST_METHOD'] != "POST") {
    echo json_encode([
    "status" => "cancel",
    "message" => "No se recibio POST",
    "developer_message" => "Operation cancelada"]);
    exit;
}

/*
//$transaction = get_transaction_automagically($post->id);
//$amount = number_format($transaction->amount, 2, ".", "");

//if ($amount !== $post->operation->amount) {
//    http_response_code(403);
//    exit;/
//}
 */
// Hacer algo con esta info

    /*
    //exit;
    */
