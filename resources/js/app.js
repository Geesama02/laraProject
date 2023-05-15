import "./bootstrap";

import Alpine from "alpinejs";

window.Alpine = Alpine;
$(document).ready(function () {
    $(".js-example-basic-single").select2();
});
$(document).ready(function() {
    $('.select2').select2();
});

Alpine.start();
