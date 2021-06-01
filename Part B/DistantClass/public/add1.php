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
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">    
        <link rel="stylesheet" type="text/css" href="tutorhome.css">

    </head>
    <body>
        <div class="container">

            <!--header part--> 
            <div class="header">
                <P> DistantClass.lk </p>
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
                    <p>Our tutors</p>
                </a>
            </div>


            <!--form inputs-->
            <div class="addform">
                <?php 

                    //creating if function to decide output according to rquest method
                    //if request method is post then true part which means requested to after adding details to inputs will run and create arg array with values given by user  
                    if($_SERVER['REQUEST_METHOD'] === 'POST') {

                        //creating $args array to collect the new values given by the user
                        $args=[];	 
                        $args['name']=$_POST['name'];
                        $args['email']=$_POST['email'];
                        $args['co_number']=$_POST['co_number'];
                        $args['levels']=$_POST['levels'];
                        $args['subjects']=$_POST['subjects'];
                        $args['rate']=$_POST['rate'];

                        // we create a new object or instance of tutor class by inserting the properties of args array as properties of new object or instance of class
                        $tutor = new Tutor;						
                        $tutor->name = $args["name"];
                        $tutor->email = $args["email"];
                        $tutor->co_number = $args["co_number"];
                        $tutor->levels = $args["levels"];
                        $tutor->subjects = $args["subjects"];
                        $tutor->rate = $args["rate"];
                        
                        
                        //after that we call create function which is defined in tutor class in class_tutor.php on new tutor variable which is instance of tutor class
                        //results array will store returned value by calling create function which is the returned value.
                        $results = $tutor->create();		
                    
                        //If results variable contains value this will show the user record has added succesfully
                        if($results){
                            echo "New Record added successfuly";
                        }
                    


                        //else if request method is not equal then else/false part will show user empty form to insert new tutor's details which will be used to create args array when created form is submitted
                        } else {

                            echo " <p>Add details of the new tutor</p>";
                            echo  "<form action=add1.php method='post'>\n";
                            echo "<table>";
                            echo "<tr> <th> Name </th> <td> <input type='text' name ='name'> </td> </tr>";
                            echo "<tr> <th> Email </th> <td> <input type='text' name ='email'> </td> </tr>";
                            echo "<tr> <th> Phone number </th> <td> <input type='text' name ='co_number'> </td> </tr>";
                            echo "<tr> <th> Level</th> <td> <input type='text' name ='levels'> </td> </tr>";
                            echo "<tr> <th> Subjects to teach </th> <td> <input type='text' name ='subjects'> </td> </tr>";
                            echo "<tr> <th> Rate per hour </th> <td> <input type='number' name ='rate'> </td> </tr>";  
                            echo "</table>";    
                            echo "<input type='submit' value='Add New' />";
                            echo "</form>";
                            echo "<h1>REPLACE SPACES IN YOUR NAME WITH UNDERSCORES _<br>Ex: Kate_Brown</h1> ";
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