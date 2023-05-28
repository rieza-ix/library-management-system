<?php
include('navigation-bar.php');
?>

<!--search bar-->
<div class="p-4 flex justify-end">
    <form autocomplete="off">
        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
        <div class="relative w-96">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </div>
            <input type="search" id="default-search" class="border-0 block w-full p-4 pl-10 text-sm text-black rounded-lg bg-white focus:border-gray-500" placeholder="Search" required onkeyup="mySearch()">
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
                            ID
                            <a href="#" onclick="sortTable(0)"><svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512">
                                    <path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z" />
                                </svg></a>
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            Book Title
                            <a href="#" onclick="sortTable(1)"><svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512">
                                    <path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z" />
                                </svg></a>
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            Date Received
                            <a href="#" onclick="sortTable(2)"><svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512">
                                    <path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z" />
                                </svg></a>
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        <div class="flex items-center">
                            Total Copies [<?php
                                            $sql = "SELECT SUM(copies) as sum FROM `books`";
                                            $res = mysqli_query($conn, $sql);
                                            $row = mysqli_fetch_assoc($res);
                                            $sum = $row['sum'];
                                            echo $sum;
                                            ?>]
                            <a href="#" onclick="sortTable(4)"><svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512">
                                    <path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z" />
                                </svg></a>
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        <div class="flex items-center">
                            Available Copies
                            <a href="#" onclick="sortTable(5)"><svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512">
                                    <path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z" />
                                </svg></a>
                        </div>
                    </th>
                    <th class="px-6 py-3">
                        Archived
                    </th>
                </tr>
            </thead>
            <tbody>

                <?php
                $i = 0;
                $books = $conn->query("SELECT * FROM `books`") or die(mysqli_error($conn));
                while ($book = $books->fetch_array()) {
                    $q_borrow = $conn->query("SELECT SUM(copies) as total FROM `borrowed_books` WHERE `book_ID` = '$book[book_ID]' && `status` = 'Borrowed'") or die(mysqli_error($conn));
                    $new_qty = $q_borrow->fetch_array();
                    $total = $book['copies'] - $new_qty['total'];
                ?>

                    <tr class="bg-white border-b text-black font-semibold">
                        <td scope="row" class="px-6 py-2 font-semibold text-black whitespace-nowrap">
                            <?php echo $book['book_ID'] ?>
                        </td>
                        <td onclick="openModal(<?php echo $book['book_ID']; ?>)" class="px-6 py-2 select-none hover:bg-blue-200" data-modal-target="card-modal" data-modal-toggle="card-modal">
                            <?php echo $book['title'] ?>
                        </td>
                        <td class="px-6 py-2">
                            <?php echo $book['date_receive'] ?>
                        </td>
                        <td class="px-6 py-2">
                            <?php
                            if ($total == 0) {
                                echo "<label class = 'text-red-600'>Not Available</label>";
                            } else {
                                echo '<input class="bg-white" name = "status[' . $i . ']" value = "' . $book['status'] . '" disabled>';
                            }
                            ?>
                        </td>
                        <td class="px-6 py-2">
                            <?php echo $book['copies'] ?>
                        </td>
                        <td class="px-6 py-2">
                            <?php echo $total ?>
                        </td>
                        <?php if ($book['archive'] == 1) {
                        ?>
                            <td class="px-6 py-2">Yes</td>
                        <?php
                        } else {
                        ?>
                            <td class="px-6 py-2">No</td>
                        <?php
                        }

                        ?>
                    </tr>
                <?php
                    $i++;
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<!--card modal-->
<div id="card-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative max-h-full mx-auto flex items-center justify-center w-[55rem]">
        <!--card modal content-->
        <div class="relative bg-gray-200 rounded-lg shadow">
            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="card-modal">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="px-6 py-6 lg:px-8">
                <h3 class="mb-4 text-xl font-medium text-gray-900 text-center">Card Catalog</h3>
                <form class="space-y-6" action="#" autocomplete="off">
                    <table>
                        <tr>
                            <td id="category" class="text-center px-8 py-1"></td>
                            <td></td>
                        </tr>

                        <tr>
                            <td id="authorNumber" class="text-center px-8 py-1"></td>
                            <td></td>
                        </tr>


                        <tr>
                            <td></td>
                            <td id="author" class="px-8 py-1"></td>
                        </tr>

                        <tr>
                            <td></td>
                            <td id="title" class="pl-16 px-8 py-1"></td>
                        </tr>

                        <tr>
                            <td></td>
                            <td id="publication" class="px-8 py-1"></td>
                        </tr>

                        <tr>
                            <td></td>
                            <td id="physical" class="px-8 py-1"></td>
                        </tr>

                        <tr>
                            <td></td>
                            <td id="isbn" class="px-8 py-1"></td>
                        </tr>

                        <tr>
                            <td id="accessionNumber" class="px-8 py-1"></td>
                            <td></td>
                        </tr>

                        <tr>
                            <td></td>
                            <td id="subject" class="px-8 py-1"></td>
                        </tr>

                        <tr>
                            <td></td>
                            <td id="tracing" class="px-8 py-1"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="flex justify-end pr-4 pb-2">
    <a href="../../server/print/inventory-reports.php" target="_blank">
        <button type="button" class="mr-2 inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-green-600 rounded-lg hover:bg-blue-700 focus:ring-2 focus:outline-none focus:ring-blue-500">
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
            column7 = tr[i].getElementsByTagName("td")[6];
            if (column1 && column2 && column3 && column4 && column5 && column6 && column7) {
                column1 = column1.textContent || column1.innerText;
                column2 = column2.textContent || column2.innerText;
                column3 = column3.textContent || column3.innerText;
                column4 = column4.textContent || column4.innerText;
                column5 = column5.textContent || column5.innerText;
                column6 = column6.textContent || column6.innerText;
                column7 = column7.textContent || column7.innerText;
                if (column1.toUpperCase().indexOf(filter) > -1 || column2.toUpperCase().indexOf(filter) > -1 || column3.toUpperCase().indexOf(filter) > -1 || column4.toUpperCase().indexOf(filter) > -1 || column5.toUpperCase().indexOf(filter) > -1 || column6.toUpperCase().indexOf(filter) > -1 || column7.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
</script>
<script>
    // Function to open the modal
    function openModal(id) {
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'get-data.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        xhr.onload = function() {
            if (xhr.status === 200) {
                var data = JSON.parse(xhr.responseText);

                // Update the modal content with the retrieved data
                document.getElementById('category').textContent = data.category;
                document.getElementById('authorNumber').textContent = data.author_number
                document.getElementById('author').textContent = data.author_lastname + ', ' + data.author_firstname;
                document.getElementById('accessionNumber').textContent = data.accession_number;
                document.getElementById('title').textContent = data.title + ' / ' + data.author_firstname + ' ' + data.author_lastname;
                document.getElementById('publication').textContent = data.publisher + ' -- ' + data.publication_place + ', C ' + data.copyright_year;
                document.getElementById('physical').textContent = data.physical_description;
                document.getElementById('isbn').textContent = 'ISBN ' + data.isbn;
                document.getElementById('subject').textContent = data.subject;
                document.getElementById('tracing').textContent = data.tracing;
            } else {
                console.error('Request failed. Status: ' + xhr.status);
            }
        };

        xhr.onerror = function() {
            console.error('Request failed. Network error.');
        };

        xhr.send('id=' + id);
    }
</script>
</body>

</html>