import loadModule from "../../CRUD/load";
import updateModule from "../../CRUD/update";
import createModule from "../../CRUD/create";
import deleteModule from "../../CRUD/delete";

const modules = {
    loadModule,
    updateModule,
    createModule,
    deleteModule
};

const state = {

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
};

const mutations = {
    /**
     * Set Data
     */
    setData: (state, data) => state._data = data.data,
    /**
     * Create a Record
     */
    createRecord: (state, data) => state._data.data.push(data),
    /**
     * Update an existing record
     */
    updateRecord: (state, payload) => {
        let getters = payload.getters;
        let record = payload.record;

        let index = getters.records.map(el => el.id)
            .indexOf(record.id);

        if (-1 == index) {
            return;
        }

        getters.records[index] = record;
    },
     /**
     * Delete a record
     */
    deleteRecord(state, data) {
        let index = state._data.data.map(el => el.id)
            .indexOf(data.id);

        state._data.data.splice(index, 1);
    },

};

const actions = {
    /**
     * Loads car Level.
     */
    loadRecords(context, data) {
        return new Promise((response, reject) => {
            context.dispatch('loadModule/loadRecords', data)
                .then(res => {

                    console.log('store-> site module -> res', res.data);
                    context.commit('setData', res);
                    response(res);
                })
                .catch(err => reject(err));
        });
    },

    /**
     * updates Car Level
     */
    updateRecords(context, data) {
        return new Promise((resolve, reject) => {
            context.dispatch('updateModule/updateRecords', data)
                .then(res => {
                    let updatedRecord = res.data.carSite;

                    if (res.data.status == 0) {
                        context.commit('updateRecord', {
                            getters: context.getters,
                            record: updatedRecord
                        });
                    }
                    resolve(res);
                })
                .catch(err => reject(err));
        });
    },

    /**
     * Create Car Level
     */
    createRecords(context, data) {
        return new Promise((resolve, reject) => {
            context.dispatch('createModule/createRecords', data)
                .then(res => {
                    if (res.data.status == 0) {
                        context.commit('createRecord', res.data.carSite);
                    }

                    resolve(res);
                })
                .catch(err => reject(err));
        });
    },

    /**
     * Delete Car Level
     */
    deleteRecords(context, data) {
        return new Promise((resolve, reject) => {
            context.dispatch('deleteModule/deleteRecords', data)
                .then(res => {
                    context.commit('deleteRecord', data.record);

                    resolve(res);
                })
                .catch(err => reject(err));
        });
    },
};


export default {
    namespaced: true,
    modules,
    state,
    mutations,
    getters,
    actions
};
