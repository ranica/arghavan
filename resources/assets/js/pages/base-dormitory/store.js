import RoomModule  from "./room/room";
import MaterialTypeModule  from "./material_type/material_type";
import GenderModule  from "./gender/gender";
import BuildingModule  from "../base-structure/building/building";

Vue.use(Vuex);

const modules = {
    RoomModule,
    MaterialTypeModule,
    BuildingModule,
    GenderModule,
};


const getters = {

    buildings: (state, getters) => getters['BuildingModule/records'],
    genders: (state, getters) => getters['GenderModule/records'],

    rooms: (state, getters) => getters['RoomModule/records'],
    roomsPaginate: (state, getters) => getters['RoomModule/allData'],

    material_types: (state, getters) => getters['MaterialTypeModule/records'],
    material_typesPaginate: (state, getters) => getters['MaterialTypeModule/allData'],
};

const mutations = {

};

const actions = {
    /**
     * Loads Building
    */
   loadBuildings(context, data) {
        return new Promise((resolve, reject) => {
            context.dispatch('BuildingModule/loadRecords', data)
                .then(res => resolve(res))
                .catch(err => reject(err));
        });
    },

    /**
     * Loads Gender
    */
   loadGenders(context, data) {
        return new Promise((resolve, reject) => {
            context.dispatch('GenderModule/loadRecords', data)
                .then(res =>  {
                    console.log('loadGenders -> res', res);
                  resolve(res);
                } )
                .catch(err => reject(err));
        });
    },

    /**
     * Loads Room
    */
   	loadRooms(context, data) {
        return new Promise((resolve, reject) => {
            context.dispatch('RoomModule/loadRecords', data)
                .then(res => resolve(res))
                .catch(err => reject(err));
        });
    },

    /**
     * update Room
     */
    updateRooms(context, data) {
        return new Promise((response, reject) => {
            context.dispatch('RoomModule/updateRecords', data)
                .then(res => response(res))
                .catch(err => reject(err));
        });
    },

    /**
     * Create Room
     */
    createRooms(context, data) {
        return new Promise((response, reject) => {
            context.dispatch('RoomModule/createRecords', data)
                .then(res => response(res))
                .catch(err => reject(err));
        });
    },

    /**
     * delete Room
     */
    deleterooms(context, data) {
        return new Promise((resolve, reject) => {
            context.dispatch('RoomModule/deleteRecords', data)
				.then(res => resolve(res))
               	.catch(err => reject(err));
        });
    },

     /**
     * Loads Room
    */
    loadMaterialTypes(context, data) {
        return new Promise((resolve, reject) => {
            context.dispatch('MaterialTypeModule/loadRecords', data)
                .then(res => resolve(res))
                .catch(err => reject(err));
        });
    },

    /**
     * update MaterialType
     */
    updateMaterialTypes(context, data) {
        return new Promise((response, reject) => {
            context.dispatch('MaterialTypeModule/updateRecords', data)
                .then(res => response(res))
                .catch(err => reject(err));
        });
    },

    /**
     * Create MaterialType
     */
    createMaterialTypes(context, data) {
        return new Promise((response, reject) => {
            context.dispatch('MaterialTypeModule/createRecords', data)
                .then(res => response(res))
                .catch(err => reject(err));
        });
    },

    /**
     * delete MaterialType
     */
    deletematerialTypes(context, data) {
        return new Promise((resolve, reject) => {
            context.dispatch('MaterialTypeModule/deleteRecords', data)
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
