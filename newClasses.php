<?php



abstract class mainProduct {

    protected $sku ; 
    protected $name ; 
    protected $price ;  
    protected $details ; 


    
    public function SetCommonValues($array)
    {

        $this-> sku = $array['sku'] ;
        $this-> name = $array['name'] ;
        $this-> price = $array['price'] ;
       
    }

    public function GetCommonValues()
    {
        $returnd_properties = array() ;

         $returnd_properties['sku']= $this-> sku;
         $returnd_properties['name']= $this-> name;
          $returnd_properties['price']=$this-> price ;
      
          return $returnd_properties; 
    }
   abstract public function GetSpecialValues();
   
}


      class Dvd extends mainProduct {

        

        
        function __construct($received_values) {

            $this->SetCommonValues($received_values);
            $this-> details = $received_values['details'] ;
          }
        public function GetSpecialValues()
        {
           
            $dvd_values = $this->GetCommonValues();
            $dvd_values['details'] =$this-> details; 
           
          return $dvd_values;
        }
      
       

    }

    class Furniture extends mainProduct {

        

        function __construct($received_values) {

            $this->SetCommonValues($received_values);
            $this-> details = $received_values['details'] ;
          }

          public function GetSpecialValues()
        {
           
            $Furniture_values = $this->GetCommonValues();
            $Furniture_values['details'] =$this-> details; 
            
           
          return $Furniture_values;
        }

          
    }


    class Book extends mainProduct {

       

        function __construct($received_values) {

            $this->SetCommonValues($received_values);
            $this-> details = $received_values['details'] ;
           
          }

          public function GetSpecialValues()
        {
           
            $Book_values = $this->GetCommonValues();
            $Book_values['details'] =$this-> details; 
           
          return $Book_values;
        }

    }


    ?>
