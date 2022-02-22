<?php
    namespace DAO;
    
    use Models\Client as Client;
    use Models\Client_Profile as Profile;
    use Models\Client_Role as Role;
    use Models\Cinema as Cinema;
    use Models\Room as Room;
    use Models\Cinema_Function as CinemaFunction;
    use Models\Movie as Movie;
    use Models\Movie_Genre as Genre;
    use Models\Purchase as Purchase;
    use Models\Ticket as Ticket;
    use Models\Yt_path as Yt_path;
    use Models\Schedule as Schedule;
    

class HelperDB{
    private $connection;

    //Getters

    function GetClientById($id){
        try
            {
                $client=null;

                $tableName = "clients";

                $query = "SELECT * FROM  $tableName  WHERE id_client = '$id'";

                $this->connection = Connection::GetInstance();

                $resultSet = $this->connection->Execute($query);

                foreach ($resultSet as $row)
                {                
                $client = new Client();
                $client->setIdClient($row["id_client"]);
                $client->setProfile($this->GetProfileByIdProfile($row["id_profile"]));
                $client->setRole($this->GetRole($row["id_role"]));
                $client->setUserName($row["username"]);
                $client->setPassword($row["passw"]);
                }
            return $client;

            }
            catch(Exception $ex)
            {
                throw $ex;
            }
    }
    function GetClientByUsername($username){
        try
            {
                $client=null;

                $tableName = "clients";

                $query = "SELECT * FROM $tableName WHERE username = '$username'";

                $this->connection = Connection::GetInstance();

                $resultSet = $this->connection->Execute($query);

                foreach ($resultSet as $row)
                {                
                $client = new Client();
                $client->setIdClient($row["id_client"]);
                $client->setProfile($this->GetProfileByIdProfile($row["id_profile"]));
                $client->setRole($this->GetRole($row["id_role"]));
                $client->setUserName($row["username"]);
                $client->setPassword($row["passw"]);
                }
            return $client;

            }
            catch(Exception $ex)
            {
                throw $ex;
            }
    }

    function GetProfileByIdProfile($id){
        try
        {
            $client_profile=null;
            $tableName = "profiles";

            $query = "SELECT * FROM $tableName WHERE id_profile = '$id'";

            $this->connection = Connection::GetInstance();

            $resultSet = $this->connection->Execute($query);
            foreach ($resultSet as $row)
            {                
            $client_profile = new Profile();
            $client_profile->setIdProfile($row["id_profile"]);
            $client_profile->setDni($row["dni"]);
            $client_profile->setFirstname($row["firstname"]);
            $client_profile->setSurname($row["surname"]);
            }
        return $client_profile;

        }
        catch(Exception $ex)
        {
            throw $ex;
        }
    }

    function GetProfileByIdClient($id){
        try
        {
            $client_profile = null;
            $tableName = "profiles";

            $query = "SELECT * FROM $tableName WHERE id_client = '$id'";

            $this->connection = Connection::GetInstance();

            $resultSet = $this->connection->Execute($query);
            foreach ($resultSet as $row)
            {                
            $client_profile = new Profile();
            $client_profile->setIdProfile($row["id_profile"]);
            $client_profile->setDni($row["dni"]);
            $client_profile->setFirstname($row["firstname"]);
            $client_profile->setSurname($row["surname"]);
            }
        return $client_profile;

        }
        catch(Exception $ex)
        {
            throw $ex;
        }
    }

     function GetRole($id){
        try
        {
            $client_role =null;
            $tableName = "roles";
    
            $query = "SELECT * FROM $tableName WHERE id_role = '$id'";
    
            $this->connection = Connection::GetInstance();
    
            $resultSet = $this->connection->Execute($query);
            foreach ($resultSet as $row)
            {                
                $client_role = new Role();
                $client_role->setIdRole($row["id_role"]);
                $client_role->setDescription($row["description"]);
            }
            
            return $client_role;
    
        }
        catch(Exception $ex)
        {
            throw $ex;
        }
     }

     public function getCinemaAll()
        {
            try
            {
                $cinemaList = array();

                $tableName = "cinemas";

                $query = "SELECT * FROM $tableName";

                $this->connection = Connection::GetInstance();

                $resultSet = $this->connection->Execute($query);
                
                foreach ($resultSet as $row)
                {                
                    $cinema = $this->GetCinemaById($row["id_cinema"]);

                    array_push($cinemaList, $cinema);
                }

                return $cinemaList;
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

     function GetCinemaById($id){
        try
            {
                $cinema=null;

                $tableName = "cinemas";

                $query = "SELECT * FROM $tableName WHERE id_cinema = '$id'";

                $this->connection = Connection::GetInstance();

                $resultSet = $this->connection->Execute($query);

                foreach ($resultSet as $row)
                {                
                    $cinema = new Cinema();
                    $cinema->setId($row["id_cinema"]);
                    $cinema->setName($row["cinema_name"]);
                    $cinema->setAddress($row["address"]);
                    $cinema->setEntrance_value($row["entrance_value"]);
                    $cinema->setRoomList($this->GetRoomByIdCinema($row["id_cinema"]));
                    
                }
                return $cinema;


            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }
    
    function GetRoomByIdCinema($id){
        try
            {
                $roomList=array();

                $tableName = "rooms";

                $query = "SELECT * FROM $tableName WHERE id_cinema = '$id'";

                $this->connection = Connection::GetInstance();

                $resultSet = $this->connection->Execute($query);

                foreach ($resultSet as $row)
                {                
                    $room = new Room();
                    $room->setId($row['id_room']);
                    $room->setName($row['room_name']);
                    $room->setCapacity($row['room_capacity']);
                    $room->setFunctionList($this->GetFunctionByIdRoom($row['id_room']));
                    
                    array_push($roomList, $room);
                }
                return $roomList;


            }
            catch(Exception $ex)
            {
                throw $ex;
            }
    }
    function GetRoomByIdRoom($id){
        try
            {
                $room=null;
                $tableName = "rooms";

                $query = "SELECT * FROM $tableName WHERE id_room = '$id'";

                $this->connection = Connection::GetInstance();

                $resultSet = $this->connection->Execute($query);

                foreach ($resultSet as $row)
                {                
                    $room = new Room();
                    $room->setId($row['id_room']);
                    $room->setName($row['room_name']);
                    $room->setCapacity($row['room_capacity']);
                    $room->setFunctionList($this->GetFunctionByIdRoom($row['id_room']));
                
                    
                    
                }
                return $room;


            }
            catch(Exception $ex)
            {
                throw $ex;
            }
    }
    
    function GetFunctionByIdRoom($id){
        try
            {
                $functionList=array();

                $tableName = "functions";

                $query = "SELECT * FROM $tableName WHERE id_room = '$id'";

                $this->connection = Connection::GetInstance();

                $resultSet = $this->connection->Execute($query);

                foreach ($resultSet as $row)
                {                
                    $function = new CinemaFunction();
                    $function->setId($row['id_function']);
                    $function->setDay($row['f_day']);
                    $function->setTime($row['f_time']);
                    $function->setMovie($this->GetMovieById($row['id_movie']));

                    array_push($functionList, $function);
                }
                return $functionList;
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
    }



    function GetFunctionByIdFunction($id){
        try
            {
                $functionList=array();

                $tableName = "functions";

                $query = "SELECT * FROM $tableName WHERE id_function = '$id'";

                $this->connection = Connection::GetInstance();

                $resultSet = $this->connection->Execute($query);

                foreach ($resultSet as $row)
                {                
                    $function = new CinemaFunction();
                    $function->setId($row['id_function']);
                    $function->setDay($row['f_day']);
                    $function->setTime($row['f_time']);
                    $function->setMovie($this->GetMovieById($row['id_movie']));

                    array_push($functionList, $function);
                }
                return $functionList;
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
    }
    

    function getScheduleAll()
        {
            try
            {
                $scheduleList = array();

                $tableName = "schedules";

                $query = "SELECT * FROM $tableName";

                $this->connection = Connection::GetInstance();

                $resultSet = $this->connection->Execute($query);
                
                foreach ($resultSet as $row)
                {
                    $schedule = new Schedule();
                    $schedule->setId_schedule($row['id_schedule']);
                    $schedule->setF_time ($row['f_time']);

                    array_push($scheduleList, $schedule);
                }
                return $scheduleList;
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }
    
     function getMovieAll()
        {
            try
            {
                $movieList = array();

                $tableName = "movies";

                $query = "SELECT * FROM $tableName";

                $this->connection = Connection::GetInstance();

                $resultSet = $this->connection->Execute($query);
                
                foreach ($resultSet as $row)
                {                
                    $movie = $this->GetMovieById($row["id_movie"]);

                    array_push($movieList, $movie);
                }

                return $movieList;
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }
        function GetMovieById($id){
            try
                {
                    $functionList=array();
    
                    $tableName = "movies";
    
                    $query = "SELECT * FROM $tableName WHERE id_movie = $id ";

                $this->connection = Connection::GetInstance();

                $resultSet = $this->connection->Execute($query);
                foreach ($resultSet as $row)
                    {                
                        $movie = new Movie();
                        $movie->setId($row["id_movie"]);
                        $movie->setBackdrop_path($row["backdrop_path"]);
                        $movie->setOriginal_title($row["original_title"]);
                        $movie->setVote_average($row["vote_average"]);
                        $movie->setRelease_date($row["release_date"]);
                        $movie->setOverview($row["overview"]);
                        $movie->setYt_path($row["yt_path"]);
                        $movie->setGenre_movie($this->GetGenreByIdMovie($row['id_movie']));
                        $movie->setYt_path($this->GetYtPathByIdMovie($row['id_movie']));
                    }
                return $movie;
                }
                catch(Exception $ex)
                {
                    throw $ex;
                }
        }
    function GetGenreByIdMovie($id){
    try
                {
                    $GenreList=array();
                    
                    $tableOrigin="movies";
                    $tableMiddle="genre_x_movie";
                    $tableEnd = "movie_genre";
    
                    $query = "SELECT E.* FROM $tableEnd as E join $tableMiddle as M on E.id_genre=M.id_genre join $tableOrigin as O on M.id_movie=O.id_movie WHERE O.id_movie = $id ";

                $this->connection = Connection::GetInstance();

                $resultSet = $this->connection->Execute($query);
                foreach ($resultSet as $row)
                    {                
                        $genre = new Genre();
                        $genre->setGenreId($row["id_genre"]);
                        $genre->setGenreType($row["genreType"]);
                        
                        array_push($GenreList, $genre);
                    }
                return $GenreList;
                }
                catch(Exception $ex)
                {
                    throw $ex;
                }
        }
        function GetGenreAll(){
            try
                        {
                            $GenreList=array();
                            $tableName = "movie_genre";
            
                            $query = "SELECT * FROM $tableName";
        
                        $this->connection = Connection::GetInstance();
        
                        $resultSet = $this->connection->Execute($query);
                        foreach ($resultSet as $row)
                            {                
                                $genre = new Genre();
                                $genre->setGenreId($row["id_genre"]);
                                $genre->setGenreType($row["genreType"]);
                                
                                array_push($GenreList, $genre);
                            }
                        return $GenreList;
                        }
                        catch(Exception $ex)
                        {
                            throw $ex;
                        }
                }

    function GetYtPathByIdMovie($id){
            try
                        {
                            $yt_path=null;
                            $return=null;
                            $tableOrigin="yt_paths";
                            $tableEnd = "movies";
            
                            $query = "SELECT O.* FROM $tableOrigin as O join $tableEnd as E on E.id_movie=O.id_movie WHERE O.id_movie = $id ";
        
                        $this->connection = Connection::GetInstance();
        
                        $resultSet = $this->connection->Execute($query);
                        foreach ($resultSet as $row)
                            {                
                                $yt_path = new Yt_path();
                                $yt_path->setId_movie($row["id_movie"]);
                                $yt_path->setYt_path($row["yt_path"]);
                                $return=$yt_path->getYt_path();
                            }
                        return $return;
                        }
                        catch(Exception $ex)
                        {
                            throw $ex;
                        }
                }

        function GetInfoByIdMovie($id){
        try
            {
                $list= array();

                $query = "SELECT C.* , R.* , F.* FROM cinemas as C join rooms as R ON C.id_cinema=R.id_cinema join functions as F on F.id_room =R.id_room WHERE F.id_movie IN (SELECT M.id_movie from movies as M where M.id_movie = $id)";

                $this->connection = Connection::GetInstance();

                $resultSet = $this->connection->Execute($query);
                foreach ($resultSet as $row)
                {   
                    $function = new CinemaFunction();
                    $function->setId($row['id_function']);
                    $function->setDay($row['f_day']);
                    $function->setTime($row['f_time']);
                    $function->setMovie($this->GetMovieById($row['id_movie']));
                    $room = new Room();
                    $room->setId($row['id_room']);
                    $room->setName($row['room_name']);
                    $room->setCapacity($row['room_capacity']);
                    $room->setFunctionList($function);
                    $cinema = new Cinema();
                    $cinema->setId($row["id_cinema"]);
                    $cinema->setName($row["cinema_name"]);
                    $cinema->setAddress($row["address"]);
                    $cinema->setEntrance_value($row["entrance_value"]);
                    $cinema->setRoomList($room);
                    array_push($list, $cinema);
                }
                
                return $list;
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
      }
      function GetMovieWithFunction(){
        try
        {
        $list=array();
        $query = "SELECT Distinct
         M.id_movie FROM movies as M join functions as F ON M.id_movie=F.id_movie";
        $this->connection = Connection::GetInstance();

        $resultSet = $this->connection->Execute($query);
        foreach($resultSet as $row)
        {
            $movie = new Movie();
            $movie = $this->GetMovieById($row['id_movie']);
            array_push($list,$movie);
        }
        return $list;
    }
    catch(Exception $ex)
    {
        throw $ex;
    }
      }
      function GetMovieWithFunctionByDate($date){
        try
        {
        $list=array();
        $query = "SELECT Distinct M.id_movie FROM movies as M join functions as F ON M.id_movie=F.id_movie WHERE F.f_day='$date'";
        $this->connection = Connection::GetInstance();

        $resultSet = $this->connection->Execute($query);
        foreach($resultSet as $row)
        {
            $movie = new Movie();
            $movie = $this->GetMovieById($row['id_movie']);
            array_push($list,$movie);
        }
        return $list;
    }
    catch(Exception $ex)
    {
        throw $ex;
    }
      }
      function GetMovieWithFunctionByGenre($id_genre){
        try
        {
        $list=array();
        $query = "SELECT DISTINCT M.id_movie FROM movies as M join functions as F ON M.id_movie=F.id_movie join genre_x_movie as GxM ON M.id_movie=GxM.id_movie join movie_genre as G on GxM.id_genre=G.id_genre WHERE G.id_genre=$id_genre";
        $this->connection = Connection::GetInstance();

        $resultSet = $this->connection->Execute($query);
        foreach($resultSet as $row)
        {
            $movie = new Movie();
            $movie = $this->GetMovieById($row['id_movie']);
            array_push($list,$movie);
        }
        return $list;
    }
    catch(Exception $ex)
    {
        throw $ex;
    }
      }

      function GetPurchaseByIdClient ($id)
      {try
        {
        $PurchaseList= array();
        $query="SELECT P.* FROM purchases as P join purchases_x_clients as PXC on P.id_purchase = PXC.id_purchase join clients as C on PXC.id_client = C.id_client WHERE C.id_client=$id";
        $this->connection = Connection::GetInstance();
        $resultSet = $this->connection->Execute($query);

        foreach ($resultSet as $row)
            {             
                $purchase = new Purchase();
                $purchase->setPurchaseId($row['id_purchase']);
                $purchase->setPurchaseDate($row['purchase_date']);
                $purchase->setTicketQuantity($row['ticketQuantity']);
                $purchase->setTotalPrice($row['total_price']);
                $purchase->setDiscount($row['discount']);

                array_push($PurchaseList, $purchase);
            }
        return $PurchaseList;
       }
        catch(Exception $ex)
        {
            throw $ex;
        }

      }
      function AvailableTicketsAmount($id_room,$day,$time)
      {
            try
            {
                $query = "SELECT R.room_capacity-count(*) as 'Remanente' from tickets as T 
                join rooms as R on R.id_room=T.id_room 
                WHERE T.day LIKE '%$day%' AND T.time LIKE '%$time' and R.id_room=$id_room limit 1";
               
                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query);
                if(empty($resultSet)){
                    return 0;
                }
                else{
                foreach($resultSet as $row){
                    $available=$row['Remanente'];
                    return $available;
                }
            }
            }
            catch(Exception $ex)
            {
                throw $ex;
            }

      }
      /*
      function GetCinemaByFunction($id){
        try
        {
                        $cinema=null;
        
                        $tableName = "cinemas";
        
                        $query = "SELECT * FROM $tableName WHERE id_cinema = '$id'";
        
                        $this->connection = Connection::GetInstance();
        
                        $resultSet = $this->connection->Execute($query);
        
                        foreach ($resultSet as $row)
                        {                
                            $cinema = new Cinema();
                            $cinema->setId($row["id_cinema"]);
                            $cinema->setName($row["cinema_name"]);
                            $cinema->setAddress($row["address"]);
                            $cinema->setCapacity($row["capacity"]);
                            $cinema->setEntrance_value($row["entrance_value"]);
                            $cinema->setRoomList($this->GetRoomByIdCinema($row["id_cinema"]));
                            
                        }
                        return $cinema;
        
        
                    }
                    catch(Exception $ex)
                    {
                        throw $ex;
                    }
    }

    function GetFunctionByIdMovie($id){
        try
            {
                $functionList=array();

                $tableName = "functions";

                $query = "SELECT * FROM $tableName WHERE id_movie = '$id'";

                $this->connection = Connection::GetInstance();

                $resultSet = $this->connection->Execute($query);

                foreach ($resultSet as $row)
                {                
                    $function = new CinemaFunction();
                    $function->setId($row['id_function']);
                    $function->setDay($row['f_day']);
                    $function->setTime($row['f_time']);
                    $function->setMovie($this->GetMovieById($row['id_movie']));

                    array_push($functionList, $function);
                }
                return $functionList;
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
    }

    function GetRoomByFunction(CinemaFunction $function){
        try
            {
                $roomList=array();

                $tableOrigin = "rooms";
                $tableEnd = "functions";
                $query = "SELECT R.* FROM $tableOrigin as R join $tableEnd as F on R.id_room = F.id_room WHERE F.id_function = ".$function->getId();

                $this->connection = Connection::GetInstance();

                $resultSet = $this->connection->Execute($query);

                foreach ($resultSet as $row)
                {                
                    $room = new Room();
                    $room->setId($row['id_room']);
                    $room->setName($row['room_name']);
                    $room->setCapacity($row['room_capacity']);
                    $room->setFunctionList($function);
                    
                    array_push($roomList, $room);
                }
                return $roomList;


            }
            catch(Exception $ex)
            {
                throw $ex;
            }
    }*/

}
?>