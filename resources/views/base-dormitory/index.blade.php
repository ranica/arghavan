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
                                    <a class="nav-link" data-toggle="tab" href="#material" role="tablist">
                                        <i class="fas fa-couch"></i>تعریف تجهیزات
                                    </a>
                                </li>
                            </ul>

                            <div class="tab-content tab-space tab-subcategories">
                                 <div class="tab-pane active" id="room">
                                    @include('base-dormitory.rooms.index')
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
                    genders_index: '{{ route('gategenders.index', '') }}',

                    rooms_index: '{{ route('rooms.index', '') }}',
                    rooms_store: '{{ route('rooms.store') }}',
                    rooms_update: '{{ route('rooms.update', '') }}',
                    rooms_delete: '{{ route('rooms.destroy', '') }}',

            }
        };
    </script>

    <script src="{{ mix('js/pages/base-dormitory/index.js') }}"
            type="text/javascript"
            charset="utf-8"
            defer>
    </script>


@endsection
