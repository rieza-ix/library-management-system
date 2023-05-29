<?php
include('navigation-bar.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM `books` WHERE book_ID=$id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
}
?>

<div class="flex justify-center items-center my-4">
    <div class="bg-gray-50 rounded-md m-12 my-2 w-[55rem] h-full">
        <div class="px-4 py-4 lg:px-8">
            <h3 class="mb-6 text-xl font-medium text-gray-900 text-center">Edit Book Details</h3>
            <form class="space-y-4" action="" autocomplete="off" method="POST">
                <div class="grid grid-cols-2 gap-8">
                    <div>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block mb-1 text-sm font-medium text-gray-900">Book Title</label>
                                <input type="text" name="book_title" value="<?php echo $row['title']; ?>" class="mb-2 bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" maxlength="70">
                            </div>
                            <div>
                                <label class="block mb-1 text-sm font-medium text-gray-900">Book Category</label>
                                <select id="book_category" name="book_category" class="mb-2 bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                    <option value="<?php if ($row['category'] == "") {
                                                        echo "";
                                                    } else {
                                                        echo $row['category'];
                                                    } ?>" selected><?php if ($row['category'] == "") {
                                                                        echo "Select Category";
                                                                    } else {
                                                                        echo $row['category'];
                                                                    } ?>
                                    </option>
                                    <option value=""></option>
                                    <option value="Circulation">Circulation</option>
                                    <option value="Fiction">Fiction</option>
                                    <option value="Filipiniana">Filipiniana</option>
                                    <option value="Reference">Reference</option>
                                    <option value="Reserved">Reserved</option>
                                </select>
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block mb-1 text-sm font-medium text-gray-900">Publisher</label>
                                <input type="text" name="publisher" value="<?php echo $row['publisher']; ?>" class="mb-1 bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Publisher" maxlength="70">
                            </div>
                            <div>
                                <label class="block mb-1 text-sm font-medium text-gray-900">Year of Publication</label>
                                <input type="number" name="year_of_publication" value="<?php echo $row['year_published']; ?>" class="mb-2 bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Year of publication" onKeyPress="if(this.value.length==4) return false;">
                            </div>
                            <div class=" mt-[-1rem]">
                                <label class="block mb-1 text-sm font-medium text-gray-900">Place of Publication</label>
                                <input type="text" name="place_of_publication" value="<?php echo $row['publication_place']; ?>" class="mb-2 bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Place of publication" maxlength="70">
                            </div>
                            <div class=" mt-[-1rem]">
                                <label class="block mb-1 text-sm font-medium text-gray-900">Copyright</label>
                                <input type="number" name="copyright" value="<?php echo $row['copyright_year']; ?>" class="mb-2 bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Copyright" onKeyPress="if(this.value.length==4) return false;">
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block mb-1 text-sm font-medium text-gray-900">Book ISBN</label>
                                <input type="text" name="isbn" value="<?php echo $row['isbn']; ?>" class="mb-2 bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" maxlength="15">
                            </div>
                            <div>
                                <label class="block mb-1 text-sm font-medium text-gray-900">Scan Barcode</label>
                                <div class="w-full border-gray-900 border-2">

                                </div>
                            </div>
                            <div class="mt-[-1rem]">
                                <label class="block mb-1 text-sm font-medium text-gray-900">Edition</label>
                                <select id="edition" name="edition" class="mb-2 bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" maxlength="15">
                                    <option value="<?php if ($row['edition'] == "") {
                                                        echo "";
                                                    } else {
                                                        echo $row['edition'];
                                                    } ?>" selected><?php if ($row['edition'] == "") {
                                                                        echo "Select Edition";
                                                                    } else {
                                                                        echo $row['edition'];
                                                                    } ?>
                                    </option>
                                    <option value=""></option>
                                    <option value="I Edition">I Edition</option>
                                    <option value="II Edition">II Edition</option>
                                    <option value="III Edition">III Edition</option>
                                    <option value="IV Edition">IV Edition</option>
                                    <option value="V Edition">V Edition</option>
                                    <option value="VI Edition">VI Edition</option>
                                    <option value="VII Edition">VII Edition</option>
                                    <option value="VIII Edition">VIII Edition</option>
                                    <option value="IX Edition">IX Edition</option>
                                    <option value="X Edition">X Edition</option>
                                </select>
                            </div>
                            <div class="mt-[-1rem]">
                                <label class="block mb-1 text-sm font-medium text-gray-900">Volume</label>
                                <select id="volume" name="volume" class="mb-2 bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" maxlength="15">
                                    <option value="<?php if ($row['volume'] == "") {
                                                        echo "";
                                                    } else {
                                                        echo $row['volume'];
                                                    } ?>" selected><?php if ($row['volume'] == "") {
                                                                        echo "Select Volume";
                                                                    } else {
                                                                        echo $row['volume'];
                                                                    } ?>
                                    </option>
                                    <option value=""></option>
                                    <option value="Volume I">Volume I</option>
                                    <option value="Volume II">Volume II</option>
                                    <option value="Volume III">Volume III</option>
                                    <option value="Volume IV">Volume IV</option>
                                    <option value="Volume V">Volume V</option>
                                    <option value="Volume VI">Volume VI</option>
                                    <option value="Volume VII">Volume VII</option>
                                    <option value="Volume VIII">Volume VIII</option>
                                    <option value="Volume IX">Volume IX</option>
                                    <option value="Volume X">Volume X</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block mb-1 text-sm font-medium text-gray-900">Date Received</label>
                                <input type="date" name="received" value="<?php echo $row['date_receive']; ?>" class="mb-2 bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                            </div>
                            <div>
                                <label class="block mb-1 text-sm font-medium text-gray-900">Number of copies</label>
                                <input type="number" name="number_of_copies" value="<?php echo $row['copies']; ?>" class="mb-2 bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" onKeyPress="if(this.value.length==5) return false;">
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block mb-1 text-sm font-medium text-gray-900">Author's Number</label>
                                <input type="text" name="author_number" value="<?php echo $row['author_number']; ?>" class="mb-2 bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" maxlength="10">
                            </div>
                            <div>
                                <label class="block mb-1 text-sm font-medium text-gray-900">Accession Number</label>
                                <input type="text" name="accession_number" value="<?php echo $row['accession_number']; ?>" class="mb-2 bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" maxlength="10">
                            </div>
                            <div class="mt-[-1rem]">
                                <label class="block mb-1 text-sm font-medium text-gray-900">Author's First Name</label>
                                <input type="text" name="author_first" value="<?php echo $row['author_firstname']; ?>" class="mb-2 bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" maxlength="20">
                            </div>
                            <div class="mt-[-1rem]">
                                <label class="block mb-1 text-sm font-medium text-gray-900">Author's Last Name</label>
                                <input type="text" name="author_last" value="<?php echo $row['author_lastname']; ?>" class="mb-2 bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" maxlength="20">
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block mb-1 text-sm font-medium text-gray-900">Source of Fund</label>
                                <input type="text" name="source_of_fund" value="<?php echo $row['source_fund']; ?>" class="mb-2 bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" maxlength="30">
                            </div>
                            <div>
                                <label class="block mb-1 text-sm font-medium text-gray-900">Cost</label>
                                <input type="text" name="cost" value="<?php echo $row['cost']; ?>" class="mb-2 bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" maxlength="6">
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block mb-1 text-sm font-medium text-gray-900">Physical Description</label>
                                <input type="text" name="physical" value="<?php echo $row['physical_description']; ?>" class="mb-2 bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" maxlength="70">
                            </div>
                            <div>
                                <label class="block mb-1 text-sm font-medium text-gray-900">Tracing</label>
                                <input type="text" name="tracing" value="<?php echo $row['tracing']; ?>" class="mb-2 bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" maxlength="70">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex gap-8 pr-4 pb-2 mt-[-0.5rem]">
                    <button type="submit" name="submit" class="w-full text-white bg-blue-700 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update
                        Book</button>
                    <a href="./all-books.php" class="w-full">
                        <button type="button" class="px-5 py-2.5 text-sm font-medium text-center text-white bg-black rounded-lg hover:bg-red-700 focus:ring-2 focus:outline-none focus:ring-red-300 w-full items-center justify-center flex">
                            Back
                        </button>
                    </a>
                </div>
            </form>
            <p class="text-center mt-2 text-red-500 font-bold">
                <?php
                include("../../server/db/conDB.php");
                if (isset($_POST['submit'])) {
                    $book_title = $_POST['book_title'];
                    $book_category = $_POST['book_category'];
                    $publisher = $_POST['publisher'];
                    $year_of_publication = $_POST['year_of_publication'];
                    $place_of_publication = $_POST['place_of_publication'];
                    $copyright = $_POST['copyright'];
                    $isbn = $_POST['isbn'];
                    $edition = $_POST['edition'];
                    $volume = $_POST['volume'];
                    $received = $_POST['received'];
                    $number_of_copies = $_POST['number_of_copies'];
                    $author_number = $_POST['author_number'];
                    $author_first = $_POST['author_first'];
                    $author_last = $_POST['author_last'];
                    $accession_number = $_POST['accession_number'];
                    $source_of_fund = $_POST['source_of_fund'];
                    $cost = $_POST['cost'];
                    $tracing = $_POST['tracing'];
                    $physical = $_POST['physical'];

                    $sql = "UPDATE `books` SET isbn='$isbn',
                    accession_number='$accession_number',
                    date_receive='$received',
                    author_number='$author_number',
                    author_lastname='$author_last',
                    author_firstname='$author_first',
                    title='$book_title',
                    category='$book_category',
                    copies=$number_of_copies,
                    edition='$edition',
                    volume='$volume',
                    source_fund='$source_of_fund',
                    cost=$cost,
                    publisher='$publisher',
                    publication_place='$place_of_publication',
                    copyright_year='$copyright',
                    year_published='$year_of_publication',
                    tracing='$tracing',
                    physical_description='$physical'
                    WHERE book_ID=$id";

                    $result = mysqli_query($conn, $sql);
                    if ($result) {
                        echo "<script>
                window.location.href='all-books.php'
                </script>";
                    } else {
                        echo "Update failed!";
                    }
                }
                ?>
            </p>
        </div>
    </div>
</div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
</body>

</html>