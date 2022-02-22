<?php
    namespace DAO;

    use DAO\Connection as Connection;
    use Models\Movie as Movie;

    class MovieDB implements IMovieDB{
        private $connection;
        private $tableName = "movies";
    
        public function addMovie($movie){
            try
            {
                $query = "INSERT INTO ".$this->tableName." (id_movie, backdrop_path, original_title, vote_average, release_date, overview ) VALUES (:id_movie, :backdrop_path, :original_title, :vote_average, :release_date, :overview )";
        
                $parameters["id_movie"] = $movie->getId();
                $parameters["backdrop_path"] = $movie->getBackdrop_path();
                $parameters["original_title"] = $movie->getOriginal_title();
                $parameters["vote_average"] = $movie->getVote_average();
                $parameters["release_date"] = $movie->getRelease_date();
                $parameters["overview"] = $movie->getOverview();

                $this->connection = Connection::GetInstance();

                $this->connection->ExecuteNonQuery($query, $parameters);
    
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }


        public function getAll(){
            try
            {
                $movieList = array();

                $query = "SELECT * FROM ".$this->tableName;

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
                    array_push($movieList, $movie);
                }

                return $movieList;
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        public function getById($id){
            try
            {
                $query = "SELECT FROM $this->tableName WHERE"."id_movie =". $id;

                $this->connection = Connection::GetInstance();

                $resultSet = $this->connection->Execute($query);
                foreach ($resultSet as $row)
                    {                
                        $movie = new Movie();
                        $movie->setId($row["id"]);
                        $movie->setBackdrop_path($row["backdrop_path"]);
                        $movie->setOriginal_title($row["original_title"]);
                        $movie->setVote_average($row["vote_average"]);
                        $movie->setRelease_date($row["release_date"]);
                        $movie->setOverview($row["overview"]);
                        $movie->setYt_path($row["yt_path"]);

                    }
                return $movie;
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }
        public function MovieExist($id){ //retorna False si no encunetra coincidencia o True si la hay
            try{
            $flag=false;
            $query = "SELECT * FROM $this->tableName WHERE id_movie = $id";
            $this->connection = Connection::GetInstance();
            $resultSet = $this->connection->Execute($query);
                if($resultSet)
                {
                    $flag=true;
                }
            return $flag;
            }
            catch(Exception $ex){
                throw $ex;
            }
        }
        
        public function listById($id){
            $movieList = array();
            $query = "SELECT FROM $this->tableName WHERE"."id_genre =". $id;
            $this->connection = Connection::GetInstance();

                $resultSet = $this->connection->Execute($query);
                foreach ($resultSet as $row)
                    {                
                        $movie = new Movie();
                        $movie->setId($row["id"]);
                        $movie->setBackdrop_path($row["backdrop_path"]);
                        $movie->setOriginal_title($row["original_title"]);
                        $movie->setVote_average($row["vote_average"]);
                        $movie->setRelease_date($row["release_date"]);
                        $movie->setOverview($row["overview"]);
                        $movie->setYt_path($row["yt_path"]);
                        array_push($movieList, $movie);
                    }
                return $movieList;
            }
}
?>
