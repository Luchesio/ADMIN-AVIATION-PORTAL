<?php
include("connection.php"); // Ensure this is included first

if (isset($_POST['ticket_id'])) {
    $ticket_id = $_POST['ticket_id'];

    // Prepare and bind
    $stmt = $con->prepare("UPDATE ticket SET status = 'canceled' WHERE id = ?");
    $stmt->bind_param("i", $ticket_id); // 'i' for integer

    // Execute the statement
    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => $stmt->error]);
    }

    // Close the statement
    $stmt->close();
}
?>