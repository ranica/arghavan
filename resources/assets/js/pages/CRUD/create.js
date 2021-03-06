export default {
    namespaced: true,

    actions: {
        /**
         * Create Car Color.
         *
         * @param      {<type>}   context  The context
         * @return     {Promise}  { description_of_the_return_value }
         */
        createRecords(context, data) {
            return new Promise((response, reject) => {
                let url = data.url;
                axios.post(url, data)
                    .then(res => response(res),
                          err => reject(err));
            })
        },
    }
};
