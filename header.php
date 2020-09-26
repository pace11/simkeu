<header class="c-header c-header-light c-header-fixed c-header-with-subheader">
    <button class="c-header-toggler c-class-toggler mfs-3 d-md-down-none" type="button" data-target="#sidebar" data-class="c-sidebar-lg-show" responsive="true">
        <svg class="c-icon c-icon-lg">
          <use xlink:href="./coreui/icons/sprites/free.svg#cil-menu"></use>
        </svg>
    </button>
    <ul class="c-header-nav ml-auto mr-4">
        <li class="c-header-nav-item dropdown">
            <a class="c-header-nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <span style="margin-right:10px;"><?= get_user_login('name') ?></span>
                <div class="c-avatar">
                    <img class="c-avatar-img" src="./dist/assets/img/user.jpg" alt="user@email.com">
                </div>
            </a>
            <div class="dropdown-menu dropdown-menu-right pt-0">
                <div class="dropdown-header bg-light py-2">
                    <strong><?= get_user_login('role_login_name') ?></strong>
                </div>
                <a class="dropdown-item" href="?page=profile">
                    <svg class="c-icon mr-2">
                        <use xlink:href="./coreui/icons/sprites/free.svg#cil-user"></use>
                    </svg> Profile
                </a>
                <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="?page=logout">
                        <svg class="c-icon mr-2">
                            <use xlink:href="./coreui/icons/sprites/free.svg#cil-account-logout"></use>
                        </svg> Logout
                    </a>
            </div>
        </li>
    </ul>
</header>
<?php 
    include "script.php";
?>