<div class="form-horizontal f-BYekan pad-all-1em pad-rem-top"  id="registerForm">
	<div class = "card">
		 {{-- Card Header --}}
        <div class="card-header card-header-icon" data-background-color="rose">
            <i class="material-icons">assignment</i>
        </div>
        {{-- /Card Header --}}

        {{-- Card Content --}}
		<div class="card-content f-BYekan">
			<h3 class="card-title f-BYekan">ثبت اطلاعات
				<div class="pull-left">
                    <input type="submit" value="ذخیره" class="btn btn-fill btn-rose" @click.prevent="saveRecord">
                    <input type="button" value="انصراف" class="btn btn-fill btn-default" @click.prevent="registerCancel">
                </div>
            </h3>

			<div class="col-md-12">
				<form>
					<div class="row">
						<div class="form-group label-floating" :class="{'has-error' : errors.has('startDate')}">
							<persian-calendar v-model="tempRecord.startDate" format="jYYYY/jMM/jDD" color=" #ec407a" placeholder= "تاریخ ورود"></persian-calendar>
						</div>
					</div>

					{{-- end date field --}}
					<div class="row">
						<div class="form-group label-floating" :class="{'has-error' : errors.has('endDate')}">
							<persian-calendar  class="persian-calendar" v-model="tempRecord.endDate" format="jYYYY/jMM/jDD" color=" #ec407a" placeholder= "تاریخ خروج"></persian-calendar>
							<span class="material-input"></span>
						</div>
					</div>
					{{-- /end date field --}}


					{{-- Start date field --}}
					<div class="row">
						<div class="input-group">
	                        <span class="input-group-addon">
	                            <i class="fa fa-info-circle fa-lg"></i>
	                        </span>
	                        <div class="form-group label-floating">
	                            <label class="control-label">شماره پورت</label>
	                            <input name="port" type="text" class="form-control" minlength="2" maxlength="50" autofocus
	                                required v-validate="'required|min:2|max:50'" data-vv-delay="250" data-vv-name="شماره پورت"
	                                v-model="tempRecord.port">
	                            <i v-show="errors.has('port')" class="fa fa-warning"></i>
	                            <span v-show="errors.has('port')" class="help is-danger">شماره پورت نامعتبر می باشد</span>
	                        </div>
	                    </div>
	                </div>
					{{-- /Start date field --}}

					{{-- Gate zone female field --}}
					<div class="row">
						<div class="input-group">
	                        <span class="input-group-addon">
	                            <i class="fa fa-female fa-lg"></i>
	                        </span>
							<div class="form-group label-floating"  :class="{'has-error' : errors.has('genzonew_id')}">
								<label class="control-label">نحوه تردد خواهران</label>
								<select v-model="tempRecord.gatezonew.id" class="form-control" name="genzonew_id" required>
									<option v-for="gatezone in gatezones" :value="gatezone.id"
										:selected="tempRecord.genzonew_id == gatezone.id">
										@{{ gatezone.name }}
									</option>
								</select>
								<span class="material-input"></span>
							</div>
						</div>
					</div>
					{{-- /Gate zone female field --}}


					{{-- Gate zone male field --}}
					<div class="row">
						<div class="input-group">
	                        <span class="input-group-addon">
	                            <i class="fa fa-male fa-lg"></i>
	                        </span>
							<div class="form-group label-floating"  :class="{'has-error' : errors.has('genzonem_id')}">
								<label class="control-label">نحوه تردد برادران</label>
								<select v-model="tempRecord.gatezonem.id" class="form-control" name="genzonem_id" required>
									<option v-for="item in gatezones" :value="item.id"
										:selected="tempRecord.genzonem_id == item.id">
										@{{ item.name }}
									</option>
								</select>
								<span class="material-input"></span>
							</div>
						</div>
					</div>
					{{-- /Gate zone male field --}}

					{{-- Emergence field --}}
					<div class="row">
						<div class = "input-group" :class="{'has-error' :errors.has('emergency')}">
		                    <div class="togglebutton">
		                        <label>
		                            <input class="form-check-input" checked="" type="checkbox" name="emergency" id="emergency"
		                            v-model="tempRecord.emergency">
		                            وضعیت اضطراری فعال شود
		                        </label>
		                    </div>
		                </div>
	                </div>
					{{-- /Emergence field --}}

	            </form>
	        </div>
        </div>
        {{-- /Card Content --}}
	</div>
</div>
