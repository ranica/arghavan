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
                <h3 class="card-title f-BYekan">
                    ثبت اطلاعات

                    <span class="pull-left">
                        <input type="submit" 
                                value="ذخیره" 
                                class="btn btn-fill btn-rose" 
                                @click.prevent="saveLevelRecord()">
                        <input type="button" 
                                value="انصراف" 
                                class="btn btn-fill btn-default" 
                                @click.prevent="registerCancel">
                    </span>
                </h3>

                <!-- Name field -->
                <div class="form-group label-floating mrg-top-2em" :class="{'has-error' : errors.has('name_level')}">
                    <label class="control-label">تیپ خودرو</label>
                    <input autofocus required class="form-control"
                        type="text"
                        name="name_level"
                        minlength="2"
                        maxlength="50"
                        v-model="tempRecord.name"
                        v-validate="{ required: true, is_not:'null' }"
                        data-vv-delay="250"
                        data-vv-as ="تیپ خودرو" />
                    <span class="material-input"></span>
                </div>
                <!-- /Name field -->

            </form>
        </div>
        <!-- /Card Content -->

    </div>
</div>
