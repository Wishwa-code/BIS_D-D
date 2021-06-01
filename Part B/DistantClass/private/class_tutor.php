<?php

//all static functions defined below cab be called direclty - without creating an instance of the class first
//they are deifned as static function because we need to make the connection with databse at first witout considering about objects or instances of class
//rest of the function are defined as instance methods which refers to instance of class or specific object

//Defining Tutor class in order to get values from the database and save each raw as a instance of tutor class 
class Tutor {

	//Defining $database variable as a public and static variable 
	static public $database;
	
	//Defining set_database function to insert a value in to $database variable created in tutor class
	//By calling this function from somewhere else with $database parameter we can store $database(database connection) given as a parameter as static variable of this class Tutor  
	static public function set_database($database) {
			self::$database = $database;
		}

	//defining functions to call php query function on database variable by giving sql code we need to enter as a paramater and store the database recodrd returned as set of objects in object array.
	static public function find_by_sql($sql){
			
			//storing the results returned by calling sql code in $results variable
			$results = self::$database->query($sql);
				//checking whether query function has retuned any value to $results variable
				if(!$results) {
					
					//exiting the code since database query haventt returned any value
					exit("Database query failed. "); 
					}
				if($results) {
					//echo "Database query succeeded.";
					//this area can be use to perform any action if the database connection is succesfull
					}
			
			//creating object array to store records as objects		
			$object_array=[];

			//creating the results returned by query functions in to set of objects by storing each row as object 

			//getting a one row at a time from daatabase  by using fetch_assoc php function and storing it in record
			while($record = $results->fetch_assoc()) {   

				// adding objects created by using instantiate function defined in this class in to objects array
				$object_array[] = self::instantiate($record);  
				}	
			
			//removing previoulsy stored records in results variable after turning all the previoulsy stored records in to object array	
			$results->free();

			//returning $object array which contains each row of the table given as object or instace of this class
			return $object_array;		
			}

	//defining functions to get set of records from database by setting sql variable in to sql code which is required to obtain required sets of records from database table		
	static public function find_all() {

			//setting $sql variable in to sql code
			$sql = "SELECT * FROM tutors";

			//returning value returned by calling find_by_sql function defined in this class by giving $slq variables which is the sql code as parameter
			return self::find_by_sql($sql);
		} 
    
	//defining functions to get single record from database by setting sql variable in to sql code which is required to obtain required single record from database table
    static public function find_by_id($name) {

		//setting $sql variable in to sql code
		//calling php escape_string functions to escape any special characters in sql code in the name variable(string) since sql code doesnt support special characters
		$sql = "SELECT * FROM tutors WHERE name='" . self::$database->escape_string($name) . "'"; 
		$result = self::find_by_sql($sql);
		if(!empty($result)){
			//echo "not empty";
			return array_shift($result);
		} else {
			echo "empty";
		}
    } 
    

	//defining a function to store a record returned by fetch assoc function and storing it as a new instance or object of Tutor class 
	static protected function instantiate($record) {

			//creating new instance of tutor class and storing it as $object variable
			$object = new Tutor;

			//for each property or coloumn in record checking whether that property exits in new instance of tutor class and storing that value from record in to the value of each property of $object variable which is instace of tutor class
			foreach($record as $property => $value) {
				if(property_exists($object, $property)){
					 $object->$property=$value;
					}
				}
			
			// returing a object or new instance of class tutor created by using property value pairs taken by a single record 
			return $object;
		}

	//defining a function to change a record in database table given as a set of properties of a object or instance of class  
	//In update1.php file initialy create a specific object or instance of php class by using find by id function defined in this class and getting valus from database
	//after that specific objects olders value will be merged with new values given by user using merge attributes function defined in this class
	//after that new set of properties the specific object or instance of php class will be used as paramaters to following update function
	// following function update the record the of the database relevent to that specific object or instance of class with the new given set of properties
	public function update() {

		//adding sql code require to update the record with the new set of properties generated after merging
		$sql = "UPDATE tutors SET ";
			$sql .= "email='".self::$database->escape_string($this->email)."', ";
			$sql .= "co_number='".self::$database->escape_string($this->co_number)."', ";
			$sql .= "levels='".self::$database->escape_string($this->levels)."', ";
			$sql .= "subjects='".self::$database->escape_string($this->subjects)."', ";
			$sql .= "rate='".self::$database->escape_string($this->rate)."' ";
		$sql .= "WHERE name='". self::$database->escape_string($this->name) . " '";

			//creating results variable by giving it the values returned by calling php query function on database variable of this class by giving sql code as paramaters
			$results = self::$database->query($sql);

			//returning results varible created above 
			return $results;
				
		}


	//defining a function to add a record to database table with set of properties of a object or instance of class given
	//In add1.php file initialy create a specific object or instance of php class by using given set of properties by user 
	//after that new set of properties the specific object or instance of php class will be used as paramaters to following add function
	//following function will add the record to the database with the new given set of properties
	public function create() {				

		//adding sql code require to add a record with the new set of properties given
		$sql = "INSERT INTO tutors (name, email, co_number, levels, subjects, rate) VALUES ('$this->name', '$this->email', '$this->co_number', '$this->levels', '$this->subjects', '$this->rate')";

		//creating results variable by giving it the values returned by calling php query function on database variable of this class by giving sql code as paramaters
		$results = self::$database->query($sql);

		if($results) {
			//you can use this area to add any code to perform any actions if results variable have returned value;
			}

		//returning results varible created above 
		return $results;
	}

	//defining a function to delete a record to database table which is relevent to the given name property  
	//In delete1.php file initialy create a specific object or instance of php class(#deleted_tutor) by using find by id function defined in this class and getting valus from database for the selected record by user
	//after that given name property will be used as paramaters to following delete function
	// following function will delete the record the of the database relevent to that specific object or instance of class relevent to the given name property
	public function delete() {

		//adding sql code require to delete a record with the name property given
		//Limit 1 is used to delete only record relevant to given name property
		$sql = "DELETE FROM tutors WHERE name='" . $this->name . "' LIMIT 1"; 

		//creating results variable by giving it the values returned by calling php query function on database variable of this class by giving sql code as paramaters
		$results = self::$database->query($sql);


		if($results) {
			//you can use this area to add any code to perform any actions if results variable have returned value;
		}

		//returning results varible created above 
		return $results;			
	}

	//defining function to merge set of attributes given by user with the existing set of attributes of a specific object or instance of Tutor class
	public function merge_attributes($args=[]) {

		//for each $args in $args array checking whether that property($args) exist as a property in the instance of tutor class and storing that value($args) from array in to the value of each relevent property of the specfic object or instance of tutor class 
		foreach($args as $key=>$value) {
				if(property_exists($this, $key)) {
						$this->$key = $value;
					}
				}
			}

//defining variables of the tutor class			
public $name;
public $email;
public $co_number;
public $levels;
public $subjects;
public $rate;
}
?>