<DOCTYPE html!>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="tutorhome.css">
    </head>
    <body>
        <div class="container">

            <!--header part--> 
            <<div class="header">
                    <p>DistantClass.lk</p>
            </div>

            <div class="row_gap_1">
            </div>

            <!--menu -->
            <div class="menu_items_1">
                <a href="tutorhome.html">
                    <p>Home</p>
                    </a>
            </div>
            <div class="menu_items_2">
                <a href="tutordetails.php">
                    <p>Tutor Details</p>
                </a>
            </div>

            <div class="details">
                <?php 
                    //initializing websites by getting database coonection to database variable and defining tutor class in class_tutor.php
                    include '../private/initializen.php';	

                        //creating $name variable with the name variable given when calling tutprofile1.php
                        $name = $_GET['name'];
        
                        //Creating specific_tutor object by calling find by id function which defined in tutor class by giving $name as paramater and getting value from database relevent to the given name
                        $specific_tutor = Tutor::find_by_id($name);	
                    
                    //following code will show the user the properties of the specific tutor variable which was the selected object or instance of class by user    
                    echo "<p>Tutor Name: ".$name."</p>";
                    echo "<table>";
                    echo "<tr> <th><b> Tutor Name </b> </th> <td> :  " . $specific_tutor->name . "</td> </tr>";
                    echo "<tr> <th> <b> Email     </b> </th> <td> :  " . $specific_tutor->email . "</td> </tr>";
                    echo "<tr> <th> <b> Phone Number </b> </th> <td> :  " . $specific_tutor->co_number . "</td> </tr>";
                    echo "<tr> <th> <b> levels </b> </th> <td> :  " . $specific_tutor->levels . "</td> </tr>";
                    echo "<tr> <th> <b> Subjects      </b> </th> <td> :  " . $specific_tutor->subjects . "</td> </tr>";
                    echo "<tr> <th> <b> Rate per hour</b> </th> <td> :  " . $specific_tutor->rate . "</td> </tr>";
                    echo "</table>";
                ?>
            </div>

            <div class="image_1">
            </div>
            <div class="footer">
                <div id="container-floating">
                    <div id="floating-button" data-toggle="tooltip" data-placement="left" data-original-title="Create" onclick="newmail()">
                        <p class="plus">+</p>
                        <a href="add1.php"> <img class="edit" href="add1.php" width="55" height="55" src="teacher.png"></a>
                    </div>
                </div>
                <div class="fab"> 
                    Add new Tutor  ➤
                </div>
            </div>
        </div>
    </body>
</html>