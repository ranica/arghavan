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
                    :class="{'has-error' : errors.has('building_id')}">
                    <label class="control-label">نام ساختمان</label>
                    <select class="form-control"
                        v-model="tempRecord.building.id"
                        name="building_id"
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

                 <!-- gender name field -->
                <div class="form-group label-floating"
                    :class="{'has-error' : errors.has('gender_id')}">
                    <label class="control-label">جنسیت ساختمان</label>
                    
                    <select class="form-control"
                        v-model="tempRecord.gender.id"
                        name="gender_id"
                        v-validate="{ required: true, is_not: 0}"
                        data-vv-as ="جنسیت ساختمان ">
                        
                        <option v-for="gender in genders"
                                :value="gender.id">
                            @{{ gender.name }}
                        </option>

                    </select>
                    <span class="material-input"></span>
                </div>
                <!-- /gender name field -->

                 <!--  number room field -->
                <div class="form-group label-floating mrg-top-2em"
                    :class="{'has-error' : errors.has('number_room')}">
                    <label class="control-label">شماره اتاق</label>
                    
                    <input autofocus 
                        required 
                        class="form-control"
                        type="number"  
                        step="1" 
                        min="0" 
                        max="500"
                        name="number_room"
                        minlength="2"
                        maxlength="50"
                        v-model="tempRecord.number"
                        v-validate="{ required: true, is_not:'0' }"
                        data-vv-delay="250"
                        data-vv-as ="شماره اتاق" />
                   
                    <span class="material-input"></span>
                </div>
                <!-- /number room field -->

                 <!--  capacity room field -->
                <div class="form-group label-floating mrg-top-2em"
                    :class="{'has-error' : errors.has('capacity_room')}">
                    <label class="control-label">ظرفیت اتاق</label>

                    <input autofocus 
                        required 
                        class="form-control"
                        type="number"  
                        step="1" 
                        min="0" 
                        max="500"
                        name="capacity_room"
                        minlength="2"
                        maxlength="50"
                        v-model="tempRecord.capacity"
                        v-validate="{ required: true, is_not:'0' }"
                        data-vv-delay="250"
                        data-vv-as ="ظرفیت اتاق" />
                   
                    <span class="material-input"></span>
                </div>
                <!-- /capacity room field -->

                <!--  floor_room field -->
                <div class="form-group label-floating mrg-top-2em"
                    :class="{'has-error' : errors.has('floor_room')}">
                    <label class="control-label">شماره طبقه</label>

                    <input autofocus 
                        required 
                        class="form-control"
                        type="number"  
                        step="1" 
                        min="0" 
                        max="500"
                        name="floor_room"
                        minlength="2"
                        maxlength="50"
                        v-model="tempRecord.floor"
                        v-validate="{ required: true, is_not:'0' }"
                        data-vv-delay="250"
                        data-vv-as ="شماره طبقه" />
                        
                    <span class="material-input"></span>
                </div>
                <!-- /floor_room field -->

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
