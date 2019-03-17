Vue.use(Vuex);

const state =
{
	_baseInformation: {},
	// _melliats    : [],
	// _groups      : [],
	// _genders     : [],
	// _situations  : [],
	// _provinces   : [],
	_cities      : [],
	// _universities: [],
	_fieldData   : [],
	// _degrees     : [],
	// _parts       : [],
	// _contracts   : [],
	// _departments : [],
	// _cardtypes 	 : [],
	// _gategroups  : [],
	// _grouppermits : [],
	_terms : [],

	_parents : [],
	// _kintypes: [],

	_data: {
		data         : [],
		current_page : 1,
		from         : 1,
		last_page    : 1,
		next_page_url: null,
		per_page     : 25,
		prev_page_url: null,
		to           : 1,
		total        : 0,
	}
};

const getters =
{
	/**
	 * Return records list
	 */
	records: state => state._data.data,
	/**
	 * Return BaseInformation
	 */
	baseInformation: state => state._baseInformation,

	/**
	 * Return all data
	 */
	allData: state => state._data,
	/**
	 * KinType Parent
	 */
	kintypes: state => state._kintypes,

	/**
	 * Parent Data
	 */
	parents: state => state._parents,

	/**
	 * Return all Parent data
	 */
	//allParentData: state => state._dataParent,

	/**
	 * Group_Permit
	 */
	grouppermits: state => state._grouppermits,
	/**
	 * Terms
	 */
	terms: state => state._terms,

	/**
	*Gate Group
	*/
	gategroups: state => state._gategroups,

	/**
	 * Return melliats
	 */
	melliats: state => state._melliats,

	/**
	 * Return genders
	 */
	genders: state => state._genders,

	/**
	 * Return groups
	 */
	groups: state => state._groups,

	/**
	 * Return situations
	 */
	situations: state => state._situations,

	/**
	 * Return provinces
	 */
	provinces: state => state._provinces,

	/**
	 * Return cities
	 */
	cities: state => state._cities,

	/**
	 * Return degrees
	 */
	degrees: state => state._degrees,

	/**
	 * Return parts
	 */
	parts: state => state._parts,

	/**
	 * Return fields
	 */
	fieldData: state => state._fieldData,

	/**
	 * Return universities
	 */
	universities: state => state._universities,

	/**
	 * Return departments
	 */
	departments: state => state._departments,

	/**
	 * Return contracts
	 */
	contracts: state => state._contracts,

	/*
	CardTypes
	 */
	cardtypes: state => state._cardtypes,
};


const mutations =
{
	/**
	 * Set baseInformation
	 */
	setBaseInformation: (state, data) =>{
		console.log('store -> set base information-> data ', data);
		state._baseInformation = {
			groups: data.groups,
			genders: data.genders,
			melliats: data.melliats,
			situations: data.situations,
			provinces: data.provinces,
			degrees: data.degrees,
			parts: data.parts,
			universities: data.universities,
			departments: data.departments,
			contracts: data.contracts,
			cardtypes: data.cardtypes,
			grouppermits: data.grouppermits,
			terms: data.terms,
			gategroups: data.gategroups,
			kintypes: data.kintypes,
		};
	},
	setImageUrl(state, data){
		//console.log(data.record);
		// data.people.pictureUrl = data.thumb_url;
		// data.people.people.pictureThumbUrl = data.thumb_url;
	},

	/**
	 * Set data
	 */
	setData: (state, data) => {
		state._data = data;
	},

	/**
	 * Set Kintypes
	 */
	setKintypes: (state, data) => {
		state._kintypes = data;
	},

	/**
	 * Set Parent
	 */
	setParents: (state, data) => {
		state._parents = data;
	},

	/**
	 * Set groupPermit
	 */
	setGrouppermits: (state, data) => {
		state._grouppermits = data;
	},

	/**
	 * Set term
	 */
	setTerms: (state, data) => {
		state._terms = data;
	},

	/**
	 * Set gategroup
	 */
	setGateGroups: (state, data) => {
		state._gategroups = data;
	},

	/**
	 * Set melliats
	 */
	setMelliats: (state, data) => {
		state._melliats = data;
	},

	/**
	 * Set groups
	 */
	setGroups: (state, data) => {
		state._groups = data;
	},

	/**
	 * Set genders
	 */
	setGenders: (state, data) => {
		state._genders = data;
	},

	/**
	 * Set situations
	 */
	setSituations: (state, data) =>	{
		state._situations = data;
	},
	/**
	 * Set provinces
	 */
	setProvinces: (state, data) => {
		state._provinces = data;
	},

	/**
	 * Set cities
	 */
	setCities: (state, data) =>	{
		state._cities = data;
	},

	/**
	 * Set universities
	 */
	setUniversities: (state, data) => {
		state._universities = data;
	},

	/**
	 * Set fields
	 */
	setFields: (state, data) => {
		state._fieldData = data;
	},

	/**
	 * Set degrees
	 */
	setDegrees: (state, data) => {
		state._degrees = data;
	},

	/**
	 * Set parts
	 */
	setParts: (state, data) => {
		state._parts = data;
	},

	/**
	 * Set departments
	 */
	setDepartments: (state, data) => {
		state._departments = data;
	},

	/**
	 * Set contracts
	 */
	setContracts: (state, data) => {
		state._contracts = data;
	},

	/**
	 * Set cardtypes
	 */
	setCardtypes: (state, data) => {
		state._cardtypes = data;
	},

	/**
	 * Update an existing Parent record
	 */
	updateParentRecord: (state, payload) => {

		let getters = payload.getters;
		let record  = payload.record;

		let index   = getters._parents.map(el => el.id )
									.indexOf(record.id);

		if (-1 == index){
			return;
		}

		getters._parents[index] = record;
	},

		/**
	 * Insert a new record
	 */
	insertRecord: (state, record) =>
	{
		let oldRecord = state._data.data.filter(el => el.id == record.id);

        if (null == oldRecord){
            oldRecord == [];
        }

        if (0 == oldRecord.length){
            state._data.data.unshift(record);
        }
	},
	/**
	 * Update an existing record
	 */
	updateRecord: (state, payload) => {
		let getters = payload.getters;
		let record  = payload.record;

		let index   = getters.records.map(el => el.id )
									.indexOf(record.id);
		if (-1 == index){
			return;
		}
		getters.records[index] = record;
	},

	/**
	 * Update data
	 */
	// updateData: (state, data) => {

	// 	state._data[data.index] = data.data;
	// },


	/**
	 * Delete a People
	 */
	deleteRecord: (state, index) => {
		state._data.data.splice(index, 1);
	}
};

const actions = {
	/**
	 * Load all base information
	 */
	loadBaseInformation(context, data) {
		console.log('store -> load base information -> data', data);
		let url = data.url;
		return new Promise((resolve, reject) => {
			axios.get(url)
				.then(res => {
					context.commit('setBaseInformation', res.data);

					resolve(res);
				})
				.catch(res => reject(res));
		});
	},

	/**
	 * Load all Kintypes
	 */
	loadKintypes(context) {
		return new Promise((resolve, reject) =>	{
			axios.get('/kintypes')
				.then(res => {

					context.commit('setKintypes', res.data.data);

					resolve(res);
				})
				.catch(res => reject(res));
		});
	},

	/**
	 * Load Parent records data
	 */
	loadParentRecords(context, data) {
		return new Promise((resolve, reject) => {
			let url = '/people/' + data + '/loadParent';
			axios.get(url)
				.then(res => {
					let status   = (0 == res.data.status);
					let record = res.data.relative;

					if (null != record) {
						// Set data
						context.commit('setParents', record);
					}
					resolve(res);
				})
				.catch(err => {
					// Empty List
					context.commit('setParents', []);

					resolve(err);
				});
		});
	},

	/**
	 * save Parnet
	 */
	saveParentRecord: (context, record) => {
		return new Promise((resolve, reject) =>	{
			// New record
			if (0 == record.id)	{
				axios.post('/relatives', record)
					.then(res => {
						let status   = (0 == res.data.status);
						let record = res.data.relative;

						// if (null != record) {
						// 	this.loadParentRecords(record.people_id);
						// }

						resolve(status);
					})
					.catch(err => reject(err));
			}

			// Update record
			else {
				axios.put('/relatives/' + record.id, record)
					.then(res => {
						let status       = (0 == res.data.status);
						let updatedRecord = res.data.relative;

						// if (null != updatedRecord) {
						// 	context.commit('updateParentRecord', {
						// 			getters: context.getters,
						// 			record : updatedRecord
						// 		});
						// }

						resolve(status);
					})
					.catch(err => reject(err));
			}
		});
	},

	/**
	 * Delete a Record
	 */
	deleteParentRecord(context, id) {
		return new Promise((resolve, reject) =>	{
			// Try to delete
			axios.delete('/relatives/' + id)
				.then(res => {
					if (0 == res.data.status) {
						// Remove form  list
						//context.commit('deleteParentRecord', index);
						resolve(res);
						return;
					}

					reject({
						message: 'امکان حذف وجود ندارد'
					});
				})
				.catch(err => {
					reject(err);
				});
		});
	},

	/**
	 * Load Grouppermits
	 */
	loadGrouppermits(context){
		return new Promise((resolve, reject) => {
			axios.get('/grouppermits/data/all')
				.then(res => {
					context.commit ('setGrouppermits', res.data);

					resolve(res);
				})
				.catch(err => reject(err) );
		});
	},

	/**
	 * Load Terms
	 */
	loadTerms(context){
		return new Promise((resolve, reject) => {
			let url = '/terms/data/all';
			axios.get(url)
				.then(res => {
					context.commit ('setTerms', res.data);
					resolve(res);
				})
				.catch(err => reject(err) );
		});
	},

	/**
	 * Load Gate Group
	 */
	loadGateGroups(context){
		return new Promise((resolve, reject) => {
			axios.get('/gategroups/data/all')
				.then(res => {
					context.commit ('setGateGroups', res.data);

					resolve(res);
				})
				.catch(err => reject(err) );
		});
	},

	/*
	Upload Image
	 */
	uploadImage(context, record){
		return new Promise((resolve, reject) => {
			let url = '/people/uploadImage';
			axios.post(url, record.formData, record.config)
				.then(res => {
					resolve(res);
				})
				.catch(err => reject(err) );
		});
	},

	/**
	 * Load all melliats
	 */
	loadMelliats(context) {
		return new Promise((resolve, reject) => {
			axios.get('/melliats')
				.then(res => {
					context.commit('setMelliats', res.data.data);

					resolve(res);
				})
				.catch(res => reject(res));
		});
	},

	/**
	 * Load all groups
	 */
	loadGroups(context) {
		return new Promise((resolve, reject) =>	{
			axios.get('/groups')
				.then(res => {
					context.commit('setGroups', res.data.data);

					resolve(res);
				})
				.catch(res => reject(res));
		});
	},

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
	 * Load all situations
	 */
	loadSituations(context) {
		return new Promise((resolve, reject) =>	{
			axios.get('/situations')
				.then(res => {
					context.commit('setSituations', res.data.data);
					resolve(res);
				})
				.catch(res => reject(res));
		});
	},

	/**
	 * Load all provinces
	 */
	loadProvinces(context) {
		return new Promise((resolve, reject) =>	{
			axios.get('/province/allProvince')
				.then(res => {

					context.commit('setProvinces', res.data);

					resolve(res);
				})
				.catch(res => reject(res));
		});
	},

	/**
	 * Load all cities
	 */
	loadCities(context, provinceId)	{
		return new Promise((resolve, reject) =>	{
			axios.get('/cities/' + provinceId)
				.then(res => {

					context.commit('setCities', res.data.data);

					resolve(res);
				})
				.catch(res => reject(res));
		});
	},

	/**
	 * Load all fields
	 */
	loadFields(context, universityId) {
		return new Promise((resolve, reject) =>	{
			axios.get('/fields/' + universityId)
				.then(res => {
					context.commit('setFields', res.data.data);

					resolve(res);
				})
				.catch(res => reject(res));
		});
	},

	/**
	 * Load all degrees
	 */
	loadDegrees(context) {
		return new Promise((resolve, reject) =>	{
			axios.get('/degrees')
				.then(res => {
					context.commit('setDegrees', res.data.data);

					resolve(res);
				})
				.catch(res => reject(res));
		});
	},

	/**
	 * Load all universities
	 */
	loadUniversities(context) {
		return new Promise((resolve, reject) =>	{
			axios.get('/universities')
				.then(res => {
					context.commit('setUniversities', res.data.data);

					resolve(res);
				})
				.catch(res => reject(res));
		});
	},

	/**
	 * Load all parts
	 */
	loadParts(context) {
		return new Promise((resolve, reject) =>	{
			axios.get('/parts')
				.then(res => {
					context.commit('setParts', res.data.data);

					resolve(res);
				})
				.catch(res => reject(res));
		});
	},

	/**
	 * Load all contract
	 */
	loadContracts(context) {
		return new Promise((resolve, reject) =>	{
			axios.get('/contracts')
				.then(res => {
					context.commit('setContracts', res.data.data);

					resolve(res);
				})
				.catch(res => reject(res));
		});
	},

	/**
	 * Load all departments
	 */
	loadDepartments(context) {
		return new Promise((resolve, reject) =>	{
			axios.get('/departments')
				.then(res => {
					context.commit('setDepartments', res.data.data);

					resolve(res);
				})
				.catch(res => reject(res));
		});
	},

	/**
	 * Load all departments
	 */
	loadCardtypes(context) {
		return new Promise((resolve, reject) =>	{
			axios.get('/cardtypes')
				.then(res => {
					context.commit('setCardtypes', res.data.data);

					resolve(res);
				})
				.catch(res => reject(res));
		});
	},

	/**
	 * Load records data
	 */
	loadRecords(context, data) {
		let page = data.page;
		let id = data.id;

		return new Promise((resolve, reject) =>	{
			let searchWord = data.searchWord;
			let url = document.pageData.people.load_url + '/' + id +
							'?page=' + page;

			if (searchWord != null) {
				url += "&search=" + searchWord;
			}

			axios.get(url)
				.then(res => {
					console.log('people -> store -> res', res);
					// Add "selected" property to items
					let allData = res.data;
					// let rowData = allData.data;

					// rowData = rowData.map(x => {
					// 	x.selected = false;

					// 	return x;
					// });

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
	 * Load records data
	 */
	// loadUsers(context, data) {
	// 	return new Promise((resolve, reject) =>	{
	// 		let url = '/people/loaduser';
	// 		data = { 'code': data };

	// 		axios.post(url, data)
	// 			.then(res => {
	// 				let allData = res.data;
	// 				let rowData = allData.data;

	// 				rowData = rowData.map(x => {
	// 					x.selected = false;

	// 					return x;
	// 				});

	// 				// Set data
	// 				context.commit('setData', allData);
	// 				resolve(res);
	// 			})
	// 			.catch(err => {
	// 				// Empty List
	// 				context.commit('setData', []);

	// 				resolve(err);
	// 			});
	// 	});
	// },

	/**
	 * save Record
	 */
	saveRecord: (context, record) => {
		return new Promise((resolve, reject) =>	{
			// New record
			if (0 == record.id)	{
				axios.post('/registration', record)
					.then(res => {
						let status   = (0 == res.data.status);
						let newRecord = res.data.register;

						if ((null != newRecord) && (record.lastGroupId == newRecord.group.id)) {
							context.commit('insertRecord', newRecord);
						}

						resolve(res.data);
					})
					.catch(err => reject(err));
			}

			// Update record
			else {
				axios.put('/registration/' + record.id, record)
					.then(res => {
						let status       = (0 == res.data.status);
						let updatedRecord = res.data.register;

						if (null != updatedRecord) {
							context.commit('updateRecord', {
									getters: context.getters,
									record : updatedRecord
								});
						}

						resolve(res.data);
					})
					.catch(err => reject(err));
			}
		});
	},

	/**
	 * Delete a Record
	 */
	deleteRecord(context, id) {
		return new Promise((resolve, reject) =>	{
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
			console.log('store -> id ', id);
			// Try to delete
			axios.delete('/registration/' + id)
				.then(res => {
					if (0 == res.data.status) {
						// Remove form people list
						context.commit('deleteRecord', index);

						resolve(res);

						return;
					}

					reject({
						message: 'امکان حذف وجود ندارد'
					});
				})
				.catch(err => {
					reject(err);
				});
		});
	},

	/**
	 * save Grouppermit
	 */
	saveGroupPermitRecord: (context, record) => {
		return new Promise((resolve, reject) =>
		{
			let url = '/people/' + record.user_id + '/setGrouppermit';
			let data = {
				grouppermits: record.grouppermits
			};

			axios.put(url, data)
				.then(res => {

					let status = (0 == res.data.status);
					let record = res.data.user;

					if (null != record) {
						context.commit ('updateRecord', {
									getters: context.getters,
									record : record[0]
								});
					}
					resolve(status);
				})
				.catch(err => reject(err));
		});
	},

	/**
	 * save Terms
	 */
	saveTermRecord: (context, record) => {
		return new Promise((resolve, reject) =>	{
			let url = '/people/' + record.user_id + '/setTerm';
			let data = {
				terms: record.terms
			};
			console.log('save term store -> data', data);
			axios.put(url, data)
				.then(res => {

					let status = (0 == res.data.status);
					let record = res.data.user;

					if (null != record) {
						context.commit ('updateRecord', {
									getters: context.getters,
									record : record[0]
								});
					}
					resolve(status);
				})
				.catch(err => reject(err));
		});
	},

	/**
	 * save Gate Group
	 */
	saveGateGroupRecord: (context, record) => {
		return new Promise((resolve, reject) =>	{
			let url = '/people/' + record.user_id + '/setGateGroup';
			let data = {
				gategroups: record.gategroups
			};

			axios.put(url, data)
				.then(res => {

					let status = (0 == res.data.status);
					let record = res.data.user;

					if (null != record) {
						context.commit ('updateRecord', {
									getters: context.getters,
									record : record[0]
								});
					}
					resolve(status);
				})
				.catch(err => reject(err));
		});
	},

	/**
	 * Upload Image From folder
	 * @param {*} context
	 */
	uploadImageRecord(context) {
		return new Promise((resolve, reject) =>	{
			// Try to delete
			axios.get('/uploadImageFromFolder')
				.then(res => {
					if (0 == res.data.status) {

						resolve(res);
						return;
					}

					reject({
						message: 'امکان بارگذاری وجود ندارد'
					});
				})
				.catch(err => {
					reject(err);
				});
		});
	},

};

export default new Vuex.Store({
	state,
	getters,
	mutations,
	actions,
});
