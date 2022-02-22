<?php
namespace Controllers;

use Models\Purchase as Purchase;
use Models\Ticket as Ticket;
use DAO\HelperDB as HelperDB;
use DAO\PurchaseDB as PurchaseDB;
use DAO\TicketDB as TicketDB;
use DAO\PxcDB as PxcDB;
use DAO\PxtDB as PxtDB;
use Models\Cinema as Cinema;
use Models\Room as Room;
use Models\Movie as Movie;

class PurchaseController{
    private $purchaseDB;
    private $helperDB;
    private $ticketDB;
    private $pxtDB;
    private $pxcDB;

        public function __construct()
        {
            $this->purchaseDB = new PurchaseDB();
            $this->helperDB = new HelperDB();
            $this->ticketDB = new TicketDB();
            $this->pxtDB = new PxtDB();
            $this->pxcDB = new PxcDB();
        }

        public function PurchaseTicket($id)
        {
            $movie = $this->helperDB->getMovieById($id);
            
            require_once(VIEWS_PATH."purchase-view.php");
        }

        public function BuyTickets($id)
        {
            $movie = $this->helperDB->getMovieById($id);
            $list=$this->helperDB->GetInfoByIdMovie($id);
           require_once(VIEWS_PATH."buyTicket-form.php");
        }

        public function Process($id_movie, $id_cinema,$id_room,$day,$time,$entranceValue,$ticketQuantity)
        {       
            $availabletickets=$this->helperDB->AvailableTicketsAmount($id_room,$day,$time);
            if($ticketQuantity <= $availabletickets){
            $cinema=$this->helperDB->GetCinemaById($id_cinema);
            $movie=$this->helperDB->GetMovieById($id_movie);
            $room=$this->helperDB->GetRoomByIdRoom($id_room);
            $purchase=$this->addPurchase ($entranceValue,$ticketQuantity);

            $purchase->setPurchaseId($this->purchaseDB->GetLastId());
            for($i=0;$i<$ticketQuantity;$i++)
            {
            $ticket=$this->addTicket ($cinema,$room,$day,$time,$movie);
            $ticket->setIdTicket($this->ticketDB->GetLastId());
            $this->pxtDB->addPXT($purchase->getPurchaseId(),$ticket->getIdTicket());
            }
            $this->pxcDB->addPXC($purchase->getPurchaseId(),$_SESSION['loggedUser']->getIdClient());

            $list=$this->helperDB->GetPurchaseByIdClient ($_SESSION['loggedUser']->getIdClient());
            require_once(VIEWS_PATH."client-purchases.php");
            }
            else{
                echo '<script language="javascript">';
            echo 'alert("No hay suficientes entradas disponibles, Cantidad de entradas disponibles : '.$availabletickets.'")';
            echo '</script>';
            $this->BuyTickets($id_movie);
            }

        }

        public function addPurchase ($entranceValue,$ticketQuantity)
        {
            $purchase = new Purchase();
            $purchase->setPurchaseDate(date("Y-m-d"));
            $purchase->setTicketQuantity($ticketQuantity);
            $purchase->setTotalPrice($entranceValue * $ticketQuantity);
            $purchase->setDiscount(null);

            $this->purchaseDB->addPurchase($purchase);
            return $purchase;
        }

        public function addTicket ($cinema,$room,$day,$time,$movie)
        {
            $ticket = new Ticket();
            $ticket->setCinema($cinema);
            $ticket->setRoom($room);
            $ticket->setDay($day);
            $ticket->setTime($time);
            $ticket->setMovie($movie);
    

            $this->ticketDB->addTicket($ticket);
            return $ticket;
        }
        public function ShowPurchases ()
        {
            $list=$this->helperDB->GetPurchaseByIdClient ($_SESSION['loggedUser']->getIdClient());
            require_once(VIEWS_PATH."client-purchases.php");
        }


    }
    
?>