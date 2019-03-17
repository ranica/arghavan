@extends('layouts.app')
@section('content')

<div class="content f-BYekan hidden" id="app">
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-12">
                <div class="card-content">

                    <!-- Title - -->
                    <h3 class="card-title">
                        <div>
                            <i class="material-icons"></i>
                            <span class="panel-heading">مراجعه کنندگان</span>


                        </div>
                    </h3>
                    <!--  /Title  -->

                    <div class="row">
                        <!-- Data list  -->
                        <div v-show="isNormalMode">
                            <div class="text-left">

                            </div>

                            <div class="row"></div>

                            <referral-widget class="col-md-3"
											 :referral-data="{ name: '{{ \App\Referral::$C_REFERRAL_PART_ONE }}',
                                                               count: 10,
                                                               searchMode: true,
                                                            }"
											 v-on:search-data="searchRecord" >
                            </referral-widget>

                             <referral-widget class="col-md-3"
											 :referral-data="{ name: '{{ \App\Referral::$C_REFERRAL_PART_TWO }}',
                                                                count: 20,
                                                                saveMode: true,
                                                                searchMode: true,
                                                                editMode: true
                                                            }"
											{{--  v-on:save-data="saveRecord"
                                             v-on:edit-data= "editRecord" --}}
                                             v-on:search-data= "searchRecord">
                            </referral-widget>
						</div>

                        {{-- Show Form --}}
                        <div v-if="isShowMode">
                            @include('referrals.show')
                        </div>
                        {{-- /Show Form --}}

                        <div class="card">
                             {{-- Register Form --}}
                            <div v-if="isRegisterMode">
                                @include('referrals.create')
                            </div>
                            {{-- /Register Form --}}
                        </div>

                        <!-- small modal -->
                        <div class="modal fade" id="removeRecordModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                                            @click.prevent="deleteRecord">بله</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--    end small modal -->

					</div>
                </div>
			</div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript" src="{{ mix('js/pages/referrals/index.js') }}"></script>
@endsection
