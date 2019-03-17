@extends('layouts.app')

@section('content')

<!-- <link rel="stylesheet" type="text/css" href="{{ mix('css/pages/base.css') }}"> -->

<div class="content f-BYekan hidden" id="app">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12 col-sm-12">
        <div class="card">
          <div class="card-body ">
            <div class="row">
              <div class="col-md-12 ml-auto mr-auto">

              <div class="page-categories">
                <h3 class="title text-center">اطلاعات پایه خودرو</h3>
                <br />
                <ul class="nav nav-pills nav-pills-warning nav-pills-icons justify-content-center" role="tablist">
                    <li class="nav-item tabStyle active">
                        <a class="nav-link" data-toggle="tab" href="#carColor" role="tablist">
                            <i class="material-icons">dashboard</i> رنگ خودرو
                        </a>
                    </li>

                     <li class="nav-item tabStyle">
                        <a class="nav-link" data-toggle="tab" href="#carFuel" role="tablist">
                            <i class="material-icons">schedule</i> سوخت خودرو
                        </a>
                    </li>

                    <li class="nav-item tabStyle">
                        <a class="nav-link" data-toggle="tab" href="#carLevel" role="tablist">
                            <i class="material-icons">schedule</i> تیپ خودرو
                        </a>
                    </li>

                    <li class="nav-item tabStyle">
                        <a class="nav-link" data-toggle="tab" href="#carModel" role="tablist">
                            <i class="material-icons">schedule</i> مدل خودرو
                        </a>
                    </li>

                    <li class="nav-item tabStyle">
                        <a class="nav-link" data-toggle="tab" href="#carSystem" role="tablist">
                            <i class="material-icons">schedule</i> سیستم خودرو
                        </a>
                    </li>

                    <li class="nav-item tabStyle">
                        <a class="nav-link" data-toggle="tab" href="#carType" role="tablist">
                            <i class="material-icons">schedule</i> نوع خودرو
                        </a>
                    </li>

                    <li class="nav-item tabStyle">
                        <a class="nav-link" data-toggle="tab" href="#carPlateType" role="tablist">
                            <i class="material-icons">schedule</i> نوع پلاک خودرو
                        </a>
                    </li>

                     <li class="nav-item tabStyle">
                        <a class="nav-link" data-toggle="tab" href="#carSite" role="tablist">
                            <i class="material-icons">schedule</i> پارکینگ
                        </a>
                    </li>
                </ul>
                <div class="tab-content tab-space tab-subcategories">
                   <div class="tab-pane active" id="carColor">
                        @include('cars.color.index')
                    </div>

                    <div class="tab-pane" id="carFuel">
                        @include('cars.fuel.index')
                    </div>

                    <div class="tab-pane" id="carLevel">
                        @include('cars.level.index')
                    </div>

                    <div class="tab-pane" id="carModel">
                        @include('cars.model.index')
                    </div>

                    <div class="tab-pane" id="carSystem">
                        @include('cars.system.index')
                    </div>

                    <div class="tab-pane" id="carType">
                        @include('cars.type.index')
                    </div>

                    <div class="tab-pane" id="carPlateType">
                        @include('cars.plate_type.index')
                    </div>

                    <div class="tab-pane" id="carSite">
                        @include('cars.site.index')
                    </div>
                </div>
              </div>
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('scripts')

    <script type="text/javascript">
        document.pageData.carBase = {
            pageUrls: {
                carColors_index: '{{ route('carColors.index', '') }}',
                carColors_store: '{{ route('carColors.store') }}',
                carColors_update: '{{ route('carColors.update', '') }}',
                carColors_delete: '{{ route('carColors.destroy', '') }}',

                carFuels_index: '{{ route('carFuels.index', '') }}',
                carFuels_store: '{{ route('carFuels.store') }}',
                carFuels_update: '{{ route('carFuels.update', '') }}',
                carFuels_delete: '{{ route('carFuels.destroy', '') }}',

                carLevels_index: '{{ route('carLevels.index', '') }}',
                carLevels_store: '{{ route('carLevels.store') }}',
                carLevels_update: '{{ route('carLevels.update', '') }}',
                carLevels_delete: '{{ route('carLevels.destroy', '') }}',

                carModels_index: '{{ route('carModels.index', '') }}',
                carModels_store: '{{ route('carModels.store') }}',
                carModels_update: '{{ route('carModels.update', '') }}',
                carModels_delete: '{{ route('carModels.destroy', '') }}',

                carSystems_index: '{{ route('carSystems.index', '') }}',
                carSystems_store: '{{ route('carSystems.store') }}',
                carSystems_update: '{{ route('carSystems.update', '') }}',
                carSystems_delete: '{{ route('carSystems.destroy', '') }}',

                carTypes_index: '{{ route('carTypes.index', '') }}',
                carTypes_store: '{{ route('carTypes.store') }}',
                carTypes_update: '{{ route('carTypes.update', '') }}',
                carTypes_delete: '{{ route('carTypes.destroy', '') }}',

                carPlateTypes_index: '{{ route('carPlateTypes.index', '') }}',
                carPlateTypes_store: '{{ route('carPlateTypes.store') }}',
                carPlateTypes_update: '{{ route('carPlateTypes.update', '') }}',
                carPlateTypes_delete: '{{ route('carPlateTypes.destroy', '') }}',

                carSites_index: '{{ route('carSites.index', '') }}',
                carSites_store: '{{ route('carSites.store') }}',
                carSites_update: '{{ route('carSites.update', '') }}',
                carSites_delete: '{{ route('carSites.destroy', '') }}',
            }
        };
    </script>

    <script src="{{ mix('js/pages/cars/index.js') }}" type="text/javascript" charset="utf-8" defer></script>

@endsection
