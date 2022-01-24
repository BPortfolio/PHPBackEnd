<?php

abstract class InvoicePrototype
{
    protected Invoice $invoice;

    /**
     * @return Invoice
     */
    public function getInvoice(): Invoice
    {
        return $this->invoice;
    }

    abstract function __clone();

    // <summary>
    // MergeInvoices appends the items from the sourceInvoice to the current invoice
    // </summary>
    // <param name="sourceInvoice">Invoice to merge from</param>
    public function mergeInvoice(InvoicePrototype  $proto){

        $append = $proto->getInvoice();
        $LineItems = $append->getLineItems();

        foreach($LineItems as $item){
            $this->invoice->AddInvoiceLine($item);
        }
    }

    // <summary>
    // Renamed from _ToString to invSummary
    // Outputs string containing the following (replace [] with actual values):
    // Invoice Number: [InvoiceNumber], InvoiceDate: [dd/MM/yyyy], LineItemCount: [Number of items in LineItems]
    // </summary>
    public function invSummary() {
        $numItems   = count($this->getInvoice()->getLineItems());
        $invNum     = $this->getInvoice()->getInvoiceNumber();
        $invDate    = $this->getInvoice()->getInvoiceDate();
        $invDate    = $invDate->format('d-m-y');

        echo "<br/><br/>Invoice Number: $invNum, InvoiceDate: $invDate, LineItemCount: $numItems";
    }

    public function InvoiceToString(): string
    {
        $this->invoice->setInvoiceDate(new DateTime());
        $this->invoice->setInvoiceNumber(1000);

        $temp = serialize($this->invoice);
        echo "<br/>".$temp.PHP_EOL;
        return $temp;
    }

    public  function RemoveItem($arrPos) {
        $this->invoice->RemoveLine($arrPos);
        echo "<br><br/>Total After Removing Item ".$this->invoice->GetTotal().PHP_EOL;
    }

}

class ApplePrototype extends InvoicePrototype {
    function __construct() {
        $this->invoice = new Invoice();
        $invoiceLine = new InvoiceLine();
        $invoiceLine->setInvoiceLineId(1);
        $invoiceLine->setCost(6.99);
        $invoiceLine->setQuantity(1);
        $invoiceLine->setDescription('Apple');
        $this->invoice->AddInvoiceLine($invoiceLine);

        echo "<br><br/>Item Total ".$this->invoice->GetTotal().PHP_EOL;
    }
    function __clone() {
    }
}

class BananaPrototype extends InvoicePrototype {
    function __construct() {
        $this->invoice = new Invoice();
        $invoiceLine = new InvoiceLine();
        $invoiceLine->InvoiceLineId = 1;
        $invoiceLine->Cost = '10.21';
        $invoiceLine->Quantity = 4;
        $invoiceLine->Description = 'Banana';
        $this->invoice->AddInvoiceLine($invoiceLine);

        echo "<br><br/>Item Total ".$this->invoice->GetTotal().PHP_EOL;
    }
    function __clone() {
    }
}

class OrangePrototype extends InvoicePrototype {
    function __construct() {
        $this->invoice = new Invoice();
        $invoiceLine = new InvoiceLine();
        $invoiceLine->InvoiceLineId = 2;
        $invoiceLine->Cost = 5.21;
        $invoiceLine->Quantity = 1;
        $invoiceLine->Description = 'Orange';
        $this->invoice->AddInvoiceLine($invoiceLine);

        echo "<br><br/>Item Total ".$this->invoice->GetTotal().PHP_EOL;
    }
    function __clone() {
    }
}

class PineapplePrototype extends InvoicePrototype {
    function __construct() {
        $this->invoice = new Invoice();
        $invoiceLine = new InvoiceLine();
        $invoiceLine->InvoiceLineId = 3;
        $invoiceLine->Cost = 5.21;
        $invoiceLine->Quantity = 5;
        $invoiceLine->Description = 'Pineapple';
        $this->invoice->AddInvoiceLine($invoiceLine);

        echo "<br><br/>Item Total ".$this->invoice->GetTotal().PHP_EOL;
    }
    function __clone() {
    }
}