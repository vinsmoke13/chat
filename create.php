<?php
    $room = $_POST['room'];
        if(ctype_alnum($room)!=TRUE)
        {
            $message="INVALID ENTRY!";
            echo '<script language="javascript">';
            echo 'alert("'.$message.'");';
            echo 'window.location="http://localhost/chatroom";';
            echo '</script>';
        }

        else if(strlen($room)>10)
        {
            $message="INVALID ENTRY!";
            echo '<script language="javascript">';
            echo 'alert("'.$message.'");';
            echo 'window.location="http://localhost/chatroom";';
            echo '</script>';
        }
        else
        {
            include 'db.php';
        }
       
       
        $sql="SELECT * FROM `chatrooms` WHERE room_name='$room'";
        $result=mysqli_query($conn,$sql);
    
        if($result)
        {
            if(mysqli_num_rows($result)>0)
            {
                $message="This room name is already taken.";
                echo '<script language="javascript">';
                echo 'alert("'.$message.'");';
                echo 'window.location="http://localhost/chatroom";';
                echo '</script>';
            }
            else
            {
                $sql="INSERT INTO `chatrooms`(`room_name`,`create_time`) VALUES('$room',CURRENT_TIMESTAMP);";
                if(mysqli_query($conn,$sql)==TRUE)
                {
                    $message="CONGRATS! Room is ready!";
                    echo '<script language="javascript">';
                    echo 'alert("'.$message.'");';
                    echo 'window.location="http://localhost/chatroom/rooms.php?room_name=' .$room. '";';
                    echo '</script>';
                }
            }
        }
        else
        {
            echo "Error:".mysqli_error($conn);
        }
?>