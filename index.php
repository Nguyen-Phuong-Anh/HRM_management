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

        case 'home': 
            case 'profile': case 'create_prf':
            require_once('./Controllers/ViewController.php');
            $controller = new ViewController();
            $controller->showHome();
            break;

            case 'teaching': case 'create_tch':
                require_once('./Controllers/ViewController.php');
                $controller = new ViewController();
                $controller->showHome();
                break;
        
        default:
            # code...
            break;
    }
?>