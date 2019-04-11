import DormitoryModule  from "./dormitory/dormitory";

Vue.use(Vuex);

const modules = {
    DormitoryModule,
};


const getters = {

    dormitories: (state, getters) => getters['TermModule/records'],
    dormitoriesPaginate: (state, getters) => getters['DormitoryModule/allData'],

    
};

const mutations = {

};

const actions = {
   

    /**
     * Loads Dormitory
    */
   	loadDormitories(context, data) {
        return new Promise((resolve, reject) => {
            context.dispatch('DormitoryModule/loadRecords', data)
                .then(res => resolve(res))
                .catch(err => reject(err));
        });
    },

    /**
     * update Dormitory
     */
    updateDormitories(context, data) {
        return new Promise((response, reject) => {
            context.dispatch('DormitoryModule/updateRecords', data)
                .then(res => response(res))
                .catch(err => reject(err));
        });
    },

    /**
     * Create Dormitory
     *
     * @param      {<type>}   context  The context
     * @param      {<type>}   data     The data
     * @return     {Promise}  { description_of_the_return_value }
     */
    createDormitories(context, data) {
        return new Promise((response, reject) => {
            context.dispatch('DormitoryModule/createRecords', data)
                .then(res => response(res))
                .catch(err => reject(err));
        });
    },

    /**
     * delete Dormitory 
     */
    deleteDormitories(context, data) {
        return new Promise((resolve, reject) => {
            context.dispatch('DormitoryModule/deleteRecords', data)
				.then(res => resolve(res))
               	.catch(err => reject(err));
        });
    },

    

   

};

export default new Vuex.Store({
    modules,
    getters,
    actions,
});
