<?php
    //Defining property class as a abstract class as given in the the scenerio 
    abstract class property {
        public $id;
        public $postcode;
        public $total_area;
        public $asking_price;
        public $reserved_price;
        public $offer_price;
        public $selling_price;
        public $stamp_duty;
        public $offers = array ();
        public $seller;
        private $selling_state;


        //Defining function set asking price of the object or property to selling as given in the scenerio 
        public function setting_selling_price_asking_price(){
            $this->selling_price = $this->asking_price;

            //this function returns the selling price of the object after setting the asking price as selling price
            return $this->selling_price; 
        }

        //Defining a function to calculate the stampy duty for property which is common for all property types of properties
        public function calculate_stamp_duty(){
            $stamp_duty=$this->selling_price*0.05;

            //this function returns the stamp duty for the property according to the selling price of the property
            return $stamp_duty; 
        }

        //Defining a function to calculate total price buyer will have to pay in order to buy a property. 
        //In following function it has assumed that total price is calculated only by adding stmap duty to selling price and agents commision is a cutoff from selling price
        public function calculate_Total_price_paid(){

            $stamp_duty=$this->calculate_stamp_duty();
            
            // if total price is calculated after adding both stamp duty and seller commision to the selling price. Just remove comments from below  two lines

            //$agents_profit = $this->calculate_agents_Profit();
            //$total_price =  $this->selling_price + $stamp_duty + $agents_profit;

            // and make below line a comment if selling price is calculated only by adding only stamp duty  just keep the below line and remove this whole comment 
            $total_price =  $this->selling_price + $stamp_duty;

            //this function returns the total price buyer will have to pay
            return $total_price; 
        }

        //Defining a abstract function to calculate agents profit because it depends according to the type of property and this function is clearly defined in the subclasses according to the commision rates
        abstract public function calculate_agents_Profit();

        //Defining a function to call all the above defined function for a object or instance of this class.
        public function sold_in_asking_price(){
            $this->setting_selling_price_asking_price();
            $stamp_duty = $this->calculate_stamp_duty();
            $total_price = $this->calculate_Total_price_paid();
            $agents_profit = $this->calculate_agents_Profit();

            //this function returns the the complete message after calling all above defined methods for one object
            return "Property ID :" . $this->id . "<br>Asking Price is £" . $this->asking_price . "<br> Buyer will have to pay stamp duty of £" . $stamp_duty . "<br>
                    "."Total price that buyer will have to pay is £".$total_price." <br> 
                    Agent will receive a profit of £".$agents_profit."<br><br>"; 
        }


        //Defining a function to insert data in to offers associative array of this class for each instance this class using array push method
        function add_new_offer($offer_one,$offer_two,$offer_three){
            array_push($this->offers,$offer_one,$offer_two,$offer_three);

            //this function returns offers associative array after inserting given details to array
            return $this->offers; 
        }

        //Defining a function to read the values of the $offers associative array for each object
        function show_offers(){ 

            //this function shows a complete message with all offers made for a object so far
            echo "For the property ".$this->id." the following offers are made.<br>".$this->offers[0]."<br>".$this->offers[1].
                  "<br>".$this->offers[2]."<br><br>";      
        } 

        //defining a function to decide the selling state of a object according to offer price of the object 
        public function decide_selling_state()
        { 
            if ($this->offer_price < $this->reserved_price) {
                $this->selling_state = "remain unsold" ;
            } else {
                $this->selling_state = "be sold" ;
            }

            //this function returns the selling state of a object whether it will be sold or remain unsold
            return "This property will ".$this->selling_state."<br>"; 
        }

        //defining function to add values to protected variable selling state of each property
        public function set_selling_state($selling_state){
            $this->selling_state = $selling_state ;
        }

        //defing function to read the selling state variable of the each property
        public function show_selling_state(){

            //this function returns the selling state of the object
            return "Seliing state of this property: This property will ".$this->selling_state."";  
        }

        //defining contruct method function to create new instance or objects of the property by caling the function with properties of the new property and setting them as properties of the new object using construct method
        public function __construct ( $id, $postcode, $total_area, $asking_price, $reserved_price, $offer_price, $selling_price, $stamp_duty, $seller){
            $this->id = $id;
            $this->postcode = $postcode;
            $this->total_area = $total_area;
            $this->asking_price = $asking_price;
            $this->reserved_price = $reserved_price;
            $this->offer_price = $offer_price;
            $this->selling_price = $selling_price;
            $this->stamp_duty = $stamp_duty;
            $this->seller = $seller;

        }
    }


    //defining commercial property subclasss which extends properties sub class
    class commercial_property extends property {
        public $type_of_shop;
        public $shop_commission;

        //defining constrcut method function to create new instaces of commercial property subclass which calls the construct method of parent class and add other unique properties for the property by itslef 
        public function __construct( $id, $postcode, $total_area, $asking_price, $reserved_price, $offer_price, $selling_price, $stamp_duty, $seller, $type_of_shop) {
            
            parent :: __construct( $id, $postcode, $total_area, $asking_price, $reserved_price, $offer_price, $selling_price, $stamp_duty, $seller);
            $this->type_of_shop = $type_of_shop;
        } 

        //defining function to calculate agents profit for selling commericial property which defines calculate agents property abstract function from parent class
        public function calculate_agents_Profit(){
            $commission_percentage = 0.09;
            $this->shop_commission = $this->selling_price * $commission_percentage;
            $agents_profit = $this->shop_commission;

            //this function returns the agents profit for selling shop property
            return $agents_profit; 
        }

        
    }

    //Defining residential property abstract class which extends property abstract class
    abstract class residential_property extends property {
        public $no_of_bedrooms;
        public $year_of_construction;

    }
    
    //Defining flat property subclass which extends residential property abstract class which is exteded from  property abstract class
    class flat extends residential_property {
        public $lease;
        public $flat_commission;

        //defining constrcut method function to create new instaces of flat property subclass which calls the construct method of parent class and add other unique properties for the property by itslef 
        public function __construct( $id, $postcode, $total_area, $asking_price, $reserved_price, $offer_price, $selling_price, $stamp_duty, $seller, $no_of_bedrooms, $year_of_construction, $lease) {
            
            parent :: __construct( $id, $postcode, $total_area, $asking_price, $reserved_price, $offer_price, $selling_price, $stamp_duty, $seller);
            $this->no_of_bedrooms = $no_of_bedrooms;
            $this->year_of_construction = $year_of_construction;
            $this->lease = $lease;
        } 

        //defining function to calculate agents profit for selling flat property which defines calculate agents property abstract function from parent class
        function calculate_agents_Profit(){
            $commission_percentage = 0.05;
            $this->flat_commission = $this->selling_price * $commission_percentage;
            $agents_profit = $this->flat_commission;
            return $agents_profit; //this function returns the agents profit for selling flat property
        }
    }

    //Defining house property subclass which extends residential property abstract class which is exteded from  property abstract class
    class house extends residential_property {
        public $house_commission;

        //defining constrcut method function to create new instaces of house property subclass which calls the construct method of parent class and add other unique properties for the property by itslef 
        public function __construct( $id, $postcode, $total_area, $asking_price, $reserved_price, $offer_price, $selling_price, $stamp_duty, $seller, $no_of_bedrooms, $year_of_construction) {
            
            parent :: __construct( $id, $postcode, $total_area, $asking_price, $reserved_price, $offer_price, $selling_price, $stamp_duty, $seller);
            $this->no_of_bedrooms = $no_of_bedrooms;
            $this->year_of_construction = $year_of_construction;
        }

        //defining function to calculate agents profit for selling house property which defines calculate agents property abstract function from parent class
        function calculate_agents_Profit(){
            $commission_percentage = 0.07;
            $this->house_commission = $this->selling_price * $commission_percentage;
            $agents_profit = $this->house_commission;

            //this function returns the agents profit for selling house property
            return $agents_profit;  
        }
    }    

    //inserting data for the five instances given in the question by calling the construct functions of relevant subclasses
    $restaurent = new commercial_property("1", "NW1", "100 square meters", "900", "810", "000", "000", "000", "Kate","restarent");
    $two_bed_flat = new flat("2", "NW3", "80 sqm", "800", "720", "000", "000", "000", "John", "2","1995","99 year lease", "5");
    $studio = new commercial_property("3", "NW4", "35 sqm", "300", "270", "000", "000", "000", "Ann","studio");
    $five_bed_house = new house("4", "NW3", "200 sqm", "2000", "1800", "000", "000", "000", "Peter","5", "2019");
    $one_bed_flat = new flat("5", "NW1", "55 sqm", "550", "495", "000", "000", "000", "Dave","1","2007","78 year lease");

    //calling all the functions created for each object by caling sold_in_asking_price function which calls all other methods for each object
    echo $restaurent->sold_in_asking_price()."<br>" ;
    echo $two_bed_flat->sold_in_asking_price()."<br>" ;
    echo $studio->sold_in_asking_price()."<br>" ;
    echo $five_bed_house->sold_in_asking_price()."<br>" ;
    echo $one_bed_flat->sold_in_asking_price()."<br>" ;

    //Calling add new offer function to restaurent property to add details of new offers for the restarent property and one_bed_flat
    $restaurent->add_new_offer("25 January 2021 →  £840.000 by Jack","31 January 2021 →  £750.000 by Jane","01 February 2021 →  £880.000 by Mary");
    $one_bed_flat->add_new_offer("20 January 2021 →  £260.000 by Peter","27 January 2021 →  £265.000 by Helen","15 February 2021 →  £250.000 by Catherine");

    //Calling show offers function to restarent and one bed flat properties to display the offers made for each object
    $restaurent->show_offers();
    $one_bed_flat->show_offers();

    //Calling decide_selling_state function on resternt object to check seling state according to the offer price and reserve price of the object
    echo $restaurent->decide_selling_state();
    //Calling decide_selling_state function on one bed flat object to check seling state according to the offer price and reserve price of the object
    echo $one_bed_flat->decide_selling_state();

    //Calling set_selling_state function to set selling state of resterent object to "be sold"
    $restaurent->set_selling_state(" be sold");

    //Calling show_selling_state function to display the selling state value of the restarent instance of property class.
    echo $restaurent->show_selling_state();

?>