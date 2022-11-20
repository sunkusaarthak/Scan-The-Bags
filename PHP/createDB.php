<?php


class CreateDb
{
        public $servername;
        public $username;
        public $password;
        public $dbname;
        public $tablename;
        public $con;


        // class constructor
    public function __construct(
        $dbname = "id18490456_scanthebags",
        $tablename = "products",
        $servername = "localhost",
        $username = "id18490456_sunkusaarthak",
        $password = "Sunku@944057"
    )
    {
      $this->dbname = $dbname;
      $this->tablename = $tablename;
      $this->servername = $servername;
      $this->username = $username;
      $this->password = $password;

      // create connection
        $this->con = mysqli_connect($servername, $username, $password, $dbname);

        // Check connection
        if (!$this->con){
            die("Connection failed : " . mysqli_connect_error());
        }
    }

    // get product from the database
    public function getData(){
        $sql = "SELECT * FROM $this->tablename";

        $result = mysqli_query($this->con, $sql);

        if(mysqli_num_rows($result) > 0){
            return $result;
        }
    }

    public function getLink($productId){
        $sql = "SELECT * FROM $this->tablename where id = $productId";
        $result = mysqli_query($this->con, $sql);
        if(mysqli_num_rows($result) > 0){
            return $result;
        }
    }
}






