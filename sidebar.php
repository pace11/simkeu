<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
    <div class="c-sidebar-brand d-lg-down-none">
      <h2><span class="fa fa-money"></span> SIM-KEU</h2>
    </div>
    <ul class="c-sidebar-nav">
      <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="?page=beranda">
          <svg class="c-sidebar-nav-icon">
            <use xlink:href="./coreui/icons/sprites/free.svg#cil-speedometer"></use>
          </svg> Beranda</a>
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
          </svg> Produk</a>
      </li>
      <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="?page=reg">
          <svg class="c-sidebar-nav-icon">
            <use xlink:href="./coreui/icons/sprites/free.svg#cil-applications"></use>
          </svg> Reg</a>
      </li>
      <?php if (get_user_login('role_login_id') == 1) { ?>
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
    </ul>
</div>