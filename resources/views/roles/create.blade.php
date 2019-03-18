<div class="form-horizontal f-BYekan pad-all-1em pad-rem-top"  id="registerForm">
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

				<div class="form-group label-floating mrg-top-2em" :class="{'has-error' : errors.has('name')}">
					<label class="control-label"> نام نقش</label>
					<input class="form-control" type="text"  name="name"
                        minlength="2" maxlength="50" autofocus required
						v-validate="'required|min:2|max:50'"
                        data-vv-delay="250"
                        data-vv-name="نام نقش"
                        v-model="tempRecord.name"
						/>
					<i v-show="errors.has('name')" class="fa fa-warning"></i>
                    <span v-show="errors.has('name')" class="help is-danger">نام نقش نامعتبر می باشد</span>
					<span class="material-input"></span>
				</div>

				<div class="form-group label-floating mrg-top-2em" :class="{'has-error' : errors.has('description')}">
					<label class="control-label"> شرح نقش</label>
					<input class="form-control" type="text"  name="description"
                        minlength="2" maxlength="50" autofocus required
						v-validate="'required|min:2|max:50'"
                        data-vv-delay="250"
                        data-vv-name="رح نقش"
                        v-model="tempRecord.description"
						/>
					<i v-show="errors.has('description')" class="fa fa-warning"></i>
                    <span v-show="errors.has('description')" class="help is-danger">شرح نقش نامعتبر می باشد</span>
					<span class="material-input"></span>
				</div>

				<div class = "input-group" :class="{'has-error' :errors.has('state')}">
                    <div class="togglebutton">
                        <label>
                            <input class="form-check-input" checked="" type="checkbox"
                            name="state" id="state" v-model="tempRecord.state">
                            فعال
                        </label>
                    </div>
                </div>
            </form>
        </div>
        {{-- /Card Content --}}
	</div>
</div>