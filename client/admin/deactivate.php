<?php
include("../../server/db/conDB.php");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "UPDATE borrowers SET archive = 1 WHERE borrower_ID = '$id'";
    $res = mysqli_query($conn, $sql);
    if ($res) {
        echo "Account deactivated successfully.";
    } else {
        echo "Failed to deactivate borrower account.";
    }
}