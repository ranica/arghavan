import Store from './store';
import CardMobile from '../Components/MobileWidget';
import VuePersianDatetimePicker from 'vue-persian-datetime-picker';

window.v = new Vue({
    el: '#app',
    store: Store,
    components: {
        CardMobile,
        persianCalendar: VuePersianDatetimePicker
    },

    data: {
        formMode: Enums.FormMode.normal,
        page: 1,
        isLoading: true,
        tempRecord: {},
    },

    created() {
        this.tempRecord = this.emptyRecord;
    },

    mounted() {
        this.loadRooms(this.page);
        this.loadBuildings(this.page);
        this.loadGenders(this.page);

    },

    computed: {
        /**
         * Generate new Empty record
         */
        emptyRecord: () => {
            return {
                id      : 0,
                room: {
					id: 0,
					name: '',
					capacity: 0,
					floor: '',
					number: '',
                    gender:{
                        id: 0,
                    },
                    building:{
                        id:0
                    },
				}
            }
        },

        hasRoomRows: state => ((state.$store.getters.rooms != null) &&
            (state.$store.getters.rooms.length > 0)),

        buildings: state => state.$store.getters.buildings,
        genders: state => state.$store.getters.genders,

        rooms: state => state.$store.getters.rooms,
        rooms_paginate: state => state.$store.getters.roomsPaginate,

        isNormalMode: state => state.formMode == Enums.FormMode.normal,
        isRegisterMode: state => state.formMode == Enums.FormMode.register,
    },

    methods: {
        /**
         * Page changed
         */
        pageChanged() {
            this.loadRooms(this.page);
            this.loadBuildings(this.page);
            this.loadGenders(this.page);
        },


        /**
         * Loads Rooms
         */
        loadRooms(page) {
            let url = document.pageData.base_dormitory.pageUrls.rooms_index + '?page=' + page;

            let data = {
                url: url
            };

            this.$store.dispatch('loadRooms', data);
            Helper.scrollToApp ();
            this.isLoading = false;
        },

        /**
         * Loads Genders
         */
        loadGenders(page) {
            let url = document.pageData.base_dormitory.pageUrls.genders_index + '?page=' + page;

            let data = {
                url: url
            };

            this.$store.dispatch('loadGenders', data);
            Helper.scrollToApp ();
            this.isLoading = false;
        },

         /**
         * Loads Building
         */
        loadBuildings(page) {
            let url = document.pageData.base_dormitory.pageUrls.buildings_index + '?page=' + page;

            let data = {
                url: url
            };

            this.$store.dispatch('loadBuildings', data);
            Helper.scrollToApp ();
            this.isLoading = false;
        },

        /**
         * Loads Gender
         */
        loadGenders(page) {
            let url = document.pageData.base_dormitory.pageUrls.genders_index + '?page=' + page;

            let data = {
                url: url
            };

            this.$store.dispatch('loadGenders', data);
            Helper.scrollToApp ();
            this.isLoading = false;
        },

        /**
         * New record dialog
         */
        newRecord() {
            this.errors.clear();
            this.tempRecord = $.extend(true, {}, this.emptyRecord);
            this.changeFormMode(Enums.FormMode.register);
        },

        /**
         * Edit record
         *
         * @param      {<type>}  record  The record
         */
        editRecord(record) {
            this.errors.clear();

			// check tempRecord
            this.tempRecord = {
				room: {
					id: record.id,
					name: record.name,
                    number: record.number,
                    capacity: record.capacity,
                    floor: record.floor,
                    building_id: record.building.id,
                    gender_id: record.gender.id,
				},
            };

            this.formMode = Enums.FormMode.register;
        },

        /**
         * Save Room Record
         */
        saveRoomRecord() {
            this.errors.clear();

            return Promise.all([
                this.$validator.validate('room_name'),
                this.$validator.validate('room_number'),
                this.$validator.validate('room_capacity'),
                this.$validator.validate('room_floor'),
                this.$validator.validate('room_building_id'),
                this.$validator.validate('room_gender_id'),
            ]).then((resolve, reject) => {
                var hasErr = this.errors.any();

                if (!hasErr) {
                    this.saveRoomData();
                    return true;
                }

                let err = this.errors.all();

                err = err.join('<br/>');
                demo.showNotification(err, 'warning');

                return false;
            });
        },

		/**
		 * Save room data
		 */
        saveRoomData() {
            // Prepare data
            let data = {
                id: this.tempRecord.id,
                name: this.tempRecord.room.name,
                capacity: this.tempRecord.room.capacity,
                floor: this.tempRecord.room.floor,
                number: this.tempRecord.room.number,
                url: '/rooms',
                function: 'createRooms',
			};

            this.isLoading = true;
            if (0 == data.id) {
                this.createRecord(data);
            } else {
                data.url = '/rooms/' + data.id;
                data.function = 'updateRooms';
                this.updateRecord(data);
            }

            return;
        },
        /**
         *
         * @param {*} data
         */
        createRecord(data) {
            this.$store.dispatch(data.function, data)
                .then(res => {
                    this.isLoading = false;
                    if (res) {
                        demo.showNotification('ثبت اطلاعات با موفقیت انجام شد', 'success');

                        this.registerCancel();
                    } else {
                        demo.showNotification('این نام قبلا ثبت شده است', 'warning');
                    }
                })
                .catch(err => {
                    this.isLoading = false;

                    if (err.response.status) {
                        demo.showNotification('این نام قبلا ثبت شده است', 'danger');
                    } else {
                        demo.showNotification(err.message, 'danger');
                    }
                });
		},

        /**
         * Update Record
         */
        updateRecord(data) {
            this.$store.dispatch(data.function, data)
                .then(res => {
                    this.isLoading = false;
                    if (res) {
                        demo.showNotification('ویرایش اطلاعات با موفقیت انجام شد', 'success');

                        this.registerCancel();
                    } else {
                        demo.showNotification('این نام قبلا ویرایش شده است', 'warning');
                    }
                })
                .catch(err => {
                    this.isLoading = false;

                    if (err.response.status) {
                        demo.showNotification('این نام قبلا ویرایش شده است', 'danger');
                    } else {
                        demo.showNotification(err.message, 'danger');
                    }
                });
        },

        /**
         * Prepare to delete
         */
        readyToDelete(record) {
            this.tempRecord.id = record.id;
        },
        /**
         * Delete a record
         */
        deleteRecord(namePage) {
            this.isLoading = true;
            let funName = 'delete' + namePage;
            let url = '/' + namePage + '/' + this.tempRecord.id;
            let data = {
                url: url,
                record: this.tempRecord
            };

            this.$store.dispatch(funName, data)
                .then(res => {
                    this.isLoading = false;

                    demo.showNotification('حذف رکورد با موفقیت انجام شد', 'success');
                    this.tempRecord = {};
                })
                .catch(err => {
                    demo.showNotification('خطا در حذف رکورد! این خطا در سامانه ذخیره شد و مورد بررسی قرار خواهد گرفت', 'danger');
                });
        },

        /**
         * Convert gregorian date to persian
         */
        toPersian(gDate) {
            return window.Helper.gregorianToJalaali(gDate);
        },

        /**
         * Convert persian date to gregorian
         */
        toGregorian(pDate) {
            return window.Helper.jalaaliToGregorian(pDate);
        },

        /**
         * Change form mode
         *
         * @param      {<type>}  formMode  The form mode
         */
        changeFormMode(formMode) {
            this.formMode = formMode;
        },

        /**
         * Show Invisible items
         */
        showInvisibleItems() {
            document.querySelectorAll('.invisible')
                .forEach(item => {
                    item.classList.remove('invisible');
                });
        },

        /**
         * Clear errors
         */
        clearErrors() {
            this.errors.clear();

            document.querySelectorAll('.form-control')
                .forEach(x => {
                    $(x).removeClass('has-error')
                        .parent()
                        .addClass('label-floating is-empty');
                });
        },

        /**
         * Hide insert/update modal
         */
        registerCancel() {
            this.tempRecord = this.emptyRecord;

            this.changeFormMode(Enums.FormMode.normal);
        },
    },
})
