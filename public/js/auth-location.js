document.addEventListener("DOMContentLoaded", function () {
    window.onload = function () {
        $(document).ready(function () {
            $.getJSON("https://ipapi.co/json/", function (data) {
                var country_name = data.country_name;
                $("#country").val(country_name);
            });
        });
    };
});
