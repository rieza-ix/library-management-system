<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link href="../assets/logo.png" type="image/x-icon" rel="shortcut icon">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
</head>

<body>
    <div class="h-screen flex flex-col bg-gradient-to-b from-blue-400 to-white">
        <!--navigation bar-->
        <nav class="z-10 sticky top-0 bg-black border-gray-200 dark:border-black">
            <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-2">
                <a href="dashboard.php" class="flex items-center">
                    <img src="../assets/logo.png" class="h-12 mr-3" alt="ANS Logo" />
                    <span class="self-center text-2xl font-semibold whitespace-nowrap text-white">ANS Library
                        Management System</span>
                </a>
                <button data-collapse-toggle="navbar-dropdown" type="button" class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-dropdown" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                    </svg>
                </button>

                <?php
                session_start();
                include "../../server/db/conDB.php";
                $date = date('Y-m-d');
                $admin_ID = $_SESSION['admin_ID'];

                $res = mysqli_query($conn, "SELECT * FROM library_admin where username='" . $_SESSION['username'] . "'");
                while ($row = mysqli_fetch_array($res)) {
                    $first  =  $row["first_name"];
                    $last  =  $row["last_name"];
                }
                ?>

                <?php
                $penaltyQuery = mysqli_query($conn, "SELECT COUNT(penalty) AS total FROM borrowed_books WHERE penalty > '0'");
                $p = mysqli_fetch_assoc($penaltyQuery);
                $penaltyCount = $p['total'];
                ?>

                <div class="hidden w-full md:block md:w-auto" id="navbar-dropdown">
                    <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-transparent dark:border-gray-700">
                        <li>
                            <a href="dashboard.php" class="block py-2 pl-3 pr-4 bg-blue-700 rounded md:bg-transparent text-white md:p-0">
                                <svg class="w-6 h-auto" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"></path>
                                </svg>
                            </a>
                        </li>
                        <!--notifications-->
                        <li>
                            <a href="./notifications.php" class="relative">
                                <button id="dropdownNavbarLink1" class="flex items-center justify-between w-full py-2 pl-3 pr-4 text-white rounded md:border-0 hover:text-blue-400 md:p-0 md:w-auto">
                                    <svg class="w-[1.6rem] h-auto" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0M3.124 7.5A8.969 8.969 0 015.292 3m13.416 0a8.969 8.969 0 012.168 4.5"></path>
                                    </svg>
                                    <span class="absolute inline-flex items-center justify-center w-6 h-6 text-xs font-bold text-white bg-red-500 border-2 border-white rounded-full -top-3 -right-5 dark:border-gray-900 px-3"><?php echo $penaltyCount; ?></span>
                                </button>
                            </a>
                        </li>
                        <li>
                            <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar" class="flex items-center justify-between w-full py-2 pl-3 pr-4 text-white rounded md:border-0 hover:text-blue-400 md:p-0 md:w-auto"><span><?php echo $first; ?> <?php echo $last; ?></span> <svg class="w-5 h-5 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg></button>
                            <!-- Dropdown menu -->
                            <div id="dropdownNavbar" class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:divide-gray-600">
                                <ul class="py-2 text-sm text-black" aria-labelledby="dropdownLargeButton">
                                    <div class="py-1" data-modal-target="popup-modal" data-modal-toggle="popup-modal">
                                        <a href="#" class="block px-4 py-2 text-sm text-black hover:bg-blue-100 hover:text-black">Sign
                                            out</a>
                                    </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!--modal for sign out link-->
        <div id="popup-modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-md max-h-full">
                <div class="relative bg-white rounded-lg shadow">
                    <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="popup-modal">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="p-6 text-center">
                        <svg aria-hidden="true" class="mx-auto mb-4 text-gray-700 w-14 h-14" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <h3 class="mb-5 text-lg font-normal text-gray-900">Are you sure you want to
                            sign out?</h3>
                        <a href="../../server/admin/logout.php?id=<?php echo $admin_ID; ?>">
                            <button type="button" class="text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                Yes, I'm sure
                            </button>
                        </a>
                        <button data-modal-hide="popup-modal" type="button" class="text-white bg-gray-500 hover:bg-gray-600 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-white focus:z-10">No,
                            cancel</button>
                    </div>
                </div>
            </div>
        </div>

        <!--button and search bar-->
        <div class="p-4 flex justify-end">
            <!--button-->
            <a href="borrow-book.php" class="flex mr-8">
                <button type="button" class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-2 focus:outline-none focus:ring-blue-300">
                    Borrow a book
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
                    <input type="search" id="default-search" class="border-0 block w-full p-4 pl-10 text-sm text-black rounded-lg bg-white focus:border-gray-500" placeholder="Search" required onkeyup="mySearch()">
                </div>
            </form>
        </div>

        <!--table-->
        <div class="p-4 h-screen overflow-y-auto">
            <div class="relative overflow-y-auto h-full bg-white shadow-md sm:rounded-lg">
                <table id="table" class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="sticky top-0 text-xs text-white uppercase bg-black">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                <div class="flex items-center">
                                    Borrower
                                    <a href="#" onclick="sortTable(0)"><svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512">
                                            <path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z" />
                                        </svg></a>
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <div class="flex items-center">
                                    Title
                                    <a href="#" onclick="sortTable(1)"><svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512">
                                            <path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z" />
                                        </svg></a>
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <div class="flex items-center">
                                    Status
                                    <a href="#" onclick="sortTable(2)"><svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512">
                                            <path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z" />
                                        </svg></a>
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <div class="flex items-center">
                                    Date Borrowed
                                    <a href="#" onclick="sortTable(3)"><svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512">
                                            <path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z" />
                                        </svg></a>
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <div class="flex items-center">
                                    Date Returned
                                    <a href="#" onclick="sortTable(4)"><svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512">
                                            <path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z" />
                                        </svg></a>
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <div class="flex items-center">
                                    Due Date
                                    <a href="#" onclick="sortTable(5)"><svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512">
                                            <path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z" />
                                        </svg></a>
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-5 flex justify-center">
                                Action
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <div class="flex items-center">
                                    Fine
                                    <a href="#" onclick="sortTable(7)"><svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512">
                                            <path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z" />
                                        </svg></a>
                                </div>
                            </th>
                    </thead>
                    <tbody>

                        <?php
                        $qreturn = $conn->query("SELECT b.*, u.*, br.* 
                        FROM borrowed_books AS br
                        INNER JOIN books AS b ON br.book_ID = b.book_ID
                        INNER JOIN borrowers AS u ON br.borrower_ID = u.borrower_ID
                        ORDER BY borrow_ID DESC") or die(mysqli_error($con));
                        while ($freturn = $qreturn->fetch_array()) {
                            $id = $freturn['borrow_ID'];
                            $dueDate = $freturn['due_date'];
                            $dateReturned = $freturn['returned_date'];
                            $fine = $freturn['penalty'];
                            $penalty = 0;

                            // Calculate the penalty based on the number of days overdue
                            $dueDateTimestamp = strtotime($dueDate);
                            $currentDateTimestamp = strtotime($dateReturned);
                            $daysOverdue = floor(($currentDateTimestamp - $dueDateTimestamp) / (60 * 60 * 24));
                            $penalty = $daysOverdue * 5;
                        ?>

                            <tr class="bg-white border-b text-black font-semibold">
                                <td scope="row" class="px-6 py-2 font-semibold text-black whitespace-nowrap">
                                    <?php echo $freturn['first_name'] . ' ' . $freturn['last_name']  ?>
                                </td>
                                <td onclick="openModal(<?php echo $freturn['book_ID']; ?>)" class="px-6 py-2 select-none hover:bg-blue-200" data-modal-target="card-modal" data-modal-toggle="card-modal">
                                    <?php
                                    $qbook = $conn->query("SELECT * FROM `books` WHERE `book_ID` = '$freturn[book_ID]'") or die(mysqli_error($conn));
                                    $fbook = $qbook->fetch_array();
                                    echo $fbook['title'];
                                    ?>
                                </td>
                                <td class="px-6 py-2">
                                    <?php echo $freturn['status'] ?>
                                </td>
                                <td class="px-6 py-2">
                                    <?php echo $freturn['date_issued'] ?>
                                </td>
                                <td class="px-6 py-2">
                                    <?php echo $freturn['returned_date'] ?>
                                </td>
                                <?php
                                if ($dueDate >= $date) {
                                ?>
                                    <td onselectstart="return false"><?php echo $freturn['due_date']; ?></td>

                                    <td>
                                    <?php

                                } else {
                                    ?>
                                    <td class="text-red-600">
                                        <?php echo $freturn['due_date'] ?>
                                    </td>

                                    <td class="px-6 py-2 flex justify-center">
                                    <?php
                                }
                                    ?>

                                    <?php
                                    if ($freturn['status'] == 'Returned') {
                                        echo '<center><button disabled = "disabled" class = "btn btn-primary py-3 inline-flex" type = "button" href = "#" id="returned6" data-toggle = "modal" data-target = "#return"><span class = "glyphicon glyphicon-check"></span>
                                        <svg class="w-[1rem] mt-[0.1rem] mr-[0.1rem] h-auto" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.125 2.25h-4.5c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125v-9M10.125 2.25h.375a9 9 0 019 9v.375M10.125 2.25A3.375 3.375 0 0113.5 5.625v1.5c0 .621.504 1.125 1.125 1.125h1.5a3.375 3.375 0 013.375 3.375M9 15l2.25 2.25L15 12"></path>
                                      </svg>RETURNED</button></center>';
                                    } else {
                                    ?>
                                        <a href="../../server/librarian/return.php?id=<?php echo $id; ?>" class="flex items-center justify-center">
                                            <button class="flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-2 focus:outline-none focus:ring-blue-300 my-2">
                                                <svg class="w-[1rem] h-auto mr-[0.1rem] mt-[0.05rem]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 9.75h4.875a2.625 2.625 0 010 5.25H12M8.25 9.75L10.5 7.5M8.25 9.75L10.5 12m9-7.243V21.75l-3.75-1.5-3.75 1.5-3.75-1.5-3.75 1.5V4.757c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0111.186 0c1.1.128 1.907 1.077 1.907 2.185z"></path>
                                                </svg>RETURN</button>
                                        </a>
                                    <?php
                                    }
                                    ?>
                                    </td>

                                    <?php
                                    if ($dueDateTimestamp <= $currentDateTimestamp) {
                                    ?>
                                        <td class="px-6 py-2 select-none">
                                            <div class="flex items-center">
                                                <?php
                                                if ($freturn['paid'] == '1') {
                                                    echo '<center><button disabled = "disabled" class = "mr-1 btn btn-primary flex" type = "button" href = "#" id="returned6" data-toggle = "modal" data-target = "#return"><span class = "glyphicon glyphicon-check"></span>
                                                    <svg class="w-[1rem] h-auto mr-[0.2rem] mt-[0.15rem]" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z"></path>
                                                </svg>PAID</button></center>';
                                                } else {
                                                ?>
                                                    <?php
                                                    if ($fine > 0) {
                                                    ?>
                                                        <a href="../../server/librarian/pay.php?id=<?php echo $id; ?>" class="flex items-center justify-center">
                                                            <button class="flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-yellow-600 rounded-lg hover:bg-yellow-700 focus:ring-2 focus:outline-none focus:ring-blue-300 my-2 mr-1">
                                                                <svg class="w-[1rem] h-auto mr-[0.2rem] mt-[0.05rem]" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z"></path>
                                                                </svg>PAY</button>
                                                        </a>
                                                    <?php
                                                    } else {
                                                    ?>

                                                    <?php
                                                    }
                                                    ?>
                                                <?php
                                                }
                                                ?>

                                                <?php
                                                if ($fine > 0) {
                                                ?>
                                                    <?php
                                                    $qbook = $conn->query("UPDATE `borrowed_books` SET `penalty` = '$penalty' WHERE `borrow_ID` = '$freturn[borrow_ID]'") or die(mysqli_error($conn));
                                                    // Assuming `$penalty` holds the penalty amount to be updated
                                                    // Make sure to replace `borrowed_books` with the correct table name in your database

                                                    // Check if the query was successful
                                                    if ($qbook) {
                                                        echo ' ' . $penalty . '.00'; // Assuming `$penalty` is a valid variable
                                                    } else {
                                                        echo "Error updating penalty: " . mysqli_error($conn);
                                                    }
                                                    ?>
                                                <?php
                                                } else {
                                                ?>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                        </td>
                                    <?php

                                    } else {
                                    ?>
                                        <td class="px-6 py-2 select-none">

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
            <a href="../../server/print/returned-books.php" target="_blank">
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
                if (column1 && column2 && column3 && column4 && column5) {
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
    <script>
        // Function to open the modal
        function openModal(id) {
            var xhr = new XMLHttpRequest();
            xhr.open('POST', '../../server/librarian/card-catalog.php', true);
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