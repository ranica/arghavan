@extends('layouts.app')

@section('content')

{{-- <link rel="stylesheet" type="text/css" href="{{ mix('css/pages/base.css') }}"> --}}

<div class="content f-BYekan hidden" id="app">
  <div class="container-fluid">

    <div class="row">
      <div class="col-md-12 col-sm-12">

        <div class="row">
            <div class="col-md-12 ml-auto mr-auto">

              <div class="page-categories">
                <h3 class="title text-center">اطلاعات پایه ساختار سازمانی </h3>
                <br/>
                <ul class="nav nav-pills nav-pills-warning nav-pills-icons justify-content-center" role="tablist">
                    <li class="nav-item tabStyle active">
                        <a class="nav-link" data-toggle="tab" href="#group" role="tablist">
                            <i class="material-icons">group</i> تعریف گروه بندی
                        </a>
                    </li>
                    <li class="nav-item tabStyle">
                        <a class="nav-link" data-toggle="tab" href="#cardtype" role="tablist">
                            <i class="material-icons">card_membership</i> تعریف انواع کارت
                        </a>
                    </li>
                    <li class="nav-item tabStyle">
                        <a class="nav-link" data-toggle="tab" href="#contractor" role="tablist">
                            <i class="fas fa-user-tie"></i>تعریف پیمانکار
                        </a>
                    </li>
                    <li class="nav-item tabStyle">
                        <a class="nav-link" data-toggle="tab" href="#contract" role="tablist">
                            <i class="fa fa-handshake fa-2x"></i>تعریف انواع قرارداد
                        </a>
                    </li>
                    <li class="nav-item tabStyle">
                        <a class="nav-link" data-toggle="tab" href="#department" role="tablist">
                            <i class="material-icons">business</i> تعریف ساختمان
                        </a>
                    </li>
                    <li class="nav-item tabStyle">
                        <a class="nav-link" data-toggle="tab" href="#kin_type" role="tablist">
                            <i class="material-icons">people_outline</i> تعریف نسبت افراد
                        </a>
                    </li>
                    <li class="nav-item tabStyle">
                        <a class="nav-link" data-toggle="tab" href="#melliat" role="tablist">
                            <i class="fas fa-globe-asia"></i> تعریف ملیت
                        </a>
                    </li>
                    <li class="nav-item tabStyle ">
                        <a class="nav-link" data-toggle="tab" href="#province" role="tablist">
                            <i class="material-icons">location_city</i>تعریف استان
                        </a>
                    </li>
                    <li class="nav-item tabStyle">
                        <a class="nav-link" data-toggle="tab" href="#city" role="tablist">
                            <i class="material-icons">my_location</i> تعریف شهرستان
                        </a>
                    </li>
                </ul>
                <div class="tab-content tab-space tab-subcategories">

                    <div class="tab-pane active" id="group">
                        @include('base-structure.groups.index')
                    </div>

                    <div class="tab-pane" id="cardtype">
                        @include('base-structure.card_types.index')
                    </div>

                    <div class="tab-pane" id="contractor">
                        @include('base-structure.contractors.index')
                    </div>

                    <div class="tab-pane" id="contract">
                        @include('base-structure.contracts.index')
                    </div>

                    <div class="tab-pane" id="department">
                        @include('base-structure.departments.index')
                    </div>

                    <div class="tab-pane" id="kin_type">
                        @include('base-structure.kin_types.index')
                    </div>

                    <div class="tab-pane" id="melliat">
                        @include('base-structure.melliats.index')
                    </div>

                    <div class="tab-pane" id="province">
                        @include('base-structure.provinces.index')
                    </div>

                    <div class="tab-pane" id="city">
                        @include('base-structure.cities.index')
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
        document.pageData.base_structure = {
            pageUrls: {
                melliats_index: '{{ route('melliats.index', '') }}',
                melliats_store: '{{ route('melliats.store') }}',
                melliats_update: '{{ route('melliats.update', '') }}',
                melliats_delete: '{{ route('melliats.destroy', '') }}',

                groups_index: '{{ route('groups.index', '') }}',
                groups_store: '{{ route('groups.store') }}',
                groups_update: '{{ route('groups.update', '') }}',
                groups_delete: '{{ route('groups.destroy', '') }}',

                card_types_index: '{{ route('cardtypes.index', '') }}',
                card_types_store: '{{ route('cardtypes.store') }}',
                card_types_update: '{{ route('cardtypes.update', '') }}',
                card_types_delete: '{{ route('cardtypes.destroy', '') }}',

               contractors_index: '{{ route('contractors.index', '') }}',
               contractors_store: '{{ route('contractors.store') }}',
               contractors_update: '{{ route('contractors.update', '') }}',
               contractors_delete: '{{ route('contractors.destroy', '') }}',

               contracts_index: '{{ route('contracts.index', '') }}',
               contracts_store: '{{ route('contracts.store') }}',
               contracts_update: '{{ route('contracts.update', '') }}',
               contracts_delete: '{{ route('contracts.destroy', '') }}',

               departments_index: '{{ route('departments.index', '') }}',
               departments_store: '{{ route('departments.store') }}',
               departments_update: '{{ route('departments.update', '') }}',
               departments_delete: '{{ route('departments.destroy', '') }}',

               kin_types_index: '{{ route('kintypes.index', '') }}',
               kin_types_store: '{{ route('kintypes.store') }}',
               kin_types_update: '{{ route('kintypes.update', '') }}',
               kin_types_delete: '{{ route('kintypes.destroy', '') }}',

               provinces_index: '{{ route('provinces.index', '') }}',
               provinces_all_index: '{{ route('provinces.allProvince', '') }}',
               provinces_store: '{{ route('provinces.store') }}',
               provinces_update: '{{ route('provinces.update', '') }}',
               provinces_delete: '{{ route('provinces.destroy', '') }}',

               cities_index: '{{ route('cities.index', '') }}',
               cities_store: '{{ route('cities.store') }}',
               cities_update: '{{ route('cities.update', '') }}',
               cities_delete: '{{ route('cities.destroy', '') }}',
            }
        };
    </script>

    <script src="{{ mix('js/pages/base-structure/index.js') }}" type="text/javascript" charset="utf-8" defer></script>
@endsection
