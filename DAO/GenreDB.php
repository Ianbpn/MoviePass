<?php
    namespace DAO;

    use DAO\Connection as Connection;
    use Models\Movie_Genre as Movie_Genre;

    class GenreDB implements IGenreDB{
        private $connection;
        private $tableName = "movie_genre";
    
        public function addGenres($genre){
            try
            {
                $query = "INSERT INTO ".$this->tableName." (id_genre, genreType) VALUES (:id_genre, :genreType)";
                $parameters["id_genre"] = $genre->getGenreId();
                $parameters["genreType"] = $genre->getGenreType();
                $this->connection = Connection::GetInstance();

                $this->connection->ExecuteNonQuery($query, $parameters);
            }catch(Exception $ex){
                throw $ex;
            }
        }

        public function getAll(){
            try
            {
                $genreList = array();

                $query = "SELECT * FROM ".$this->tableName;

                $this->connection = Connection::GetInstance();

                $resultSet = $this->connection->Execute($query);
                
                foreach ($resultSet as $row)
                {                
                    $genre = new Movie_Genre();
                    $genre->setGenreId($row["id_genre"]);
                    $genre->setGenreType($row["genreType"]);
                    array_push($genreList, $genre);
                }

                return $genreList;
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        public function getById($id){
            try
            {
                $query = "SELECT FROM $this->tableName WHERE"."id_genre =". $id;

                $this->connection = Connection::GetInstance();

                $resultSet = $this->connection->Execute($query);
                foreach ($resultSet as $row)
                    {                
                        $genre = new Movie_Genre();
                        $genre->setGenreId($row["id_genre"]);
                        $genre->setGenreType($row["genreType"]);
                    }
                return $genre;
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }
        public function TruncateTable(){
            try{
            $query= "TRUNCATE TABLE". $this->tableName;
            $this->connection = Connection::GetInstance();
            $resultSet = $this->connection->Execute($query);
            }catch(Exception $ex){
                throw $ex;
            }
            return $tableName;
        }       
}
?>