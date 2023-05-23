<?php
include('navigation-bar.php');
?>

<!--button and search bar-->
<div class="p-4 flex justify-end">
    <!--button-->
    <a href="./add-user-account.php">
        <button type="button" class="h-full mr-8 inline-flex items-center px-5 py-2.5 text-m font-medium text-center text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-2 focus:outline-none focus:ring-blue-300" data-modal-target="register-modal" data-modal-toggle="register-modal">
            Register a borrower
        </button>
    </a>

    <?php
    $pending = mysqli_query($conn, "SELECT COUNT(status) AS total FROM borrowers WHERE status = '0' ;");
    $p = mysqli_fetch_assoc($pending)
    ?>

    <a href="account-registration.php" class="flex mr-8">
        <button type="button" class="inline-flex items-center px-5 py-2.5 text-m font-medium text-center text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-2 focus:outline-none focus:ring-blue-300">
            Pending Registration
            <span class="inline-flex items-center justify-center w-8 h-8 ml-2 text-xs font-semibold text-blue-800 bg-blue-200 rounded-full"><?php echo $p['total']; ?></span>
        </button>
    </a>
    <!--search bar-->
    <form autocomplete="off">
        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
        <div class="relative w-96">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </div>
            <input onkeyup="mySearch()" type="search" id="default-search" class="border-0 block w-full p-4 pl-10 text-sm text-black rounded-lg bg-white focus:border-gray-500" placeholder="Search">
        </div>
    </form>
</div>

<!--table-->
<div class="p-4 h-screen overflow-y-auto ">
    <div class="relative overflow-y-auto h-full bg-white shadow-md sm:rounded-lg">
        <table id="table" class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="sticky top-0 text-xs text-white uppercase bg-black">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            Role
                            <a href="#" onclick="sortTable(0)"><svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512">
                                    <path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z" />
                                </svg></a>
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            Last Name
                            <a href="#" onclick="sortTable(1)"><svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512">
                                    <path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z" />
                                </svg></a>
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            First Name
                            <a href="#" onclick="sortTable(2)"><svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512">
                                    <path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z" />
                                </svg></a>
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Middle Initial
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Name Extension
                    </th>
                    <th scope="col" class="px-6 py-3 flex justify-center">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>

                <?php
                $i = 0;
                $user = $conn->query("SELECT * FROM `borrowers` WHERE status = '1'") or die(mysqli_error($conn));
                while ($borrower = $user->fetch_array()) {
                    $id = $borrower['borrower_ID'];
                    $idNumber = $borrower['id_number'];
                    $last = $borrower['last_name'];
                    $first = $borrower['first_name'];
                    $middle = $borrower['middle_initial'];
                    $extension = $borrower['name_extension'];
                    $idNumber = $borrower['id_number'];
                    $sex = $borrower['sex'];
                    $role = $borrower['role'];
                ?>

                    <tr class="bg-white border-b text-black font-semibold">
                        <th scope="row" class="px-6 py-2 font-semibold text-black whitespace-nowrap">
                            <?php echo $borrower['role'] ?>
                        </th>
                        <td class="px-6 py-2">
                            <?php echo $borrower['last_name'] ?>
                        </td>
                        <td class="px-6 py-2">
                            <?php echo $borrower['first_name'] ?>
                        </td>
                        <td class="px-6 py-2">
                            <?php echo $borrower['middle_initial'] ?>
                        </td>
                        <td class="px-6 py-2">
                            <?php echo $borrower['name_extension'] ?>
                        </td>
                        <td class="px-6 py-2 justify-center flex">
                            <a href="./update-details-form.php">
                                <button type="button" class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-green-600 rounded-lg hover:bg-green-700 focus:ring-2 focus:outline-none focus:ring-green-500">
                                    Edit
                                </button>
                            </a>
                        </td>
                    </tr>

                <?php
                }
                ?>

            </tbody>
        </table>
    </div>
</div>

<div class="flex justify-end pr-4 pb-2">
    <a href="../../server/print/borrower-accounts.php" target="_blank">
        <button id="print" type="button" class="mr-2 inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-green-600 rounded-lg hover:bg-blue-700 focus:ring-2 focus:outline-none focus:ring-blue-500">
            Print
        </button>
    </a>
    <a href="dashboard.php">
        <button type="button" class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-black rounded-lg hover:bg-red-700 focus:ring-2 focus:outline-none focus:ring-red-300">
            Back
        </button>
    </a>
</div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
<script src="../js/sort"></script>
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
            if (column1 && column2 && column3 && column4 && column5) {
                column1 = column1.textContent || column1.innerText;
                column2 = column2.textContent || column2.innerText;
                column3 = column3.textContent || column3.innerText;
                column4 = column4.textContent || column4.innerText;
                column5 = column5.textContent || column5.innerText;
                if (column1.toUpperCase().indexOf(filter) > -1 || column2.toUpperCase().indexOf(filter) > -1 || column3.toUpperCase().indexOf(filter) > -1 || column4.toUpperCase().indexOf(filter) > -1 || column5.toUpperCase().indexOf(filter) > -1) {
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