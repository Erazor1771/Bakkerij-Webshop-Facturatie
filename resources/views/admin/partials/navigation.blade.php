<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="index.html" class="site_title"><span>van der Westen</span></a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile">
            <div class="profile_pic">
                <img src="{{url('img/1.jpg')}}" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span>Welcome,</span>
                @if(Session::has('admin'))
                    <h2>{{  Session('admin')['email'][0] }}</h2>
                @endif
            </div>
        </div>
        <!-- /menu profile quick info -->

        <br />

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">

                <h3>Dashboard</h3>

                <ul class="nav side-menu">
                    <li><a href="{{url('admin/dashboard')}}"><i class="fa fa-home"></i> Dashboard</a></li>
                    <li><a><i class="fa fa-newspaper-o"></i> Nieuws <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{url('admin/nieuws-overzicht')}}">Overzicht</a></li>
                            <li><a href="{{url('admin/nieuws/toevoegen')}}">Toevoegen</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-clone"></i> Pagina <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{url('admin/pagina-overzicht')}}">Overzicht</a></li>
                            <li><a href="{{url('admin/pagina/toevoegen')}}">Toevoegen</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-tags"></i> Categorieen <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{url('')}}">Overzicht</a></li>
                            <li><a href="{{url('')}}">Toevoegen</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-shopping-cart"></i> Producten <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{url('admin/product-overzicht')}}">Overzicht</a></li>
                            <li><a href="{{url('admin/product/toevoegen')}}">Toevoegen</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-book"></i> Fotoboek <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{url('admin/fotoboek-overzicht')}}">Overzicht</a></li>
                            <li><a href="{{url('admin/fotoboek/toevoegen')}}">Toevoegen</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-briefcase"></i> Orders <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{url('admin/order-overzicht')}}">Overzicht</a></li>
                            <li><a href="{{url('admin/order/toevoegen')}}">Toevoegen</a></li>
                        </ul>
                    </li>
                </ul>

            </div>
        </div>
        <!-- /sidebar menu -->

        <!-- /menu footer buttons -->
        <!--
        <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
        </div>
        -->
        <!-- /menu footer buttons -->
    </div>
</div>