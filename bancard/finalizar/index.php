<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>WebMessageChannel Test</title>
    </head>
    <body>

        <?php
        if ($_SERVER['REQUEST_METHOD'] != "GET") {
            echo json_encode([
            "status" => "cancel",
            "message" => "No se recibio GET",
            "developer_message" => "Operation cancelada"]);
            exit;
        }

        try {
            $id =  $_GET["id"];
        } catch (Exception $e) {
            http_response_code(403);
            exit;
        }

        if (empty($id)) {
            http_response_code(403);
            exit;
        }

        http_response_code(200);
        /* //header('Content-type: application/json');
          //echo json_encode([
        //    "status" => "success",
        //    "message" => "Su pago ha sido procesado",
        //    "developer_message" => "Operation confirmed"]);
        //exit; */

        ?>


        <h1>Gracias por su Compra!!</h1>
        <h1> <?php $id ?> </h1>

        <!-- when you click this button, it will send a message to the Dart side -->
        <!-- Remove the button and input field -->
        <br/>
        <script>
            // variable that will represents the port used to communicate with the Dart side
            var port;
            // listen for messages
            window.addEventListener('message', function(event) {
                if (event.data == 'capturePort') {
                    // capture port2 coming from the Dart side
                    if (event.ports[0] != null) {
                        // the port is ready for communication,
                        // so you can use port.postMessage(message); wherever you want
                        port = event.ports[0];
                        // To listen to messages coming from the Dart side, set the onmessage event listener
                        port.onmessage = function (event) {
                            // event.data contains the message data coming from the Dart side
                        console.log(event.data);
                        };
                        // Send the message automatically once the page has loaded
                        port.postMessage("success");
                    }
                }
            }, false);
        </script>
    </body>
</html>

