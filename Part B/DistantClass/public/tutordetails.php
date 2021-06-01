<DOCTYPE html>
    <html>
        <head>
            <title>
                Tutor Details
            </title>
            <link rel="stylesheet" type="text/css" href="tutordb.css">
    
        </head>
        <body>
            <div class="container">
    
                <!--header part--> 
                <div class="header">
                    <p>DistantClass.lk</p>
                </div>

                <div class="row_gap_1">

                </div>
    
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
               
                <!--form inputs-->
                <div class="form">
                    <?php 

                        //initializing websites by getting database coonection to database variable and defining tutor class in class_tutor.php
				        include '../private/initializen.php';	

                        //Creating array of objects or instances of tutor class by calling find by all function which defined in tutor class  and getting value sfrom database 
                        $tutor_array = Tutor::find_all();	

                        //following code will show the user the properties of the tutor objects in the tutor array
		                echo "<br><br><br>";
		                echo "<table border = 1 width=100%>";
			            echo "<tr bgcolor=#000000>";
				        echo "<th> Name </th>";
				        echo "<th> Email </th>";
				        echo "<th> Phone number </th>";
				        echo "<th> Level </th>";
				        echo "<th> Subject to teach </th>";
                        echo "<th> Rate per hour </th>";
                        echo "<th> Update</th>";
			            echo "</tr>";
  		

		                foreach ($tutor_array as $tutor) {
			                echo    "<tr>";
                            echo    "<td> <a href=tutprofile.php?name=" . $tutor->name . ">". $tutor->name. "</td>";
				            echo    "<td>" . $tutor->email . "</td>";
				            echo    "<td>" . $tutor->co_number . "</td>";	
				            echo    "<td>" . $tutor->levels . "</td>";
                            echo    "<td>" . $tutor->subjects . "</td>";
                            echo    "<td>" . $tutor->rate . "</td>";
                            echo    "<td>  <a class=add_butt href=update1.php?name=" . $tutor->name . ">Edit</a>
                                        <a class=del_butt href=delete1.php?name=" . $tutor->name . ">Delete</a>

                                    </td>";
			                echo    "</tr>";
                        }

		                echo "</table>";
                    ?>
                    </form>
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