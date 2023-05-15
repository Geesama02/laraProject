import PerfectScrollbar from 'perfect-scrollbar';
window.PerfectScrollbar = PerfectScrollbar;
$(document).ready(function() {
    $('.select2').select2();
});

require('./bootstrap');
require('./custom')
