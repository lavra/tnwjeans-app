(function($) {
    var wa_time_out, wa_time_in;
    $(document).ready(function() {
        $(".wa__btn_popup").on("click", function() {
            window.location.href = 'https://api.whatsapp.com/send/?phone=551120814360&text&app_absent=0';
        });

        function setCookie(cname, cvalue, exdays) {
            var d = new Date();
            d.setTime(d.getTime() + exdays * 24 * 60 * 60 * 1000);
            var expires = "expires=" + d.toUTCString();
            document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
        }

        function getCookie(cname) {
            var name = cname + "=";
            var ca = document.cookie.split(";");
            for (var i = 0; i < ca.length; i++) {
                var c = ca[i];
                while (c.charAt(0) == " ") {
                    c = c.substring(1);
                }
                if (c.indexOf(name) == 0) {
                    return c.substring(name.length, c.length);
                }
            }
            return "";
        }
        $("#nta-wa-gdpr").change(function() {
            if (this.checked) {
                setCookie("nta-wa-gdpr", "accept", 30);
                if (getCookie("nta-wa-gdpr") != "") {
                    $('.nta-wa-gdpr').hide(500);
                    $('.wa__popup_content_item').each(function() {
                        $(this).removeClass('pointer-disable');
                        $('.wa__popup_content_list').off('click');
                    })
                }
            }
        });
        if (getCookie("nta-wa-gdpr") != "") {
            $('.wa__popup_content_list').off('click');
        } else {
            $('.wa__popup_content_list').click(function() {
                $('.nta-wa-gdpr').delay(500).css({
                    "background": "red",
                    "color": "#fff"
                });
            });
        }
    });
})(jQuery);
