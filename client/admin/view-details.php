<?php
include('navigation-bar.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
?>

<div class="flex justify-center items-center mt-8">
    <div class="bg-gray-50 rounded-md m-12 my-8 w-[30rem]">
        <?php
        $sql = "SELECT * FROM library_admin WHERE admin_ID = $id";
        $res = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($res);
        ?>
        <div class="px-6 py-6 lg:px-8">
            <h3 class="mb-4 text-xl font-medium text-gray-900 text-center">Registration Form</h3>

            <div class="grid grid-cols-3 gap-4 mb-[-0.2rem]">
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900">Username</label>
                    <input type="text" name="username" class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" onKeyPress="if(this.value.length==15) return false;" disabled value="<?php echo $row['username'] ?>">
                </div>

                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900">Role</label>
                    <select id="nameExtension" class="bg-gray-50 border border-gray-400 text-gray-900 mb-6 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 text-center" disabled>
                        <option value="" selected><?php echo $row['role'] ?></option>
                    </select>
                </div>

                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900">Registered On</label>
                    <input id="DATE" class="bg-gray-50 border border-gray-400 text-gray-900 mb-6 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 text-center" disabled value="<?php echo $row['registered_date']; ?>">
                </div>
            </div>

            <div class="grid grid-cols-3 gap-4 mb-[1.5rem]">
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900">Last Name</label>
                    <input type="text" name="lastName" class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" maxlength="20" disabled value="<?php echo $row['last_name'] ?>">
                </div>
                <div>
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900">First
                        Name</label>
                    <input type="text" name="firstName" class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" maxlength="25" disabled value="<?php echo $row['first_name'] ?>">
                </div>
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900">Middle
                        Initial</label>
                    <input type="text" name="middleInitial" class="text-center bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" maxlength="1" disabled value="<?php echo $row['middle_initial'] ?>">
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900">Name Extension</label>
                    <select id="nameExtension" class="bg-gray-50 border border-gray-400 text-gray-900 mb-6 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 text-center" disabled value="">
                        <option value="" selected><?php echo $row['name_extension'] ?></option>
                    </select>
                </div>

                <div class="flex">
                    <label class="block text-sm font-medium text-gray-900">Sex</label>
                    <div class="flex items-center mb-4 mr-4">
                        <input id="female" type="radio" <?php if ($row['sex'] == 'Female') {
                                                            echo 'checked';
                                                        } ?> value="Female" name="sex" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 mt-5 ml-[-1rem]" disabled>
                        <label for="default-radio-1" class="ml-2 text-sm font-medium text-gray-900 mt-5">Female</label>
                    </div>
                    <div class="flex items-center mb-4">
                        <input id="male" <?php if ($row['sex'] == 'Male') {
                                                echo 'checked';
                                            } ?> type="radio" value="Male" name="sex" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 mt-5" disabled>
                        <label for="default-radio-1" class="ml-2 text-sm font-medium text-gray-900 mt-5">Male</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="flex justify-end pr-4 pb-2 mt-[2.9rem]">
    <a href="librarian-registration.php">
        <button type="button" class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-black rounded-lg hover:bg-red-700 focus:ring-2 focus:outline-none focus:ring-red-300">
            Back
        </button>
    </a>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
</body>

</html>