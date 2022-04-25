(function($) {

    const ipInfo = 'https://ipinfo.io?token=11df3951a4c876';

    /**
     * Desabilita um elemento especifíco.
     * @param ele
     */
    disabledEle = function(ele) {
        $('#'+ele).html('<a href="javascript:void(0);" class="fas fa-spinner fa-pulse"></a>');
    }

    /**
     * Habilita um elemento especifíco
     * @param ele
     * @param a
     */
    enabledEle = function(ele, a) {
        setTimeout(function(){
            $('#'+ele).html(a);
        }, 3000);

    }

    /**
     * Adiciona as informações do visitante ao post.
     * @param a
     */
    formWhatsapp = function(ele) {
        $.get(ipInfo, function(response) {
            console.log(response);
            var data = {
                name: $('#whatsapp-name').val(),
                code: $('#country_selector').val(),
                phone: $('#whatsapp-phone').val(),
                message: $('#whatsapp-message').val(),
                ip: response.ip,
                local: response.loc,
                city: response.city,
                region: response.region,
                country: response.country,
                zip_code: response.postal
            };
            sendFormWhatsapp(ele, data);
        }, "jsonp");
    }

    /**
     * Envia dados do visitante e redireciona para page do Whatsapp.
     * @param a
     */
    sendFormWhatsapp = function(ele, data) {
        $('.'+ele).attr('disabled', true);
        $('#whatsapp-form-return').html('');
        $.ajax({
            url: '/ajax/comment/whatsapp',
            type: 'POST',
            dataType: 'Json',
            data: data,
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            success: function (data) {
                $('.'+ele).attr('disabled', false);
                if (data.success == true) {
                    var msg = alertDisplay('success', data.message);
                    $('#whatsapp-form').each (function(){
                        this.reset();
                        $('#whatsapp-name').removeClass('is-invalid');
                        $('#country_selector').removeClass('is-invalid');
                        $('#whatsapp-phone').removeClass('is-invalid');
                        $('#whatsapp-message').removeClass('is-invalid');
                    });
                    window.open(data.redirect);
                    closeBoxWhatsapp();
                } else {
                    var msg = alertDisplay('danger', data.message);
                    $('#whatsapp-form-return').html(msg);
                    $.each(data, function(k, v) {
                        $.each(v, function(k1, v1) {
                            if ($('#whatsapp-'+k1).val() == '') {
                                $('#whatsapp-'+k1).addClass('is-invalid');
                            }
                        });
                    });
                }

                $('#whatsapp-form-return').fadeOut(6000);
            },
            error: function () {
                $('.'+ele).attr('disabled', false);
                var msg = alertDisplay('danger', 'Houve um erro no servidor.');
                $('#whatsapp-form-return').html(msg);
                $('#whatsapp-form-return').fadeOut(6000);
            }
        });
    }


    /**
     * Close box whatsApp
     */
    function closeBoxWhatsapp() {
        if ($(".wa__popup_chat_box").hasClass("wa__active")) {
            $(".wa__popup_chat_box").removeClass("wa__active");
            $(".wa__btn_popup").removeClass("wa__active");
            clearTimeout(wa_time_in);
            if ($(".wa__popup_chat_box").hasClass("wa__lauch")) {
                wa_time_out = setTimeout(function() {
                    $(".wa__popup_chat_box").removeClass("wa__pending");
                    $(".wa__popup_chat_box").removeClass("wa__lauch");
                }, 400);
            }
        }
    }


    shareWhatsapp = function(id, idpro, ele) {
        var a = $('#'+ele).html();
        disabledEle(ele);

        $.get(ipInfo, function(response) {
            var data = {
                id: idpro,
                ip: response.ip,
                local: response.loc,
                city: response.city,
                region: response.region,
                country: response.country,
                zip_code: response.postal,
                social_network_id: id
            };
            postWhatsapp(data, ele, a);
        }, "jsonp");
    }

    postWhatsapp = function(data, ele, a)
    {
        $.ajax({
            url: '/ajax/social/share',
            type: 'POST',
            dataType: 'Json',
            data: data,
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            success: function (data) {
                if (data.redirect) {
                    enabledEle(ele, a);
                    window.open(data.redirect, '_blank');
                }
            },
            error: function () {
                enabledEle(ele, a);
            }
        });
    }


    /**
     * Compartilhar com facebook
     * @param id
     * @param idpro
     * @param ele
     */
    shareFacebook = function (id, idpro, ele) {
        var a = $('#'+ele).html();
        disabledEle(ele);
        $.get(ipInfo, function(response) {
            var data = {
                id: idpro,
                ip: response.ip,
                local: response.loc,
                city: response.city,
                region: response.region,
                country: response.country,
                zip_code: response.postal,
                social_network_id: id
            };
            postFacebook(data, ele, a);
        }, "jsonp");
    };

    /**
     * Passa os atributos para o analitic e redireciona para url de compartilhamento do facebook.
     * @param data
     */
    postFacebook = function(data, ele, a) {
        $.ajax({
            url: '/ajax/social/share',
            type: 'POST',
            dataType: 'Json',
            data: data,
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            success: function (data) {
                if (data.redirect) {
                    enabledEle(ele, a);
                    window.open(data.redirect, '_blank');
                }
            },
            error: function () {
                enabledEle(ele, a);
            }
        });
    }

    /**
     * Vai fazer compras
     * @param id
     * @param idpro
     */
    goShopping = function (id, idpro, ele) {
        $('.'+ele).attr('disabled', true);
        $.get(ipInfo, function(response) {
            var data = {
                product_id: idpro,
                ip: response.ip,
                local: response.loc,
                city: response.city,
                region: response.region,
                country: response.country,
                zip_code: response.postal,
                social_network_id: id
            };
            postShopping(data, ele);
        }, "jsonp");
    }

    /**
     * Post fazer compras
     * @param data
     * @param ele
     * @param a
     * social/share/{network}/{id}'
     */
    postShopping = function(data, ele) {
        $.ajax({
            url: '/ajax/product/'+data.product_id,
            type: 'POST',
            dataType: 'Json',
            data: data,
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            success: function (data) {
                if (data.redirect) {
                    $('.'+ele).attr('disabled', false);
                    window.location.href = data.redirect;
                }
            },
            error: function () {
                $('.'+ele).attr('disabled', false);
            }
        });
    }



    /**
     * Verifica a Rede Social e a localização do usuário
     *
     * @param id
     */
    socialFollow = function (id, ele) {
        var a = $('#'+ele).html();
        disabledEle(ele);
        $.get(ipInfo, function(response) {
            var data = {
                ip: response.ip,
                local: response.loc,
                city: response.city,
                region: response.region,
                country: response.country,
                zip_code: response.postal,
                social_network_id: id
            };
            postFollow(data, ele, a);
        }, "jsonp");
    };

    /**
     * Passa os atributos para o analitic e redireciona para url social.
     * @param data
     */
    postFollow = function(data, ele, a) {
        $.ajax({
            url: 'ajax/social/follow',
            type: 'POST',
            dataType: 'Json',
            data: data,
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            success: function (data) {
                if (data.redirect) {
                    window.location.href = data.redirect;
                    enabledEle(ele, a);
                }
            },
            error: function () {
                enabledEle(ele, a);
            }
        });
    }

    alertDisplay = function(cls, msg) {
        return '<div class="alert alert-'+cls+'">' + msg +'</div>';
    }

})(jQuery);