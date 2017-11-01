<?php
                       @$delete_id=  mysqli_real_escape_string($connection,$_REQUEST['staff_id']);
                       if(isset($_REQUEST['submit2_id'])){
                         $sql_delete="DELETE FROM `staff` WHERE `PFNumber` = '$delete_id'";
                          mysqli_query($delete_id,$sql_delete) or die(mysqli_error($connection));
                          header('location:delete_staff.php');
                      }
                        ?>