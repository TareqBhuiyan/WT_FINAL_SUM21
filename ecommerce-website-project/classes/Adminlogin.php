<?php 
$filepath = realpath(dirname(__FILE__));
include_once($filepath.'/../lib/Session.php');
Session::checkLogin();
include_once($filepath.'/../lib/Database.php');
include_once($filepath.'/../helpers/Format.php');

 ?>
<?php
/**
 * Adminlogin Class
 */
class Adminlogin
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function adminLogin($adminUser, $adminPass)
    {
        $adminUser = $this->fm->validation($adminUser);
        $adminPass = $this->fm->validation($adminPass);
        $adminUser = mysqli_real_escape_string($this->db->link, $adminUser);
        $adminPass = mysqli_real_escape_string($this->db->link, $adminPass);

        if (empty($adminUser) || empty($adminPass)) {
            $loginmsg = "Username or Password must not be empty!";
            return $loginmsg;
        } else {
            $query = "SELECT * FROM tbl_admin WHERE adminUser = '$adminUser' AND adminPass = '$adminPass'";
            $result = $this->db->select($query);
            if ($result != false) {
                $value = $result->fetch_assoc();
                Session::set("adminlogin", true);
                Session::set("adminId", $value['adminId']);
                Session::set("adminUser", $value['adminUser']);
                Session::set("adminName", $value['adminName']);
                Session::set("lavel", $value['lavel']);
                header("Location:dashboard.php");
            } else {
                $loginmsg = "Username or Password not match!";
                return $loginmsg;
            }
        }
    }

    public function adminUpdate($data, $adminId)
    {
        $adminName       = $this->fm->validation($data['adminName']);
        $adminPass    = $this->fm->validation($data['adminPass']);
        
        
        $adminName       = mysqli_real_escape_string($this->db->link, $adminName);
        $adminPass    = mysqli_real_escape_string($this->db->link, md5($adminPass));
        

        if ($adminName == "" || $adminPass == "") {
            $msg = "<span class='error'>Fields must not be empty!</span>";
            return $msg;
        } else {
            $query = "UPDATE tbl_admin
            SET
            adminName    = '$adminName',
            adminPass = '$adminPass'
            WHERE adminId = '$adminId'";
            $updated_row = $this->db->update($query);
            if ($updated_row) {
                $msg = "<span class='success'>Admin Data Update Successfully</span>";
                return $msg;
            } else {
                $msg = "<span class='error'>Admin Data Not Updated.</span>";
                return $msg;
            }
        }
    }

    public function getAdminData($id)
    {
        $query = "SELECT * FROM tbl_admin WHERE adminId = '$id'";
        $result = $this->db->select($query);
        return $result;
    }
}
