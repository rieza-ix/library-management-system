<!DOCTYPE html>
<?php
require '../db/conDB.php';
?>
<html lang="en">

<head>
    <title>Print: Log History</title>
    <link href="../../client/assets/logo.png" type="image/x-icon" rel="shortcut icon">
</head>

<style>
    body {
        font-family: Arial, sans-serif;
    }

    .table {
        width: 100%;
    }

    .table-striped tbody>tr:nth-child(odd)>td,
    .table-striped tbody>tr:nth-child(odd)>th {
        background-color: #f9f9f9;
    }

    @media print {
        #print {
            display: none;
        }
    }

    @media print {
        #PrintButton {
            display: none;
        }
    }

    @page {
        size: auto; /* Bondpaper size */
        margin: 10%; /* Bondpaper margin */
    }
</style>

<body>
    <!-- Bondpaper header -->
    <div>
        <img src="../../client/assets/logo.png" style="display:block; margin:0 auto 2% auto; width:11%; height:7.4vh;">
        <h4 style="text-align:center; font-weight:500; margin-top:1%">REPUBLIC OF THE PHILPPINES</h4>
        <h4 style="text-align:center; font-weight:500; margin-top:-2.7%">ANTIQUE NATIONAL SCHOOL</h4>
        <h4 style="text-align:center; font-weight:500; margin-top:-2.5%">T.A. FORNIER ST., SAN JOSE, ANTIQUE</h4>
        <br>
        <h4 style="text-align:center; margin-top:-2%">ANS LIBRARY REPORT</h4>
        <h4 style="text-align:center; font-weight:500; margin-top:-2.7%">LOG HISTORY</h4>
    </div>

    <!-- Date prepared -->
    <br>
    <b style="text-align:right">DATE PREPARED:</b>
    <?php
    $date = date("m.d.Y", strtotime("+6 HOURS"));
    echo $date;
    ?>
    <br><br>

    <!-- Table -->
    <table id="table" class="result10" style="border:1px solid black; border-collapse:collapse; width:100%">
        <tr>
            <td style="font-weight:bold; text-align:center; width:16%; border:1px solid black">NAME</td>
            <td style="font-weight:bold; text-align:center; width:8%; border:1px solid black">LOG DATE</td>
            <td style="font-weight:bold; text-align:center; width:3%; border:1px solid black">TIME IN</td>
            <td style="font-weight:bold; text-align:center; width:4%; border:1px solid black">TIME OUT</td>
        </tr>

        <!-- Display all log history -->
        <?php
        require '../db/conDB.php';
        $sql = "SELECT * FROM `log_history` ORDER BY `date` ASC, `time_in` ASC";
        $res = mysqli_query($conn, $sql);
        $sn = 1;
        while ($row = mysqli_fetch_assoc($res)) {
        ?>
        
        <tr>
            <td style="border:1px solid black; padding:1.5px; padding-top:3px; padding-left:10px">
                <?php
                if ($row['admin_ID'] == 0) {
                    $sql1 = "SELECT * FROM `borrowers` WHERE borrower_ID = $row[borrower_ID]";
                    $res1 = mysqli_query($conn, $sql1);
                    $row1 = mysqli_fetch_assoc($res1);
                    echo $row1['first_name'] . " " . $row1['last_name'];
                } else {
                    $sql1 = "SELECT * FROM `library_admin` WHERE admin_ID = $row[admin_ID]";
                    $res1 = mysqli_query($conn, $sql1);
                    $row1 = mysqli_fetch_assoc($res1);
                    echo $row1['first_name'] . " " . $row1['last_name'];
                }
                ?>
            </td>
            <td style="border:1px solid black; padding:1.5px; text-align:center; padding-top:3px">
                <?php echo $row['date']; ?>
            </td>
            <td style="border:1px solid black; padding:1.5px; text-align:center; padding-top:3px"><?php echo $row['time_in']; ?></td>
            <td style="border:1px solid black; padding:1.5px; padding-top:3px; text-align:center">
                <?php
                if ($row['time_out'] == '') {
                    echo "-----";
                } else {

                    echo $row['time_out'];
                }
                ?>
            </td>
        </tr>
        <?php
        }
        ?>
    </table>
</body>

<script type="text/javascript">
    function PrintPage() {
        window.print();
    }
    document.loaded = function() {}
    window.addEventListener('DOMContentLoaded', (event) => {
        PrintPage()
        setTimeout(function() {
            window.close()
        }, 750)
    });
</script>

</html>