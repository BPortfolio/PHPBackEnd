<?php

//command to run php unit Tests
//
//php vendor/bin/phpunit InvAssertionTest.php

//Helpful command to install phpunit
//Composer ignore-platform-reqs update

require 'Program.php';


class InvAssertionTest extends \PHPUnit\Framework\TestCase
{

    public function testOneItemPrice(){
        $OneProto   = Program::getInstance()->CreateInvoiceWithOneItem();

        $tot        = $OneProto->getInvoice()->GetTotal();


        $this->assertSame(6.99, $tot);
    }

    public function testOneItemLen(){
        $OneProto   = Program::getInstance()->CreateInvoiceWithOneItem();

        $invLinNum  = count($OneProto->getInvoice()->getLineItems());


        $this->assertSame(1, $invLinNum);
    }

    public function testMultiItemLen(){
        $multiProto =  Program::getInstance()->CreateInvoiceWithMultipleItemsAndQuantities();

        $invLen     = count($multiProto->getInvoice()->getLineItems());


        $this->assertSame(3, $invLen);
    }

    public function testMultiItemTotal(){
        $multiProto     =  Program::getInstance()->CreateInvoiceWithMultipleItemsAndQuantities();

        $tot            = $multiProto->getInvoice()->GetTotal();

        $this->assertSame(72.1, $tot);
    }

    public function testMergeInvoice(){
        $multiProto     =  Program::getInstance()->CreateInvoiceWithMultipleItemsAndQuantities();
        $oneProto       =  Program::getInstance()->CreateInvoiceWithOneItem();

        $multiProto->mergeInvoice($oneProto);
        $invLen = count($multiProto->getInvoice()->getLineItems());
        $this->assertSame(4, $invLen);
    }

    public function testClone(){
        $oneProto       = Program::getInstance()->CreateInvoiceWithOneItem();

        $copy           = clone $oneProto;

        $tot            = $copy->getInvoice()->GetTotal();
        $this->assertSame(6.99, $tot);
    }

    public function testRemoveItem(){

        $multiProto = Program::getInstance()->CreateInvoiceWithMultipleItemsAndQuantities();

        $multiProto->getInvoice()->RemoveLine(0);
        $invLen     = count($multiProto->getInvoice()->getLineItems());
        $this->assertSame(2, $invLen);
    }

}