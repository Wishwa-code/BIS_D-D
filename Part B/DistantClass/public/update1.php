<?php
                //initializing websites by getting database coonection to database variable and defining tutor class in class_tutor.php
				require_once '../private/initializen.php';	
?>


<DOCTYPE html>
<html>
    <head>
        <title>Tutor form</title>
        <link rel="stylesheet" type="text/css" href="tutorhome.css">
    </head>
    <body>
        <div class="container">
            
            <!--header part--> 
            <div class="header">
                    <p>DistantClass.lk</p>
            </div>

            <div class="row_gap_1">
            </div>

            <!--menu -->
            <div class="menu_items_1">
                <a href="tutorhome.html">
                    <p>home</p>
                </a>
            </div>

            <div class="menu_items_2">
                <a href="tutordetails.php">
                    <p>Tutor Details</p>
                </a>
            </div>

            <!--form inputs-->
            <div class="addform">
                <?php 
                    //creating $name variable with the name variable given when calling update1.php
                    $name = $_GET['name'];

                    //Creating specific tutor object by calling find by id function which defined in tutor class by giving name as paramater and getting value from database relevent to the given name
                    $specific_tutor = Tutor::find_by_id($name);	
				

                    //creating if function to decide output according to rquest method
                    //if request method is post then true part which means form has requested to after add a  record by giving values to create args array in following function
                    if($_SERVER['REQUEST_METHOD'] === 'POST') {

                        //creating $args array to collect the new values given by the user
                        $args=[];									
                        $args['email']=$_POST['email'];
                        $args['co_number']=$_POST['co_number'];
                        $args['levels']=$_POST['levels'];
                        $args['subjects']=$_POST['subjects'];
                        $args['rate']=$_POST['rate'];


                        //calling merge_attributes function defined tutor_class.php to merge new changed proeprty with old properties create a array with updated values
                        $specific_tutor->merge_attributes($args);

                        //after that we call update function which is defined in tutor class in class_tutor.php on specififc tutor variable which is the modified instanse of tutor class
                        //results array will store returned value by calling update function which is the returned value.
                        $results = $specific_tutor->update();
			
				
                        
                        echo " <p> Details of the updated item </p> ";
                        echo "<table>";
                        echo "<tr> <th><b>  Name </b> </th> <td>" . $specific_tutor->name . "</td> </tr>";
                        echo "<tr> <th> <b> Email</b> </th> <td>" . $specific_tutor->email . "</td> </tr>";
                        echo "<tr> <th> <b> Contact Number </b> </th> <td>" . $specific_tutor->co_number . "</td> </tr>";
                        echo "<tr> <th> <b> levels </b> </th> <td>" . $specific_tutor->levels. "</td> </tr>";
                        echo "<tr> <th> <b> Subjects </b> </th> <td>" . $specific_tutor->subjects . "</td> </tr>";
                        echo "<tr> <th> <b> Rate per hour </b> </th> <td>" . $specific_tutor->rate . "</td> </tr>";
                        echo "</table>";

                        //If results variable contains value this will show that record has updated succesfully
                        if($results) {
                            echo "<br><b>Successfully updated<b>";
                            }

                        //else If results user will be shown error message
                        else{
                            echo"something went wrong";
                        }
                
                

			
                        } else 
                        {	
                        //else if request method is not equal then else/false part will show user form with values to be updated  which will be used to create args array when created form is submitted
                            echo "<br><p>Tutor name:  " . $name. "</P>.<br>";
                            echo  "<form action=update1.php?name=" . $name . " method='post'>";
                                echo "<table>";
                                    echo "<tr> <th> Email </th> <td> <input type='text' name ='email' value='$specific_tutor->email' > </td> </tr>";
                                    echo "<tr> <th> Number </th> <td> <input type='text' name ='co_number' value='$specific_tutor->co_number' > </td> </tr>";
                                    echo "<tr> <th> Levels </th> <td> <input type='text' name ='levels' value='$specific_tutor->levels' > </td> </tr>";
                                    echo "<tr> <th> Subjects </th>  <td> <input type='text' name ='subjects' value='$specific_tutor->subjects'> </td> </tr>";
                                    echo "<tr> <th> Rate </th> <td> <input type='number' name ='rate' value='$specific_tutor->rate' > </td> </tr>";
                                echo "</table>";

                                    echo "<br> <input type='submit' value='Update Record' />";
                            echo "</form>";
                    

                        }

                ?>
            </div>

            <div class="image_1">
            </div>            

            <div class="table_1">
            </div>

            <div class="footer">
                <div id="container-floating">
                    <div id="floating-button" data-toggle="tooltip" data-placement="left" data-original-title="Create" onclick="newmail()">
                        <p class="plus">+</p>
                        <a href="add1.php"> <img class="edit" href="add1.php" width="55" height="55" src="teacher.png"></a>
                    </div>
                </div>
                <div class="fab"> Add new Tutor  ➤</div>
            </div>
        </div>
        
    </body>