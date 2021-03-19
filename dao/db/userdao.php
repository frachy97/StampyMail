<?php
    namespace dao\db;


    use \Exception as Exception;
    use dao\IDAO as IDAO;
    use model\User as User;    
    use dao\db\Connection as Connection;

    class UserDAO implements IDAO
    {
        private $connection;
        private $tableName = "users";

        public function create($user) {
            try {
                $query = "INSERT INTO ".$this->tableName." (id_user, email, password, name) VALUES (:id_user, :email, :password, :name);";
                
                $parameters["id_user"] = $user->getId();
                $parameters["email"] = $user->getEmail();
                $parameters["password"] = $user->getPassword();
                $parameters["name"] = $user->getName();


                $this->connection = Connection::getInstance();

                $this->connection->executeNonQuery($query, $parameters);
                return true;
            }
            catch(Exception $ex) {
                throw $ex;
            }

        }

        public function retrieveAll() {
            try {
                $userList = array();

                $query = "SELECT * FROM ".$this->tableName;

                $this->connection = Connection::getInstance();

                $resultSet = $this->connection->execute($query);
                
                foreach ($resultSet as $row) {                
                    $user = new User($row["id_user"], $row["name"], $row["email"], $row["password"]);
                    array_push($userList, $user);
                }

               return $userList;
           }
           catch(Exception $ex) {
            throw $ex;
        }
    }

     public function retrievePagination($page_first_result, $results_per_page) {
            try {
                $userList = array();

                $query = "SELECT * FROM ".$this->tableName." ORDER BY name LIMIT " . $page_first_result . ',' . $results_per_page; 

                $this->connection = Connection::getInstance();

                $resultSet = $this->connection->execute($query);
                
                foreach ($resultSet as $row) {                
                    $user = new User($row["id_user"], $row["name"], $row["email"], $row["password"]);
                    array_push($userList, $user);
                }

               return $userList;
           }
           catch(Exception $ex) {
            throw $ex;
        }
    }

        public function retrieveById($id) {
            try {
                $user = null;

                $query = "SELECT * FROM ".$this->tableName." WHERE id_user = :id_user";
                
                $parameters["id_user"] = $id;
                
                $this->connection = Connection::getInstance();

                $resultSet = $this->connection->execute($query, $parameters);
                
                foreach ($resultSet as $row) {
                    $user = new User($row["id_user"], $row["name"], $row["email"], $row["password"]);
                }
                            
                return $user;
            }
            catch(Exception $ex) {
                throw $ex;
            }
        }

         public function retrieveByEmail($email) {
            try {
                $user = null;

                $query = "SELECT * FROM ".$this->tableName." WHERE email = :email";
                
                $parameters["email"] = $email;
                
                $this->connection = Connection::getInstance();

                $resultSet = $this->connection->execute($query, $parameters);
                
                foreach ($resultSet as $row) {
                    $user = new User($row["id_user"], $row["name"], $row["email"], $row["password"]);
                }
                            
                return $user;
            }
            catch(Exception $ex) {
                throw $ex;
            }
        }



        public function delete($id) {
            try {
                $query = "DELETE FROM ".$this->tableName." WHERE id_user = :id_user";
                $parameters["id_user"] = $id;
                $this->connection = Connection::getInstance();
                $this->connection->executeNonQuery($query, $parameters);   
            }
            catch(Exception $ex) {
                throw $ex;
            }            
        }

        public function update($user) {
            try {
                $query = "UPDATE ".$this->tableName." SET email = :email, password = :password, name = :name WHERE id_user = :id_user";
                $parameters["id_user"] = $user->getId();
                $parameters["email"] = $user->getEmail();
                $parameters["password"] = $user->getPassword();
                $parameters["name"] = $user->getName();
                $this->connection = Connection::getInstance();
                $this->connection->executeNonQuery($query, $parameters);  
                return true; 
            }
            catch(Exception $ex) {
                throw $ex;
            }
        }

        
    }

?>