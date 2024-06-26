<?php
    session_start();
    if(!$_SESSION['username']) {
        header('Location: ./');
    }
    $requestUri = $_SERVER['REQUEST_URI'];
    $questionMarkPosition = strpos($requestUri, '=');

    if ($questionMarkPosition !== false) {
      if (strpos($requestUri, '&') !== false) {
        $parts = explode('&', $requestUri);
        $route = substr($parts[0], strpos($parts[0], '=') + 1);
      } else {
        $route = substr($requestUri, $questionMarkPosition + 1);
      }
    } else {
      $route = $requestUri;
    }
;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý nhân sự</title>
    <link rel="stylesheet" href="styles.css" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <!-- mdboostrap -->
    <!-- Font Awesome -->
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
      rel="stylesheet"
    />
    <!-- Google Fonts -->
    <link
      href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
      rel="stylesheet"
    />
    <!-- MDB -->
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.1.0/mdb.min.css"
      rel="stylesheet"
    />
    <style>
        .homeBody {
          display: flex;
          height: 100vh;
        }

        .body2 {
          margin-left: 100px;
          width: 100%;
          padding: 0 30px;
          overflow-y: auto;
          cursor: context-menu;
        }

        .nav_btn {
          outline: none;
          border: none;
          background-color: white;
        }

        img {
          width: 150px;
          height: 150px;
        }
    </style>
</head>
<body class="homeBody">
  <div class='d-flex flex-column flex-shrink-0 p-3 text-white bg-dark' style='width: 280px;'>
    <a href='.?route=profile' class='d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none'>
      <span class='fs-4'>HRM</span>
    </a>
    <hr>
    <ul class='nav nav-pills flex-column mb-auto'>
      <li>
        <li class='mb-1'>
            <a href='.?route=profile'>
              <button class='btn btn-toggle text-white align-items-center rounded'>
              <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-wallet2" viewBox="0 0 20 20">
                <path d="M12.136.326A1.5 1.5 0 0 1 14 1.78V3h.5A1.5 1.5 0 0 1 16 4.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 13.5v-9a1.5 1.5 0 0 1 1.432-1.499L12.136.326zM5.562 3H13V1.78a.5.5 0 0 0-.621-.484L5.562 3zM1.5 4a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z"/>
              </svg>
                Hồ sơ
              </button>
            </a>
        </li>
      </li>
      <li>
        <li class='mb-1'>
            <a href='.?route=bonus'>
              <button class='btn btn-toggle text-white align-items-center rounded'>
              <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-wallet2" viewBox="0 0 20 20">
                <path d="M12.136.326A1.5 1.5 0 0 1 14 1.78V3h.5A1.5 1.5 0 0 1 16 4.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 13.5v-9a1.5 1.5 0 0 1 1.432-1.499L12.136.326zM5.562 3H13V1.78a.5.5 0 0 0-.621-.484L5.562 3zM1.5 4a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z"/>
              </svg>
                Khen thưởng
              </button>
            </a>
        </li>
      </li>

      <li>
        <li class='mb-1'>
            <a href='.?route=penalty'>
              <button class='btn btn-toggle text-white align-items-center rounded'>
              <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-wallet2" viewBox="0 0 20 20">
                <path d="M12.136.326A1.5 1.5 0 0 1 14 1.78V3h.5A1.5 1.5 0 0 1 16 4.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 13.5v-9a1.5 1.5 0 0 1 1.432-1.499L12.136.326zM5.562 3H13V1.78a.5.5 0 0 0-.621-.484L5.562 3zM1.5 4a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z"/>
              </svg>
                Kỉ luật
              </button>
            </a>
        </li>
      </li>
      
      <li>
        <li class='mb-1'>
            <a href='.?route=schedule'>
              <button class='btn btn-toggle text-white align-items-center rounded'>
              <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-wallet2" viewBox="0 0 20 20">
                <path d="M12.136.326A1.5 1.5 0 0 1 14 1.78V3h.5A1.5 1.5 0 0 1 16 4.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 13.5v-9a1.5 1.5 0 0 1 1.432-1.499L12.136.326zM5.562 3H13V1.78a.5.5 0 0 0-.621-.484L5.562 3zM1.5 4a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z"/>
              </svg>
                Giảng dạy
              </button>
            </a>
        </li>
      </li>

      <!-- <li>
        <li class='mb-1'>
            <a href='.?route=contract'>
              <button class='btn btn-toggle text-white align-items-center rounded'>
              <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-wallet2" viewBox="0 0 20 20">
                <path d="M12.136.326A1.5 1.5 0 0 1 14 1.78V3h.5A1.5 1.5 0 0 1 16 4.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 13.5v-9a1.5 1.5 0 0 1 1.432-1.499L12.136.326zM5.562 3H13V1.78a.5.5 0 0 0-.621-.484L5.562 3zM1.5 4a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z"/>
              </svg>
                Hợp đồng
              </button>
            </a>
        </li>
      </li> -->
    </ul>
    <hr>
    <div>
        <?php
          if($route === 'home' || $route === 'profile' || $route === 'profile_info' || $route === 'employee_info' || $route === 'bonus' || $route === 'penalty' || $route === 'schedule' || $route === 'getSchedule') {
            echo "<a href='.?route=logout' class='nav-link text-white'>
            <svg class='bi me-2' width='16' height='16'><use xlink:href='#people-circle'></use></svg>
            Đăng xuất
            </a>";
          } else {
            echo '<button type="button" class="btn btn-toggle text-white align-items-center rounded" data-mdb-ripple-init data-mdb-modal-init data-mdb-target="#exampleModal2">
            Đăng xuất
            </button>';
          }
        ?>
        <!-- <a href='.?route=logout' class='nav-link text-white'>
          <svg class='bi me-2' width='16' height='16'><use xlink:href='#people-circle'></use></svg>
          Đăng xuất
        </a>
        <button type="button" class="btn btn-toggle text-white align-items-center rounded" data-mdb-ripple-init data-mdb-modal-init data-mdb-target="#exampleModal">
        Đăng xuất
        </button> -->
      </div>
  </div>


  <div class="body2">
      <?php
    switch ($route) {
      case 'profile':
        require_once('./Controllers/ViewController.php');
        $controller = new ViewController();
        $controller->showProfile();
        break;

      case 'create_prf':
        require_once('./Controllers/ViewController.php');
        $controller = new ViewController();
        $controller->showCreatePrf();
        break;
      
        case 'create_employee':
        require_once('./Controllers/ViewController.php');
        $controller = new ViewController();
        $controller->showCreateEmployee();
        break;

      case 'profile_info':
        require_once('./Controllers/ViewController.php');
        $controller = new ViewController();
        $controller->showProfileInfo();
        break;

      case 'employee_info':
        require_once('./Controllers/ViewController.php');
        $controller = new ViewController();
        $controller->showEmployeeInfo();
        break;

        // bonus
      case 'bonus':
        require_once('./Controllers/ViewController.php');
        $controller = new ViewController();
        $controller->showBonus();
        break;

      case 'create_bonus':
        require_once('./Controllers/ViewController.php');
        $controller = new ViewController();
        $controller->showCreateBonus();
        break;

      case 'change_bonus':
        require_once('./Controllers/ViewController.php');
        $controller = new ViewController();
        $controller->showChangeBonus();
        break;
    
      // penalty
      case 'penalty':
        require_once('./Controllers/ViewController.php');
        $controller = new ViewController();
        $controller->showPenalty();
        break;

      case 'create_penalty':
        require_once('./Controllers/ViewController.php');
        $controller = new ViewController();
        $controller->showCreatePenalty();
        break;
      
      case 'change_penalty':
      require_once('./Controllers/ViewController.php');
      $controller = new ViewController();
      $controller->showChangePenalty();
      break;
      
      case 'schedule':
      require_once('./Controllers/ViewController.php');
      $controller = new ViewController();
      $controller->showSchedule();
      break;

      case 'getSchedule':
      require_once('./Controllers/ViewController.php');
      $controller = new ViewController();
      $controller->showGetSchedule();
      break;
      
      case 'create_schedule':
      require_once('./Controllers/ViewController.php');
      $controller = new ViewController();
      $controller->showCreateSchedule();
      break;
      
      case 'change_schedule':
      require_once('./Controllers/ViewController.php');
      $controller = new ViewController();
      $controller->showChangeSchedule();
      break;

      case 'contract':
      require_once('./Controllers/ViewController.php');
      $controller = new ViewController();
      $controller->showContract();
      break;
    }
      ?>
  </div>
</body>

<!-- logout model -->
<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Xác nhận đăng xuất</h5>
          <button type="button" class="btn-close" data-mdb-ripple-init data-mdb-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">Bạn có muốn đăng xuất?</div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-mdb-ripple-init data-mdb-dismiss="modal">Đóng</button>
          <a href='.?route=logout' class='nav-link'>
            <svg class='bi me-2' width='16' height='16'><use xlink:href='#people-circle'></use></svg>
            Đăng xuất
          </a>
        </div>
      </div>
</div>
</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<!-- mdboostrap -->
<!-- MDB -->
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.1.0/mdb.umd.min.js"
></script>