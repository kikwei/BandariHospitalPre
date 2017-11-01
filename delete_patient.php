<?php

include 'dblogin.php';
                       @$delete_id=  mysql_real_escape_string($_REQUEST['patients_id']);
                       if(isset($_REQUEST['delete'])){
                         $sql_delete="DELETE FROM `patients` WHERE `CardNumber` = '$delete_id'";
                          mysql_query($sql_delete) or die(mysql_error());
                          header('location:displayPatient.php');
                      }
					  
					  
						  
					  
			
                        ?>