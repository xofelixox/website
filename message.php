<?php
header('Content-Type: application/json');

$messageFile = 'message.txt';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = json_decode(file_get_contents('php://input'), true);
    if (isset($input['message'])) {
        file_put_contents($messageFile, $input['message']);
        echo json_encode(['status' => 'success', 'message' => 'Message saved successfully']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Invalid input']);
    }
} else {
    if (file_exists($messageFile)) {
        $message = file_get_contents($messageFile);
        echo json_encode(['message' => $message]);
    } else {
        echo json_encode(['message' => 'Hier wird die Nachricht angezeigt.']);
    }
}
?>
