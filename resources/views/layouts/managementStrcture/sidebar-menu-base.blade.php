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

                {{-- @include('layouts.managementStrcture.menu-base') --}}
                {{-- @include('layouts.managementStrcture.menu-educational') --}}
                {{-- @include('layouts.managementStrcture.menu-user') --}}

            </ul>
        </div>
    </li>
@endcan
@include('layouts.managementStrcture.menu-user')

