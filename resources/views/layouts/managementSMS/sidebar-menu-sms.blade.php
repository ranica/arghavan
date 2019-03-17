@can('menu_sms')
    <li>
        <a data-toggle="collapse" href="#smsMenu">
                <i class="material-icons">message</i>
                <p>
                    سامانه پیامک
                    <b class="caret"></b>
                </p>
            </a>
            <div class="collapse" id="smsMenu">
                <ul class="nav">

                    {{-- SMS IR --}}
                    @can('menu_sms_manager')
                        <li>
                            <a href="{{ url('/sms') }}">
                                <span class="sidebar-normal">
                                     مدیریت پیامک
                                </span>
                            </a>
                        </li>
                    @endcan

                    @can('menu_sms_send')
                        <li>
                          <a href="{{ url('/sms') . '?send_sms=1' }}">
                                <span class="sidebar-normal">
                                     ارسال پیامک
                                </span>
                            </a>
                        </li>
                    @endcan
                    {{-- /SMS IR --}}
                </ul>
            </div>
    </li>
@endcan
