<?php

require 'Invoice.php';
require 'InvoiceLine.php';
require 'InvoicePrototype.php';

final class Program
{
    protected Invoice $invoice;
    private static Program $instance;

    /**
     * Singleton pattern
     */
    public static function getInstance(): self
    {
        if (! isset(self::$instance)) {
            self::$instance = new self;
        }

        return self::$instance;
    }

    /**
     * @param $invoice
     * Private for Singleton pattern
     */
    private function __construct()
    {
        $this->invoice = new Invoice();
    }

    //Singleton pattern
    private function __clone(){}

    public function CreateInvoiceWithOneItem(): InvoicePrototype
    {
        return new ApplePrototype();
    }

    public function CreateInvoiceWithMultipleItemsAndQuantities(): InvoicePrototype
    {
        $bananaInv = new BananaPrototype();
        $oraInv   = new OrangePrototype();
        $pinInv   = new PineapplePrototype();

        $bananaInv->mergeInvoice($oraInv);
        $bananaInv->mergeInvoice($pinInv);

        echo "<br><br/>Multiple Item Total ".$bananaInv->getInvoice()->GetTotal().PHP_EOL;

        return $bananaInv;
    }

    public function run(){
        echo "<html lang='en'><body>";
        echo "<br><br>STARTING TESTS";

        echo "<br><br>Creating Invoice With One Item";
        $OneProto = $this->CreateInvoiceWithOneItem();
        $OneProto->InvoiceToString();
        $OneProto->invSummary();

        echo "<br><br>Creating Invoice With Multiple Items";
       $MultiProto = $this->CreateInvoiceWithMultipleItemsAndQuantities();
       $MultiProto->InvoiceToString();
       $MultiProto->invSummary();



        echo "<br><br>Removing Invoice Line";
       $MultiProto->RemoveItem(0);
       $MultiProto->InvoiceToString();
       $MultiProto->invSummary();

        echo "<br><br>Merging Item Invoice With MultiItem Invoice";
        $MultiProto->mergeInvoice($OneProto);
        $MultiProto->InvoiceToString();
        $MultiProto->invSummary();

        echo "</body></html>";
    }

}