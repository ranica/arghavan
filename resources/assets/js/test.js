// import CarSearchCard from './components/car_search_card'


new Vue({
    el: '#app',

    components: {
        // CarSearchCard
    },

    data: {
        users: [
            {
                id: 1000,
                name: 'Designer',
                cars: [
                    {
                        id: 100,
                        plate: '100C200IR79'
                    },
                    {
                        id: 200,
                        plate: '110C210IR79'
                    }
                ]
            }
        ]
    },

    methods: {
        /**
         * Edit data
         *
         * @param      {<type>}  userData  The user data
         */
        editRecord(userData){
            alert ('Edit data');
        }
    }
})
