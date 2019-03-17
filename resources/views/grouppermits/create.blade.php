<div class="form-horizontal f-BYekan pad-all-1em pad-rem-top" id="registerForm">
    <div class="card">
        {{-- Card Header --}}
        <div class="card-header card-header-icon" data-background-color="rose">
            <i class="material-icons">assignment</i>
        </div>
        {{-- /Card Header --}}

        {{-- Card Content --}}
        <div class="card-content f-BYekan">
            <form>
                <h3 class="card-title f-BYekan">
                    ثبت اطلاعات

                    <span class="pull-left">
                        <input type="submit" value="ذخیره" class="btn btn-fill btn-rose" @click.prevent="saveRecord">
                        <input type="button" value="انصراف" class="btn btn-fill btn-default" @click.prevent="registerCancel">
                    </span>
                </h3>

                {{-- Name field --}}
                <div class="form-group label-floating mrg-top-2em" :class="{'has-error' : errors.has('name')}">
                    <label class="control-label">نام گروه</label>
                    <input autofocus required class="form-control" type="text" name="name" minlength="2" maxlength="50"
                        v-model="tempRecord.name" v-validate="'required|min:2|max:50'" data-vv-delay="250" />

                    <i v-show="errors.has('name')" class="fa fa-warning"></i>
                    <span v-show="errors.has('name')" class="help is-danger">نام گروه نامعتبر می باشد</span>
                    <span class="material-input"></span>
                </div>
                {{-- /Name field --}}

                {{-- Description field --}}
                <div class="form-group label-floating mrg-top-2em" :class="{'has-error' : errors.has('description')}">
                    <label class="control-label">توضیحات</label>
                    <input autofocus required class="form-control" type="text" name="description" minlength="2" maxlength="50"
                        v-model="tempRecord.description" v-validate="'required|min:2|max:50'" data-vv-delay="250" />

                    <i v-show="errors.has('description')" class="fa fa-warning"></i>
                    <span v-show="errors.has('description')" class="help is-danger">توضیحات نامعتبر می باشد</span>
                    <span class="material-input"></span>
                </div>
                {{-- Description field --}}

            </form>
        </div>
        {{-- /Card Content --}}

    </div>
</div>
