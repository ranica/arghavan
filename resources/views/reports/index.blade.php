@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ mix('css/pages/base.css') }}">

<div class="content f-BYekan hidden" id ="app">
    <div class="container-fluid">

         <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-content">
                       @include('reports.traffic.index')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
  document.pageData.report = {
    urls: {
        baseInformation: '{{ route('base.all_Information') }}',
        export_data: '{{ route('export.report.excel', ['', '']) }}'
    }
  };
</script>
<script type="text/javascript" src="{{ mix('js/pages/reports/index.js') }}"></script>
@endsection
