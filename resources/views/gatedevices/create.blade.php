<div class="form-horizontal f-BYekan pad-all-1em pad-rem-top"  id="registerForm">
	<div class="card">
		 {{-- Card Header --}}
        <div class="card-header card-header-icon" data-background-color="rose">
            <i class="material-icons">assignment</i>
        </div>
        {{-- /Card Header --}}

        {{-- Card Content --}}
		<div class="card-content f-BYekan">
			<h3 class="card-title f-BYekan">ثبت اطلاعات   </h3>

			<form>
				<div class="form-group label-floating" :class="{'has-error' : errors.has('name')}">
					<label class="control-label">نام دستگاه </label>
					<input class="form-control" type="text"  name="name" minlength="2" maxlength="50" autofocus required
						v-validate="'required|min:2|max:50'" data-vv-delay="250" v-model="tempRecord.name"/>
					<i v-show="errors.has('name')" class="fa fa-warning"></i>
                    <span v-show="errors.has('name')" class="help is-danger">نام دستگاه نامعتبر می باشد</span>
					<span class="material-input"></span>
				</div>

				<div class="form-group label-floating" :class="{'has-error' : errors.has('ip')}">
					<label class="control-label">دستگاه IP </label>
					<input class="form-control" type="text"  name="ip" minlength="2" maxlength="50" autofocus required
						v-validate="'required|min:2|max:50'" data-vv-delay="250" v-model="tempRecord.ip"/>
					<i v-show="errors.has('ip')" class="fa fa-warning"></i>
                    <span v-show="errors.has('ip')" class="help is-danger">آدرس IP نامعتبر می باشد</span>
					<span class="material-input"></span>
				</div>

				<div class="form-group label-floating"
                    :class="{'has-error' : errors.has('gategender_id')}">
					<label class="control-label">جنسیت تردد کننده</label>
					<select v-model="tempRecord.gategender.id"
                            class="form-control"
                            name="gategender_id"
                            required>
						<option v-for="gategender in gategenders" :value="gategender.id">
							<!-- :selected="tempRecord.gategender.id == gategender.id" -->
							@{{ gategender.gender }}
						</option>
					</select>
					<span class="material-input"></span>
				</div>

				<div class="form-group label-floating"
                    :class="{'has-error' : errors.has('gatepass_id')}">
					<label class="control-label">نحوه عبور از گیت</label>
					<select v-model="tempRecord.gatepass.id"
                            class="form-control"
                            name="gatepass_id"
                            required>
						<option v-for="gatepass in gatepasses" :value="gatepass.id">
							@{{ gatepass.name }}
						</option>
					</select>
					<span class="material-input"></span>
				</div>

				<div class="form-group label-floating"
                    :class="{'has-error' : errors.has('gatedirect_id')}">
					<label class="control-label">جهت تردد </label>
					<select v-model="tempRecord.gatedirect.id"
                            class="form-control"
                            name="gatedirect_id"
                            required>
						<option v-for="gatedirect in gatedirects" :value="gatedirect.id">
							@{{ gatedirect.name }}
						</option>
					</select>
					<span class="material-input"></span>
				</div>

				<div class="form-group label-floating"
                    :class="{'has-error' : errors.has('zone_id')}">
					<label class="control-label">ناحیه تردد</label>
					<select v-model="tempRecord.zone.id"
                            class="form-control"
                            name="zone_id"
                            required>
						<option v-for="zone in zones" :value="zone.id">
							@{{ zone.name }}
						</option>
					</select>
					<span class="material-input"></span>
				</div>

				<div class="form-group label-floating"
                    :class="{'has-error' : errors.has('timepass')}">
					<label class="control-label">زمان عبور از گیت </label>
					<input class="form-control"
                            type="text"
                            name="timepass"
                            minlength="1"
                            maxlength="50"
                            required
						    v-validate="'required|min:1|max:50'"
                            data-vv-delay="250"
                            v-model="tempRecord.timepass"
						/>
					<i v-show="errors.has('timepass')" class="fa fa-warning"></i>
                    <span v-show="errors.has('timepass')"
                            class="help is-danger">زمان عبور نامعتبر می باشد
                    </span>
					<span class="material-input"></span>
				</div>

				<div class="form-group label-floating"
                    :class="{'has-error' : errors.has('timeserver')}">
					<label class="control-label">زمان پاسخ سرور </label>
					<input class="form-control"
                            type="text"
                            name="timeserver"
                            minlength="1"
                            maxlength="50"
                            required
						    v-validate="'required|min:1|max:50'"
                            data-vv-delay="250"
                            v-model="tempRecord.timeserver"/>
					<i v-show="errors.has('timeserver')" class="fa fa-warning"></i>
                    <span v-show="errors.has('timeserver')" class="help is-danger">زمان پاسخ سرور نامعتبر می باشد</span>
					<span class="material-input"></span>
				</div>

				<div class = "input-group"
                    :class="{'has-error' :errors.has('state')}">
                    <div class="togglebutton">
                        <label>
                            <input class="form-check-input"
                                    checked=""
                                    type="checkbox"
                                    name="state"
                                    id="state"
                                    v-model="tempRecord.state">
                            فعال
                        </label>
                    </div>
                </div>

            </form>
            <div class="pull-left">
                <input type="submit"
                        value="ذخیره"
                        class="btn btn-fill btn-rose"
                        @click.prevent="saveRecord">
                <input type="button"
                        value="انصراف"
                        class="btn btn-fill btn-default"
                        @click.prevent="registerCancel">
            </div>
        </div>
        {{-- /Card Content --}}
	</div>
</div>
