<?php
class DBController
{

    private $host = "localhost";

    private $user = "cuscmsqx_usuariotramite";

    private $password = "0*y7RkrhlEAp";

    private $database = "cuscmsqx_tramitedocumentario";

    private $conn;

    function __construct()
    {
        $this->conn = $this->connectDB();
    }

    function connectDB()
    {
        $conn = mysqli_connect($this->host, $this->user, $this->password, $this->database);
		$conn->set_charset('utf8');
        return $conn;
    }

    function runQuery($query)
    {
        $result = mysqli_query($this->conn, $query);
        while ($row = mysqli_fetch_array($result)) {
            $resultset[] = $row;
        }
        if (! empty($resultset))
            return $resultset;
    }
}
?>