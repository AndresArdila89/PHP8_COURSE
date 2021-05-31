<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$BR = "<br>";
echo "working....";
/**
 * ----------- OBJECTS BASICS -------------
 * 
 *  A class is a code template to generate one or more objects
 * This is a legal class and at this point we can say that
 * this is a type or a category of data.
 * 
 * 
 */
class ShopProduct
{
    // Defining or declaring the properties of a class
    // public $title;
    // public $producerMainName;
    // public $producerFirstName;
    // public $price;

    private int|float $discount = 0;

    // defining the class constructor
    // using constructor property promotion
    public function __construct(
        private string $title,
        private string $producerMainName,
        private string $producerFirstName,
        protected int|float $price
    )
    {
        /**
         * In PHP 8 by including a visivility keyword
         * for the constructor arguments, you can combine them with 
         * property declaration and assign a value to them at the same
         * time.
         */
        // $this->title = $title;
        // $this->producerMainName = $producerMainName;
        // $this->producerFirstName = $producerFirstName;
        // $this->price = $price;
    }

    // Defining the methods
    // :string defines the type the function must return
    public function getProducerFirstName():string
    {
        return $this->getProducerFirstName;
    }

    public function getProducerLastName():string
    {
        return $this->producerMainName;
    }

    public function setDiscount(int|float $discount):void
    {
        $this->discount = $discount;
    }
    
    // Using union type forcing the funtion to return int or float
    public function getDiscount():int|float
    {
        return $this->discount;
    }

    public function getTitle():string
    {
        return $this->title;
    }
    // Using union type forcing the funtion to return int or float
    public function getPrice():int|float
    {
        return ($this->price - $this->discount);
    }

    public function getProducer(): string
    {
        return $this->producerMainName . " " . $this->producerFirstName;
    }

    public function getSummaryLine(): string
    {
        $base = "{$this->title} ({$this->producerMainName}, ";
        $base .= "{$this->producerFirstName})";
        return $base;
    }
}

class BookProduct extends ShopProduct
{
    

    public function __construct(
        string $title,
        string $producerMainName,
        string $producerFirstName,
        float $price,
        private int $numPages
    )
    {
        // calling the parent constructor using the parent:: keyword
        parent::__construct(
            $title,
            $producerMainName,
            $producerFirstName,
            $price
        );
        /**
         *  This property belongs to the child 
         *  a parent should not have access to a child information
         * 
         *  $this->numPages = $numPages;
         */ 
    }

    // Defining the methods 

    public function getNumberOfPages(): int 
    {
        return $this->numPages;
    }

    public function getSummaryLine(): string
    {
        $base = parent::getSummaryLine();
        $base .= ": Page count - {$this->numPages}";

        return $base;
    }

    public function getPrice():int|float
    {
        return $this->price;
    }
}

class CdProduct extends ShopProduct
{
    // Defining the property of the child
    // public $playLenght;
    /**
     * There is no need to declare the $playLenght property
     * since we are using the constructor property promotion
     */

    public function __construct(
        string $title,
        string $firstName,
        string $lastName,
        int $price,
        private string $playLenght // <-- Constructor property promotion 
    )
    {
        // calling the parent ShopProduct class constructor
        parent::__construct(
            $title,
            $firstName,
            $lastName,
            $price
        );

        // This is the child CdProduct property
        // $this->playLenght = $playLenght;
        /**
         * There is no need to assign a value to the property 
         * Since we are using the constructo property promotion
         */

    }

    // Define the methods 

    public function getPlayLenght(): string
    {
        return $this->playLenght;
    }

    public function getSummaryLine(): string
    {
        $base = parent::getSummaryLine();
        $base .= ": Playing time - {$this->playLenght}";
    }
}


class ShopProductWriter
{
    private $products = [];

    public function addProduct(ShopProduct $shopProduct):void
    {
        $this->products[] = $shopProduct;
    }

    public function write():void
    {
        $str = "";
        foreach($this->products as $shopProduct)
        {
            $str .= "{$shopProduct->getTitle()}: ";
            $str .= $shopProduct->getProducer();
            $str .= " ({$shopProduct->getPrice()})\n";
        }
        
        print $str; 
    }
}

//----------------------- testing area ------------------------------


/**
 * An object is said to be an instance of its class
 * 
 * The NEW operator is used with the name of the class to 
 * return an instance of the object
 * 
 * 
 */

 //$product1 = new ShopProduct("The new Title","Andres","Ardila",99.99);

// $product2 = new ShopProduct();
 
// Access the object properties with the arrow -> operator
// print $product1->title;

// Set a value of a property
// $product2->title = "The Sky";


//  print $product1->getProducer();
//  print $BR;
//  print $product1->getSummaryLine();

 // $product2 is a child of the class ShopProduct
 $product2 = new BookProduct(
                                "PHP 8 Objects , Patterns, and Practice",
                                "Matt",
                                "Zandstra",
                                59.99,
                                883
                            );

 $list = new ShopProductWriter();
 $list->addProduct($product2);

 $list->write();

 echo '<pre>';
 var_dump($product2);
 echo '</pre>';



