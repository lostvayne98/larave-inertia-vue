<template>



        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>AdminLTE 3 | Blank Page</title>
            <!--    <link rel="stylesheet" href="{{asset('assets/admin/plugins/css/admin.css')}}">-->
        </head>
        <body class="hold-transition sidebar-mini">
        <!-- Site wrapper -->
        <div class="wrapper">
            <!-- Navbar -->
<!--            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                &lt;!&ndash; Left navbar links &ndash;&gt;
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                    </li>
                    <li class="nav-item d-none d-sm-inline-block">
                        <a href="../../index3.html" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item d-none d-sm-inline-block">
                        <a href="#" class="nav-link">Contact</a>
                    </li>
                </ul>

                &lt;!&ndash; Right navbar links &ndash;&gt;-->

            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <!-- Brand Logo -->
                <a href="../../index3.html" class="brand-link">
                    <!--            <img src="{{asset('assets/admin/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">-->
                    <span class="brand-text font-weight-light">AdminLTE 3</span>
                </a>

                <!-- Sidebar -->
                <div class="sidebar">
                    <!-- Sidebar user (optional) -->
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="image">
                            <!--                    <img src="{{asset('assets/admin/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">-->
                        </div>
                        <div class="info">
                            <a href="#" class="d-block">Admin</a>
                        </div>
                    </div>

                    <!-- SidebarSearch Form -->
                    <div class="form-inline">
                        <div class="input-group" data-widget="sidebar-search">
                            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                            <div class="input-group-append">
                                <button class="btn btn-sidebar">
                                    <i class="fas fa-search fa-fw"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            <!-- Add icons to the links using the .nav-icon class
                                 with font-awesome or any other icon font library -->


                            <li class="nav-item">
                                <Link class="nav-link" :href="route('users.index')" >
                                    Пользователи

                                </Link>
                            </li>
                            <li class="nav-item">
                                <Link class="nav-link" :href="route('admins.index')" >
                                    Администраторы

                                </Link>
                            </li>

                            <li class="nav-item">
                                <Link class="nav-link" :href="route('combat_skills.index')" >

                                    <p>   Обычные скиллы </p>

                                </Link>
                            </li>
                            <li class="nav-item">
                                <Link class="nav-link" :href="route('hack_skills.index')" >

                                    <p>   Хак скиллы </p>

                                </Link>
                            </li>
                            <li class="nav-item">
                                <Link class="nav-link" :href="route('heroes.index')" >

                                    <p>   Герои </p>

                                </Link>
                            </li>


                            <li class="nav-item">
                                <a href="#" class="nav-link">

                                    <p>
                                        Заявки
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <Link class="nav-link" :href="route('raise.hack')" >

                                            <p>   Заявки на повышение кол-во Хак Скиллов </p>

                                        </Link>
                                    </li>
                                    <li class="nav-item">
                                        <Link class="nav-link" :href="route('raise.combat')" >

                                            <p>   Заявки на повышение кол-во Обычных скиллов </p>

                                        </Link>
                                    </li>
                                    <li class="nav-item">
                                        <Link class="nav-link" :href="route('raise.add.hack')" >

                                            <p>   Заявки на добавление Хак скиллов </p>

                                        </Link>
                                    </li>
                                    <li class="nav-item">
                                        <Link class="nav-link" :href="route('raise.add.combat')" >

                                            <p>   Заявки на добавление Обычных скиллов </p>

                                        </Link>
                                    </li>
                                    <li class="nav-item">
                                        <Link class="nav-link" :href="route('chars.life')" >

                                            <p>   Заявки на увеличение Жизней </p>

                                        </Link>
                                    </li><li class="nav-item">
                                    <Link class="nav-link" :href="route('chars.Firewall')" >

                                        <p>   Заявки на увеличение Firewall </p>

                                    </Link>
                                </li><li class="nav-item">
                                    <Link class="nav-link" :href="route('chars.Energy')" >

                                        <p>   Заявки на увеличение Энергии </p>

                                    </Link>
                                </li>


                                </ul>
                            </li>

                        </ul>
                    </nav>
                    <!-- /.sidebar-menu -->
                </div>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <slot/>
            <!-- /.content-wrapper -->

            <footer class="main-footer">
                <div class="float-right d-none d-sm-block">
                    <b>Version</b> 3.2.0
                </div>
                <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
            </footer>

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->
        </div>
        <!-- ./wrapper -->


        <!--<script src="{{asset('assets/admin/js/admin.js')}}"></script>-->

        </body>


    </template>




<script>
import {Link} from '@inertiajs/inertia-vue3';
export default {
components:{
    Link
},
    props:{
    user:String
    }

}
</script>

