<?php

    class database{
        public  $host ='localhost';
        public  $user ='kimia';
        public  $pass ='12345';
        public  $dbname ='posts';

         public $link;

        public function  __construct()
        {
            $this->connect();
        }
        private function  connect(){

            $this->link = new mysqli($this->host.$this->user.$this->pass.$this->dbname);
                                    }

            public function select($query)
            {
                $result = $this->link->query($query);

                if ($result->num_rows > 0) {
                    return $result;
                } else {
                    return false;
                }

            }
        public function insert($query)
        {
            $insert = $this->link->query($query);

            if ($insert)
            {
                echo "inserted successfully";
            }
            else
            {
                echo "inserted didnt successfully";
            }

        }

        public function update($query)
        {
            $update = $this->link->query($query);

            if ($update)
            {
                echo "updated successfully";
            }
            else
            {
                echo "updated didnt successfully";
            }

        }

        public function delete($query)
        {
            $delete = $this->link->query($query);

            if ($delete)
            {
                echo "deleted successfully";
            }
            else
            {
                echo "deleted didnt successfully";
            }

        }
    }
