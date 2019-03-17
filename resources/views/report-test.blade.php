@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ mix('css/pages/chart.css') }}">


<div class="row" id="app">

    <h3>
        <div class="panel-heading">داشبورد من</div>
    </h3>

<div class="container">
  <h1>I'm a dev, and these are my skills</h1>
  <div class="chart" data-percent="95">HTML</div>
  <div class="chart" data-percent="95">SCSS</div>
  <div class="chart" data-percent="70">jQuery</div>
  <div class="chart" data-percent="90">WP</div>
  <div class="chart" data-percent="110"> Making Tea</div>
</div>


@endsection

@section('scripts')

<script>

    $('.chart').easyPieChart({
      scaleColor: false,
      lineWidth: 10,
      lineCap: 'round',
      barColor: '#333',
      size: 150,
      animate: 500
    });
</script>

@endsection

