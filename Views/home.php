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
    <title>Quản lý nhân viên</title>
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
    <a href='.?route=home' class='d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none'>
      <span class='fs-4'>UTT</span>
    </a>
    <hr>
    <ul class='nav nav-pills flex-column mb-auto'>
      <li>
        <a href='.?route=home' class='nav-link text-white active'>
          <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 20 20">
            <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5Z"/>
          </svg>
          Dashboard
        </a>
      </li>
      
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
            <a href='.?route=home'>
              <button class='btn btn-toggle text-white align-items-center rounded'>
              <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-wallet2" viewBox="0 0 20 20">
                <path d="M12.136.326A1.5 1.5 0 0 1 14 1.78V3h.5A1.5 1.5 0 0 1 16 4.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 13.5v-9a1.5 1.5 0 0 1 1.432-1.499L12.136.326zM5.562 3H13V1.78a.5.5 0 0 0-.621-.484L5.562 3zM1.5 4a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z"/>
              </svg>
                Giảng dạy
              </button>
            </a>
        </li>
      </li>

      <li>
        <li class='mb-1'>
            <a href='.?route=home'>
              <button class='btn btn-toggle text-white align-items-center rounded'>
              <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-wallet2" viewBox="0 0 20 20">
                <path d="M12.136.326A1.5 1.5 0 0 1 14 1.78V3h.5A1.5 1.5 0 0 1 16 4.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 13.5v-9a1.5 1.5 0 0 1 1.432-1.499L12.136.326zM5.562 3H13V1.78a.5.5 0 0 0-.621-.484L5.562 3zM1.5 4a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z"/>
              </svg>
                Hợp đồng
              </button>
            </a>
        </li>
      </li>
     
      <li>
        <li class='mb-1'>
            <a href='.?route=home'>
              <button class='btn btn-toggle text-white align-items-center rounded'>
              <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-wallet2" viewBox="0 0 20 20">
                <path d="M12.136.326A1.5 1.5 0 0 1 14 1.78V3h.5A1.5 1.5 0 0 1 16 4.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 13.5v-9a1.5 1.5 0 0 1 1.432-1.499L12.136.326zM5.562 3H13V1.78a.5.5 0 0 0-.621-.484L5.562 3zM1.5 4a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z"/>
              </svg>
                Thuyên chuyển
              </button>
            </a>
        </li>
      </li>
      <li>
        <li class='mb-1'>
            <a href='.?route=home'>
              <button class='btn btn-toggle text-white align-items-center rounded'>
              <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-wallet2" viewBox="0 0 20 20">
                <path d="M12.136.326A1.5 1.5 0 0 1 14 1.78V3h.5A1.5 1.5 0 0 1 16 4.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 13.5v-9a1.5 1.5 0 0 1 1.432-1.499L12.136.326zM5.562 3H13V1.78a.5.5 0 0 0-.621-.484L5.562 3zM1.5 4a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z"/>
              </svg>
                Nghỉ việc
              </button>
            </a>
        </li>
      </li>
      <li>
        <li class='mb-1'>
            <a href='.?route=home'>
              <button class='btn btn-toggle text-white align-items-center rounded'>
              <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-wallet2" viewBox="0 0 20 20">
                <path d="M12.136.326A1.5 1.5 0 0 1 14 1.78V3h.5A1.5 1.5 0 0 1 16 4.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 13.5v-9a1.5 1.5 0 0 1 1.432-1.499L12.136.326zM5.562 3H13V1.78a.5.5 0 0 0-.621-.484L5.562 3zM1.5 4a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z"/>
              </svg>
                Báo cáo/Thống kê
              </button>
            </a>
        </li>
      </li>
    </ul>
    <hr>
    <div>
        <a href='.?route=logout' class='nav-link text-white'>
          <svg class='bi me-2' width='16' height='16'><use xlink:href='#people-circle'></use></svg>
          Đăng xuất
        </a>
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

      

    }
      ?>
  </div>
</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<!-- mdboostrap -->
<!-- MDB -->
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.1.0/mdb.umd.min.js"
></script>