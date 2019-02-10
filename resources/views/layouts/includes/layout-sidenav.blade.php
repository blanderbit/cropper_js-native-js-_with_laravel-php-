<div id="layout-sidenav" class="{{ isset($layout_sidenav_horizontal) ? 'layout-sidenav-horizontal sidenav-horizontal container-p-x flex-grow-0' : 'layout-sidenav sidenav-vertical' }} sidenav bg-sidenav-theme">

    <!-- Inner -->
    <ul class="sidenav-inner{{ empty($layout_sidenav_horizontal) ? ' py-1' : '' }}">

        <li class="sidenav-item{{ Request::is('/creatives/create') ? ' active' : '' }}">
            <a href="{{ route('creatives.index') }}" class="sidenav-link"><i class="sidenav-icon ion ion-ios-contact"></i><div>All Creatives </div></a>
            <a href="{{ route('creatives.create') }}" class="sidenav-link"><i class="sidenav-icon ion ion-ios-contact"></i><div>Add Creatives </div></a>
        </li>


    </ul>
</div>
