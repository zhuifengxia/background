<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <div class="panel-heading" role="tab" id="heading1">
                <h4 class="panel-title">
                    <a class="single-item">
                        <i class="fa fa-dashboard"></i>&nbsp;&nbsp;医库题库
                    </a>
                </h4>
            </div>
            <!-- Optionally, you can add icons to the links -->
            @foreach( BackendNavigation::all() as $item )
                <li>
                    <a href="{{ $item->url }}">
                        <i class='fa fa-desktop'></i> <span>{{ $item->label }}</span>
                        @if (count($item->sideMenu) > 0 ) <i class="pull-right fa fa-caret-down"></i> @endif
                    </a>
                    @if( count($item->sideMenu) > 0 )
                        <ul class="treeview-menu">
                            @foreach( $item->sideMenu as $subitem )
                                <li>
                                    <a href="{{ $subitem->url }}"> {{ $subitem->label }}
                                        @if( count($subitem->sideMenu) > 0 ) <i class="pull-right fa fa-caret-down"></i> @endif
                                    </a>
                                    @if( count($subitem->sideMenu) > 0 )
                                        <ul class="treeview-menu">
                                            @foreach( $subitem->sideMenu as $nitem )
                                                <li><a href="{{ $nitem->url }}">{{ $nitem->label }}</a></li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </li>
            @endforeach
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
