<?php
include('navigation-bar.php');
?>

<!-- Search bar -->
<div class="p-4 pt-6 flex justify-end">
    <form autocomplete="off">
        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
        <div class="relative md:w-96">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </div>
            <input type="search" id="default-search" class="h-10 border-0 block w-full p-4 pl-10 text-sm text-black rounded-lg bg-white focus:border-gray-900 focus:ring-2 focus:ring-blue-500" placeholder="Search" onkeyup="mySearch()" maxlength="70">
        </div>
    </form>
</div>

<!-- Table -->
<div class="px-4 pt-2 pb-20 h-screen overflow-y-auto">
    <div class="relative overflow-y-auto h-full bg-white shadow-md rounded-lg">
        <table id="table" class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="sticky top-0 text-xs text-white uppercase bg-black">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            Name
                            <a href="#" onclick="sortTable(0)"><svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512">
                                    <path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z" />
                                </svg>
                            </a>
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            Role
                            <a href="#" onclick="sortTable(1)"><svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512">
                                    <path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z" />
                                </svg>
                            </a>
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            Log Date
                            <a href="#" onclick="sortTable(2)"><svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512">
                                    <path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z" />
                                </svg>
                            </a>
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            Time-in
                            <a href="#" onclick="sortTable(3)"><svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512">
                                    <path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z" />
                                </svg>
                            </a>
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            Time-out
                            <a href="#" onclick="sortTable(4)"><svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512">
                                    <path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z" />
                                </svg>
                            </a>
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            Penalty
                            <a href="#" onclick="sortTable(5)"><svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512">
                                    <path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z" />
                                </svg>
                            </a>
                        </div>
                    </th>
                </tr>
            </thead>
            <tbody>
                <!-- SQL Query for displaying the log history in the table -->
                <?php
                $sql = "SELECT * FROM `log_history` ORDER BY `date` DESC, `time_in` DESC";
                $res = mysqli_query($conn, $sql);
                $sn = 1;
                while ($row = mysqli_fetch_assoc($res)) {
                ?>
                    <tr class="bg-white border-b text-black font-semibold">
                        <td scope="row" class="px-6 py-2 font-semibold text-black whitespace-nowrap">
                            <!-- SQL Query for displaying the the user name -->
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
                        <td class="px-6 py-2">
                            <!-- SQL Query for displaying the role of the user -->
                            <?php
                            if ($row['admin_ID'] == 0) {
                                $sql1 = "SELECT * FROM `borrowers` WHERE borrower_ID = $row[borrower_ID]";
                                $res1 = mysqli_query($conn, $sql1);
                                $row1 = mysqli_fetch_assoc($res1);
                                echo $row1['role'];
                            } else {
                                $sql1 = "SELECT * FROM `library_admin` WHERE admin_ID = $row[admin_ID]";
                                $res1 = mysqli_query($conn, $sql1);
                                $row1 = mysqli_fetch_assoc($res1);
                                echo $row1['role'];
                            }

                            ?>
                        </td>
                        <td class="px-6 py-2">
                            <?php echo $row['date']; ?>
                        </td>
                        <td class="px-6 py-2">
                            <?php echo $row['time_in']; ?>
                        </td>
                        <td class="px-6 py-2">
                            <?php
                            if ($row['time_out'] == '') {
                                echo "-----";
                            } else {

                                echo $row['time_out'];
                            }
                            ?>
                        </td>
                        <!-- SQL Query for displaying the penalty of the specific user -->
                        <?php
                        $query = "SELECT * FROM `borrowed_books` WHERE `borrower_ID` = '$row[borrower_ID]'";
                        $qbook = $conn->query($query) or die(mysqli_error($conn));
                        $fbook = $qbook->fetch_array();
                        ?>
                        <?php
                        if ($fbook && $fbook['penalty'] > 0) {
                        ?>
                            <td class="px-6 py-2 text-red-600">
                                <?php echo $fbook['penalty']; ?>.00
                            </td>
                        <?php
                        } else {
                        ?>
                            <td class="px-6 py-2">

                            </td>
                        <?php
                        }
                        ?>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Back and print button -->
<div class="flex justify-end pr-4 pb-4 fixed bottom-0 right-0">
    <a href="../../server/print/log-history.php" target="_blank">
        <button type="button" class="mr-2 inline-flex items-center px-5 py-2 text-sm font-medium text-center text-white bg-green-600 rounded-lg hover:bg-blue-700 focus:ring-2 focus:outline-none focus:ring-blue-400">
            Print
        </button>
    </a>
    <a href="dashboard.php">
        <button type="button" class="inline-flex items-center px-5 py-2 text-sm font-medium text-center text-white bg-black rounded-lg hover:bg-red-800 focus:ring-2 focus:outline-none focus:ring-red-400">
            Back
        </button>
    </a>
</div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
<script src="../js/sort.js"></script>
<script>
    function mySearch() {
        // Declare variables
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("default-search");
        filter = input.value.toUpperCase();
        table = document.getElementById("table");
        tr = table.getElementsByTagName("tr");
        // Loop through all table rows, and hide those who don't match the search query
        for (i = 1; i < tr.length; i++) {
            column1 = tr[i].getElementsByTagName("td")[0];
            column2 = tr[i].getElementsByTagName("td")[1];
            column3 = tr[i].getElementsByTagName("td")[2];
            column4 = tr[i].getElementsByTagName("td")[3];
            column5 = tr[i].getElementsByTagName("td")[4];
            column6 = tr[i].getElementsByTagName("td")[5];
            if (column1 && column2 && column3 && column4 && column5 && column6) {
                column1 = column1.textContent || column1.innerText;
                column2 = column2.textContent || column2.innerText;
                column3 = column3.textContent || column3.innerText;
                column4 = column4.textContent || column4.innerText;
                column5 = column5.textContent || column5.innerText;
                column6 = column6.textContent || column6.innerText;
                if (column1.toUpperCase().indexOf(filter) > -1 || column2.toUpperCase().indexOf(filter) > -1 || column3.toUpperCase().indexOf(filter) > -1 || column4.toUpperCase().indexOf(filter) > -1 || column5.toUpperCase().indexOf(filter) > -1 || column6.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
</script>
</body>

</html>