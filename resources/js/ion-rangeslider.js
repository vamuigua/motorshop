jQuery(function() {
    $(".js-range-slider").ionRangeSlider({
        type: "double",
        grid: true,
        min: 0,
        max: 30000000,
        from: 0,
        to: 30000000,
        step: 500000,
        prettify_enabled: true,
        prettify_separator: ",",
        prefix: "KSH.",
        skin: "round"
    });
});
