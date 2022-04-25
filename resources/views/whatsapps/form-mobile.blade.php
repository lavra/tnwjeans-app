<div class="wa__popup_heading">
    <div class="wa__popup_intro">Oi! Clique no botão abaixo para conversar pelo <strong>WhatsApp ;)</strong>
        <div id="\&quot;eJOY__extension_root\&quot;"></div>
    </div>
</div>
<div class="wa__popup_content wa__popup_content_left">
    <div class="wa__popup_content_list">
        <div id="whatsapp-form-return"></div>
        <div class="wa__popup_content_item ">
            <a onclick="formWhatsapp('wa__stt_online')" href="javascript:void(0)" class="wa__stt wa__stt_online">
                <div class="wa__popup_avatar">
                    <div class="wa__cs_img_wrap" style="background: url({{$configCompany->logo}}) center center no-repeat; background-size: cover;"></div>
                </div>
                <div class="wa__popup_txt">
                    <div class="wa__member_name">{{$configCompany->fantasy}}</div>
                    <div class="wa__member_duty">{{$configCompany->department}}</div>
                </div>
            </a>
        </div>
        <form class="d-none" id="whatsapp-form" action="{{route('comment.whatsapp')}}" method="POST" onsubmit="return false">
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="whatsapp-name">Seu Nome <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="whatsapp-name" name="whatsapp[name]" value="999999" >
                </div>
                <div class="form-group col-md-6">
                    <label for="country-country">País <span class="text-danger">*</span></label>
                    <input type="text" id="country_selector" class="form-control" name="whatsapp[code]" value="999999" style="width: 150px" >
                </div>
                <div class="form-group col-md-6">
                    <label for="whatsapp-phone">DD Whatsapp <span class="text-danger">*</span></label>
                    <input type="number" class="form-control" id="whatsapp-phone" name="whatsapp[phone]" value="999999">
                </div>
                <div class="form-group col-md-12 d-none">
                    <label for="whatsapp-message">Mensagem <span class="text-danger">*</span></label>
                    <textarea class="form-control" id="whatsapp-message" name="whatsapp[message]"  rows="3">{{$configCompany->message_whatsapp}}</textarea>
                </div>
            </div>
        </form>
        <div class="wa__popup_notice text-dark">A equipe normalmente responde em alguns minutos.</div>
    </div>
</div>
