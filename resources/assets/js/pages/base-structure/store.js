import MelliatModule  from "./melliat/melliat";
import GroupModule  from "./group/group";
import CardTypeModule  from "./card_type/card_type";
import ContractorModule  from "./contractor/contractor";
import ContractModule  from "./contract/contract";
import DepartmentModule  from "./department/department";
import KinTypeModule  from "./kin_type/kin_type";
import ProvinceModule  from "./province/province";
import CityModule  from "./city/city";

Vue.use(Vuex);

const modules = {
    MelliatModule,
    GroupModule,
    CardTypeModule,
    ContractorModule,
    ContractModule,
    DepartmentModule,
    KinTypeModule,
    ProvinceModule,
    CityModule,
};


const getters = {
    melliats: (state, getters) => getters['MelliatModule/records'],
    melliatsPaginate: (state, getters) => getters['MelliatModule/allData'],

    groups: (state, getters) => getters['GroupModule/records'],
    groupsPaginate: (state, getters) => getters['GroupModule/allData'],

    card_types: (state, getters) => getters['CardTypeModule/records'],
    card_typesPaginate: (state, getters) => getters['CardTypeModule/allData'],

    contractors: (state, getters) => getters['ContractorModule/records'],
    contractorsPaginate: (state, getters) => getters['ContractorModule/allData'],

    contracts: (state, getters) => getters['ContractModule/records'],
    contractsPaginate: (state, getters) => getters['ContractModule/allData'],

    departments: (state, getters) => getters['DepartmentModule/records'],
    departmentsPaginate: (state, getters) => getters['DepartmentModule/allData'],

    kin_types: (state, getters) => getters['KinTypeModule/records'],
    kin_typesPaginate: (state, getters) => getters['KinTypeModule/allData'],

    provinces: (state, getters) => getters['ProvinceModule/records'],
    allProvinces: (state, getters) => getters['ProvinceModule/allRecords'],
    provincesPaginate: (state, getters) => getters['ProvinceModule/allData'],

    cities: (state, getters) => getters['CityModule/records'],
    citiesPaginate: (state, getters) => getters['CityModule/allData'],
};

const mutations = {

};

const actions = {


    /**
     * Loads Melliat
    */
   loadMelliats(context, data) {
        return new Promise((resolve, reject) => {
            context.dispatch('MelliatModule/loadRecords', data)
                .then(res => resolve(res))
                .catch(err => reject(err));
        });
    },


    /**
     * update Melliat
     */
    updateMelliats(context, data) {
        return new Promise((response, reject) => {
            context.dispatch('MelliatModule/updateRecords', data)
                .then(res => response(res))
                .catch(err => reject(err));
        });
    },

    /**
     * Create Melliat
     *
     * @param      {<type>}   context  The context
     * @param      {<type>}   data     The data
     * @return     {Promise}  { description_of_the_return_value }
     */
    createMelliats(context, data) {
        return new Promise((response, reject) => {
            context.dispatch('MelliatModule/createRecords', data)
                .then(res => response(res))
                .catch(err => reject(err));
        });
    },

    /**
     * delete Melliat
     */
    deletemelliats(context, data) {
        return new Promise((resolve, reject) => {
            context.dispatch('MelliatModule/deleteRecords', data)
                .then(res => resolve(res))
               .catch(err => reject(err));
        });
    },

    /**
     * Loads Group
    */
   loadGroups(context, data) {
        return new Promise((resolve, reject) => {
            context.dispatch('GroupModule/loadRecords', data)
                .then(res => resolve(res))
                .catch(err => reject(err));
        });
    },

    /**
     * update Group
     */
    updateGroups(context, data) {
        return new Promise((response, reject) => {
            context.dispatch('GroupModule/updateRecords', data)
                .then(res => response(res))
                .catch(err => reject(err));
        });
    },

    /**
     * Create Group
     *
     * @param      {<type>}   context  The context
     * @param      {<type>}   data     The data
     * @return     {Promise}  { description_of_the_return_value }
     */
    createGroups(context, data) {
        return new Promise((response, reject) => {
            context.dispatch('GroupModule/createRecords', data)
                .then(res => response(res))
                .catch(err => reject(err));
        });
    },


    /**
     * delete Group
     */
    deletegroups(context, data) {
        return new Promise((resolve, reject) => {
            context.dispatch('GroupModule/deleteRecords', data)
                .then(res => resolve(res))
            .catch(err => reject(err));
        });
    },

    /**
     * Loads Card Type
    */
   loadCardTypes(context, data) {
        return new Promise((resolve, reject) => {
            context.dispatch('CardTypeModule/loadRecords', data)
                .then(res => resolve(res))
                .catch(err => reject(err));
        });
    },

    /**
     * update CardType
     */
    updateCardTypes(context, data) {
        return new Promise((response, reject) => {
            context.dispatch('CardTypeModule/updateRecords', data)
                .then(res => response(res))
                .catch(err => reject(err));
        });
    },

    /**
     * Create CardType
     *
     * @param      {<type>}   context  The context
     * @param      {<type>}   data     The data
     * @return     {Promise}  { description_of_the_return_value }
     */
    createCardTypes(context, data) {
        return new Promise((response, reject) => {
            context.dispatch('CardTypeModule/createRecords', data)
                .then(res => response(res))
                .catch(err => reject(err));
        });
    },


    /**
     * delete CardType
     */
    deletecardtypes(context, data) {
        return new Promise((resolve, reject) => {
            context.dispatch('CardTypeModule/deleteRecords', data)
                .then(res => resolve(res))
            .catch(err => reject(err));
        });
    },

      /**
     * Loads Contractor
    */
   loadContractors(context, data) {
        return new Promise((resolve, reject) => {
            context.dispatch('ContractorModule/loadRecords', data)
                .then(res => resolve(res))
                .catch(err => reject(err));
        });
    },


    /**
     * update Contractor
     */
    updateContractors(context, data) {
        return new Promise((response, reject) => {
            context.dispatch('ContractorModule/updateRecords', data)
                .then(res => response(res))
                .catch(err => reject(err));
        });
    },

    /**
     * Create Contractor
     *
     * @param      {<type>}   context  The context
     * @param      {<type>}   data     The data
     * @return     {Promise}  { description_of_the_return_value }
     */
    createContractors(context, data) {
        return new Promise((response, reject) => {
            context.dispatch('ContractorModule/createRecords', data)
                .then(res => response(res))
                .catch(err => reject(err));
        });
    },

    /**
     * delete Contractor
     */
    deletecontractors(context, data) {
        return new Promise((resolve, reject) => {
            context.dispatch('ContractorModule/deleteRecords', data)
                .then(res => resolve(res))
            .catch(err => reject(err));
        });
    },

      /**
     * Loads Contract
    */
   loadContracts(context, data) {
        return new Promise((resolve, reject) => {
            context.dispatch('ContractModule/loadRecords', data)
                .then(res => resolve(res))
                .catch(err => reject(err));
        });
    },


    /**
     * update Contract
     */
    updateContracts(context, data) {
        return new Promise((response, reject) => {
            context.dispatch('ContractModule/updateRecords', data)
                .then(res => response(res))
                .catch(err => reject(err));
        });
    },

    /**
     * Create Contract
     *
     * @param      {<type>}   context  The context
     * @param      {<type>}   data     The data
     * @return     {Promise}  { description_of_the_return_value }
     */
    createContracts(context, data) {
        return new Promise((response, reject) => {
            context.dispatch('ContractModule/createRecords', data)
                .then(res => response(res))
                .catch(err => reject(err));
        });
    },

    /**
     * delete Contract
     */
    deletecontracts(context, data) {
        return new Promise((resolve, reject) => {
            context.dispatch('ContractModule/deleteRecords', data)
                .then(res => resolve(res))
            .catch(err => reject(err));
        });
    },

    /**
     * Loads Department
    */
   loadDepartments(context, data) {
        return new Promise((resolve, reject) => {
            context.dispatch('DepartmentModule/loadRecords', data)
                .then(res => resolve(res))
                .catch(err => reject(err));
        });
    },


    /**
     * update Department
     */
    updateDepartments(context, data) {
        return new Promise((response, reject) => {
            context.dispatch('DepartmentModule/updateRecords', data)
                .then(res => response(res))
                .catch(err => reject(err));
        });
    },

    /**
     * Create Department
     *
     * @param      {<type>}   context  The context
     * @param      {<type>}   data     The data
     * @return     {Promise}  { description_of_the_return_value }
     */
    createDepartments(context, data) {
        return new Promise((response, reject) => {
            context.dispatch('DepartmentModule/createRecords', data)
                .then(res => response(res))
                .catch(err => reject(err));
        });
    },

    /**
     * delete Department
     */
    deletedepartments(context, data) {
        return new Promise((resolve, reject) => {
            context.dispatch('DepartmentModule/deleteRecords', data)
                .then(res => resolve(res))
            .catch(err => reject(err));
        });
    },

    /**
     * Loads KinType
    */
   loadKinTypes(context, data) {
        return new Promise((resolve, reject) => {
            context.dispatch('KinTypeModule/loadRecords', data)
                .then(res => resolve(res))
                .catch(err => reject(err));
        });
    },


    /**
     * update KinType
     */
    updateKinTypes(context, data) {
        return new Promise((response, reject) => {
            context.dispatch('KinTypeModule/updateRecords', data)
                .then(res => response(res))
                .catch(err => reject(err));
        });
    },

    /**
     * Create KinType
     *
     * @param      {<type>}   context  The context
     * @param      {<type>}   data     The data
     * @return     {Promise}  { description_of_the_return_value }
     */
    createKinTypes(context, data) {
        return new Promise((response, reject) => {
            context.dispatch('KinTypeModule/createRecords', data)
                .then(res => response(res))
                .catch(err => reject(err));
        });
    },

    /**
     * delete KinType
     */
    deletekintypes(context, data) {
        return new Promise((resolve, reject) => {
            context.dispatch('KinTypeModule/deleteRecords', data)
                .then(res => resolve(res))
            .catch(err => reject(err));
        });
    },

    /**
     * Loads Province
    */
   loadProvinces(context, data) {
        return new Promise((resolve, reject) => {
            context.dispatch('ProvinceModule/loadRecords', data)
                .then(res => resolve(res))
                .catch(err => reject(err));
        });
    },
     /**
     * Loads Province
    */
   loadAllProvinces(context, data) {
        return new Promise((resolve, reject) => {
            context.dispatch('ProvinceModule/loadAllRecords', data)
                .then(res => resolve(res))
                .catch(err => reject(err));
        });
    },


    /**
     * update Province
     */
    updateProvinces(context, data) {
        return new Promise((response, reject) => {
            context.dispatch('ProvinceModule/updateRecords', data)
                .then(res => response(res))
                .catch(err => reject(err));
        });
    },

    /**
     * Create Province
     *
     * @param      {<type>}   context  The context
     * @param      {<type>}   data     The data
     * @return     {Promise}  { description_of_the_return_value }
     */
    createProvinces(context, data) {
        return new Promise((response, reject) => {
            context.dispatch('ProvinceModule/createRecords', data)
                .then(res => response(res))
                .catch(err => reject(err));
        });
    },

    /**
     * delete Province
     */
    deleteprovinces(context, data) {
        return new Promise((resolve, reject) => {
            context.dispatch('ProvinceModule/deleteRecords', data)
                .then(res => resolve(res))
            .catch(err => reject(err));
        });
    },

    /**
     * Loads Cities
    */
   loadCities(context, data) {
        return new Promise((resolve, reject) => {
            context.dispatch('CityModule/loadRecords', data)
                .then(res => resolve(res))
                .catch(err => reject(err));
        });
    },


    /**
     * update Cities
     */
    updateCities(context, data) {
        return new Promise((response, reject) => {
            context.dispatch('CityModule/updateRecords', data)
                .then(res => response(res))
                .catch(err => reject(err));
        });
    },

    /**
     * Create Cities
     *
     * @param      {<type>}   context  The context
     * @param      {<type>}   data     The data
     * @return     {Promise}  { description_of_the_return_value }
     */
    createCities(context, data) {
        return new Promise((response, reject) => {
            context.dispatch('CityModule/createRecords', data)
                .then(res => response(res))
                .catch(err => reject(err));
        });
    },

    /**
     * delete Cities
     */
    deletecities(context, data) {
        return new Promise((resolve, reject) => {
            context.dispatch('CityModule/deleteRecords', data)
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
