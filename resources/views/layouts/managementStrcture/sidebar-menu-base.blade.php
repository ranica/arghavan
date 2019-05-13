@can('menu_strcture')
    <li>
        <a data-toggle="collapse" href="#baseInformationMenu">
            <i class="material-icons">image</i>
            <p>
                مدیریت ساختار سازمانی
                <b class="caret"></b>
            </p>
        </a>

        <div class="collapse" id="baseInformationMenu">
            <ul class="nav">
                {{-- Base Structure --}}
                <li>
                    <a href="{{ route('base.structure') }}">
                        <span class="sidebar-normal">
                             اطلاعات پایه
                        </span>
                    </a>
                </li>

                <!-- Base Eduaction  -->
                @isUniversity
                <li>
                    <a href="{{ route('base.education') }}">
                        <span class="sidebar-normal">
                             اطلاعات پایه تحصیلی
                        </span>
                    </a>
                </li>
                @endisUniversity
                <!-- /Base Eduaction  -->

                <!-- Base Dormitory  -->
                @isUniversity
                <li>
                    <a href="{{ route('base.dormitory') }}">
                        <span class="sidebar-normal">
                             اطلاعات پایه خوابگاه
                        </span>
                    </a>
                </li>
                @endisUniversity
                <!-- /Base Dormitory  -->

                <!-- Base Parking  -->
             
                <li>
                    <a href= "{{ route('base.parking') }}">
                        <span class="sidebar-normal">
                             اطلاعات پایه پارکینگ
                        </span>
                    </a>
                </li>
               
                <!-- /Base Parking  -->
            </ul>
        </div>
    </li>
@endcan
@include('layouts.managementStrcture.menu-user')

