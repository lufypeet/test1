<?php

$select = new model_year();
$val = $select->get_year();
$arr_stmt = array();
while ($x = $val->fetch()) {
    $_arr = array(
        'year' => $x['y_date']);

    array_push($arr_stmt, $_arr);
}
echo json_encode($arr_stmt);
class model_year 
{

    private $db_conn;

    //$year = date("Y");

    public function __construct() {
        try {
            $this->db_conn = new PDO('mysql:host=localhost;dbname=transport', 'root', '');
            $this->db_conn->exec("set names utf8");
        } catch (PDOException $e) {
            echo "Could not connect to database";
        }
    }

    public function get_maxdate() {
        //$this->db_conn();
        $sql = "SELECT YEAR(MAX(key_date)) as y_m_date FROM "
                . "ticket ORDER BY key_date ASC";
        $stmt = $this->db_conn->query($sql);

        //$this->db_conn = null;

        return $stmt;
    }
	
	public function test_git() {
        //$this->db_conn();
        $sql = "SELECT YEAR(MAX(key_date)) as y_m_date FROM "
                . "ticket ORDER BY key_date ASC";
        $stmt = $this->db_conn->query($sql);

        //$this->db_conn = null;

        return $stmt;
    }

    public function get_year() {
        $sql = "SELECT DISTINCT(YEAR(key_date)) as y_date FROM"
                . " ticket ORDER BY key_date DESC";
        $stmt = $this->db_conn->query($sql);

        //$this->db_conn = null;

        return $stmt;
    }

}

?>
  