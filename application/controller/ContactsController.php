<?php

require_once 'application/model/ContactsService.php';

class ContactsController {

    private $contactsService = NULL;

    public function __construct() {
        $this->contactsService = new ContactsService();
    }

    public function redirect($location) {
        header('Location: ' . $location);
    }

    public function handleRequest() {
        $op = isset($_GET['op']) ? $_GET['op'] : NULL;
        try {
            if (!$op || $op == 'default' || $op == 'login') {
                $this->showLogin();
            } elseif ($op == 'logout') {
                $this->doLogout();
            } elseif ($op == 'room') {
                $this->reserveRoom();
            } elseif ($op == 'atHome1') {
                $this->showHomePage1();
            } elseif ($op == 'atHome2') {
                $this->showHomePage2();
            } elseif ($op == 'atHome3') {
                $this->showHomePage3();
            } elseif ($op == 'reserveRoomA') {
                $this->reserveRoomA();
            } elseif ($op == 'reserveRoomS') {
                $this->reserveRoomS();
            } elseif ($op == 'checkBooksA') {
                $this->checkBooksA();
            } elseif ($op == 'checkBooksS') {
                $this->checkBooksS();
            } elseif ($op == 'getSubjectsView') {
                $dept = isset($_GET['dept']) ? $_GET['dept'] : NULL;
                $this->getSubjectsView($dept);
            } elseif ($op == 'getBooksView') {
                $sub = isset($_GET['sub']) ? $_GET['sub'] : NULL;
                $this->getBooksView($sub);
            }elseif ($op == 'getBooksViewA') {
                $sub = isset($_GET['sub']) ? $_GET['sub'] : NULL;
                $this->getBooksViewA($sub);
            }elseif ($op == 'getUpdateLoan') {
                $bookId = isset($_GET['bookId']) ? $_GET['bookId'] : NULL;
                $this->getUpdateLoan($bookId);
            }elseif ($op == 'getUpdateLoanA') {
                $bookId = isset($_GET['bookId']) ? $_GET['bookId'] : NULL;
                $this->getUpdateLoanA($bookId);
            }
            elseif ($op == 'studyroom') {
                $this->reserveStudy_Room();
            } elseif ($op == 'iroom') {
                $this->reserveI_Room();
            } elseif ($op == 'event') {
                $this->reserveEvent();
            } else if ($op == 'loanSuccess') {
                $this->loanSuccessful();
            } else if ($op == 'loanFail') {
                $this->loanFailure();
            } else if ($op == 'resetPassword') {
                $this->resetPassword();
            } else if ($op == 'updatePassword') {
                $studentId = isset($_GET['studentId']) ? $_GET['studentId'] : NULL;
                $password = isset($_GET['password']) ? $_GET['password'] : NULL;
                $this->updatePassword($studentId, $password);
            } elseif ($op == 'signUp'){
                $this->signUp();
            } 
            elseif ($op == 'registerNow'){
                $this->registerNow();
            } 
             elseif ( $op == 'getBookDetailsView' ) {
				$bookId = isset($_GET['bookId'])?  $_GET['bookId'] :NULL;	
                $this->getBookDetailsView($bookId);
            } elseif ($op == 'roomSuccess'){
                $this->roomSuccess();
            } else {
                $this->showError("Page not found", "Page for operation " . $op . " was not found!");
            }
        } catch (Exception $e) {
            // some unknown Exception got through here, use application error page to display it
            echo "error";
            $this->showError("Application error", $e->getMessage());
        }
    }

    public function reserveRoom() {
        session_start();
        if (!isset($_SESSION['user'])) {
            $this->redirect('index.php?op=login');
        }
        if ($_SESSION['user']->Role_ID != "1") {
            $this->redirect('index.php?op=logout');
        }
    }

    public function showHomePage1() {
        session_start();
        if (!isset($_SESSION['user'])) {
            $this->redirect('index.php?op=login');
        }
        if ($_SESSION['user']->Role_ID != "1") {
            $this->redirect('index.php?op=logout');
        }
        include 'application/view/page1.php';
    }

    public function showHomePage2() {
        session_start();
        if (!isset($_SESSION['user'])) {
            $this->redirect('index.php?op=login');
        }
        if ($_SESSION['user']->Role_ID != "2") {
            $this->redirect('index.php?op=logout');
        }
        include 'application/view/page2.php';
    }

    public function showHomePage3() {
        $errors = array();
        session_start();
        if (!isset($_SESSION['user'])) {
            $this->redirect('index.php?op=login');
        }
        if ($_SESSION['user']->Role_ID != "3") {
            $this->redirect('index.php?op=logout');
        }
        include 'application/view/page3.php';
    }

    public function showLogin() {
        $email = '';
        $password = '';
        $err = isset($_GET['errId']) ? $_GET['errId'] : NULL;
        if ($err == 1) {
            $error = 'Incorrect username or password';
        } else {
            $error = '';
        }
        if (isset($_POST['form-submitted'])) {
            $email = isset($_POST['login-email']) ? $_POST['login-email'] : NULL;
            $password = isset($_POST['login-password']) ? $_POST['login-password'] : NULL;
            try {
                $res = $this->contactsService->checkCredentials($email, $password);

                if ($res->Role_ID == "1") {
                    $this->redirect('index.php?op=atHome1');
                    session_start();
                    $_SESSION['user'] = $res;
                } else if ($res->Role_ID == '2') {
                    $this->redirect('index.php?op=atHome2');
                    session_start();
                    $_SESSION['user'] = $res;
                } else if ($res->Role_ID == '3') {
                    $this->redirect('index.php?op=atHome3');
                    session_start();
                    $_SESSION['user'] = $res;
                } else {
                    $this->redirect('index.php?op=login&errId=1');
                }
                return $res;
            } catch (ValidationException $e) {
                $errors = $e->getErrors();
            }
        }
        include 'application/view/login.php';
    }

    public function doLogout() {
        $email = '';
        $password = '';
        $errors = array();
        $error = '';
        session_start();
        $_SESSION['user'] = NULL;
        session_destroy();
        include 'application/view/login.php';
    }

    public function reserveRoomA() {
        //$totalIndRooms = $this->ContactsService->getTotalIndRooms();
        include 'application/view/reserveRoomAdmin.php';
    }

    public function reserveRoomS() {
        //$totalIndRooms = $this->ContactsService->getTotalIndRooms();
        $rooms = $this->contactsService->getAvailableRooms();
        include 'application/view/reserveRoomStudent.php';
    }

    public function checkBooksS() {
        $depts = $this->contactsService->getDepartments();
        include 'application/view/CheckBooksStudent.php';
    }

    public function checkBooksA() {
        $depts = $this->contactsService->getDepartments();
        include 'application/view/CheckBooksAdmin.php';
    }

    public function reserveStudy_Room() {

        include 'application/view/studyroom.php';
    }

    public function reserveI_Room() {

        include 'application/view/iroom.php';
    }

    public function reserveEvent() {

        include 'application/view/event.php';
    }

    public function getSubjectsView($dept) {
        $subjects = $this->contactsService->getSubjects($dept);
        include 'application/view/subjects.php';
    }

    public function getBooksView($sub) {
        $books = $this->contactsService->getBooks($sub);
        include 'application/view/books.php';
    }
    public function getBooksViewA($sub) {
        $books = $this->contactsService->getBooks($sub);
        include 'application/view/booksA.php';
    }

    public function getUpdateLoan($bookId) {
        $bookStatus = $this->contactsService->getUpdate($bookId);
        if ($bookStatus) {
            $this->redirect('index.php?op=loanSuccess');
        }
    } public function getUpdateLoanA($bookId) {
        $bookStatus = $this->contactsService->getUpdateA($bookId);
        if ($bookStatus) {
            $this->redirect('index.php?op=atHome1');
        }
    }

    public function loanSuccessful() {
        include 'application/view/loanSuccess.php';
    }

    public function loanFailure() {
        include 'application/view/loanFail.php';
    }

    public function resetPassword() {
        $err = isset($_GET['errId']) ? $_GET['errId'] : NULL;
        if ($err == 1) {
            $error = 'Enter correct userID and UserName';
        } else {
            $error = '';
        }
        include 'application/view/ForgotPassword.php';
    }

    public function updatePassword() {
        $studentId = isset($_POST['login-id']) ? $_POST['login-id'] : NULL;
            $password = isset($_POST['login-password']) ? $_POST['login-password'] : NULL;
        $err = isset($_GET['errId']) ? $_GET['errId'] : NULL;
        if ($err == 1) {
            $error = 'Enter correct userID and UserName';
        } else {
            $error = '';
        }
        if (isset($_POST['form-submitted'])) {
            $updateStatus = $this->contactsService->getUpdatePassword($studentId, $password);
        if ($updateStatus > 0){
            $this->redirect('index.php?op=login');
        }  else {
                    $this->redirect('index.php?op=resetPassword&errId=1');
                }
        }
    }
     public function signUp() {
        include 'application/view/signUp.php';
    }
    public function registerNow() {
        $userID = isset($_POST['login-id']) ? $_POST['login-id'] : NULL;
        $userName = isset($_POST['login-email']) ? $_POST['login-email'] : NULL;
        $password = isset($_POST['login-password']) ? $_POST['login-password'] : NULL;
        $userRole = 2;
        $res = $this->contactsService->getAddUser($userID,$userName, $password, $userRole);
        include 'application/view/registerSuccess.php';
    }
     public function getBookDetailsView($bookId){
		$bookDetails = $this->contactsService->getBookDetails($bookId);
        include 'application/view/bookDetails.php';
    }
     public function roomSuccess() {
        include 'application/view/roomSuccess.php';
    }
}
        ?>