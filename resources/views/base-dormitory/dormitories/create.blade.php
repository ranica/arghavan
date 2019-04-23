<div class="form-horizontal f-BYekan pad-all-1em pad-rem-top" id="registerForm">
    <div class="card">
        <!-- Card Header -->
        <div class="card-header card-header-icon" data-background-color="rose">
            <i class="material-icons">assignment</i>
        </div>
        <!-- /Card Header -->

        <!-- Card Content -->
        <div class="card-content f-BYekan">
            <form>
                <span class="card-title f-BYekan">
                    ثبت اطلاعات
                </span>


                <!-- building name field -->
                <div class="form-group label-floating"
                    :class="{'has-error' : errors.has('dormitory_building_id')}">
                    <label class="control-label">نام ساختمان</label>
                    <select class="form-control"
                        v-model="tempRecord.dormitory.building.id"
                        name="dormitory_building_id"
                        v-validate="{ required: true, is_not: 0}"
                        data-vv-as ="نام ساختمان ">

                        <option v-for="building in buildings"
                                :value="building.id">
                            @{{ building.name }}
                        </option>

                    </select>
                    <span class="material-input"></span>
                </div>
                <!-- /building name field -->

                <!-- term name field -->
                <div class="form-group label-floating"
                    :class="{'has-error' : errors.has('dormitory_term_id')}">
                    <label class="control-label">نیمسال تحصیلی</label>
                    <select class="form-control"
                        v-model="tempRecord.dormitory.term.id"
                        name="dormitory_term_id"
                        v-validate="{ required: true, is_not: 0}"
                        data-vv-as ="نیمسال تحصیلی">

                        <option v-for="term in terms"
                                :value="term.id">
                            @{{ term.name }}
                        </option>

                    </select>
                    <span class="material-input"></span>
                </div>
                <!-- /term name field -->

                <!-- degree name field -->
                <div class="form-group label-floating"
                    :class="{'has-error' : errors.has('dormitory_degree_id')}">
                    <label class="control-label">مقطع تحصیلی</label>
                    <select class="form-control"
                        v-model="tempRecord.dormitory.degree.id"
                        name="dormitory_degree_id"
                        v-validate="{ required: true, is_not: 0}"
                        data-vv-as ="مقطع تحصیلی">

                        <option v-for="degree in degrees"
                                :value="degree.id">
                            @{{ degree.name }}
                        </option>

                    </select>
                    <span class="material-input"></span>
                </div>
                <!-- /degree name field -->

                <!-- gate_plan name field -->
                <div class="form-group label-floating"
                    :class="{'has-error' : errors.has('dormitory_gate_plan_id')}">
                    <label class="control-label">برنامه تردد</label>
                    <select class="form-control"
                        v-model="tempRecord.dormitory.gate_plan.id"
                        name="dormitory_gate_plan_id"
                        v-validate="{ required: true, is_not: 0}"
                        data-vv-as ="برنامه تردد">

                        <option v-for="gate_plan in gate_plans"
                                :value="gate_plan.id">
                            @{{ gate_plan.name }}
                        </option>

                    </select>
                    <span class="material-input"></span>
                </div>
                <!-- /gate_plan name field -->

                <span class="pull-left">
                    <input type="submit"
                            value="ذخیره"
                            class="btn btn-fill btn-round btn-rose"
                            @click.prevent="saveDormitoryRecord">

                    <input type="button"
                            value="انصراف"
                            class="btn btn-fill btn-round btn-default"
                            @click.prevent="registerCancel">
                </span>

            </form>
        </div>
        <!-- /Card Content -->

    </div>
</div>
