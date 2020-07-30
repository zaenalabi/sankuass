<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional)
    <div class="user-panel">
      <div class="pull-left image">
				<img src="<?php //echo base_url('assets/upload/images/foto_profil/'.$this->session->userdata('photo')); ?>" class="img-circle">
			</div>
      <div class="pull-left info">
        <p>Alexander Pierce</p>  -->
        <!-- Status 
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>  -->

        <!-- search form (Optional) -->
        <!--  <form action="#" method="get" class="sidebar-form">
           <div class="input-group">
             <input type="text" name="q" class="form-control" placeholder="Search...">
             <span class="input-group-btn">
                   <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                   </button>
                 </span>
           </div>
         </form> -->
        <!-- /.search form -->


        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" id="my-sidebar-menu">
            <li class="header" >MAIN</li>
            <!-- Optionally, you can add icons to the links -->

            <li ><a href="<?php echo base_url('admin/Home/index'); ?>"><i ></i>
                    Dashboard</a></li>
            <li ><a href="<?php echo base_url('admin/Keterlambatan/index'); ?>"><i></i>
                    Keterlambatan</a></li>
            <li class="treeview-active">
            <a href="<?php echo base_url('admin/Tugas/index'); ?>"> <span>Tugas</span>
             <i class="fa fa-angle-left pull-right"></i>
            </a>
              <ul class="treeview-menu" >
                <li><a href="<?php echo base_url('admin/Buku/index'); ?>">  Buku</a></li>
                <li><a href="<?php echo base_url('admin/Tugas/tugas_m'); ?>">  Tugas Acc</a></li>
                
              </ul>
            </li>
            <li ><a href="<?php echo base_url('admin/Petunjuk/index'); ?>"><i ></i> <span>Petunjuk</span></a>
            </li>
            <li class=""><a href="<?php echo base_url('admin/Tentang/index'); ?>"><i ></i> <span>Tentang</span></a>
            </li>
<!--            <li class="header">OPTIONS</li>-->
<!--            <li class="treeview">-->
<!--                <a href="#"><i class="fa fa-link"></i> <span>Multilevel</span>-->
<!--                    <span class="pull-right-container">-->
<!--                <i class="fa fa-angle-left pull-right"></i>-->
<!--              </span>-->
<!--                </a>-->
<!--                <ul class="treeview-menu">-->
<!--                    <li><a href="#">Link in level 2</a></li>-->
<!--                    <li><a href="#">Link in level 2</a></li>-->
<!--                </ul>-->
<!--            <li><a href="#"><i class="fa fa-link"></i> <span>User</span></a></li>-->
<!--            <li><a href="#"><i class="fa fa-link"></i> <span>Alat</span></a></li>-->
<!--            <li><a href="#"><i class="fa fa-link"></i> <span>File</span></a></li>-->
<!--            </li>-->
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
