@extends('layouts.app')

@section('content')

<div class="content f-BYekan hidden" id="app">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="row">
                    <div class="col-md-12 ml-auto mr-auto">

                        <div class="page-categories">
                            <h3 class="title text-center">اطلاعات پایه خوابگاه </h3>
                            <ul class="nav nav-pills nav-pills-warning nav-pills-icons justify-content-center" role="tablist">
                                <li class="nav-item tabStyle active">
                                    <a class="nav-link" data-toggle="tab" href="#room" role="tablist">
                                        <i class="fas fa-door-open"></i>تعریف اتاق
                                    </a>
                                </li>

                                <li class="nav-item tabStyle">
                                    <a class="nav-link" data-toggle="tab" href="#material_type" role="tablist">
                                        <i class="fas fa-couch"></i>تعریف انواع تجهیزات
                                    </a>
                                </li>

                                <li class="nav-item tabStyle">
                                    <a class="nav-link" data-toggle="tab" href="#material" role="tablist">
                                        <i class="fas fa-couch"></i>تعریف تجهیزات
                                    </a>
                                </li>
                            </ul>

                            <div class="tab-content tab-space tab-subcategories">
                                 <div class="tab-pane active" id="room">
                                    @include('base-dormitory.rooms.index')
                                </div>

                                <div class="tab-pane" id="material_type">
                                    @include('base-dormitory.material_types.index')
                                </div>

                                <div class="tab-pane" id="material">
                                    @include('base-dormitory.materials.index')
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
        document.pageData.base_dormitory = {
            pageUrls: {
                    buildings_index: '{{ route('buildings.index', '') }}',
                    genders_index: '{{ route('genders.index', '') }}',

                    rooms_index: '{{ route('rooms.index', '') }}',
                    rooms_store: '{{ route('rooms.store') }}',
                    rooms_update: '{{ route('rooms.update', '') }}',
                    rooms_delete: '{{ route('rooms.destroy', '') }}',

                    material_types_index: '{{ route('materialTypes.index', '') }}',
                    material_types_store: '{{ route('materialTypes.store') }}',
                    material_types_update: '{{ route('materialTypes.update', '') }}',
                    material_types_delete: '{{ route('materialTypes.destroy', '') }}',
                    material_types_all_index: '{{ route('materialTypes.allMaterialType', '') }}',

                    materials_index: '{{ route('materials.index', '') }}',
                    materials_store: '{{ route('materials.store') }}',
                    materials_update: '{{ route('materials.update', '') }}',
                    materials_delete: '{{ route('materials.destroy', '') }}',

            }
        };
    </script>

    <script src="{{ mix('js/pages/base-dormitory/index.js') }}"
            type="text/javascript"
            charset="utf-8"
            defer>
    </script>
@endsection
