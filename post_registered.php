<?php
                        require'Connection.php';
                       @$id=  mysql_real_escape_string($_REQUEST['patients_id']);
                       if(isset($_REQUEST['post'])){
                        $updateQuery="UPDATE patients SET Status='unattended' WHERE CardNumber='".$_REQUEST['patients_id']."'";
						mysqli_query($connection,$updateQuery);
                         header('Location:reception_staffhome.php');
                          }
						  
                        ?>