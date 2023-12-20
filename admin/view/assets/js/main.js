! function(e) {
    "use strict";
    if (e(".menu-item.has-submenu .menu-link").on("click", function(s) {
            s.preventDefault(), e(this).next(".submenu").is(":hidden") && e(this).parent(".has-submenu").siblings().find(".submenu").slideUp(200), e(this).next(".submenu").slideToggle(200)
        }), e("[data-trigger]").on("click", function(s) {
            s.preventDefault(), s.stopPropagation();
            var n = e(this).attr("data-trigger");
            e(n).toggleClass("show"), e("body").toggleClass("offcanvas-active"), e(".screen-overlay").toggleClass("show")
        }), e(".screen-overlay, .btn-close").click(function(s) {
            e(".screen-overlay").removeClass("show"), e(".mobile-offcanvas, .show").removeClass("show"), e("body").removeClass("offcanvas-active")
        }), e(".btn-aside-minimize").on("click", function() {
            window.innerWidth < 768 ? (e("body").removeClass("aside-mini"), e(".screen-overlay").removeClass("show"), e(".navbar-aside").removeClass("show"), e("body").removeClass("offcanvas-active")) : e("body").toggleClass("aside-mini")
        }), e(".select-nice").length && e(".select-nice").select2(), e("#offcanvas_aside").length) {
        const e = document.querySelector("#offcanvas_aside");
        new PerfectScrollbar(e)
    }
    e(".darkmode").on("click", function() {
        e("body").toggleClass("dark")
    })

    //Chặn e - + cho input number
    $(document).ready(function(){
        $('.form-input-number').on('keydown', function(e){
            const key = e.key;
            if (key === 'e' || key === 'E' || key === '-' || key === '+') {
                e.preventDefault();
            }
        });
    });


    $(document).ready(function () {
        // Lấy phần tử select bằng jQuery
        var $select = $("#mySelect");
    
        // Thêm sự kiện onchange để mở liên kết khi chọn một option
        $select.on("change", function () {
            // Lấy giá trị của option được chọn
            var selectedValue = $select.val();
    
            // Chuyển hướng trang
            window.location.href = selectedValue;
        });
    });
}(jQuery);
