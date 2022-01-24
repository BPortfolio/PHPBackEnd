<?php

class InvoiceLine {
    public $InvoiceLineId;
    public $Description;
    public $Quantity;
    public $Cost;

    /**
     * @return mixed
     */
    public function getInvoiceLineId()
    {
        return $this->InvoiceLineId;
    }

    /**
     * @param mixed $InvoiceLineId
     */
    public function setInvoiceLineId($InvoiceLineId): void
    {
        $this->InvoiceLineId = $InvoiceLineId;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->Description;
    }

    /**
     * @param mixed $Description
     */
    public function setDescription($Description): void
    {
        $this->Description = $Description;
    }

    /**
     * @return mixed
     */
    public function getQuantity()
    {
        return $this->Quantity;
    }

    /**
     * @param mixed $Quantity
     */
    public function setQuantity($Quantity): void
    {
        $this->Quantity = $Quantity;
    }

    /**
     * @return mixed
     */
    public function getCost()
    {
        return $this->Cost;
    }

    /**
     * @param mixed $Cost
     */
    public function setCost($Cost): void
    {
        $this->Cost = $Cost;
    }

}
