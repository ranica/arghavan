  <!-- Educational Menu -->
    @can('menu_educational')
        <li>
            <a data-toggle="collapse" href="#educationalMenu">
                <i class="material-icons">assignment</i>
                <p>
                    اطلاعات تحصیلی
                    <b class="caret"></b>
                </p>
            </a>
            <div class="collapse" id="educationalMenu">
                <ul class="nav">

                    <!--  term  -->
                    @can('menu_educational_term')
                        <li>
                            <a href="{{ url('/terms') }}">
                                <span class="sidebar-normal">
                                    نیمسال تحصیلی
                                </span>
                            </a>
                        </li>
                    @endcan
                    <!--  /term  -->

                    {{-- University --}}
                    @can('menu_educational_university')
                        <li>
                            <a href="{{ url('/universities') }}">
                                <span class="sidebar-normal">
                                    دانشکده تحصیلی
                                </span>
                            </a>
                        </li>
                    @endcan
                    {{-- /University --}}

                    {{-- Field --}}
                    @can('menu_educational_field')
                        <li>
                            <a href="{{ url('/fields') }}">
                                <span class="sidebar-normal">
                                    رشته تحصیلی
                                </span>
                            </a>
                        </li>
                    @endcan
                    {{-- /Field --}}

                    {{-- Degree --}}
                    @can('menu_educational_degree')
                        <li>
                            <a href="{{ url('/degrees') }}">
                                <span class="sidebar-normal">
                                    مقطع تحصیلی
                                </span>
                            </a>
                        </li>
                    @endcan
                    {{-- /Degree --}}

                    {{-- Part --}}
                    @can('menu_educational_part')
                        <li>
                            <a href="{{ url('/parts') }}">
                                <span class="sidebar-normal">
                                    دوره تحصیلی
                                </span>
                            </a>
                        </li>
                    @endcan
                    {{-- /Part --}}

                    {{-- Situation --}}
                    @can('menu_educational_situation')
                        <li>
                            <a href="{{ url('/situations') }}">
                                <span class="sidebar-normal">
                                    وضعیت تحصیلی
                                </span>
                            </a>
                        </li>
                    @endcan
                    {{-- /Situation --}}

                </ul>
            </div>
        </li>
    @endcan
    <!-- /Educational Menu -->
