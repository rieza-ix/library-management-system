<?php
include("../db/conDB.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $return = date("Y-m-d", strtotime("+8 HOURS"));
    $sql = "UPDATE borrowed_books SET status = 'Returned', returned_date = '$return', copies= copies - 1 WHERE borrow_ID = '$id'";
    $res = mysqli_query($conn, $sql);

    $removeNotif = mysqli_query($conn, "DELETE FROM notification WHERE borrow_ID = $id");
    if ($removeNotif) {
        echo "<script>
            alert('Book returned successfully.');
            window.location.href='../../client/librarian/return-book.php'
            </script>";
    } else {
        echo "Cannot return book.";
    }
}
