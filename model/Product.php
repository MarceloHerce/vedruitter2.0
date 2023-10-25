<?php 

class Product {
    protected $productName;
    protected $unitPrice;
    protected $unitsInStock;

    public function __construct($productName, $unitPrice, $unitsInStock) {
        $this->productName = $productName;
        $this->unitPrice = $unitPrice;
        $this->unitsInStock = $unitsInStock;
    }

    public function __get($atributo) {
        return $this->$atributo;
    }
}

?>