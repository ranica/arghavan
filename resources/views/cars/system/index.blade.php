 <div class="card">
    <div class="card-content">

        <h3 class="card-title">
            <div>
                <!-- <i class="material-icons md-48">public</i> -->
                <i class="fas fa-palet fa-2x"></i>
                <span class="panel-heading">سیستم خودرو</span>

                @can('command_insert')
                    <span class="pull-left" v-show="isNormalMode">
                        <a class="btn btn-rose" href="#" @click.prevent="newRecord">
                            <span class="glyphicon glyphicon-plus"></span>
                            ثبت رکورد جدید
                        </a>
                    </span>
                @endcan
            </div>
        </h3>
        <div class="row"></div>

        <div class="row">
            {{-- Data list --}}
            <div v-show="isNormalMode">

                <div v-if="! hasSystemRows">
                    <h4 class="text-center f-BYekan">
                        رکوردی ثبت نشده است
                    </h4>
                </div>

                <div v-for="record in car_systems">
                    <div class="col-lg-2">
                        <div class="card">
                            <div class="card-header card-header-icon card-header-rose">
                            </div>

                            <div class="card-body">
                                <div class="row"></div>
                                <div class="row text-center">
                                    @{{ record.name }}
                                </div>
                                <div class="row text-center">
                                    @can('command_edit')
                                        <a href="#" class="btn btn-simple btn-info btn-just-icon pull-center" @click.prevent="editRecord(record)">
                                            <i class="material-icons">create</i>
                                            <div class="ripple-container"></div>
                                        </a>
                                    @endcan

                                    @can('command_delete')
                                        <a href="#" class="btn btn-simple btn-danger btn-just-icon pull-center"
                                            data-toggle="modal" data-target="#removeRecordModal_system"
                                            @click.prevent="readyToDelete(record)">

                                            <i class="material-icons">clear</i>
                                            <div class="ripple-container"></div>
                                        </a>
                                    @endcan
                                </div>
                             </div>
                        </div>
                    </div>
                </div>

                <div class="row"></div>
                <div class="text-center">
                    <pagination :data="car_systems_paginate"
                                v-on:pagination-change-page="loadCarSystems"
                                :limit="{{ \App\Http\Controllers\Controller::C_PAGINATION_LIMIT }}"
                                :show-disable= "true">
                    </pagination>
                </div>
            </div>
            {{-- /Data List --}}

            {{-- Register Form --}}
            <div v-if="isRegisterMode">
                @include('cars.system.create')
            </div>
            {{-- /Register Form --}}

            <!-- small modal -->
            <div class="modal fade" id="removeRecordModal_system" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel" aria-hidden="true">

                <div class="modal-dialog modal-small ">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close"
                                data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
                        </div>
                        <div class="modal-body text-center">
                            <h5>برای حذف اطمینان دارید؟ </h5>
                        </div>
                        <div class="modal-footer text-center">
                            <button type="button" class="btn btn-simple" data-dismiss="modal">خیر</button>
                            <button type="button" class="btn btn-success btn-simple"  data-dismiss="modal"
                                @click.prevent="deleteRecord('carSystems')">بله</button>
                        </div>
                    </div>
                </div>
            </div>
            <!--    end small modal -->
        </div>
    </div>
</div>
