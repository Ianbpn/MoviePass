<?php
    namespace Controllers;

    use DAO\HelperDB as HelperDB;
    use DAO\CinemaDB as CinemaDB;
    use Models\Cinema as Cinema;
    use Models\Room as Room;

    class CinemaController
    {
        private $cinemaDB;
        private $helperDB;
        public function __construct()
        {
            $this->cinemaDB = new CinemaDB();
            $this->helperDB = new HelperDB();
        }

        public function ShowAddView()
        {
            require_once(VIEWS_PATH."cinema-add.php");
        }

        public function ShowListView()
        {
            $cinemaList = $this->helperDB->getCinemaAll();
            require_once(VIEWS_PATH."cinema-list.php");
        }

        public function AddCinema($name, $address, $entrance_value)
        {
            
            $cinema = new Cinema();
            $cinema->setName($name);
            $cinema->setAddress($address);
            $cinema->setEntrance_value($entrance_value);
           // $cinema->roomList = array();

            $this->cinemaDB->addCinema($cinema);

            $this->ShowListView();
        }

        public function Delete ($id){
            $this->cinemaDB->Delete($id);
            $this->ShowListView();
        }

        public function Update($id)
        {
            $cinema = $this->cinemaDB->GetById($id);
            require_once(VIEWS_PATH."cinema-update.php");
            
        }
        public function Modify($id,$name, $address, $entrance_value)
        {
            $cinema = new Cinema();
            $cinema->setId($id);
            $cinema->setName($name);
            $cinema->setAddress($address);
            $cinema->setEntrance_value($entrance_value);

            $this->cinemaDB->Update($cinema);

            $this->ShowListView();
        }
    }
?>