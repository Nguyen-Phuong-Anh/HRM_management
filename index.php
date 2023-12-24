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

        case 'home': case 'profile': case 'create_prf': case 'profile_info': case 'employee_info' : case 'create_employee' :
            require_once('./Controllers/ViewController.php');
            $controller = new ViewController();
            $controller->showHome();
            break;
        
        default:
            # code...
            break;
    }
?>