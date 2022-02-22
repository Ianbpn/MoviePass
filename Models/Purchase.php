<?php
namespace Models;
class Purchase{
    private $purchaseId;
    private $purchaseDate;
    private $ticketQuantity;
    private $totalPrice;
    private $discount;

    public function getPurchaseId(){
		return $this->purchaseId;
	}

	public function setPurchaseId($purchaseId){
		$this->purchaseId = $purchaseId;
	}
    public function getPurchaseDate()
    {
        return $this->purchaseDate;
    }
    public function setPurchaseDate($purchaseDate)
    {
        $this->purchaseDate = $purchaseDate;

        return $this;
    }

    public function getTicketQuantity()
    {
        return $this->ticketQuantity;
    }
    public function setTicketQuantity($ticketQuantity)
    {
        $this->ticketQuantity = $ticketQuantity;

        return $this;
    }

    public function getTotalPrice()
    {
        return $this->totalPrice;
    }
    public function setTotalPrice($totalPrice)
    {
        $this->totalPrice = $totalPrice;

        return $this;
    }

    public function getDiscount()
    {
        return $this->discount;
    }
    public function setDiscount($discount)
    {
        $this->discount = $discount;

        return $this;
    }
}
?>