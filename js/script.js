jQuery(function ($) {

    $(function () {
        $(".p-sidebar_mobile a").on("click", function () {
            $(".l-sidebar ").toggleClass("active");
        });
    });

    $(function () {
        $(".p-sidebar_mobile a").on("click", function () {
            $(".l-outbar ").toggleClass("active");
        });
    });

    $(function () {
        $(".p-batsu").on("click", function () {
            $(".l-sidebar").removeClass("active");
            $(".l-outbar ").removeClass("active");
        });
    });
});
