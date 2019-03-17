@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ mix('css/pages/home.css') }}">

<div class="row" id="app">
    <h3>
        <div class="panel-heading">داشبورد من</div>
    </h3>

    @include('dashboard.home.index')
@endsection

@section('scripts')
<script>
    document.pageData.home = {
        count_daily_traffic_url: '{{ route('report.count.traffic.daily') }}',
        count_active_gatedevice_url: '{{ route('report.count.gatedevice.active') }}',
        count_posted_sms_url: '{{ route('report.count.posted.sms') }}',
        count_referral_data_url: '{{ route('report.count.referral.data') }}',
        daily_traffic_url: '{{ route('report.traffic.daily') }}',
        weekly_traffic_url: '{{ route('report.traffic.weekly') }}',
        monthly_traffic_url: '{{ route('report.traffic.monthly') }}',
    };
</script>

<script src="{{ mix('js/pages/dashboard/home/index.js') }}"></script>
@endsection
