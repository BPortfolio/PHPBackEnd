<?php

class Invoice
{
    public $InvoiceNumber;
    public $InvoiceDate;
    private array $LineItems;

    /**
     * @return array
     */
    public function getLineItems(): array
    {
        return $this->LineItems;
    }

    /**
     * @return mixed
     */
    public function getInvoiceNumber()
    {
        return $this->InvoiceNumber;
    }

    /**
     * @param mixed $InvoiceNumber
     */
    public function setInvoiceNumber($InvoiceNumber): void
    {
        $this->InvoiceNumber = $InvoiceNumber;
    }

    /**
     * @return mixed
     */
    public function getInvoiceDate()
    {
        return $this->InvoiceDate;
    }

    /**
     * @param mixed $InvoiceDate
     */
    public function setInvoiceDate($InvoiceDate): void
    {
        $this->InvoiceDate = $InvoiceDate;
    }

    /**
     * @param array $LineItems
     */
    public function __construct()
    {
        $this->LineItems = array();
    }


    public function AddInvoiceLine($invoiceLine) {
        array_push($this->LineItems, $invoiceLine);
    }

    public function RemoveLine($arrPos) {
        unset($this->LineItems[$arrPos]);
    }

    // <summary>
    // GetTotal should return the sum of (Cost * Quantity) for each line item
    // </summary>
    public function GetTotal()
    {
        $gTot = 0;
        foreach($this->LineItems as $item){
           $totCost = $item->getCost() * $item->getQuantity();
            $gTot += $totCost;
        }


        return $gTot;
    }
}