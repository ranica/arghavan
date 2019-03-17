@can('menu_base')
    <!-- Base Info Menu -->
    <li>
        <a data-toggle="collapse" href="#baseInfoMenu">
            <i class="material-icons">image</i>
            <p>
            اطلاعات پایه
                <b class="caret"></b>
            </p>
        </a>

        <div class="collapse" id="baseInfoMenu">
            <ul class="nav">
                {{-- Melliat --}}
                @can('menu_base_melliat')
                    <li>
                        <a href="{{ url('/melliats') }}">
                            <span class="sidebar-normal">
                                ملیت
                            </span>
                        </a>
                    </li>
                @endcan
                {{-- /Melliat --}}

                {{-- Province --}}
                @can('menu_base_province')
                    <li>
                        <a href="{{ url('/provinces') }}">
                            <span class="sidebar-normal">
                                استان
                            </span>
                        </a>
                    </li>
                @endcan
                {{-- /Province --}}

                {{-- City --}}
                @can('menu_base_city')
                    <li>
                        <a href="{{ url('/cities') }}">
                            <span class="sidebar-normal">
                                شهرستان
                            </span>
                        </a>
                    </li>
                @endcan
                {{-- /City --}}

                {{-- Group --}}
                @can('menu_base_group')
                    <li>
                        <a href="{{ url('/groups') }}">
                            <span class="sidebar-normal">
                                گروه بندی
                            </span>
                        </a>
                    </li>
                @endcan
                {{-- /Group --}}

                {{-- CardType --}}
                @can('menu_base_cardtype')
                    <li>
                        <a href="{{ url('/cardtypes') }}">
                            <span class="sidebar-normal">
                                کارت
                            </span>
                        </a>
                    </li>
                @endcan
                {{-- /CardType --}}

                {{-- Contract --}}
                @can('menu_base_contract')
                    <li>
                        <a href="{{ url('/contracts') }}">
                            <span class="sidebar-normal">
                            قرارداد
                            </span>
                        </a>
                    </li>
                @endcan
                {{-- /Contract --}}

                 {{-- Contractor --}}
                @can('menu_base_contractor')
                    <li>
                        <a href="{{ url('/contractors') }}">
                            <span class="sidebar-normal">
                            پیمانکار
                            </span>
                        </a>
                    </li>
                @endcan
                {{-- /Contractor --}}

                {{-- Department --}}
                @can('menu_base_department')
                    <li>
                        <a href="{{ url('/departments') }}">
                            <span class="sidebar-normal">
                            ساختمان
                            </span>
                        </a>
                    </li>
                @endcan
                {{-- /Department --}}

                {{-- Department --}}
                @can('menu_base_kintype')
                    <li>
                        <a href="{{ url('/kintypes') }}">
                            <span class="sidebar-normal">
                                نسبت افراد
                            </span>
                        </a>
                    </li>
                @endcan
                {{-- /Department --}}
            </ul>
        </div>
    </li>
    <!-- Base Info Menu -->
@endcan
