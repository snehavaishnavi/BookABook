<?php
    class ContactsGateway{
        public function checkCredentials($email,$password) {
			$dbEmail = "'".mysql_real_escape_string($email)."'";
			$dbPassword = "'".mysql_real_escape_string($password)."'";
			$dbres = mysql_query("SELECT * FROM user_data WHERE username=$dbEmail and password=$dbPassword");
			return mysql_fetch_object($dbres);
		}  
		public function getDepartments() {			
			$dbres = mysql_query("SELECT * FROM department");
			$arr = array();
			while($obj = mysql_fetch_object($dbres)){
				array_push($arr,$obj);
			}
			return $arr;
		}
		public function getSubjects($dept){		
			$dbDept = "'".mysql_real_escape_string($dept)."'";		
			$dbres = mysql_query("SELECT * FROM subject WHERE depid=$dbDept");
			$arr = array();
			while($obj = mysql_fetch_object($dbres)){
				array_push($arr,$obj);
			}
			return $arr;
		}
		public function getBooks($sub){			
			$dbSub = "'".mysql_real_escape_string($sub)."'";
			$dbres = mysql_query("SELECT * FROM book WHERE subjectid=$dbSub");
			$arr = array();
			while($obj = mysql_fetch_object($dbres)){
				array_push($arr,$obj);
			}
			return $arr;
		}
                public function updateLoan($book_id) {
                        $book_id="'".mysql_real_escape_string($book_id)."'";
                        $dbres = mysql_query("UPDATE book SET bookstatus='0' WHERE id=$book_id");
                        return $dbres;
                        
                }
                public function updateLoanA($book_id) {
                        $book_id="'".mysql_real_escape_string($book_id)."'";
                        $dbres = mysql_query("UPDATE book SET bookstatus='1' WHERE id=$book_id");
                        return $dbres;
                        
                }
                public function updatePassword($studentId,$password){			
			$studentId = "'".mysql_real_escape_string($studentId)."'";
                        $password = "'".mysql_real_escape_string($password)."'";
			$dbres = mysql_query("UPDATE user_data SET Password=$password WHERE UNCC_ID=$studentId");
                        
			return $dbres;
		}
                 public function addUser($userID,$userName, $password, $userRole){			
			$userID = "'".mysql_real_escape_string($userID)."'";
                        $userName = "'".mysql_real_escape_string($userName)."'";
                        $password = "'".mysql_real_escape_string($password)."'";
                        $userRole = "'".mysql_real_escape_string($userRole)."'";
			$dbres = mysql_query("INSERT INTO user_data values ($userID, $userName, $password, $userRole)");
			return $dbres;
		}
                public function getBookDetails($bookId){			
			$bookId = "'".mysql_real_escape_string($bookId)."'";
			$dbres = mysql_query("SELECT * FROM book WHERE id=$bookId");
			$arr = array();
			while($obj = mysql_fetch_object($dbres)){
				array_push($arr,$obj);
			}
			return $arr;
		}
                public function getAvaliableRooms(){
                    $dbres = mysql_query("SELECT * FROM room_list");
                    $arr = array();
                    while($obj = mysql_fetch_object($dbres)){
				array_push($arr,$obj);
			}
			return $arr;
                }
                public function getAvailableTimeSlots($date,$room_id){
                    $dbres = mysql_query("SELECT start_time,end_time from time_slots WHERE time_slot_id NOT IN (SELECT time_slot_id FROM room_booking WHERE DATE ='2016-04-05' AND room_id=1)");
                    
                    $arr = array();
                    while($obj = mysql_fetch_object($dbres)){
				array_push($arr,$obj);
			}
			return $arr;
                }
    }
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>