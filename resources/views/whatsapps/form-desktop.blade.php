<div class="wa__popup_heading">
    <div class="wa__popup_intro">Prrencha o formulário abaixo e clique em  <strong>Continuar</strong>.
        <div id="\&quot;eJOY__extension_root\&quot;"></div>
    </div>
</div>
<div class="wa__popup_content wa__popup_content_left">
    <div class="wa__popup_content_list">
        <div id="whatsapp-form-return"></div>
            <form id="whatsapp-form" action="{{route('comment.whatsapp')}}" method="POST" onsubmit="return false">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="whatsapp-name">Seu Nome <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="whatsapp-name" name="whatsapp[name]" >
                    </div>
                    <div class="form-group col-md-6">
                        <label for="country-country">País <span class="text-danger">*</span></label>
                        <input type="text" id="country_selector" class="form-control" name="whatsapp[code]" style="width: 150px" >
                    </div>
                    <div class="form-group col-md-6">
                        <label for="whatsapp-phone">DD Whatsapp <span class="text-danger">*</span></label>
                        <input type="number" class="form-control" id="whatsapp-phone" name="whatsapp[phone]"  placeholder="99 99999999" style="width: 150px">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="whatsapp-message">Mensagem <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="whatsapp-message" name="whatsapp[message]">

                        <!--<textarea class="form-control" id="whatsapp-message" name="whatsapp[message]"  rows="1"></textarea>-->
                    </div>
                    <div class="form-group col-md-12 text-center">
                        <button type="submit" onclick="formWhatsapp('whatsapp-submit')" class="btn whatsapp-submit wa__popup_chat_box_btn_confirm mb-2">Continuar</button>
                    </div>
                </div>
            </form>
        <div class="wa__popup_notice text-dark">A equipe normalmente responde em alguns minutos.</div>
    </div>
</div>
