<?php
                //initializing websites by getting database coonection to database variable and defining tutor class in class_tutor.php
				require_once '../private/initializen.php';	
?>


<DOCTYPE html>
<html>
    <head>
        <title>
            Tutor form
        </title>
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
                    //creating $name variable with the name variable given when calling delete1.php
                    $name = $_GET['name'];
        
                    //Creating deleted_tutor object by calling find by id function which defined in tutor class by giving $name as paramater and getting value from database relevent to the given name
                    $deleted_tutor = Tutor::find_by_id($name); 

                    //after that we call delete function which is defined in tutor class in class_tutor.php on deleted_tutor variable which is the selected object or instance of class by user
                    //results array will store returned value by calling update function which is the returned value.
                    $deleted_tutor -> delete();
                        
                    //following code will show the user the properties of the deleted tutor variable which was the selected object or instance of class by user
                    echo "<p> The following entry is deleted </p>";
                        
                    echo "<table>";
                    echo "<tr> <td><b> Name </b> </td> <td>" . $deleted_tutor->name. "</td> </tr>";
                    echo "<tr> <td> <b> Email </b> </td> <td>" . $deleted_tutor->email. "</td> </tr>";
                    echo "<tr> <td> <b> Contact number </b> </td> <td>" . $deleted_tutor->co_number . "</td> </tr>";
                    echo "<tr> <td> <b> levels </b> </td> <td>" . $deleted_tutor->levels. "</td> </tr>";
                    echo "<tr> <td> <b> Subjects </b> </td> <td>" . $deleted_tutor->subjects . "</td> </tr>";
                    echo "<tr> <td> <b> Rate per hour </b> </td> <td>" . $deleted_tutor->rate . "</td> </tr>";
                    echo "</table>";
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
                        <a href="add1.php"> <img class="edit" href="add1.php" src="http://ssl.gstatic.com/bt/C3341AA7A1A076756462EE2E5CD71C11/1x/bt_compose2_1x.png"></a>
                    </div>
                </div>
                <div class="fab"> Add new Tutor  ➤</div>    
            </div>
        </div>
        
    </body>