<?php
if ($_SERVER['REQUEST_METHOD'] != "POST") {
    http_response_code(403);
    exit;
}

try {
    $post = json_decode(file_get_contents('php://input'));
} catch (Exception $e) {
    http_response_code(403);
    exit;
}

if (empty($post)) {
    http_response_code(403);
    exit;
}
/*
//$transaction = $post->operation->shop_process_id;
//$amount = number_format($transaction->amount, 2, ".", "");

//if ($amount !== $post->operation->amount) {
//    http_response_code(403);
//    exit;
//}
 */
// Hacer algo con esta info

$transaction->complete($post->operation);

http_response_code(200);
header('Content-type: application/json');
echo json_encode([
    "status" => "success",
    "message" => "Su pago ha sido procesado",
    "developer_message" => "Operation confirmed"]);
exit;

