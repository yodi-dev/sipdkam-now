// var controller = new Vue({
// var controller = Vue.createApp({
//     el: '#controller',
//     data: {
//         counter: 1000,
//         datas: [],
//         data: {},
//         actUrl,
//         apiUrl,
//         editStatus: false,
//     },
//     mounted: function() {
//         console.log(this);
//         this.datatable();
//     },
//     methods: {
//         datatable() {
//             const _this = this;
//             console.log(_this);
//             _this.table = $('#datatable').DataTable({
//                 ajax: {
//                     url: _this.apiUrl,
//                     type: 'GET',
//                 },
//                 columns
//             }).on('xhr', function() {
//                 _this.datas = _this.table.ajax.json().data;
//             });
//         },
//         addData() {
//             this.data = {};
//             $('#modal-default').modal('show');
//         },
//         editData(event, row) {
//             this.data = this.datas[row];
//             this.editStatus = true;
//             $('#modal-default').modal('show');
//         },
//         deleteData(event, id) {
//             if (confirm("Are you sure?")) {
//                 axios.post(this.actUrl + '/' + id, { _method: 'DELETE' }).then(response => {
//                     alert('Data has been removed');
//                     $(event.target).parents('tr').remove();
//                 });
//             }
//         },
//         submitForm(event, id) {
//             event.preventDefault();
//             const _this = this;
//             var actUrl = !this.editStatus ? this.actUrl : this.actUrl + '/' + id;
//             axios.post(actUrl, new FormData($(event.target)[0])).then(response => {
//                 $('#modal-default').modal('hide');
//                 _this.table.ajax.reload();
//             });
//         },
//     }
// });

const app = Vue.createApp({
    data() {
        return {
            counter: 1000,
            datas: [],
            data: {},
            actUrl,
            apiUrl,
            editStatus: false,
        };
    },
    mounted: function() {
        this.datatable();
    },
    methods: {
        datatable() {
            const _this = this;
            // console.log(_this);
            _this.table = $('#datatable').DataTable({
                destroy: false,
                ajax: {
                    url: _this.apiUrl,
                    type: 'GET',
                },
                columns,
                "pagingType": "full_numbers",
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                responsive: true,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search records",
                }
            }).on('xhr', function() {
                _this.datas = _this.table.ajax.json().data;
            });
        },
        addData() {
            // console.log("tes");
            // this.data = {};
            $('#modal-crud').modal('show');
        },
        // editData(event, row) {
        //     this.data = this.datas[row];
        //     this.editStatus = true;
        //     $('#modal-default').modal('show');
        // },
        // deleteData(event, id) {
        //     if (confirm("Are you sure?")) {
        //         axios.post(this.actUrl + '/' + id, { _method: 'DELETE' }).then(response => {
        //             alert('Data has been removed');
        //             $(event.target).parents('tr').remove();
        //         });
        //     }
        // },
        // submitForm(event, id) {
        //     event.preventDefault();
        //     const _this = this;
        //     var actUrl = !this.editStatus ? this.actUrl : this.actUrl + '/' + id;
        //     axios.post(actUrl, new FormData($(event.target)[0])).then(response => {
        //         $('#modal-default').modal('hide');
        //         _this.table.ajax.reload();
        //     });
        // },
    }
});


app.mount('#controller');