<link rel="apple-touch-icon" href="https://img.zohostatic.com/iam/M_3277848/images/apple-touch-icon.png" />

<html>
<head>
    <script type="text/javascript">
        (function (w, s) {
            var e = document.createElement("script");
            e.type = "text/javascript";
            e.async = true;
            e.src = "https://cdn.pagesense.io/js/gf3vpwny/69d532aafeb84a3983368483187479bc.js";
            var x = document.getElementsByTagName("script")[0];
            x.parentNode.insertBefore(e, x);
        })(window, "script");
    </script>

    <script src="https://js.zohostatic.com/iam/M_3277848/js/jquery-1.12.2.min.js" type="text/javascript"></script>
    <script src="https://js.zohostatic.com/iam/M_3277848/js/select2.min.js" type="text/javascript"></script>

    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <link rel="stylesheet" href="https://css.zohostatic.com/iam/M_3277848/css/flagStyle.css" />
</head>

<body>
<div class="error_box">
    <span class="tick"></span>
    <span class="error_message"></span>
</div>
<div class="popup">
    <div class="success_img"></div>
    <div class="success_text">Viva!</div>
    <div class="success_details"></div>
    <div class="info">
        <span class="link_text" onclick="goToTFAPage()">Clicar aqui </span>para gerar códigos de verificação secundários (caso perca o seu telefone ou não tenha acesso ao mesmo), adicione números de telefone secundários e obtenha
        palavras-passe da aplicação para aplicações autónomas, tais como clientes de correio POP/IMAP/Outlook, Jabber, etc.
    </div>
    <button class="btn green btn_center" id="continue_to_service" onclick="continueToService()">CONTINUAR PARA MAIL</button>
</div>
<div class="bg_blur"></div>

<div class="bodybg"></div>
<div class="left_illustration"></div>
<div class="container">
    <div class="zoho_logo"></div>

    <div class="heading">
        Ativar a autenticação de dois fatores.<br />
        Proteger a sua conta do Zoho.
    </div>

    <div class="content">
        Porque palavras-passe fortes não são suficientes para proteger a sua conta de violações de palavras-passe. Adicione uma camada extra de segurança para autenticar o início de sessão através de qualquer um dos seguintes:
    </div>

    <div class="selectedbox highlight_selectmode" id="oneauthmode_div">
        <div class="radio_btn">
            <input id="oneauthmode" type="radio" name="selectmode" class="realradiobtn" checked="checked" />
            <span class="radiobtn_style radio_on"></span>
            <label class="radiobtn_text" for="">OneAuth (Recomendado)</label>
        </div>
        <div class="mode_description">
            <div class="text">Suporta Face ID, Touch ID, impressão digital, notificação push, código QR e TOTP</div>
            <div class="download_link">
                <a
                        href="https&#x3a;&#x2f;&#x2f;www.zoho.com&#x2f;accounts&#x2f;oneauth.html&#x3f;utm_source&#x3d;tfa-banner-accounts&amp;utm_medium&#x3d;web&amp;utm_campaign&#x3d;oenauth-ms"
                        id="oneAuthButton"
                        class="btn_link"
                        onclick="continueToService()"
                        target="_blank"
                >
                    INSTALAR AGORA
                </a>
            </div>
        </div>
    </div>

    <div class="selectedbox" id="smsmode_div">
        <div class="radio_btn">
            <input id="smsmode" type="radio" name="selectmode" class="realradiobtn" />
            <span class="radiobtn_style radio_on"></span>
            <label class="radiobtn_text" for="">Número de telemóvel</label>
        </div>
        <div class="mode_description numberinput">
            <div class="text" id="enter_your_mob_msg">Introduza o seu número de telemóvel. Enviaremos um código de validação.</div>
            <div id="ode_container">
                <div class="textbox_with_btn" id="get_mobile">
                    <select id="combobox">
                        <option value="AF" data-num="+93">Afghanistan </option>

                        <option value="AL" data-num="+355">Albania </option>

                        <option value="DZ" data-num="+213">Algeria </option>

                        <option value="AS" data-num="+1">American Samoa </option>

                        <option value="AD" data-num="+376">Andorra </option>

                        <option value="AO" data-num="+244">Angola </option>

                        <option value="AI" data-num="+1">Anguilla </option>

                        <option value="AG" data-num="+1">Antigua and Barbuda </option>

                        <option value="AR" data-num="+54">Argentina </option>

                        <option value="AM" data-num="+374">Armenia </option>

                        <option value="AW" data-num="+297">Aruba </option>

                        <option value="AC" data-num="+247">Ascension </option>

                        <option value="AU" data-num="+61">Australia </option>

                        <option value="AX" data-num="+672">Australian External Territories </option>

                        <option value="AT" data-num="+43">Austria </option>

                        <option value="AZ" data-num="+994">Azerbaijan </option>

                        <option value="BS" data-num="+1">Bahamas </option>

                        <option value="BH" data-num="+973">Bahrain </option>

                        <option value="BD" data-num="+880">Bangladesh </option>

                        <option value="BB" data-num="+1">Barbados </option>

                        <option value="BY" data-num="+375">Belarus </option>

                        <option value="BE" data-num="+32">Belgium </option>

                        <option value="BZ" data-num="+501">Belize </option>

                        <option value="BJ" data-num="+229">Benin </option>

                        <option value="BM" data-num="+1">Bermuda </option>

                        <option value="BT" data-num="+975">Bhutan </option>

                        <option value="BO" data-num="+591">Bolivia </option>

                        <option value="BA" data-num="+387">Bosnia and Herzegovina </option>

                        <option value="BW" data-num="+267">Botswana </option>

                        <option value="BR" data-num="+55">Brazil </option>

                        <option value="VG" data-num="+1">British Virgin Islands </option>

                        <option value="BN" data-num="+673">Brunei Darussalam </option>

                        <option value="BG" data-num="+359">Bulgaria </option>

                        <option value="BF" data-num="+226">Burkina Faso </option>

                        <option value="BI" data-num="+257">Burundi </option>

                        <option value="KH" data-num="+855">Cambodia </option>

                        <option value="CM" data-num="+237">Cameroon </option>

                        <option value="CA" data-num="+1">Canada </option>

                        <option value="CV" data-num="+238">Cape Verde </option>

                        <option value="KY" data-num="+1">Cayman Islands </option>

                        <option value="CF" data-num="+236">Central African Republic </option>

                        <option value="TD" data-num="+235">Chad </option>

                        <option value="CL" data-num="+56">Chile </option>

                        <option value="CN" data-num="+86">China </option>

                        <option value="CO" data-num="+57">Colombia </option>

                        <option value="KM" data-num="+269">Comoros </option>

                        <option value="CG" data-num="+242">Congo </option>

                        <option value="CK" data-num="+682">Cook Islands </option>

                        <option value="CR" data-num="+506">Costa Rica </option>

                        <option value="CI" data-num="+225">Cote d&#x27;Ivoire </option>

                        <option value="HR" data-num="+385">Croatia </option>

                        <option value="CU" data-num="+53">Cuba </option>

                        <option value="CW" data-num="+599">Curacao </option>

                        <option value="CY" data-num="+357">Cyprus </option>

                        <option value="CZ" data-num="+420">Czech Republic </option>

                        <option value="CD" data-num="+243">Democratic Republic of the Congo </option>

                        <option value="DK" data-num="+45">Denmark </option>

                        <option value="DG" data-num="+246">Diego Garcia </option>

                        <option value="DJ" data-num="+253">Djibouti </option>

                        <option value="DM" data-num="+1">Dominica </option>

                        <option value="DO" data-num="+1">Dominican Republic </option>

                        <option value="TL" data-num="+670">East Timor </option>

                        <option value="EC" data-num="+593">Ecuador </option>

                        <option value="EG" data-num="+20">Egypt </option>

                        <option value="SV" data-num="+503">El Salvador </option>

                        <option value="GQ" data-num="+240">Equatorial Guinea </option>

                        <option value="ER" data-num="+291">Eritrea </option>

                        <option value="EE" data-num="+372">Estonia </option>

                        <option value="ET" data-num="+251">Ethiopia </option>

                        <option value="FK" data-num="+500">Falkland Islands </option>

                        <option value="FO" data-num="+298">Faroe Islands </option>

                        <option value="FJ" data-num="+679">Fiji </option>

                        <option value="FI" data-num="+358">Finland </option>

                        <option value="FR" data-num="+33">France </option>

                        <option value="GF" data-num="+594">French Guiana </option>

                        <option value="PF" data-num="+689">French Polynesia </option>

                        <option value="GA" data-num="+241">Gabon </option>

                        <option value="GM" data-num="+220">Gambia </option>

                        <option value="GE" data-num="+995">Georgia </option>

                        <option value="DE" data-num="+49">Germany </option>

                        <option value="GH" data-num="+233">Ghana </option>

                        <option value="GI" data-num="+350">Gibraltar </option>

                        <option value="GR" data-num="+30">Greece </option>

                        <option value="GL" data-num="+299">Greenland </option>

                        <option value="GD" data-num="+1">Grenada </option>

                        <option value="GP" data-num="+590">Guadeloupe </option>

                        <option value="GU" data-num="+1">Guam </option>

                        <option value="GT" data-num="+502">Guatemala </option>

                        <option value="GN" data-num="+224">Guinea </option>

                        <option value="GW" data-num="+245">Guinea-Bissau </option>

                        <option value="GY" data-num="+592">Guyana </option>

                        <option value="HT" data-num="+509">Haiti </option>

                        <option value="HN" data-num="+504">Honduras </option>

                        <option value="HK" data-num="+852">Hong Kong </option>

                        <option value="HU" data-num="+36">Hungary </option>

                        <option value="IS" data-num="+354">Iceland </option>

                        <option value="IN" data-num="+91">India </option>

                        <option value="ID" data-num="+62">Indonesia </option>

                        <option value="IR" data-num="+98">Iran </option>

                        <option value="IQ" data-num="+964">Iraq </option>

                        <option value="IE" data-num="+353">Ireland </option>

                        <option value="IL" data-num="+972">Israel </option>

                        <option value="IT" data-num="+39">Italy </option>

                        <option value="JM" data-num="+1">Jamaica </option>

                        <option value="JP" data-num="+81">Japan </option>

                        <option value="JO" data-num="+962">Jordan </option>

                        <option value="KZ" data-num="+7">Kazakhstan </option>

                        <option value="KE" data-num="+254">Kenya </option>

                        <option value="KI" data-num="+686">Kiribati </option>

                        <option value="XK" data-num="+383">Kosovo </option>

                        <option value="KW" data-num="+965">Kuwait </option>

                        <option value="KG" data-num="+996">Kyrgyzstan </option>

                        <option value="LA" data-num="+856">Laos </option>

                        <option value="LV" data-num="+371">Latvia </option>

                        <option value="LB" data-num="+961">Lebanon </option>

                        <option value="LS" data-num="+266">Lesotho </option>

                        <option value="LR" data-num="+231">Liberia </option>

                        <option value="LY" data-num="+218">Libya </option>

                        <option value="LI" data-num="+423">Liechtenstein </option>

                        <option value="LT" data-num="+370">Lithuania </option>

                        <option value="LU" data-num="+352">Luxembourg </option>

                        <option value="MO" data-num="+853">Macao </option>

                        <option value="MK" data-num="+389">Macedonia </option>

                        <option value="MG" data-num="+261">Madagascar </option>

                        <option value="MW" data-num="+265">Malawi </option>

                        <option value="MY" data-num="+60">Malaysia </option>

                        <option value="MV" data-num="+960">Maldives </option>

                        <option value="ML" data-num="+223">Mali </option>

                        <option value="MT" data-num="+356">Malta </option>

                        <option value="MH" data-num="+692">Marshall Islands </option>

                        <option value="MQ" data-num="+596">Martinique </option>

                        <option value="MR" data-num="+222">Mauritania </option>

                        <option value="MU" data-num="+230">Mauritius </option>

                        <option value="MX" data-num="+52">Mexico </option>

                        <option value="FM" data-num="+691">Micronesia </option>

                        <option value="MD" data-num="+373">Moldova </option>

                        <option value="MC" data-num="+377">Monaco </option>

                        <option value="MN" data-num="+976">Mongolia </option>

                        <option value="ME" data-num="+382">Montenegro </option>

                        <option value="MS" data-num="+1">Montserrat </option>

                        <option value="MA" data-num="+212">Morocco </option>

                        <option value="MZ" data-num="+258">Mozambique </option>

                        <option value="MM" data-num="+95">Myanmar </option>

                        <option value="NA" data-num="+264">Namibia </option>

                        <option value="NR" data-num="+674">Nauru </option>

                        <option value="NP" data-num="+977">Nepal </option>

                        <option value="NL" data-num="+31">Netherlands </option>

                        <option value="AN" data-num="+599">Netherlands Antilles </option>

                        <option value="NC" data-num="+687">New Caledonia </option>

                        <option value="NZ" data-num="+64">New Zealand </option>

                        <option value="NI" data-num="+505">Nicaragua </option>

                        <option value="NE" data-num="+227">Niger </option>

                        <option value="NG" data-num="+234">Nigeria </option>

                        <option value="NU" data-num="+683">Niue </option>

                        <option value="KP" data-num="+850">North Korea </option>

                        <option value="MP" data-num="+1">Northern Mariana Islands </option>

                        <option value="NO" data-num="+47">Norway </option>

                        <option value="OM" data-num="+968">Oman </option>

                        <option value="PK" data-num="+92">Pakistan </option>

                        <option value="PW" data-num="+680">Palau </option>

                        <option value="PS" data-num="+970">Palestine </option>

                        <option value="PA" data-num="+507">Panama </option>

                        <option value="PG" data-num="+675">Papua New Guinea </option>

                        <option value="PY" data-num="+595">Paraguay </option>

                        <option value="PE" data-num="+51">Peru </option>

                        <option value="PH" data-num="+63">Philippines </option>

                        <option value="PL" data-num="+48">Poland </option>

                        <option value="PT" data-num="+351">Portugal </option>

                        <option value="PR" data-num="+1">Puerto Rico </option>

                        <option value="QA" data-num="+974">Qatar </option>

                        <option value="RE" data-num="+262">Reunion </option>

                        <option value="RO" data-num="+40">Romania </option>

                        <option value="RU" data-num="+7">Russia </option>

                        <option value="RW" data-num="+250">Rwanda </option>

                        <option value="SH" data-num="+290">Saint Helena </option>

                        <option value="KN" data-num="+1">Saint Kitts and Nevis </option>

                        <option value="LC" data-num="+1">Saint Lucia </option>

                        <option value="PM" data-num="+508">Saint Pierre and Miquelon </option>

                        <option value="VC" data-num="+1">Saint Vincent and Grenadines </option>

                        <option value="WS" data-num="+685">Samoa </option>

                        <option value="SM" data-num="+378">San Marino </option>

                        <option value="ST" data-num="+239">Sao Tome and Principe </option>

                        <option value="SA" data-num="+966">Saudi Arabia </option>

                        <option value="SN" data-num="+221">Senegal </option>

                        <option value="RS" data-num="+381">Serbia </option>

                        <option value="SC" data-num="+248">Seychelles </option>

                        <option value="SL" data-num="+232">Sierra Leone </option>

                        <option value="SG" data-num="+65">Singapore </option>

                        <option value="SK" data-num="+421">Slovakia </option>

                        <option value="SI" data-num="+386">Slovenia </option>

                        <option value="SB" data-num="+677">Solomon Islands </option>

                        <option value="SO" data-num="+252">Somalia </option>

                        <option value="ZA" data-num="+27">South Africa </option>

                        <option value="KR" data-num="+82">South Korea </option>

                        <option value="SS" data-num="+211">South Sudan </option>

                        <option value="ES" data-num="+34">Spain </option>

                        <option value="LK" data-num="+94">Sri Lanka </option>

                        <option value="SD" data-num="+249">Sudan </option>

                        <option value="SR" data-num="+597">Suriname </option>

                        <option value="SZ" data-num="+268">Swaziland </option>

                        <option value="SE" data-num="+46">Sweden </option>

                        <option value="CH" data-num="+41">Switzerland </option>

                        <option value="SY" data-num="+963">Syria </option>

                        <option value="TW" data-num="+886">Taiwan </option>

                        <option value="TJ" data-num="+992">Tajikistan </option>

                        <option value="TZ" data-num="+255">Tanzania </option>

                        <option value="TH" data-num="+66">Thailand </option>

                        <option value="TG" data-num="+228">Togo </option>

                        <option value="TK" data-num="+690">Tokelau </option>

                        <option value="TO" data-num="+676">Tonga </option>

                        <option value="TT" data-num="+1">Trinidad and Tobago </option>

                        <option value="TN" data-num="+216">Tunisia </option>

                        <option value="TR" data-num="+90">Turkey </option>

                        <option value="TM" data-num="+993">Turkmenistan </option>

                        <option value="TC" data-num="+1">Turks and Caicos Islands </option>

                        <option value="TV" data-num="+688">Tuvalu </option>

                        <option value="UG" data-num="+256">Uganda </option>

                        <option value="UA" data-num="+380">Ukraine </option>

                        <option value="AE" data-num="+971">United Arab Emirates </option>

                        <option value="GB" data-num="+44">United Kingdom </option>

                        <option value="US" data-num="+1">United States </option>

                        <option value="UY" data-num="+598">Uruguay </option>

                        <option value="VI" data-num="+1">US Virgin Islands </option>

                        <option value="UZ" data-num="+998">Uzbekistan </option>

                        <option value="VU" data-num="+678">Vanuatu </option>

                        <option value="VA" data-num="+379">Vatican City </option>

                        <option value="VE" data-num="+58">Venezuela </option>

                        <option value="VN" data-num="+84">Vietnam </option>

                        <option value="WF" data-num="+681">Wallis and Futuna </option>

                        <option value="YE" data-num="+967">Yemen </option>

                        <option value="ZM" data-num="+260">Zambia </option>

                        <option value="ZW" data-num="+263">Zimbabwe </option>
                    </select>
                    <input id="mobilenumber" type="text" class="textbox" required="" />
                </div>
                <button class="textend_btn" id="sendcodebtn" onclick="addmobile()">ENVIAR CÓDIGO</button>
                <div id="error_sendcode_div" class="error_textbox"></div>
            </div>
        </div>
        <div id="verify_mobile">
            <div id="content_verify_edit">
                        <span id="edit_mob_msg">
                            Introduza o código de validação enviado para o seu número de telemóvel <span id="mobile_edit" style="font-weight: bold;"></span> <span id="edit_mob_btn" onclick="editMobile()">Editar</span>
                        </span>
            </div>
            <div class="textbox_with_btn">
                <input type="text" class="textbox" id="verification_code" required="" />
            </div>

            <button class="textend_btn" id="smsVerifyButton" onclick="verifycode()">VERIFICAR</button>
            <div class="error_textbox" id="error_verify_div"></div>
            <div id="resend_div" class="resend_btn" onclick="sendcode()">Reenviar</div>
        </div>
    </div>

    <div class="selectedbox" id="gauthmode_div">
        <div class="radio_btn">
            <input id="gauthmode" type="radio" name="selectmode" class="realradiobtn" />
            <span class="radiobtn_style radio_on"></span>
            <label class="radiobtn_text" for="">Google Authenticator</label>
        </div>
        <div class="mode_description">
            <div id="qr_display_div">
                        <span class="qrcode">
                            <img class="qrimg" id="gauthimg" alt="barcode image" />
                        </span>
                <span class="textwithqr">Transferir a aplicação Google Authenticator e ler este código QR. Obtenha o código gerado na aplicação e introduza-o abaixo. </span>
                <div class="manualentrytext"><span> Problema ao ler?</span> <span id="manual_entry" onclick="manualEntry()" class="resend_btn"> Utilize a entrada manual.</span></div>
            </div>
            <div id="manual_entry_div">
                <div id="manual_totp_code"></div>
                <div>Escolha a entrada manual na sua aplicação Google Authenticator e introduza a chave acima. Regresse a <span onclick="backToQrScan()" class="back_to_scan_qr">Ler código QR</span>.</div>
            </div>
        </div>

        <div class="textbox_with_btn" id="gauth_textbox_btn">
            <input type="text" id="gauth_code" class="textbox" required="" />
            <button id="gauth_ver_btn" class="textend_btn" onclick="verifyGauthCode()">VERIFICAR</button>
            <div id="error_gauthverify_div" class="error_textbox"></div>
        </div>
    </div>
    <button class="btn secoundary_btn inline" id="rmLaterBtn" onclick="remindMeLater()">Lembrar-me mais tarde</button>
</div>
</body>

<script type="text/javascript">
    var csrfParam = "iamcsrcoo=1aeeb7392988b8e72b8a86e020dc0c11bb77a3ec7068034b2561738d19a96963f640e51d8d0da2df8bd6c58225d00784da4d6ece9b4cf3ef730fbee1e26d6690"; //NO OUTPUTENCODING
    var contextpath = ""; //NO OUTPUTENCODING
    function goToTFAPage() {
        window.open(
            contextpath + "/u/h#security/authentication", //No I18N
            "_blank" //No I18N
        );
    }

    function continueToService() {
        window.location.href = "\x2Faccounts\x2Fannouncement\x2Ftfa\x2Dbanner\x2Fnext\x3Fstatus\x3D2\x26serviceurl\x3Dhttps\x253A\x252F\x252Fmail.zoho.com\x26servicename\x3DVirtualOffice";
    }

    function remindMeLater() {
        window.location.href = "\x2Faccounts\x2Fannouncement\x2Ftfa\x2Dbanner\x2Fnext\x3Fstatus\x3D3\x26serviceurl\x3Dhttps\x253A\x252F\x252Fmail.zoho.com\x26servicename\x3DVirtualOffice";
    }

    function manualEntry() {
        $("#qr_display_div").hide();
        $("#manual_entry_div").show();
    }
    function backToQrScan() {
        $("#qr_display_div").show();
        $("#manual_entry_div").hide();
    }

    function editMobile() {
        $("#verify_mobile").hide();
        $(".numberinput").show();
    }

    $(".textbox").focus(function () {
        $(".error_textbox").slideUp(200);
    });

    function addmobile() {
        var mobile = $("#mobilenumber").val();
        if (!isValidMobile(mobile)) {
            $("#error_sendcode_div").html("Introduza um número de telemóvel válido");
            $("#error_sendcode_div").slideDown(200);
            return;
        }

        var countryCode = $("#combobox option:selected").attr("value"); //No I18N
        var parms = { mobile: { ph: mobile, cc: countryCode } }; //No I18N
        parms = JSON.stringify(parms);
        var data = $.ajax({
            url: "/webclient/v1/mfa/setup/mobile", //No I18N
            data: parms,
            headers: {
                "X-ZCSRF-Token": csrfParam, //No I18N
            },
            type: "POST", //No I18N
            success: function (data, status, xhr) {
                successAddMobile(data);
            },
        }).mobile;
    }

    function successAddMobile(data) {
        var mobile = $("#mobilenumber").val();
        if (data.status_code == "429") {
            $(".error_message").html("Demasiadas tentativas.Tente novamente mais tarde.");
            $(".error_box").addClass("move_errordiv");
            $(".tick").addClass("cross");
            setTimeout(function () {
                $(".error_box").removeClass("move_errordiv");
            }, 3000);

            return;
        }
        if (data.mobile) {
            var msg = data.mobile.i18_message;
            if (data.mobile.status == "success") {
                $(".numberinput").hide();
                $("#verify_mobile").show();
                var dialingCode = $("#combobox option:selected").attr("data-num"); //No I18N
                $(".tick").removeClass("cross");
                $("#mobile_edit").html(dialingCode + " " + mobile);
                $(".error_message").html(msg);
                $(".error_box").addClass("move_errordiv");
                setTimeout(function () {
                    $(".error_box").removeClass("move_errordiv");
                }, 3000);

                return;
            } else if (data.mobile.status == "error") {
                //No I18N
                if (data.mobile.code == "U118") {
                    $("#error_sendcode_div").html(msg);
                    $("#error_sendcode_div").slideDown(200);
                    return;
                }
                $(".tick").addClass("cross");
                $(".error_message").html(msg);
                $(".error_box").addClass("move_errordiv");
                setTimeout(function () {
                    $(".error_box").removeClass("move_errordiv");
                }, 3000);

                return;
            } else if (data.mobile.status == "exception") {
                //No I18N
                $(".error_message").html(msg);
                $(".error_box").addClass("move_errordiv");
                $(".tick").addClass("cross");
                setTimeout(function () {
                    $(".error_box").removeClass("move_errordiv");
                }, 3000);

                return;
            }
        }
        var obj = JSON.parse(data);

        var ar = obj.cause;
        if (!isEmpty(ar)) {
            ar = ar.trim();
            if (ar === "invalid_password_token") {
                //No I18N
                var serviceurl = window.location.origin + window.location.pathname;
                var redirecturl = obj.redirect_url;
                window.location.href = contextpath + redirecturl + "?serviceurl=" + euc(serviceurl); //No I18N
                return;
            }
        } else {
            $(".error_message").html("Ocorreu um erro desconhecido. Contacto {0} ");
            $(".error_box").addClass("move_errordiv");
            $(".tick").addClass("cross");
            setTimeout(function () {
                $(".error_box").removeClass("move_errordiv");
            }, 3000);

            return;
        }
    }

    function sendcode() {
        var mobile = $("#mobilenumber").val();
        if (!isValidMobile(mobile)) {
            $("#error_sendcode_div").html("Introduza um número de telemóvel válido");
            $("#error_sendcode_div").slideDown(200);
            return;
        }
        var countryCode = $("#combobox option:selected").attr("value"); //No I18N
        var res = getPutResponse(contextpath + "/webclient/v1/mfa/setup/mobile/" + mobile.trim() + "/resend?cc=" + countryCode, csrfParam); //No I18N
        var obj = JSON.parse(res);
        var ar = obj.cause;
        if (obj.status_code == "429") {
            $(".error_message").html("Demasiadas tentativas.Tente novamente mais tarde.");
            $(".error_box").addClass("move_errordiv");
            $(".tick").addClass("cross");
            setTimeout(function () {
                $(".error_box").removeClass("move_errordiv");
            }, 3000);

            return;
        }
        if (!isEmpty(ar)) {
            ar = ar.trim();
            if (ar === "invalid_password_token") {
                //No I18N
                var serviceurl = window.location.origin + window.location.pathname;
                var redirecturl = obj.redirect_url;
                window.location.href = contextpath + redirecturl + "?serviceurl=" + euc(serviceurl); //No I18N
                return;
            }
        } else if (obj.resend[0].status == "success") {
            $(".numberinput").hide();
            $("#verify_mobile").show();
            var dialingCode = $("#combobox option:selected").attr("data-num"); //No I18N
            $(".tick").removeClass("cross");
            $("#mobile_edit").html(dialingCode + " " + mobile);
            $(".error_message").html(obj.resend[0].i18_message);
            $(".error_box").addClass("move_errordiv");
            setTimeout(function () {
                $(".error_box").removeClass("move_errordiv");
            }, 3000);

            return;
        } else if (obj.resend[0].status == "error") {
            $(".numberinput").hide();
            $("#verify_mobile").show();
            $(".tick").addClass("cross");
            var dialingCode = $("#combobox option:selected").attr("data-num"); //No I18N
            $("#mobile_edit").html(dialingCode + " " + mobile);
            $(".error_message").html(obj.resend[0].i18_message);
            $(".error_box").addClass("move_errordiv");
            setTimeout(function () {
                $(".error_box").removeClass("move_errordiv");
            }, 3000);

            return;
        } else if (obj.resend[0].status == "exception") {
            $(".error_message").html(obj.resend[0].i18_message);
            $(".error_box").addClass("move_errordiv");
            $(".tick").addClass("cross");
            setTimeout(function () {
                $(".error_box").removeClass("move_errordiv");
            }, 3000);

            return;
        } else {
            $(".error_message").html("Ocorreu um erro desconhecido. Contacto support@zohoaccounts.com ");
            $(".error_box").addClass("move_errordiv");
            $(".tick").addClass("cross");
            setTimeout(function () {
                $(".error_box").removeClass("move_errordiv");
            }, 3000);

            return;
        }
    }

    function verifyGauthCode() {
        var code = $("#gauth_code").val();
        if (!isValidCode(code)) {
            $("#error_gauthverify_div").html("Código de verificação inválido");
            $("#error_gauthverify_div").slideDown(200);
            return;
        }
        var en_tkn = "";
        var parms = { totpverify: { code: code } }; //No I18N
        parms = JSON.stringify(parms);
        var data = $.ajax({
            url: "/webclient/v1/mfa/setup/totp/verify", //No I18N
            data: parms,
            headers: {
                "X-ZCSRF-Token": csrfParam, //No I18N
            },
            type: "POST", //No I18N
            success: function (data, status, xhr) {
                redirectToTFAPage(data);
            },
            error: function (jqXhr, textStatus, errorMessage) {
                SuccesERRORMsg(errorMessage);
            },
        }).totpverify;
    }

    function SuccesERRORMsg(data) {
        $(".error_message").html("Ocorreu um erro desconhecido. Contacto support@zohoaccounts.com ");
        $(".error_box").addClass("move_errordiv");
        $(".tick").addClass("cross");
        setTimeout(function () {
            $(".error_box").removeClass("move_errordiv");
        }, 3000);

        return;
    }

    function redirectToTFAPage(data) {
        if (data.status_code == "429") {
            $(".error_message").html("Demasiadas tentativas.Tente novamente mais tarde.");
            $(".error_box").addClass("move_errordiv");
            $(".tick").addClass("cross");
            setTimeout(function () {
                $(".error_box").removeClass("move_errordiv");
            }, 3000);

            return;
        }
        if (data.totpverify) {
            var msg = data.totpverify.i18_message;
            if (data.totpverify.status == "success") {
                $(".tick").removeClass("cross");
                $(".error_message").html(msg);
                $(".error_box").addClass("move_errordiv");

                var msg = "Configurou com êxito o modo <b>Google Authenticator</b> para autenticar e proteger o início de sessão na conta do Zoho.";
                $(".success_details").html(msg);
                setTimeout(function () {
                    $(".error_box").removeClass("move_errordiv");
                }, 2000);

                $(".popup").show();
                $(".bg_blur").show();
                return;
            } else if (data.totpverify.status == "error") {
                //No I18N
                if (data.totpverify.code == "U117") {
                    $("#error_gauthverify_div").html(data.totpverify.i18_message);
                    $("#error_gauthverify_div").slideDown(200);
                    return;
                }
                $(".error_message").html(msg);
                $(".tick").addClass("cross");
                $(".error_box").addClass("move_errordiv");
                setTimeout(function () {
                    $(".error_box").removeClass("move_errordiv");
                }, 3000);

                return;
            } else if (data.totpverify.status == "exception") {
                //No I18N
                $(".error_message").html(msg);
                $(".error_box").addClass("move_errordiv");
                setTimeout(function () {
                    $(".error_box").removeClass("move_errordiv");
                }, 3000);

                return;
            }
        }
        var obj = JSON.parse(data);

        var ar = obj.cause;
        if (!isEmpty(ar)) {
            ar = ar.trim();
            if (ar === "invalid_password_token") {
                //No I18N
                var serviceurl = window.location.origin + window.location.pathname;
                var redirecturl = obj.redirect_url;
                window.location.href = contextpath + redirecturl + "?serviceurl=" + euc(serviceurl); //No I18N
                return;
            }
        } else {
            $(".error_message").html("Ocorreu um erro desconhecido. Contacto {0} ");
            $(".error_box").addClass("move_errordiv");
            $(".tick").addClass("cross");
            setTimeout(function () {
                $(".error_box").removeClass("move_errordiv");
            }, 3000);

            return;
        }
    }
    function isValidMobile(mobile) {
        if (mobile.trim().length != 0) {
            var mobilePattern = new RegExp("^([0-9]{5,12})$");
            if (mobilePattern.test(mobile)) {
                return true;
            }
        }
        return false;
    }

    function isValidCode(code) {
        if (code.trim().length != 0) {
            var codePattern = new RegExp("^([0-9]{5,7})$");
            if (codePattern.test(code)) {
                return true;
            }
        }
        return false;
    }

    function verifycode() {
        var mobile = $("#mobilenumber").val();
        var code = $("#verification_code").val();
        if (!isValidCode(code)) {
            $(".error_textbox").html("Código de verificação inválido");
            $(".error_textbox").slideDown(200);
            return;
        }
        var countryCode = $("#combobox option:selected").attr("value"); //No I18N

        var res = getPutResponse(contextpath + "/webclient/v1/mfa/setup/mobile/" + mobile.trim() + "/verify?cc=" + countryCode + "&code=" + code, csrfParam); //No I18N
        var obj = JSON.parse(res);
        var ar = obj.cause;
        if (obj.status_code == "429") {
            $(".error_message").html("Demasiadas tentativas.Tente novamente mais tarde.");
            $(".error_box").addClass("move_errordiv");
            $(".tick").addClass("cross");
            setTimeout(function () {
                $(".error_box").removeClass("move_errordiv");
            }, 3000);

            return;
        }
        if (!isEmpty(ar)) {
            ar = ar.trim();
            if (ar === "invalid_password_token") {
                //No I18N
                var serviceurl = window.location.origin + window.location.pathname;
                var redirecturl = obj.redirect_url;
                window.location.href = contextpath + redirecturl + "?serviceurl=" + euc(serviceurl); //No I18N
                return;
            }
        } else if (obj.verify[0].status == "success") {
            $(".error_message").html(obj.verify[0].i18_message);
            $(".error_box").addClass("move_errordiv");
            $(".tick").removeClass("cross");
            var msg = "Configurou com êxito o modo <b>SMS/Voice Call</b> para autenticar e proteger o início de sessão na conta do Zoho.";
            $(".success_details").html(msg);
            setTimeout(function () {
                $(".error_box").removeClass("move_errordiv");
            }, 3000);

            $(".popup").show();
            $(".bg_blur").show();
            return;
        } else if (obj.verify[0].status == "error") {
            if (obj.verify[0].code == "U117") {
                $("#error_verify_div").html(obj.verify[0].i18_message);
                $("#error_verify_div").slideDown(200);
                return;
            }
            $(".error_message").html(obj.verify[0].i18_message);
            $(".error_box").addClass("move_errordiv");
            $(".tick").addClass("cross");
            setTimeout(function () {
                $(".error_box").removeClass("move_errordiv");
            }, 7000);

            return;
        } else if (obj.verify[0].status == "exception") {
            $(".error_message").html(obj.verify[0].i18_message);
            $(".error_box").addClass("move_errordiv");
            $(".tick").addClass("cross");
            setTimeout(function () {
                $(".error_box").removeClass("move_errordiv");
            }, 3000);

            return;
        } else {
            $(".error_message").html("Ocorreu um erro desconhecido. Contacto support@zohoaccounts.com ");
            $(".error_box").addClass("move_errordiv");
            $(".tick").addClass("cross");
            setTimeout(function () {
                $(".error_box").removeClass("move_errordiv");
            }, 3000);

            return;
        }
    }

    $(".selectedbox").click(function () {
        var check = $(this).hasClass("highlight_selectmode");
        if (check) {
            return;
        }
        var checkopen = $(this).hasClass("highlight_selectmode");
        $(".realradiobtn").attr("checked", false); //No I18N
        if (checkopen == "1") {
            $(this).find(".realradiobtn").attr("checked", true); //No I18N
            $(this).find(".radio_btn").find(".realradiobtn").prop("checked", true); //No I18N
        } else {
            $(".selectedbox").find(".mode_description").slideUp(200);
            $(".selectedbox").removeClass("highlight_selectmode");
            $(this).addClass("highlight_selectmode");
            $(this).find(".mode_description").slideDown(200);
            $(this).find(".radio_btn").find(".realradiobtn").prop("checked", true); //No I18N
        }
        if (this.id == "oneauthmode_div") {
            $("#verify_mobile").hide();
        }
        if (this.id == "gauthmode_div") {
            $("#verify_mobile").hide();
            $("#gauth_textbox_btn").show();
            var resp2 = getOnlyGetPlainResponse("/webclient/v1/mfa/setup/totp/download", ""); //No I18N
            var a = JSON.parse(resp2);
            if (a.status_code == "200" && a.totpdownload[0].status != "error") {
                var b64 = a.totpdownload[0].b64;
                de("gauthimg").src = "data:image/jpg;base64, " + b64;
                var sk = a.totpdownload[0].sk;
                var dispkey = sk.substring(0, 4) + "<span class='totp_code'></span>" + sk.substring(4, 8) + "<span class='totp_code'></span>" + sk.substring(8, 12) + "<span class='totp_code'></span>" + sk.substring(12); //No I18N
                $("#manual_totp_code").html(dispkey);
                return;
            }

            $("#gauth_textbox_btn").show();

            var parms = { totpsecret: { en_tkn: "_e_t_" } }; //No I18N
            parms = JSON.stringify(parms);
            var data = $.ajax({
                url: "/webclient/v1/mfa/setup/totp/secret", //No I18N
                data: parms,
                headers: {
                    "X-ZCSRF-Token": csrfParam, //No I18N
                },
                type: "POST", //No I18N
                success: function (data, status, xnr) {
                    generateQR(data);
                },
                error: function (jqXhr, textStatus, errorMessage) {
                    handleSecretFailure(errorMessage);
                },
            }).totpsecret;
        } else {
            $("#gauth_textbox_btn").hide();
        }
    });

    function generateQR(data) {
        if (data.status_code == "429") {
            $(".error_message").html("Demasiadas tentativas.Tente novamente mais tarde.");
            $(".error_box").addClass("move_errordiv");
            $(".tick").addClass("cross");
            setTimeout(function () {
                $(".error_box").removeClass("move_errordiv");
            }, 3000);

            return;
        }
        if (data.totpsecret) {
            var resp2 = getOnlyGetPlainResponse("/webclient/v1/mfa/setup/totp/download", ""); //No I18N
            var a = JSON.parse(resp2);
            var b64 = a.totpdownload[0].b64;
            de("gauthimg").src = "data:image/jpg;base64, " + b64;

            var sk = a.totpdownload[0].sk;
            var dispkey = sk.substring(0, 4) + "<span class='totp_code'></span>" + sk.substring(4, 8) + "<span class='totp_code'></span>" + sk.substring(8, 12) + "<span class='totp_code'></span>" + sk.substring(12); //No I18N
            $("#manual_totp_code").html(dispkey);
            return;
        }
        var obj = JSON.parse(data);
        var ar = obj.cause;
        if (!isEmpty(ar)) {
            ar = ar.trim();
            if (ar === "invalid_password_token") {
                //No I18N
                var serviceurl = window.location.origin + window.location.pathname;
                var redirecturl = obj.redirect_url;
                window.location.href = contextpath + redirecturl + "?serviceurl=" + euc(serviceurl); //No I18N
                return;
            }
        }
    }

    function handleSecretFailure(data) {
        if (data.status_code == "429") {
            $(".error_message").html("Demasiadas tentativas.Tente novamente mais tarde.");
            $(".error_box").addClass("move_errordiv");
            $(".tick").addClass("cross");
            setTimeout(function () {
                $(".error_box").removeClass("move_errordiv");
            }, 3000);

            return;
        }
        $(".error_message").html("Erro ao gerar código QR. Tentar novamente mais tarde.");
        $(".error_box").addClass("move_errordiv");
        $(".tick").addClass("cross");
        setTimeout(function () {
            $(".error_box").removeClass("move_errordiv");
        }, 3000);

        return;
    }

    $("#combobox")
        .select2({
            templateResult: format,
            templateSelection: function (option) {
                return option.text;
            },
            escapeMarkup: function (m) {
                return m;
            },
        })
        .on("select2:open", function () {
            $(".select2-search__field").attr("placeholder", "Search..."); //No I18N
            selectIndent();
        });
    function selectIndent() {
        $("#mobilenumber").removeClass("textindent58");
        $("#mobilenumber").removeClass("textindent78");
        $("#mobilenumber").removeClass("textindent66");

        if ($("#select2-combobox-container").html().length == 3) {
            $("#mobilenumber").addClass("textindent66");
        }
        if ($("#select2-combobox-container").html().length == 2) {
            $("#mobilenumber").addClass("textindent58");
        }
        if ($("#select2-combobox-container").html().length == 4) {
            $("#mobilenumber").addClass("textindent78");
        }
    }

    $(document).ready(function () {
        $("#select2-combobox-container").html($("#combobox option:selected").attr("data-num"));
        $(".select2-selection--single").append("<span id='selectflag'></span>");
        selectFlag();
    });

    function selectFlag() {
        var flagpos = "flag_" + $("#combobox").find("option:selected").attr("data-num").slice(1) + "_" + $("#combobox").find("option:selected").val();
        $("#selectflag").attr("class", ""); //No I18N
        $("#selectflag").addClass(flagpos); //No I18N
        //$("#combobox").find('option:selected');
    }

    $("#combobox").change(function () {
        $(".country_code").html($("#combobox option:selected").attr("data-num"));
        $("#select2-combobox-container").html($("#combobox option:selected").attr("data-num"));
        selectFlag();
        selectIndent();
    });

    function format(option) {
        var spltext;
        if (!option.id) {
            return option.text;
        }
        spltext = option.text.split("(");
        var num_code = $(option.element).attr("data-num");
        var string_code = $(option.element).attr("value");

        var ob = '<div class="pic flag_' + num_code.slice(1) + "_" + string_code + '" ></div><span class="cn">' + spltext[0] + "</span><span class='cc'>" + num_code + "</span>";
        return ob;
    }
</script>
</html>
