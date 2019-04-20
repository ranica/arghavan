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


                <!-- material Type field -->
                <div class="form-group label-floating"
                    :class="{'has-error' : errors.has('material_type_id')}">
                    <label class="control-label">دسته بندی</label>
                    <select class="form-control"
                        v-model="tempRecord.material_type.id"
                        name="material_type_id"
                        v-validate="{ required: true, is_not: 0}"
                        data-vv-as ="دسته بندی ">

                        <option v-for="material in materials"
                                :value="material.id">
                            @{{ material.name }}
                        </option>

                    </select>
                    <span class="material-input"></span>
                </div>
                <!-- /material type field -->

                <!--  number room field -->
                <div class="form-group label-floating mrg-top-2em"
                    :class="{'has-error' : errors.has('name')}">
                    <label class="control-label">نام تجهیزات</label>

                    <input autofocus
                        required
                        class="form-control"
                        type="text"
                        step="1"
                        min="0"
                        max="500"
                        name="name"
                        minlength="1"
                        maxlength="50"
                        v-model="tempRecord.name"
                        v-validate="{ required: true, is_not:'null' }"
                        data-vv-delay="250"
                        data-vv-as ="نام تجهیزات" />

                    <span class="material-input"></span>
                </div>
                <!-- /number room field -->

                 <!--  code field -->
                <div class="form-group label-floating mrg-top-2em"
                    :class="{'has-error' : errors.has('code')}">
                    <label class="control-label">کد اموال</label>

                    <input autofocus
                        required
                        class="form-control"
                        type="text"
                       
                        min="0"
                        max="500"
                        name="code"
                        minlength="1"
                        maxlength="50"
                        v-model="tempRecord.code"
                        v-validate="{ required: true, is_not:'null' }"
                        data-vv-delay="250"
                        data-vv-as ="کد اموال" />

                    <span class="material-input"></span>
                </div>
                <!-- /code field -->

              

                <span class="pull-left">
                    <input type="submit"
                            value="ذخیره"
                            class="btn btn-fill btn-round btn-rose"
                            @click.prevent="saveRoomRecord">

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
