Vue.use(Vuex);

const state = {
    _warranties    : [],
    _referralTypes : [],
    _genders     : [],
    _departments  : [],

    _data: {
        data: [],
        current_page: 1,
        from: 1,
        last_page: 1,
        next_page_url: null,
        per_page: 25,
        prev_page_url: null,
        to: 1,
        total: 0,
    },
};

const getters = {
    /**
     * Return record list
     */
    records: state => state._data.data,

    /**
     * Return all data
     */
    allData: state => state._data,
    /**
     * Return genders
     */
    genders: state => state._genders,

    /**
     * Return warranties
     */
    warranties: state => state._warranties,

    /**
     * Return departments
     */
    departments: state => state._departments,

    /**
     * Return referralTypes
     */
    referralTypes: state => state._referralTypes,
};

const mutations = {
    /**
     * Set data
     */
    setData: (state, data) => {
        state._data = data;
    },

    /**
     * Set genders
     */
    setGenders: (state, data) => {
        state._genders = data;
    },

    /**
     * Set warranties
     */
    setWarranties: (state, data) => {
        state._warranties = data;
    },

    /**
     * Set Departments
     */
    setDepartments: (state, data) => {
        state._departments = data;
    },

    /**
     * Set ReferralTypes
     */
    setReferralTypes: (state, data) => {
        console.log('set referral type',data);
        state.referralTypes = data;
        console.log(state.referralTypes);
    },

    /**
     * Insert a Record
     */
    insertRecord: (state, record) => {
        let oldRecord = state._data.data.filter(el => el.id == record.id);

        if (null == oldRecord){
            oldRecord == [];
        }

        if (0 == oldRecord.length){
            state._data.data.push(record);
        }
    },

    /**
     * Update an existing record
     */
    updateRecord: (state, payload) => {
        let getters = payload.getters;
        let record  = payload.record;

        let currentRecord   = getters.records.filter(el => el.id == record.id)[0];

        if (null != currentRecord){
            currentRecord.name     = record.name;
        }
    },

    /**
     * Delete a record
     */
    deleteRecord: (state, index) => {
        state._data.data.splice(index, 1);
    }
};

const actions = {

    /**
     * Load all genders
     */
    loadGenders(context) {
        return new Promise((resolve, reject) => {
            axios.get('/genders')
                .then(res => {
                    context.commit('setGenders', res.data.data);

                    resolve(res);
                })
                .catch(res => reject(res));
        });
    },

    /**
     * Load all Departments
     */
    loadDepartments(context) {
        return new Promise((resolve, reject) => {
            axios.get('/departments')
                .then(res => {
                    context.commit('setDepartments', res.data.data);

                    resolve(res);
                })
                .catch(res => reject(res));
        });
    },

    /**
     * Load all Warranties
     */
    loadWarranties(context) {
        return new Promise((resolve, reject) => {
            axios.get('/warranties')
                .then(res => {
                    context.commit('setWarranties', res.data.data);

                    resolve(res);
                })
                .catch(res => reject(res));
        });
    },

    /**
     * Load all genders
     */
    loadReferralTypes(context) {
        console.log('Store -> referral');
        return new Promise((resolve, reject) => {
            axios.get('/referralTypes')
                .then(res => {
                    console.log('load referral', res.data);
                    context.commit('setReferralTypes', res.data.data);

                    resolve(res);
                })
                .catch(res => reject(res));
        });
    },

    /**
     * Load records data
     */
    loadRecords(context, page) {
        return new Promise((resolve, reject) => {
            axios.get('/referrals?page=' + page)
                .then(res => {
                    // Add "selected" property to items
                    let allData = res.data;
                    let rowData = allData.data;

                    rowData = rowData.map(x => {
                        x.selected = false;

                        return x;
                    });

                    // Set data
                    context.commit('setData', allData);

                    resolve(res);
                })
                .catch(err => {
                    // Empty List
                    context.commit('setData', []);

                    resolve(err);
                });
        });
    },

    /**
     * Delete a Record
     */
    deleteRecord(context, id) {
        return new Promise((resolve, reject) => {
            // Get item index
            let index = context.getters.records
                .map(el => el.id)
                .indexOf(id);

            // Record not found!
            if (-1 == index) {
                reject({
                    message: 'رکورد مورد نظر یافت نشد',
                });

                return;
            }

            // Try to delete
            axios.delete('/melliats/' + id)
                .then(res => {
                    if (0 == res.data.status) {
                        // Remove form records list
                        context.commit('deleteRecord', index);

                        resolve(res);

                        return;
                    }

                    reject({
                        message: 'امکان حذف وجود ندارد'
                    });
                })
                .catch(err => reject(err));
        });
    },

    /**
     * save a record
     */
    saveRecord: (context, record) => {
        return new Promise((resolve, reject) => {
            // New record
            if (0 == record.id) {
                axios.post('/melliats', record)
                    .then(res => {
                        let status = (0 == res.data.status);
                        let newRecord = res.data.melliat;

                        if (null != newRecord) {
                            context.commit('insertRecord', newRecord);
                        }

                        resolve(status);
                    })
                    .catch(err => reject(err));
            }

            // Update Record
            else {
                axios.put('/melliats/' + record.id, record)
                    .then(res => {
                        let status = (0 == res.data.status);
                        let updatedRecord = res.data.melliat;

                        if (null != updatedRecord) {
                            context.commit('updateRecord', {
                                getters: context.getters,
                                record: updatedRecord
                            });
                        }

                        resolve(status);
                    })
                    .catch(err => reject(err));
            }
        });
    }
};

export default new Vuex.Store({
    state,
    getters,
    mutations,
    actions,
});
