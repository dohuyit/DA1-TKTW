 <!-- Main Sidebar Container -->
 <aside class="main-sidebar nav-pills elevation-2">
     <!-- Sidebar -->
     <div class="sidebar">
         <!-- Sidebar user panel (optional) -->
         <div class="mt-3 pb-3 mb-3 d-flex">
             <img src="assets/dist/img/logo.png" alt="Logo" class="img-fluid" />
         </div>

         <!-- Sidebar Menu -->
         <nav class="mt-2">
             <ul class="nav nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                 <li class="nav-item mb-3">
                     <a href="#" class="nav-link active">
                         <i class="nav-icon fas fa-tachometer-alt"></i>
                         <p>Dashboard</p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="#" class="nav-link">
                         <i class="nav-icon fas fa-socks"></i>
                         <p>
                             Quản lí sản phẩm
                             <i class="fas fa-angle-right right"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="<?= BASE_URL_ADMIN . '?act=form-them-san-pham' ?>" class="nav-link">
                                 <i class="fas fa-minus"></i>
                                 <p class="m-3">Thêm sản phẩm</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="<?= BASE_URL_ADMIN . '?act=san-pham' ?>" class="nav-link">
                                 <i class="fas fa-minus"></i>
                                 <p class="m-3">Danh sách sản phẩm</p>
                             </a>
                         </li>
                     </ul>
                 </li>
                 <li class="nav-item">
                     <a href="#" class="nav-link">
                         <i class="nav-icon fas fa-socks"></i>
                         <p>
                             Quản lí danh mục
                             <i class="fas fa-angle-right right"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="<?= BASE_URL_ADMIN . '?act=form-them-danh-muc' ?>" class="nav-link">
                                 <i class="fas fa-minus"></i>
                                 <p class="m-3">Thêm danh mục</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="<?= BASE_URL_ADMIN . '?act=danh-muc' ?>" class="nav-link">
                                 <i class="fas fa-minus"></i>
                                 <p class="m-3">Danh sách danh mục</p>
                             </a>
                         </li>
                     </ul>
                 </li>
             </ul>
         </nav>
         <!-- /.sidebar-menu -->
     </div>
     <!-- /.sidebar -->
 </aside>