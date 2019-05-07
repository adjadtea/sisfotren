function load_all_js() {
    return Promise.all([
        load.css('./assets/plugins/animate-css/animate.min.css '),
        load.css('https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css').then(() => {
            load.css('<?=base_url("assets/css/style.min.css")?>');
            load.css('<?=base_url("assets/css/themes/all-themes.css")?>');
        }),
        load.css('https://fonts.googleapis.com/icon?family=Material+Icons'),
        load.css('https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css'),

        load.js('https://unpkg.com/axios/dist/axios.min.js'),
        load.js('https://cdn.jsdelivr.net/npm/moment@2.24.0/moment.min.js'),
        load.js('https://cdn.jsdelivr.net/npm/lodash@4.17.11/lodash.min.js'),
        load.js('https://hay.github.io/stapes/stapes.min.js'),
        load.js('https://cdn.jsdelivr.net/npm/hammerjs@2.0.8/hammer.min.js'),
        load.js('./assets/js/web-animations.min.js'),
        load.js('https://cdn.jsdelivr.net/npm/muuri@0.7.1/dist/muuri.min.js'),
        load.js('https://cdn.jsdelivr.net/npm/pdfobject@2.1.1/pdfobject.min.js'),
        load.js('https://code.jquery.com/jquery-3.3.1.min.js').then(() => {
            load.js('./assets/js/jquery.number.min.js');
            load.js('https://cdn.jsdelivr.net/npm/sammy@0.7.6/lib/sammy.min.js');
            load.js('https://unpkg.com/sweetalert@2.1.2/dist/sweetalert.min.js');
            load.js('./assets/js/jquery.mockjax.min.js');
            load.js('./assets/js/notify.min.js');
            load.css('https://cdn.jsdelivr.net/npm/jquery-treegrid@0.3.0/css/jquery.treegrid.css');
            load.js('https://cdn.jsdelivr.net/npm/jquery-treegrid@0.3.0/js/jquery.treegrid.min.js').then(() => {
                load.js('https://cdn.jsdelivr.net/npm/jquery-treegrid@0.3.0/js/jquery.treegrid.bootstrap3.js');
            });
            load.css('./assets/js/monthly/monthly.css');
            load.js('./assets/js/monthly/monthly.js');

            load.js('./assets/js/jquery.form.min.js');
            load.js('./assets/plugins/jquery-countto/jquery.countTo.js');
            load.js('./assets/plugins/jquery-slimscroll/jquery.slimscroll.js');
            load.js('./assets/plugins/jquery-validation/jquery.validate.js');
            load.js('./assets/plugins/jquery-validation/additional-methods.js');
            load.js('./assets/plugins/jquery-validation/localization/messages_id.js');
            load.js('https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js').then(() => {
                load.js('https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js').then(() => {
                    load.css('./assets/plugins/bootstrap-select/css/bootstrap-select.min.css');
                    load.js('./assets/plugins/bootstrap-select/js/bootstrap-select.js');

                    load.css('./assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css');
                    load.js('./assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js');

                    load.css('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.2/css/fileinput.min.css');
                    load.js('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.2/js/plugins/piexif.min.js');
                    load.js('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.2/js/plugins/sortable.min.js');
                    load.js('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.2/js/plugins/purify.min.js').then(() => {
                        load.js('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.2/js/fileinput.min.js').then(() => {
                            load.js('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.2/themes/fa/theme.js');
                        });
                    });

                    load.css('./assets/js/bootstrap-year-calendar/bootstrap-year-calendar.min.css');
                    load.js('./assets/js/bootstrap-year-calendar/bootstrap-year-calendar.min.js');

                    load.css('https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap.min.css');
                    load.js('https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js').then(() => {
                        load.js('https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap.min.js');
                    });
                });
            });
            load.css('./assets/plugins/waves/waves.min.css');
            load.js('./assets/plugins/waves/waves.min.js');

            load.css('./assets/js/waitme/waitMe.min.css');
            load.js('./assets/js/waitme/waitMe.min.js');
        }),
    ]);
}