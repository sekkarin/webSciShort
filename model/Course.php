<?php
class Course{
    private $ConDB;
    public function __construct(){
        $con = new ConDB();
        $con->connect();
        $this->ConDB = $con->conn;
        // echo $con;
    }

    public function getCourse()
    {
        $sql = "SELECT * FROM sci_cs";
        $query = $this->ConDB->prepare($sql);
        if( $query->execute()){
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }else {
            return false;
        }
    }
    public function getCourseById($cs_id)
    {
        $sql = "SELECT * FROM `sci_cs` WHERE cs_id = ".$cs_id ;
        $query = $this->ConDB->prepare($sql);
        if( $query->execute()){
            $result = $query->fetch(PDO::FETCH_ASSOC);
            // echo ($result);
            return $result;
        }else {
            return false;
        }
    }

    // public function getCoursePro($pro_id)
    // {
    //     $sql = "SELECT * FROM agency WHERE `agency_pro_id` = '". $pro_id ."'";
    //     $query = $this->ConDB->prepare($sql);
    //     if( $query->execute()){
    //         $result = $query->fetchAll(PDO::FETCH_ASSOC);
    //         return $result;
    //     }else {
    //         return false;
    //     }
    // }

    // public function getAgencyID($a_id)
    // {
    //     $sql = "SELECT * FROM agency where agency_id=".$a_id;
    //     $query = $this->ConDB->prepare($sql);
    //     if( $query->execute()){
    //         $result = $query->fetch(PDO::FETCH_ASSOC);
    //         return $result;
    //     }else {
    //         return false;
    //     }
    // }

    public function addCourse($a_name, $a_context, $a_pic, $a_location,$a_pro)
    {
        $sql = "INSERT INTO `agency` (`agency_id`, `agency_name`, `agency_context`, `agency_pic`, `agency_location`, `agency_pro_id`) VALUES (NULL, '$a_name', '$a_context', '$a_pic', '$a_location', '$a_pro');";
        $query = $this->ConDB->prepare($sql);
        if( $query->execute()){
            return true;
        }else {
            return false;
        }
    }

    public function delCourse($k_id)
    {
        $sql = "DELETE FROM `agency` WHERE `agency_id`='".$k_id."'";
        $query = $this->ConDB->prepare($sql);
        if( $query->execute()){
            return true;
        }else {
            return false;
        }
    }

    public function editCourse($a_id, $a_name, $a_context, $a_pic, $a_location)
    {
        $sql = "UPDATE `agency` SET `agency_name` = '". $a_name ."', `agency_context` = '". $a_context ."', `agency_pic` = '". $a_pic ."', `agency_location` = '". $a_location ."' WHERE `agency_id` = '". $a_id ."'";
        $query = $this->ConDB->prepare($sql);
        if( $query->execute()){
            return true;
        }else {
            return false;
        }
    }
	
}
?>