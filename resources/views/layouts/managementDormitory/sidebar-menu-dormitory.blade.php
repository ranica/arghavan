
        {{-- @can('') --}}
            <li>
                <a data-toggle="collapse" href="#dormitoryMenu">
                    <i class="fas fa-bed"></i>
                    <p>
                        مدیریت خوابگاه
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="dormitoryMenu">
                    <ul class="nav">

                        {{-- management dormitory --}}
                        {{-- @can('') --}}
                            <li>
                                <a href="{{ url('/buildingInformations') }}">
                                    <span class="sidebar-normal">
                                        تعریف خوابگاه
                                    </span>
                                </a>
                            </li>

                             <li>
                                <a href="#">
                                    <span class="sidebar-normal">
                                        مدیریت خوابگاه
                                    </span>
                                </a>
                            </li>
                        {{-- @endcan --}}
                        {{-- / management dormitory--}}
                    </ul>
                </div>
            </li>
        {{-- @endcan --}}
