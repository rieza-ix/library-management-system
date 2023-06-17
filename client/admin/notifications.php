<?php
include('navigation-bar.php');
?>

<div class="mb-4 flex justify-center items-center mt-[-1rem]">
    <div class="bg-gray-50 rounded-md m-12 my-8 w-[33rem]">
        <div class="px-4 py-6 lg:px-8">
            <div class="flex justify-between">
                <h3 class="mb-4 text-xl font-medium text-gray-900">Notifications</h3>
                <form action="" method="POST">
                <input type="submit" name="mark_all" class="text-xs text-blue-600 underline mt-[0.3rem]" value="Mark all as read">
                </form>
            </div>
            <form class="space-y-6" action="#" autocomplete="off" method="POST">
                <ul>
                    <li>
                        <?php
                        $getNotif=mysqli_query($conn, "SELECT * FROM notification 
                         WHERE type = 'admin' ORDER BY notif_status ASC");
                        $count = mysqli_num_rows($getNotif);
                        if($count != 0)
                        {
                            while ($row = mysqli_fetch_assoc($getNotif)) 
                            {
                                
                                ?>

<li>
                        <!-- Notification for pending fines -->
                        <a href="<?php echo $row['borrower_ID'] == 0? './log-history.php': './approve-decline.php?id='.$row['borrower_ID']; ?>">
                            <div class="<?php echo $row['notif_status'] == 0 ? 'bg-blue-300' : 'bg-blue-100'  ?> py-3 px-6 text-sm rounded-md mb-1">
                                <h2 class="font-semibold mb-1"><?php echo $row['borrower_ID'] == 0? 'Pending fines': 'Pending registration' ?></h2>
                                <h3><?php echo $row['notification_text']; ?></h3>
                                <form action="" method="POST">
                                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                    <?php echo $row['notif_status'] == 0 ? '<input type="submit" name="read" value="Mark as Read">' : ''  ?>
                                    <?php echo $row['notif_status'] != 0 ? '<input type="submit" name="remove" value="Remove">' : ''  ?>
                            </form>
                            </div>
                        </a>
                    </li>



                                <?php
                            }

                        }
                        else
                        {
                            echo "No nofications this time";
                        }
                        if(isset($_POST['read']))
                        {
                            $update=mysqli_query($conn, "UPDATE notification SET notif_status = 1 WHERE id=$_POST[id]");
                            if($update)
                            {
                                echo "<script>
                                window.location.href='notifications.php'
                                </script>";
                        }
                        }
                        if(isset($_POST['mark_all']))
                        {
                            $update=mysqli_query($conn, "UPDATE notification SET notif_status = 1 WHERE type = 'admin'");
                            if($update)
                            {
                                echo "<script>
                                window.location.href='notifications.php'
                                </script>";
                        }
                    }
                    if(isset($_POST['remove']))
                    {
                        $update=mysqli_query($conn, "DELETE FROM notification WHERE id = $_POST[id]");
                        if($update)
                        {
                            echo "<script>
                            window.location.href='notifications.php'
                            </script>";
                    }
                }
                       


                        ?>
                      
                   

    <!--notif for book availability-->
   
    </li>
                </ul>
            </form>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
</body>

</html>