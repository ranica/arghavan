import VuePersianDatetimePicker from 'vue-persian-datetime-picker';
import VueChartist from 'vue-chartist';

Vue.use(VueChartist, {
    messageNoData: "اطلاعاتی ثبت نشده است",
    classNoData: "chart-empty"
});
const chartData = {
    labels: ["A", "B", "C"],
    series: [1, 3, 2]
};


window.v = new Vue({
    el: '#app',

    components: {
        persianCalendar: VuePersianDatetimePicker,
    },

    data: {
        chartData,
        formMode: Enums.FormMode.normal,
        showModal: false,
        page: 1,
        is_search: false,
        isLoading: true,
        events: [],
        tempRecord: {
            traffic: {},
        },
        searchParams: {}
    },
    created() {
    },

    mounted() {
        this.loadStaffChart();
        this.loadStudentChart();
        this.loadTeacherChart();
    },

    computed: {
        isNormalMode: state => state.formMode == Enums.FormMode.normal,
        isRegisterMode: state => state.formMode == Enums.FormMode.register,
    },
      methods: {
        /**
         * Change form mode
         */
        changeFormMode(formMode) {
            this.formMode = formMode;
        },
        /**
         * Convert Date now to Persian Date
         */
        toPersian(gDate) {
            return window.Helper.gregorianToJalaaliByTime(gDate);
        },
        /**
         * Convert persian date to gregorian
         */
        toGregorian(pDate) {
            return window.Helper.jalaaliToGregorian(pDate);
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
         * Loads a data staff chart.
         */
        loadStaffChart(){
            let url = document.pageData.report.count_staff_all_url;

             axios.get(url)
                    .then(res => {
                        let labels = res.data.labels;
                        let series = res.data.series;

                        let result = {
                            labels: labels,
                            series: series
                        };
                        this.chartData = result;
                        this.loadDataStaff();
                        // this.removeLoadingStatus(LOADING_TRAFFIC_DAILY);
                    })
                    .catch(err => {
                        // this.removeLoadingStatus(LOADING_TRAFFIC_DAILY);
                        MessageHelper.error(err.message);
                    });
        },

         /**
         * Load Staff chart
         */
        loadDataStaff() {
            var canvas = document.getElementById("barChart");
            var ctx = canvas.getContext('2d');

            // Global Options:
            Chart.defaults.global.defaultFontColor = 'black';
            Chart.defaults.global.defaultFontSize = 12;
            Chart.defaults.global.defaultFontFamily = 'BYekan';

            var data = {
                labels: this.chartData.labels,
                  datasets: [{
                        fill: true,
                        backgroundColor: [
                            "#60992d",
                            "#82b749",
                            "#9dc978"
                            ],
                        data: this.chartData.series,
                        // Notice the borderColor
                        borderColor:  ['black', 'black', 'black'],
                        borderWidth: [2,2]
                    }
                ]
            };

          // Notice the rotation from the documentation.

            var options = {
                    title: {
                              // display: true,
                              // fontFamily: "BYekan",
                              // text: 'سلام',
                              position: 'top',
                          },
                     rotation: -0.7 * Math.PI,
                    // animateRotate: true,
                    // animateScale: true,
                    // cutoutPercentage: 70,
            };


            var myBarChart = new Chart(ctx, {
                type: 'pie',
                data: data,
                options: options
            });
        },

        /**
         * Loads a student chart.
         */
        loadStudentChart(){
            let url = document.pageData.report.count_student_all_url;

             axios.get(url)
                    .then(res => {
                        let labels = res.data.labels;
                        let series = res.data.series;

                        let result = {
                            labels: labels,
                            series: series
                        };
                        this.chartData = result;
                        this.loadDataStudent();
                    })
                    .catch(err => {
                        MessageHelper.error(err.message);
                    });
        },
         /**
          * Loads a data student.
          */
        loadDataStudent() {
            var canvas = document.getElementById("studentChart");
            var ctx = canvas.getContext('2d');

            // Global Options:
            Chart.defaults.global.defaultFontColor = 'black';
            Chart.defaults.global.defaultFontSize = 12;
            Chart.defaults.global.defaultFontFamily = 'BYekan';

            var data = {
                labels: this.chartData.labels,
                  datasets: [{
                        fill: true,
                        backgroundColor: [
                            "#576191",
                            "#7887c9",
                            "#8e9acc"
                            ],
                        data: this.chartData.series,
                        // Notice the borderColor
                        borderColor:  ['black', 'black', 'black'],
                        borderWidth: [2,2]
                    }
                ]
            };
          // Notice the rotation from the documentation.
            var options = {
                    title: {
                              // display: true,
                              // fontFamily: "BYekan",
                              // text: 'سلام',
                              position: 'top',
                          },
                     rotation: -0.7 * Math.PI,
                    // animateRotate: true,
                    // animateScale: true,
                    // cutoutPercentage: 70,
            };
            var myStudentChart = new Chart(ctx, {
                type: 'pie',
                data: data,
                options: options
            });
        },
        /**
         * Loads a student chart.
         */
        loadTeacherChart(){
            let url = document.pageData.report.count_teacher_all_url;

             axios.get(url)
                    .then(res => {
                        let labels = res.data.labels;
                        let series = res.data.series;

                        let result = {
                            labels: labels,
                            series: series
                        };
                        this.chartData = result;
                        this.loadDataTeacher();
                    })
                    .catch(err => {
                        MessageHelper.error(err.message);
                    });
        },
         /**
          * Loads a data Teacher.
          */
        loadDataTeacher() {
            var canvas = document.getElementById("teacherChart");
            var ctx = canvas.getContext('2d');

            // Global Options:
            Chart.defaults.global.defaultFontColor = 'black';
            Chart.defaults.global.defaultFontSize = 12;
            Chart.defaults.global.defaultFontFamily = 'BYekan';

            var data = {
                labels: this.chartData.labels,
                  datasets: [{
                        fill: true,
                        backgroundColor: [
                            "#146570",
                            "#1c8e9e",
                            "#66d8e8"
                            ],
                        data: this.chartData.series,
                        // Notice the borderColor
                        borderColor:  ['black', 'black', 'black'],
                        borderWidth: [2,2]
                    }
                ]
            };
          // Notice the rotation from the documentation.
            var options = {
                    title: {
                              // display: true,
                              // fontFamily: "BYekan",
                              // text: 'سلام',
                              position: 'top',
                          },
                     rotation: -0.7 * Math.PI,
                    // animateRotate: true,
                    // animateScale: true,
                    // cutoutPercentage: 70,
            };
            var myTeacherChart = new Chart(ctx, {
                type: 'pie',
                data: data,
                options: options
            });
        },
    },
})
