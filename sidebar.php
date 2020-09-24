<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
    <div class="c-sidebar-brand d-lg-down-none">
      <h2><span class="fa fa-money"></span> SIM-KEU</h2>
    </div>
    <ul class="c-sidebar-nav">
      <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="?page=beranda">
          <svg class="c-sidebar-nav-icon">
            <use xlink:href="./coreui/icons/sprites/free.svg#cil-speedometer"></use>
          </svg> Dashboard</a>
      </li>
      <li class="c-sidebar-nav-title">Menu</li>
      <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="?page=customer">
          <svg class="c-sidebar-nav-icon">
            <use xlink:href="./coreui/icons/sprites/free.svg#cil-fork"></use>
          </svg>Customer</a>
      </li>
      <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="?page=product">
          <svg class="c-sidebar-nav-icon">
            <use xlink:href="./coreui/icons/sprites/free.svg#cil-scrubber"></use>
          </svg> Product</a>
      </li>
      <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="?page=reg">
          <svg class="c-sidebar-nav-icon">
            <use xlink:href="./coreui/icons/sprites/free.svg#cil-applications"></use>
          </svg> Reg</a>
      </li>
      <?php if (get_user_login('role_login_id') == 1) { ?>
      <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="?page=role">
          <svg class="c-sidebar-nav-icon">
            <use xlink:href="./coreui/icons/sprites/free.svg#cil-settings"></use>
          </svg> Role</a>
      </li>
      <?php } ?>
      <?php if (get_user_login('role_login_id') == 1 || get_user_login('role_login_id') == 2 || get_user_login('role_login_id') == 5) { ?>
      <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="?page=user">
          <svg class="c-sidebar-nav-icon">
            <use xlink:href="./coreui/icons/sprites/free.svg#cil-people"></use>
          </svg> User</a>
      </li>
      <?php } ?>
      <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="?page=invoice">
          <svg class="c-sidebar-nav-icon">
            <use xlink:href="./coreui/icons/sprites/free.svg#cil-notes"></use>
          </svg> Invoice</a>
      </li>
      <?php if (get_user_login('role_login_id') == 1) { ?>
      <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="?page=invoiceprintlog">
          <svg class="c-sidebar-nav-icon">
            <use xlink:href="./coreui/icons/sprites/free.svg#cil-print"></use>
          </svg> Invoice Print Log</a>
      </li>
      <?php } ?>
      <?php if (get_user_login('role_login_id') == 1 || get_user_login('role_login_id') == 2) { ?>
      <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="?page=invoicearsip">
          <svg class="c-sidebar-nav-icon">
            <use xlink:href="./coreui/icons/sprites/free.svg#cil-file"></use>
          </svg> Invoice Arsip Log</a>
      </li>
      <?php } ?>
    </ul>
</div>