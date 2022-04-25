<div class="product=inline-share-buttons"></div>
<!-- BTN POPUP -->
<div class="wa__btn_popup">
    <div class="wa__btn_popup_txt">Preciso de ajuda? <strong>Converse conosco </strong></div>
    <div class="wa__btn_popup_icon"></div>
</div>
<div class="wa__popup_chat_box">
    @if($isMobile)
        @include('whatsapps.form-mobile')
    @else
        @include('whatsapps.form-desktop')
    @endif
</div>
