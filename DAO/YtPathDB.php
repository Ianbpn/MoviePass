<?php
    namespace DAO;

    use Models\Movie as Movie;
    use Models\Yt_path as Yt_path;

    class YtPathDB
    {
        private $tableName = 'yt_paths';

        public function getPaths(){
            try
            {
                $pathList = array();

                $query = "SELECT * FROM ".$this->tableName;

                $this->connection = Connection::GetInstance();

                $resultSet = $this->connection->Execute($query);
                
                foreach ($resultSet as $row)
                {                
                    $yt_path = new Yt_path();
                    $yt_path->setId_movie($row["id_movie"]);                    
                    $yt_path->setYt_path($row["yt_path"]);
                    array_push($pathList, $yt_path);
                }

                return $pathList;
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        public function addPath($path){
            try
            {
                $query = "INSERT INTO ".$this->tableName." (id_movie, yt_path) VALUES (:id_movie, :yt_path)";
                $parameters["id_movie"] = $path->getId_movie();
                $parameters["yt_path"] = $path->getYt_path();
                $this->connection = Connection::GetInstance();

                $this->connection->ExecuteNonQuery($query, $parameters);
            }catch(Exception $ex){
                throw $ex;
            }
        }

        public function pathExist($path){ //retorna False si no encunetra coincidencia o True si la hay
            try{
            $flag=false;
            $query = "SELECT * FROM $this->tableName WHERE yt_path = $path";
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
    }

?>
