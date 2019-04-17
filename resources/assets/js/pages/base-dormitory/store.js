import RoomModule  from "./room/room";
import GenderModule  from "./gender/gender";
import BuildingModule  from "../base-structure/building/building";

Vue.use(Vuex);

const modules = {
    RoomModule,
    BuildingModule,
    GenderModule,
};


const getters = {

    buildings: (state, getters) => getters['BuildingModule/records'],
    genders: (state, getters) => getters['GenderModule/records'],

    rooms: (state, getters) => getters['RoomModule/records'],
    roomsPaginate: (state, getters) => getters['RoomModule/allData'],
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
                .then(res => resolve(res))
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
     *
     * @param      {<type>}   context  The context
     * @param      {<type>}   data     The data
     * @return     {Promise}  { description_of_the_return_value }
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


};

export default new Vuex.Store({
    modules,
    getters,
    actions,
});
