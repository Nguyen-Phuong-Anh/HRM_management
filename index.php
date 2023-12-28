<?php 
    if(isset($_GET['route'])) {
        $route = $_GET['route'];
    } else {
        $route = '';
    }

    switch ($route) {
        case '':
            require_once('./Controllers/AuthController.php');
            $controller = new AuthController();
            $controller->showLoginForm();
            break;
       
        case 'logout':
            require_once('./Controllers/AuthController.php');
            $controller = new AuthController();
            $controller->processLogout();
            break;

        case 'home': case 'profile': case 'create_prf': case 'profile_info'
        : case 'employee_info' : case 'create_employee' 
        : case 'bonus' : case 'create_bonus': case 'change_bonus'
        : case 'penalty' : case 'create_penalty' : case 'change_penalty' 
        : case 'schedule' : case 'getSchedule' : case 'create_schedule' : case 'change_schedule' :
            require_once('./Controllers/ViewController.php');
            $controller = new ViewController();
            $controller->showHome();
            break;
        
        default:
            # code...
            break;
    }
?>