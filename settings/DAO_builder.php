<?php
include __DIR__ . '/conn.php';
class DAO_builder
{
    public $conn = [], $cheker = [];
    public function __construct($connection_list)
    {
        // host,username,pass,db schma
        $conn_survey = new Conn('prod-raksa-db-mysql8-stack-mysql8-dbi.cnocwwk8e8bm.ap-southeast-3.rds.amazonaws.com', 'usernamelogin', 'S@kTi_s3kaLI_bA5ut11!!', 'v8_entry_polis');
        $conn_bike = new Conn('prod-raksa-db-mysql8-stack-mysql8-dbi.cnocwwk8e8bm.ap-southeast-3.rds.amazonaws.com', 'Anyloginin', 'ManbBJHpp_se34kGVli_a23pun1!!', 'v8_entry_Bike');
        // $conn_react = new Conn('lin-28306-15183-mysql-primary-private.servers.linodedb.net', 'reak_umum', 'R3@K!!_Pu$ih_u3u3', 'react_native');


        if (in_array('LITE', $connection_list)) {
            $this->conn['ARAKSA'] = $conn_survey->getConnection_aws();
        }
        if (in_array('BIKE', $connection_list)) {
            $this->conn['BIKE'] = $conn_bike->getConnection_aws();
        }
        // if (in_array('REACT', $connection_list)) {
        //     $this->conn['REACT'] = $conn_react->getConnection_linode_old();
        // }
        if (count($this->conn) != count($connection_list)) {
            $result = [
                "status" => 400,
                "message" => 'No Connection Connected',
                "data" => []
            ];
            $this->cheker = $result;
        }

    }

    public function select($cons, $query, $skip = false)
    {
        try {
            if (array_key_exists($cons, $this->conn)) {
                $connection = $this->conn[$cons];
                // $dat = mysqli_query($connection, $query);
                $dat = $connection->query($query);
                if ($skip == false) {
                    if ($dat->num_rows > 0) {
                        for ($i = 0; $array[$i] = mysqli_fetch_assoc($dat); $i++)
                            ;
                        array_pop($array);
                        $result = [
                            "status" => 200,
                            "message" => "Success select data",
                            "data" => $array
                        ];
                    }
                    elseif ($dat->num_rows == 0) {
                        $fields = $dat->fetch_fields();
                        foreach ($fields as $field) {
                            $array[$field->name] = null;
                        }
                        $final[] = $array;
                        $result = [
                            "status" => 200,
                            "message" => "Success select data",
                            "data" => $final
                        ];
                    }
                }
                else {
                    $result = [
                        "status" => 200,
                        "message" => "Success select data"
                    ];
                }

            }
            else {
                $trace = debug_backtrace();
                $caller = $trace[0];
                $result = [
                    "status" => 400,
                    "message" => 'Database not found' . ' on line ' . $caller['line'] . ' at ' . $caller['file']
                ];
            }
            return $result;
        } catch (mysqli_sql_exception $e) {
            $result = [
                "status" => 400,
                "message" => $e->getMessage() . 'on line ' . $e->getTrace()[1]['line'] . ' at ' . $e->getTrace()[1]['file']
            ];
            return $result;
        }
    }

    public function executeNoCommit($cons, $query)
    {
        try {
            if (array_key_exists($cons, $this->conn)) {
                $connection = $this->conn[$cons];
                mysqli_autocommit($connection, false);
                $dat = $connection->query($query);
                // $dat = mysqli_query($connection, $query);
                if ($dat) {
                    $result = [
                        "status" => 200,
                        "message" => "Success procesing data"
                    ];
                }
                // else {
                //     $trace = debug_backtrace();
                //     $caller = $trace[0];
                //     $result = [
                //         "status" => 400,
                //         "message" => $connection->error . ' on line ' . $caller['line']
                //     ];
                // }
            }
            else {
                $trace = debug_backtrace();
                $caller = $trace[0];
                $result = [
                    "status" => 400,
                    "message" => 'Database not found' . ' on line ' . $caller['line'] . ' at ' . $caller['file']
                ];
            }
            return $result;
        } catch (mysqli_sql_exception $e) {
            $result = [
                "status" => 400,
                "message" => $e->getMessage() . 'on line ' . $e->getTrace()[1]['line'] . ' at ' . $e->getTrace()[1]['file']
            ];
            return $result;
        }
    }

    public function executeCommit($cons, $query)
    {
        try {
            if (array_key_exists($cons, $this->conn)) {
                $connection = $this->conn[$cons];
                mysqli_autocommit($connection, true);
                $dat = $connection->query($query);
                // $dat = mysqli_query($connection, $query);
                if ($dat) {
                    $result = [
                        "status" => 200,
                        "message" => "Success procesing data"
                    ];
                }
                // else {
                //     $trace = debug_backtrace();
                //     $caller = $trace[0];
                //     $result = [
                //         "status" => 400,
                //         "message" => $connection->error . ' on line ' . $caller['line']
                //     ];
                // }
            }
            else {
                $trace = debug_backtrace();
                $caller = $trace[0];
                $result = [
                    "status" => 400,
                    "message" => 'Database not found' . ' on line ' . $caller['line'] . ' at ' . $caller['file']
                ];
            }
            return $result;
        } catch (mysqli_sql_exception $e) {
            $result = [
                "status" => 400,
                "message" => $e->getMessage() . 'on line ' . $e->getTrace()[1]['line'] . ' at ' . $e->getTrace()[1]['file']
            ];
            return $result;
        }
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
                $trace = debug_backtrace();
                $caller = $trace[0];
                echo 'Database not found' . ' on line ' . $caller['line'];
            }
        } catch (mysqli_sql_exception $e) {
            $result = [
                "status" => 400,
                "message" => "Transaction failed with exception: " . $e->getMessage()
            ];
            return $result;
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
                $trace = debug_backtrace();
                $caller = $trace[0];
                echo 'Database not found' . ' on line ' . $caller['line'];
            }
        } catch (mysqli_sql_exception $e) {
            $result = [
                "status" => 400,
                "message" => "Rollback failed with exception: " . $e->getMessage()
            ];
            return $result;
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
            $trace = debug_backtrace();
            $caller = $trace[0];
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