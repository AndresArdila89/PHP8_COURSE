<?php
$BR = "<br>";
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
    public $title;
    public $producerMainName;
    public $producerFirstName;
    public $price;

    // defining the class constructor
    public function __construct(
        $title,
        $producerMainName,
        $producerFirstName,
        $price
    )
    {
        $this->title = $title;
        $this->producerMainName = $producerMainName;
        $this->producerFirstName = $producerFirstName;
        $this->price = $price;
    }

    // Defining the methods
    // :string defines the type the function must return
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
    public $numPages;

    public function __construct(
        string $title,
        string $producerMainName,
        string $producerFirstName,
        float $price,
        int $numPages
    )
    {
        // calling the parent constructor using the parent:: 
        parent::__construct(
            $title,
            $producerMainName,
            $producerFirstName,
            $price
        );
        /**
         *  This property belongs to the child 
         *  a parent should not have access to a child information
         */ 

        $this->numPages = $numPages;

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
}

class CdProduct extends ShopProduct
{
    // Defining the property of the child
    public $playLenght;

    public function __construct(
        string $title,
        string $firstName,
        string $lastName,
        int $price,
        string $playLenght
    )
    {
        // calling the parent ShopProduct class constructor
        parent::__construct(
            $title,
            $firstName,
            $lastName,
            $price,
            $playLenght
        );

        // This is the child CdProduct property
        $this->playLenght = $playLenght;

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

//----------------------- testing area ------------------------------


/**
 * An object is said to be an instance of its class
 * 
 * The NEW operator is used with the name of the class to 
 * return an instance of the object
 * 
 * 
 */

 $product1 = new ShopProduct("The new Title","Andres","Ardila",99.99);

// $product2 = new ShopProduct();
 
// Access the object properties with the arrow -> operator
// print $product1->title;

// Set a value of a property
// $product2->title = "The Sky";


 print $product1->getProducer();
 print $BR;
 print $product1->getSummaryLine();

 // $product2 is a child of the class ShopProduct
 $product2 = new BookProduct(
                                "PHP 8 Objects , Patterns, and Practice",
                                "Matt",
                                "Zandstra",
                                59.99,
                                883
                            );


 echo '<pre>';
 var_dump($product1);
 var_dump($product2);
 echo '</pre>';

