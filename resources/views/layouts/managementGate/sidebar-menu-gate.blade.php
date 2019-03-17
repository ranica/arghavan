 @can('menu_gate')
    <li>
        <a data-toggle="collapse" href="#gateManagementMenu">
            <i class="material-icons">widgets</i>
            <p>
                مديريت تردد
                <b class="caret"></b>
            </p>
        </a>
        <div class="collapse" id="gateManagementMenu">
            <ul class="nav">
                <!-- Zoon -->
                @can('menu_gate_zoon')
                    <li>
                        <a href="{{ url('/zones') }}">
                            <span class="sidebar-normal">
                                منطقه استقرار گیت
                            </span>
                        </a>
                    </li>
                @endcan
                <!-- /Zoon -->

                <!-- gate pass -->
                @can('menu_gate_gatepass')
                    <li>
                        <a href="{{ url('/gatepasses') }}">
                            <span class="sidebar-normal">
                                نحوه عبور از گیت
                            </span>
                        </a>
                    </li>
                @endcan
                <!-- /gate pass -->

                <!-- Gate Device -->
                @can('menu_gate_gate')
                    <li>
                        <a href="{{ url('/gatedevices') }}">
                            <span class="sidebar-normal">
                                گیت های ورود و خروج
                            </span>
                        </a>
                    </li>
                @endcan
                <!-- /Gate Device -->
            </ul>
        </div>
    </li>
@endcan

