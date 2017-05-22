<?php
require_once 'application/model/ContactsGateway.php';
class ContactsService {
    private $contactsGateway    = NULL;
    private function openDb() {
        if (!mysql_connect("127.0.0.1", "root", "whinnie123*")) {
            throw new Exception("Connection to the database server failed!");
        }
        if (!mysql_select_db("library")) {
            throw new Exception("No recruitment database found on database server.");
        }
    }
    private function closeDb() {
        mysql_close();
    }
    public function __construct() {
        $this->contactsGateway = new ContactsGateway();
    }
    public function checkCredentials($email,$password){
        try {
            $this->openDb();
		    $res = $this->contactsGateway->checkCredentials($email,$password);
            $this->closeDb();
            return $res;
        } catch (Exception $e) {
            $this->closeDb();
            throw $e;
        }
    }
	public function getDepartments(){
        try {
            $this->openDb();
		    $res = $this->contactsGateway->getDepartments();
            $this->closeDb();
            return $res;
        } catch (Exception $e) {
            $this->closeDb();
            throw $e;
        }
    }
	public function getSubjects($dept){
        try {
            $this->openDb();
		    $res = $this->contactsGateway->getSubjects($dept);
            $this->closeDb();
            return $res;
        } catch (Exception $e) {
            $this->closeDb();
            throw $e;
        }
    }
	public function getBooks($sub){
        try {
            $this->openDb();
		    $res = $this->contactsGateway->getBooks($sub);
            $this->closeDb();
            return $res;
        } catch (Exception $e) {
            $this->closeDb();
            throw $e;
        }
        
    }
    public function getUpdate($bookID) {
        try{
            $this->openDb();
                $res=  $this->contactsGateway->updateLoan($bookID);
                $this->closeDb();
                return $res;
        } catch (Exception $e) {
            $this->closeDb();
            throw $e;

        }
    }
    public function getUpdateA($bookID) {
        try{
            $this->openDb();
                $res=  $this->contactsGateway->updateLoanA($bookID);
                $this->closeDb();
                return $res;
        } catch (Exception $e) {
            $this->closeDb();
            throw $e;

        }
    }
    public function getUpdatePassword($studentId,$password) {
        try{
            $this->openDb();
                $res=  $this->contactsGateway->updatePassword($studentId,$password);
                $this->closeDb();
                return $res;
        } catch (Exception $e) {
            $this->closeDb();
            throw $e;

        }
    }
    public function getAddUser($userID,$userName, $password, $userRole) {
        try{
            $this->openDb();
                $res=  $this->contactsGateway->addUser($userID,$userName, $password, $userRole);
                $this->closeDb();
                return $res;
        } catch (Exception $e) {
            $this->closeDb();
            throw $e;

        }
    }
     public function getBookDetails($bookId){
        try {
            $this->openDb();
		    $res = $this->contactsGateway->getBookDetails($bookId);
            $this->closeDb();
            return $res;
        } catch (Exception $e) {
            $this->closeDb();
            throw $e;
        }
    }
     public function getAvailableRooms() {
        try {
            $this->openDb();
            $res = $this->contactsGateway->getAvaliableRooms();
            $this->closeDb();
            return $res;
        } catch (Exception $e) {
            $this->closeDb();
            throw $e;
        }
    }
     public function getAvailableTimeSlots($date,$room_id) {
        try {
            $this->openDb();
            $res = $this->contactsGateway->getAvailableTimeSlots($date, $room_id);
            $this->closeDb();
            return $res;
        } catch (Exception $e) {
            $this->closeDb();
            throw $e;
        }
    }
}
?>