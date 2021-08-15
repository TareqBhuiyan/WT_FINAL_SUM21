<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath.'/../lib/Database.php');
include_once($filepath.'/../helpers/Format.php');
 ?>
<?php 

class Order
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function getAllOrder()
    {
        $query = "SELECT * FROM tbl_order";
        $result = $this->db->select($query);
        return $result;
    }

    public function getOdrByStatus($status)
    {
        $query = "SELECT * FROM tbl_order WHERE status = '$status'";
        $result = $this->db->select($query);
        return $result;
    }    

    public function getOdrById($id)
    {
        $query = "SELECT * FROM tbl_order WHERE id = '$id'";
        $result = $this->db->select($query);
        return $result;
    }

    
    public function delOdrById($id)
    {
        $query = "SELECT * FROM tbl_order WHERE id = '$id'";
        $getData = $this->db->select($query);
        if ($getData) {
            while ($delImg = $getData->fetch_assoc()) {
                $dellink = $delImg['image'];
                unlink($dellink);
            }
        }
        $delquery = "DELETE FROM tbl_order WHERE id = '$id'";
        $deldata = $this->db->delete($delquery);
        if ($deldata) {
            $msg = "<span class='success'>Product Deleted Successfully</span>";
            return $msg;
        } else {
            $msg = "<span class='error'>Product Not Deleted!</span>";
            return $msg;
        }
    }
}
