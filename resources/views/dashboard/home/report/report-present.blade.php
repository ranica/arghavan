                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h5 class="modal-title" id="myModalLabel">اطلاعات والدین</h5>
                            <button type="button"
                                    class="close"
                                    data-dismiss="modal"
                                    aria-hidden="true">
                                <i class="material-icons">close</i>
                            </button>
                        </div>
                        <!-- /Modal Header -->

                        <!-- Modal Body -->
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <!-- Data list -->
                                        <div v-show="isNormalMode">

                                            <!-- List Data Table -->
                                            <div class="table-responsive col-md-12">
                                                <table id="myTable" class="table table-striped table-hover">
                                                    <thead v-show="!isLoading">
                                                        <td>نسبت</td>
                                                      <!--   <td>نام</td>
                                                        <td>نام خانوادگی</td>
                                                        <td>تلفن ثابت</td>
                                                        <td>موبایل</td>
                                                        <td></td> -->
                                                    </thead>

                                                    <tbody>
                                                        <tr v-if="isLoading">
                                                            <td colspan="2" class="text-center">در حال بارگذاری اطلاعات</td>
                                                        </tr>

                                                        <tr v-for="record in records">
                                                            <td>@{{ record.name }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- /List Data Table -->
                                        </div>
                                        <!-- /Data List -->

                                        <!-- small modal -->
                                        <div class="modal fade"
                                            id="PresentReportModal"
                                            tabindex="-2"
                                            role="dialog"
                                            aria-labelledby="myModalLabel"
                                            aria-hidden="true">

                                            <div class="modal-dialog modal-small ">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button"
                                                                class="close"
                                                                data-dismiss="modal"
                                                                aria-hidden="true">
                                                            <i class="material-icons">clear</i>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body text-center">
                                                        <h5>برای حذف اطمینان دارید؟ </h5>
                                                    </div>
                                                    <div class="modal-footer text-center">
                                                        <button type="button"
                                                                class="btn btn-simple"
                                                                data-dismiss="modal">خیر
                                                        </button>
                                                        <button type="button"
                                                                class="btn btn-success btn-simple"
                                                                data-dismiss="modal"
                                                                @click.prevent="deleteParentRecord">بله
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--    end small modal -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Modal Body -->

                        <!-- Modal Footer -->
                        <div class="modal-footer justify-content-center">
                          <!--   @can('command_insert')
                                <span class="pull-left" v-show="isNormalMode">
                                    <button type="button"
                                            class="btn btn-info btn-round"
                                            @click.prevent="newParentRecord">ثبت رکورد جدید
                                    </button>
                                    <button type="button"
                                            class="btn btn-info btn-round"
                                            @click.prevent="registerParentCancel"
                                            data-dismiss="modal">انصراف
                                    </button>
                                </span>
                            @endcan -->
                        </div>
                        <!-- /Modal Footer -->


