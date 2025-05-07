<?php
class Conn
{
    private $host;
    private $db_name;
    private $username;
    private $password;
    private $conn;

    public function __construct($host, $username, $password, $db_name)
    {
        $this->host = $host;
        $this->db_name = $db_name;
        $this->username = $username;
        $this->password = $password;
    }

    public function getConnection_linode()
    {
        $login_db_lite = mysqli_init();
        mysqli_options($login_db_lite, MYSQLI_OPT_SSL_VERIFY_SERVER_CERT, true);
        mysqli_ssl_set($login_db_lite, NULL, NULL, '/home/raksa/htdocs/mks/entry/settings/certificate/DB_V5_28306-15183_ca-certificate.pem', NULL, NULL);
        mysqli_real_connect($login_db_lite, $this->host, $this->username, $this->password, $this->db_name, 3306, NULL, MYSQLI_CLIENT_SSL);
        return $login_db_lite;

    }

    public function getConnection_linode_old()
    {
        $login_db_lite = mysqli_init();
        mysqli_options($login_db_lite, MYSQLI_OPT_SSL_VERIFY_SERVER_CERT, true);
        mysqli_ssl_set($login_db_lite, NULL, NULL, '/home/raksa/htdocs/mks/entry/settings/certificate/koneksi_lite_DB-ca-certificate.pem', NULL, NULL);
        mysqli_real_connect($login_db_lite, $this->host, $this->username, $this->password, $this->db_name, 3306, NULL, MYSQLI_CLIENT_SSL);
        return $login_db_lite;

    }

    public function getConnection_aws()
    {
        $conn_survey = mysqli_connect($this->host, $this->username, $this->password, $this->db_name);
        return $conn_survey;
    }
}
