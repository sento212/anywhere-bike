<?php
class DAO_builder
{
    public $conn = [], $cheker = [];
    public function __construct($connection_list)
    {
        include (__DIR__ . '/../../../koneksi_lite.php');
        if (in_array('ARAKSA', $connection_list)) {
            $this->conn['ARAKSA'] = $login_db_araksa;
        }
        if (in_array('LITE', $connection_list)) {
            $this->conn['LITE'] = $login_db_lite;
        }
        if (in_array('BIKE', $connection_list)) {
            $this->conn['BIKE'] = $login_db_bike;
        }
        if (count($this->conn) != count($connection_list)) {
            $result = [
                "status" => 400,
                "message" => 'No Connection Connected',
                "data" => []
            ];
            $this->cheker = $result;
        }

    }

    public function select($cons, $query)
    {
        if (array_key_exists($cons, $this->conn)) {
            $connection = $this->conn[$cons];
            $dat = mysqli_query($connection, $query);
            if ($dat) {
                for ($i = 0; $array[$i] = mysqli_fetch_assoc($dat); $i++)
                    ;
                array_pop($array);
                $result = [
                    "status" => 200,
                    "message" => "Success select data",
                    "data" => $array
                ];
            }
            else {
                $result = [
                    "status" => 400,
                    "message" => $connection->error,
                    "data" => []
                ];
            }
        }
        else {
            $result = [
                "status" => 400,
                "message" => 'Database not found',
                "data" => []
            ];
        }
        return $result;
    }

    public function executeNoCommit($cons, $query)
    {
        if (array_key_exists($cons, $this->conn)) {
            $connection = $this->conn[$cons];
            mysqli_autocommit($connection, false);

            $dat = mysqli_query($connection, $query);
            if ($dat) {
                $result = [
                    "status" => 200,
                    "message" => "Success procesing data"
                ];
            }
            else {
                $result = [
                    "status" => 400,
                    "message" => $connection->error
                ];
            }
        }
        else {
            $result = [
                "status" => 400,
                "message" => 'Database not found',
                "data" => []
            ];
        }
        return $result;
    }

    public function executeCommit($cons, $query)
    {
        if (array_key_exists($cons, $this->conn)) {
            $connection = $this->conn[$cons];
            mysqli_autocommit($connection, true);

            $dat = mysqli_query($connection, $query);
            if ($dat) {
                $result = [
                    "status" => 200,
                    "message" => "Success procesing data"
                ];
            }
            else {
                $result = [
                    "status" => 400,
                    "message" => $connection->error
                ];
            }
        }
        else {
            $result = [
                "status" => 400,
                "message" => 'Database not found',
                "data" => []
            ];
        }
        return $result;
    }

    public function commit($cons)
    {
        try {
            if (array_key_exists($cons, $this->conn)) {
                $connection = $this->conn[$cons];
                mysqli_commit($connection);
                mysqli_autocommit($connection, true);
            }
            else {
                echo 'Database not found';
            }
        } catch (mysqli_sql_exception $e) {
            mysqli_rollback($connection);
            echo "Transaction failed with exception: " . $e->getMessage();
        }
    }

    public function rollback($cons)
    {
        try {
            if (array_key_exists($cons, $this->conn)) {
                $connection = $this->conn[$cons];
                if (!mysqli_rollback($connection)) {
                    throw new Exception("Rollback failed");
                }
                else {
                    mysqli_rollback($connection);
                }
                mysqli_autocommit($connection, true);
            }
            else {
                echo 'Database not found';
            }
        } catch (Exception $e) {
            echo "Rollback failed with exception: " . $e->getMessage();
        }
    }


    public function api($tipe, $link, $data, $header)
    {
        $web_url = curl_init($link);
        curl_setopt($web_url, CURLOPT_CUSTOMREQUEST, $tipe);
        curl_setopt($web_url, CURLOPT_POSTFIELDS, $data);
        curl_setopt($web_url, CURLOPT_HTTPHEADER, $header);
        curl_setopt($web_url, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($web_url, CURLOPT_SSL_VERIFYPEER, false);
        $result_unit = curl_exec($web_url);
        $data_unit = json_decode($result_unit, true);
        if ($result_unit === false) {
            $data_unit = [
                "status" => 400,
                "message" => 'API Error ' . curl_error($web_url),
                "data" => []
            ];
        }
        else {
            $data_unit = json_decode($result_unit, true);
        }

        return $data_unit;
    }

}

?>