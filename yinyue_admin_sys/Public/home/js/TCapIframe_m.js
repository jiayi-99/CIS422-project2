!function(e){function t(e){var t=window.innerWidth||document.documentElement.clientWidth||document.body.clientWidth,i=window.innerHeight||document.documentElement.clientHeight||document.body.clientHeight,n=0;"orientation"in window?n=window.orientation:screen&&screen.orientation&&(n=screen.orientation.angle);var o=90===Math.abs(n)?i:t,s=16*(o/320),r={width:4*s+"px",height:4*s+"px",marginTop:6*s+"px",backgroundPosition:s*-.2275+"px "+s*-.17+"px",backgroundSize:8.4375*s+"px "+8.28125*s+"px"},a={height:1.8*s+"px",width:1.8*s+"px",bottom:1*s+"px",right:1*s+"px",backgroundPosition:s*-2.75+"px "+s*-4.5625+"px",backgroundSize:8.4375*s+"px "+8.28125*s+"px"},d={top:1.4*s+"px",left:1*s+"px",width:.5*s+"px",height:.5*s+"px",marginTop:-.125*s+"px"},c={width:4*s+"px",height:2.1*s+"px",lineHeight:1.5*s+"px",fontSize:.9375*s+"px",left:2*_+"px",marginTop:.6875*s+"px"},h={height:2.1*s+"px",fontSize:1.0625*s+"px",marginTop:.6875*s+"px"},p={fontSize:1*s+"px",marginTop:10.5*s+"px"},l={fontSize:.9*s+"px",marginTop:12*s+"px"};if(window.document.getElementById("tcaptcha_transform"))var u=window.document.getElementById("ticon_refresh"),m=window.document.getElementById("transform_header"),f=window.document.getElementById("transform_text"),g=window.document.getElementById("transform_close"),w=window.document.getElementById("transform_eicon"),y=window.document.getElementById("transform_eb"),v=window.document.getElementById("transform_eh");e?(u&&S(u,r),m&&S(m,p),f&&S(f,l),g&&S(g,a)):(u&&S(u,r),m&&S(m,p),f&&S(f,l),w&&S(w,d),y&&S(y,c),v&&S(v,h))}function i(e){var t="#4886ff";if(e){var i=decodeURIComponent(e),n=/^[0-9a-fA-F]{6}$/g;i&&i.indexOf("#")==-1&&6==i.length&&n.test(i)&&(t="#"+i)}return t}function n(e,t,i){if(e.indexOf("?")!=-1){var n=new RegExp("(\\?|&"+t+")=[^&]*");e=n.test(e)?e.replace(n,"$1="+i):e+"&"+t+"="+i}else e=e+"?"+t+"="+i;return e}function o(e,t){for(var i in t)e=n(e,encodeURIComponent(i),encodeURIComponent(t[i]));return e}function s(){return C||(C=this.init.apply(this,arguments))}function r(e,t){if("number"==typeof window.orientation&&"object"==typeof window.onorientationchange&&(window.orientation==-90||90==window.orientation))return!0;if(e){if(t.windowHeight<t.windowWidth)return!0}else if(window.innerHeight<window.innerWidth)return!0;return!1}function a(e,t,i){var n=0,o=0,s=window.innerWidth||document.documentElement.clientWidth||document.body.clientWidth,r=window.innerHeight||document.documentElement.clientHeight||document.body.clientHeight;return n=(r-i)/2,o=(s-t)/2,S(e,{top:n+"px",left:o+"px"})}function d(e,t,i,n,o){e=parseInt(e,10),t=parseInt(t,10);var s=E["default"].width,d=E["default"].height;if(0!=e&&1!=e||0!=t||(s=E["char"].width,d=E["char"].height),1!=e&&2!=e||1!=t&&4!=t&&7!=t||(s=E.click.width,d=E.click.height),1!=e&&2!=e||8!=t||(s=E.slide.width,d=E.slide.height),1!=e&&2!=e||9!=t||(s=E.slidepuzzle.width,d=E.slidepuzzle.height),1!=e&&2!=e||10!=t||(s=E.slidepuzzle_new.width,d=E.slidepuzzle_new.height),1!=e&&2!=e||11!=t||(s=E.vtt.width,d=E.vtt.height),1!=e&&2!=e||12!=t||(s=E.f_limit.width,d=E.f_limit.height),1!=e&&2!=e||13!=t||(s=E.slidepuzzle_cdn.width,d=E.slidepuzzle_cdn.height),1!=e&&2!=e||14!=t||(s=E.slidepuzzle_new.width,d=E.slidepuzzle_new.height),n){var c=i.windowWidth,h=i.windowHeight;window.document.getElementById("tcaptcha_transform")?a(window.document.getElementById("tcaptcha_transform"),i.sizeSC.width,i.sizeSC.height):a(window.document.getElementById("tcaptcha_iframe"),i.sizeSC.width,i.sizeSC.height)}else{var c=window.innerWidth||document.documentElement.clientWidth||document.body.clientWidth,h=window.innerHeight||document.documentElement.clientHeight||document.body.clientHeight;i.windowWidth=c,i.windowHeight=h}var p="popup"==i.opts.type&&i.opts.fwidth?parseFloat(i.opts.fwidth):0;if(p>0&&p<=2*s*16){var l=p/(16*s),u=parseInt(1e4*l)/1e4;s=s*u*16+3,d=d*u*16+3,1==o&&i.readyFunc&&i.readyFunc({state:2,info:"",fwidth:s-3,fheight:d-3}),i.sizeSC.width=parseInt(s),i.sizeSC.height=parseInt(d),i.posSC.top="0px",i.posSC.left="0px"}else{var m=Math.min(c/f),g=Math.min(h/f);if(r(n,i)){g=.85*g,g=g>1.5?1.5:g,g=g<.85?.85:g;var u=parseInt(1e4*g)/1e4;s=s*u*16+3,d=d*u*16+3}else{m=m>1.5?1.5:m,m=m<.85?.85:m;var u=parseInt(1e4*m)/1e4;s=s*u*16+3,d=d*u*16+3}i.sizeSC.width=parseInt(s),i.sizeSC.height=parseInt(d),h-d<0?i.posSC.top="0px":i.posSC.top=(h-d)/2+"px",i.posSC.left=(c-s)/2+"px",1!=e&&2!=e||10!=t&&11!=t&&12!=t&&13!=t&&14!=t||(i.posSC.left=(c-s-2)/2+"px")}}function c(e){return document.createElement(e)}function h(e,t){return!(1!=e&&2!=e||10!=t&&11!=t&&13!=t&&14!=t)}!function(){var e=["c2","c3","c11","c12","c21","c22","c23"],t={"zh-cn":["安全验证","验证成功","返回","验证中...","验证成功","尝试太多了","2s后自动为您刷新验证码"],"zh-hk":["安全驗證","驗證成功","返回","驗證中⋯","驗證成功","錯誤次數太多","驗證碼將於 2 秒後自動更新"],"zh-tw":["安全驗證","驗證成功","返回","驗證中...","驗證成功","嘗試次數太多","2秒後自動為您重新整理驗證碼"],en:["Security Verification","Verification is successful","Back","Verifying...","Verification is successful","Refreshing too often","Verification Code will refresh in 2 sec."],ar:["التحقق من الحماية","نجاح التحقق","عودة","جاري التحقق...","نجاح التحقق","كثرة التحديث","سيتم تحديث كود التحقق خلال 2 ثانية."],my:["လံုၿခံဳေရးအတည္ျပဳျခင္း","အတည္ျပဳမႈ ေအာင္ျမင္ပါသည္","ေနာက္သို႔","အတည္ျပဳေနသည္...","အတည္ျပဳမႈ ေအာင္ျမင္ပါသည္","မၾကာခနျပန္ဖြင့္ေနရသည္။","2 စကၠန္႔အတြင္း အတည္ျပဳရန္Code အသစ္ေပၚပါမည္"],fr:["Vérification de sécurité","La vérification est réussie","Retour","Vérification...","La vérification est réussie","Trop actualisé","Le code de vérification s'actualisera dans 2 sec."],de:["Sicherheitsbestätigung","Verifizierung erfolgreich","Zurück","Wird verifziert …","Verifizierung erfolgreich","Zu oft aktualisiert","Verifizierungscode wird in 2 Sekunden aktualisiert."],he:["אימות אבטחה","האימות עבר בהצלחה","חזרה","מאמת","האימות עבר בהצלחה","מרענן לעתים קרובות מידי","קוד האימות יתחדש בתוך 2 שניות"],hi:["सुरक्षा सत्यापन","सत्यापन सफल","पीछे","सत्यापन जारी...","सत्यापन सफल","अक्सर रीफ्रेश हो रहा है।","सत्यापन कोड 2 सेक. में रीफ्रेश होगा"],id:["Verifikasi Keamanan","Verifikasi berhasil","Kembali","Memverifikasi...","Verifikasi berhasil","Terlalu sering merefresh.","Kode Verifikasi akan di-refresh dalam 2 detik."],it:["Verifica di sicurezza","Verifica completata","Indietro","Verifica in corso","Verifica completata","Troppo frequente","Il codice di verifica sarà aggiornato tra 2 secondi"],ja:["セキュリティ認証","認証が正常に完了","戻る","認証中…","認証が正常に完了","更新頻度が高すぎます","認証コードは2秒後にリフレッシュされます。"],ko:["보안 인증","인증 성공","뒤로가기","인증 중...","인증 성공","새로고침이 너무 잦습니다","인증 코드가 2초 후에 새로고침 됩니다."],lo:["ການຢືນຢັນຄວາມປອດໄພ","ການຢືນຢັນໄດ້ສຳເລັດແລ້ວ","ກັບຄືນ","ກຳລັງຢືນຢັນ...","ການຢືນຢັນໄດ້ສຳເລັດແລ້ວ","ຟື້ນຟູຄືນເລື້ອຍໆ","ລະຫັດຢືນຢັນຈະມີການຟື້ນຟູຄືນໃຫມ່ພາຍໃນ 2 ວິນາທີ"],ms:["Pengesahan Keselamatan","Pengesahan berjaya","Kembali","Mengesahkan...","Pengesahan berjaya","Terlalu kerap segar semula","Kod Pengesahan akan disegar semula dalam 2 saat"],pl:["Weryfikacja bezpieczeństwa","Weryfikacja powiodła się","Wstecz","Weryfikowanie...","Weryfikacja powiodła się","Za często odświeżasz","Kod weryfikacyjny zostanie odświeżony za 2 s."],pt:["Verificação de Segurança","Verificado com sucesso","Voltar","Verificando...","Verificado com sucesso","Atualizando muito","Código de Verificação será atualizado em 2 seg."],ru:["Проверка в целях безопасности","Проверка пройдена","Назад","Проверка...","Проверка пройдена","Слишком частое обновление","Проверочный код будет обновлен через 2 сек."],es:["Verificación de seguridad","Verificación correcta","Atrás","Verificando...","Verificación correcta","Actualización muy frecuente","El código se actualizará en 2 segundos."],th:["การยืนยันความปลอดภัย","การยืนยันสำเร็จแล้ว","กลับ","กำลังยืนยัน...","การยืนยันสำเร็จแล้ว","รีเฟรชบ่อยเกินไป","รหัสการยืนยันจะรีเฟรชภายใน 2 วินาที"],tr:["Güvenlik Doğrulaması","Doğrulama başarılı","Geri","Doğrulanıyor","Doğrulama başarılı","Yenilemeler çok sık","Doğrulama Kodu 2 sn. sonra yenilenecek."],vi:["Xác minh bảo mật","Xác minh thành công","Quay lại","Đang xác minh...","Xác minh thành công","Làm mới quá thường xuyên","Mã xác minh sẽ được làm mới sau 2 giây."]};t.zh=t["zh-cn"],t.iw=t.he,t["in"]=t.id;var i={2052:"zh-cn",1028:"zh-hk",1033:"en"},n="zh";/MicroMessenger/.test(navigator.userAgent)&&(n="en");var o=function(){var e;return e=navigator.languages&&navigator.languages[0]?navigator.languages[0]:navigator.language||navigator.userLanguage,e?e.toLowerCase().replace(/_/,"-"):null}(),s={rightToLeft:!1};s.total=t,s.init=function(r){var a;a=r?/^\d+$/.test(r)?i[r]||o||n:r.toLowerCase().replace(/_/,"-"):o||n;var d=a;/-/.test(a)&&(d=a.split("-")[0]),t[a]||(a=t[d]?d:n);for(var c=t[a],h=0;h<e.length;h++)s[e[h]]=void 0===c[h]?t[n][h]:c[h];"ar"!==a&&"he"!==a&&"iw"!==a||(s.rightToLeft=!0),s.currentLanguage=a},s.init(),window.captchaSimple=s}();var p=window.captchaSimple,l={securityCode:"securityCode"},u=function(e,t){return e.currentStyle?e.currentStyle[t]:document.defaultView.getComputedStyle(e,!1)[t]},m=function(e){return function(t){return Object.prototype.toString.call(t)=="[object "+e+"]"}},f=320,g=m("Object"),w=m("Function"),y=window.innerWidth||document.documentElement.clientWidth||document.body.clientWidth,v=window.innerHeight||document.documentElement.clientHeight||document.body.clientHeight,x=0;"orientation"in window?x=window.orientation:screen&&screen.orientation&&(x=screen.orientation.angle);var C,b=90===Math.abs(x)?v:y,_=16*(b/320),z={height:8,width:8},S=function(e,t){if(e&&t){if(g(t)){for(var i in t)e.style[i]=t[i];return t}return u(e,t)}},I=function(e,t,i){i=i||!1;var n={};for(var o in t)e[o]=t[o];if(i){for(var o in e)n[o]=e[o];return n}return e},E={"char":{width:18.6,height:13.6},click:{width:18.2,height:19.6},slide:{width:18.2,height:18.1},slidepuzzle:{width:18.2,height:16.1},slidepuzzle_new:{width:19,height:19},slidepuzzle_cdn:{width:19,height:19},vtt:{width:19,height:19},f_limit:{width:18.6,height:13.6},"default":{width:"100%",height:"100%"}},k=0,B=10,T={top:"0%",left:"0%"},F={ele:document.body,src:"",uid:"",capcd:"",startFn:function(){},endFn:function(){}},W=function(e){var t=window.document.getElementsByTagName("script")[0],i=window.document.createElement("script"),n=e.callback||"callback",s="_aq_"+Math.floor(1e6*Math.random()),r=window[s]=e.success||function(){},a=e.url,d={};d[n]=s,e.data&&(d=I(d,e.data)),a=o(a,d),i.async=e.async||!0,i.src=a,i.onload=function(){i&&t.parentNode&&t.parentNode.removeChild(i),r=null},t.parentNode.insertBefore(i,t)},L=function(){var e=location.search,t=/(wehcat_real_lang|wechat_real_lang)=([a-zA-Z_\-]+)/.exec(e);if(t)return t[2];for(var i=document.getElementsByTagName("script"),n=0;n<i.length;n++){var o=i[n].src;if(o&&/TCapIframeApi/i.test(o)){var s=/lang=([a-zA-Z_\-]+)/.exec(o);if(s)return s[1].toLowerCase()}}return""};s.prototype={init:function(e){return this.wxLang=L(),this.opts=I(F,e||{}),this.initOptions(),this.initLang(),this.listenFunc=[],this.readyFunc=function(){},this.msg=new TCapMsg("parent"),this.initListener(),this.windowHeight=0,this.windowWidth=0,this.sess="",this},initOptions:function(){this.ele=this.opts.ele?this.opts.ele==document?document.body:this.opts.ele:document.body,this.opts.type&&"popup"==this.opts.type&&(this.ele=document.body),this.ticket="",this.randstr="",null==this.sizeSC&&(this.sizeSC=I({},E["default"])),null==this.posSC&&(this.posSC=I({},T)),this.securityIframe="",this.startY=0,this.moveY=0},initLang:function(){if(this.wxLang)captchaSimple.init(this.wxLang);else{var e=/lang=([\d]{4})/.exec(this.opts.params);e&&captchaSimple.init(e[1])}},initListener:function(){var e=this;this.msg.listen(function(t){try{t=JSON.parse(t)}catch(i){return}if(t&&t.message&&t.message.type&&(t=t.message,t&&"undefined"!=typeof t.type)){var n=t.type;switch(n){case 3:if(t&&t.ticket){e.ticket=t.ticket,e.randstr=t.randstr;for(var s=0,r=e.listenFunc.length;s<r;s++)e.closeSecurityCode(function(){e.listenFunc[s]({ret:0,ticket:t.ticket,randstr:t.randstr})});if(e.listenFunc.length||e.closeSecurityCode(),window.document.getElementById("tcaptcha_transform")){var a=window.document.getElementById("tcaptcha_transform");a.parentNode.removeChild(a)}if(window.document.getElementById("t_mask")){var c=window.document.getElementById("t_mask");document.body.removeChild(c)}}return;case 4:for(var s=0,r=e.listenFunc.length;s<r;s++)e.closeSecurityCode(function(){e.listenFunc[s]({ret:1,ticket:"",randstr:""})});if(e.listenFunc.length||e.closeSecurityCode(),window.document.getElementById("tcaptcha_transform")){var a=window.document.getElementById("tcaptcha_transform");a.parentNode.removeChild(a)}return;case 6:for(var s=0,r=e.listenFunc.length;s<r;s++)e.closeSecurityCode(function(){e.listenFunc[s]({ret:2,ticket:"",randstr:""})});if(e.listenFunc.length||e.closeSecurityCode(),window.document.getElementById("tcaptcha_transform")){var a=window.document.getElementById("tcaptcha_transform");a.parentNode.removeChild(a)}if(window.document.getElementById("t_mask")){var c=window.document.getElementById("t_mask");c.parentNode.removeChild(c)}return;case 7:if(window.document.getElementById("t_verify")){var p=window.document.getElementById("t_verify");window.document.body.removeChild(p)}S(e.securityIframe,{background:"#ffffff","border-radius":"3px",opacity:"1"});var l={height:e.sizeSC.height+"px",width:e.sizeSC.width+"px"};return void S(e.securityIframe,l);case 8:e.sess=t.sess;var u,m,f=e.opts.domain+"/"+e.opts.gettype+e.opts.params+"&cap_cd="+e.opts.capcd+"&uid="+e.opts.uid;return void W({url:f,data:{sess:e.sess},success:function(t){e.src=e.opts.domain+"/"+t.src_1+e.opts.params+"&sess="+t.sess+"&fwidth="+e.opts.fwidth+"&sid="+t.sid;var i={uid:e.opts.uid,cap_cd:e.opts.capcd,rnd:Math.floor(1e6*Math.random()),forcestyle:e.opts.forcestyle,wxLang:e.wxLang};e.src=o(e.src,i),e.sess=t.sess,u=t.capclass,m=t.subcapclass,e.securityIframe.src=e.src,"popup"==e.opts.type&&d(u,m,e,!0,!0)}});case 10:return void(e.readyFunc&&e.readyFunc({state:t.loadstate,info:t.info,fwidth:t.fwidth?t.fwidth:0,fheight:t.fheight?t.fheight:0}));case 11:if(window.document.getElementById("transform_close")){var g=window.document.getElementById("transform_close");g.addEventListener("click",function(){for(var t=0,i=e.listenFunc.length;t<i;t++)e.closeSecurityCode(function(){e.listenFunc[t]({ret:2,ticket:"",randstr:""})});if(e.listenFunc.length||e.closeSecurityCode(),window.document.getElementById("tcaptcha_transform")){var n=window.document.getElementById("tcaptcha_transform");n.parentNode.removeChild(n)}if(window.document.getElementById("t_mask")){var o=window.document.getElementById("t_mask");o.parentNode.removeChild(o)}})}if(window.document.getElementById("transform_eb")){var w=window.document.getElementById("transform_eb");w.addEventListener("click",function(){for(var t=0,i=e.listenFunc.length;t<i;t++)e.closeSecurityCode(function(){e.listenFunc[t]({ret:1,ticket:"",randstr:""})});if(e.listenFunc.length||e.closeSecurityCode(),window.document.getElementById("tcaptcha_transform")){var n=window.document.getElementById("tcaptcha_transform");n.parentNode.removeChild(n)}})}e.sess="";var u,m,f=e.opts.domain+"/"+e.opts.gettype+e.opts.params+"&cap_cd="+e.opts.capcd+"&uid="+e.opts.uid,y=window.document.getElementById("tcaptcha_iframe"),v=window.document.getElementById("transform_text");return void W({url:f,data:{sess:e.sess},success:function(t){if(e.src=e.opts.domain+"/"+t.src_1+e.opts.params+"&sess="+t.sess+"&fwidth="+e.opts.fwidth+"&sid="+t.sid+"&forcestyle="+e.opts.forcestyle+"&wxLang="+e.wxLang,u=t.capclass,m=t.subcapclass,h(u,m)){for(var i=document.getElementsByClassName("ticons").length,n=document.getElementsByClassName("ticons"),o=0;o<i;o++)n[o]&&(n[o].style.visibility="visible");y.src=e.src,y.style.visibility="hidden",setTimeout(function(){v.innerHTML=v.innerHTML.replace(/2/,"1")},1e3),setTimeout(function(){y.style.visibility="visible",v.innerHTML=v.innerHTML.replace(/1/,"2");for(var e=0;e<i;e++)n[e]&&(n[e].style.visibility="hidden")},2e3)}else y.src=e.src}});case 12:e.sess="";var u,m,f=e.opts.domain+"/"+e.opts.gettype+e.opts.params+"&cap_cd="+e.opts.capcd+"&uid="+e.opts.uid,y=window.document.getElementById("tcaptcha_iframe");return void W({url:f,data:{sess:e.sess},success:function(t){e.src=e.opts.domain+"/"+t.src_1+e.opts.params+"&sess="+t.sess+"&fwidth="+e.opts.fwidth+"&sid="+t.sid+"&forcestyle="+e.opts.forcestyle+"&wxLang="+e.wxLang,u=t.capclass,m=t.subcapclass,y.src=e.src}})}}})},initPos:function(e){e&&e.top&&(this.posSC.top=e.top),e&&e.left&&(this.posSC.left=e.left)},create:function(){var e=this;e.sess="";var i,n,o=e.opts.domain+"/"+e.opts.gettype+e.opts.params+"&cap_cd="+e.opts.capcd+"&uid="+e.opts.uid,s=(new Date).getTime();W({url:o,data:{sess:e.sess},success:function(o){e.src=e.opts.domain+"/"+o.src_1+e.opts.params+"&sess="+o.sess+"&fwidth="+e.opts.fwidth+"&sid="+o.sid,e.sess=o.sess,i=o.capclass,n=o.subcapclass;var r=(new Date).getTime();if(e.prehandleLoadTime=r-s,e.createIframeStart=r,"popup"==e.opts.type){if(e.opts.tcaptchaFlag){var h=c("div");h.className="t-mask",h.id="t_mask",window.document.body.appendChild(h),e.createSmartVerify(document.body)}window.onresize=function(){window.document.getElementById("t_verify")&&a(window.document.getElementById("t_verify"),e.sizeSC.width,e.sizeSC.height)},o.ticket?e.opts.tcaptchaFlag&&setTimeout(function(){e.changeVerifyType();for(var t=0,i=e.listenFunc.length;t<i;t++)e.closeSecurityCode(function(){e.listenFunc[t]({ret:0,ticket:o.ticket,randstr:o.randstr})})},1e3):setTimeout(function(){window.innerHeight||document.documentElement.clientHeight||document.body.clientHeight,window.innerWidth||document.documentElement.clientWidth||document.body.clientWidth;d(o.capclass,o.subcapclass,e,!1,!0),e.opts.tcaptchaFlag&&e.enlargeVerifyType(window.document.getElementById("t_verify"),e.sizeSC.width,e.sizeSC.height),e.createSecurityCode(i,n),k=window.innerWidth,window.document.getElementById("tcaptcha_transform")&&t(!0),window.onresize=function(){setTimeout(function(){if(!(Math.abs(window.innerWidth-k)<B)){k=window.innerWidth,d(i,n,e,!1,!0);var o={height:e.sizeSC.height+"px",width:e.sizeSC.width+"px",top:e.posSC.top,left:e.posSC.left};if(window.document.getElementById("tcaptcha_transform")){var s=window.document.getElementById("tcaptcha_transform");S(s,o),t(!0)}S(e.securityIframe,o),e.send2securityCode(JSON.stringify({message:{type:1,width:e.sizeSC.width,height:e.sizeSC.height}}))}},200)}},350)}else{setTimeout(function(){var o=window.innerHeight||document.documentElement.clientHeight||document.body.clientHeight,s=window.innerWidth||document.documentElement.clientWidth||document.body.clientWidth;e.sizeSC.height=o,e.sizeSC.width=s,e.windowHeight=o,e.windowWidth=s,e.createSecurityCode(i,n),window.document.getElementById("tcaptcha_transform")&&t(!1),window.onresize=function(){setTimeout(function(){var i=window.innerHeight||document.documentElement.clientHeight||document.body.clientHeight,n=window.innerWidth||document.documentElement.clientWidth||document.body.clientWidth;if(!(Math.abs(e.windowWidth-n)<30)){e.sizeSC.height=i,e.sizeSC.width=n,e.windowHeight=i,e.windowWidth=n;var o={height:e.sizeSC.height+"px",width:e.sizeSC.width+"px"};if(window.document.getElementById("tcaptcha_transform")){var s=window.document.getElementById("tcaptcha_transform");S(s,o),t(!1)}S(e.securityIframe,o),e.send2securityCode(JSON.stringify({message:{type:1,width:e.sizeSC.width,height:e.sizeSC.height}}))}},200)}},350)}}})},createSmartVerify:function(){var e="absolute";if("popup"==this.opts.type&&this.opts.pos&&this.opts.pos.length>0)for(var t=["absolute","fixed","static","relative"],n=0;n<t.length;n++)if(this.opts.pos===t[n]){e=this.opts.pos;break}var o="";this.opts.params.split("lang=")[1]&&(o=this.opts.params.split("lang=")[1]);var s=this,r=c("div");r.id="t_verify";var d={width:z.width*_+"px",height:z.height*_+"px",background:"#fff",border:"1px solid #e5e5e5",borderRadius:"3px",position:e,left:"0px",top:"0px",zIndex:2000000002};S(r,d);var h=c("div");h.className="verify-icon",h.id="verify_icon",s._verifyicon=h;var l={position:"absolute",marginTop:2.25*_+"px"};S(h,l),r.appendChild(h);var u=c("span");u.className="dots_item dot0",u.id="dot0_item";var m=c("span");m.className="dots_item dot1";var f=c("span");f.className="dots_item dot2";var g=i(this.opts.themeColor),w={background:g,width:.625*_+"px",height:.625*_+"px",marginRight:.3125*_+"px"};S(u,w),S(m,w),S(f,w),h.appendChild(u),h.appendChild(m),h.appendChild(f);var y=c("p");y.className="verify-text",y.id="verify_text",s._verifytext=y;var v={position:"absolute",width:"100%",fontSize:.9*_+"px",textAlign:"center",lineHeight:1.2*_+"px",marginTop:5.3125*_+"px",zIndex:-1};"zh"==p.currentLanguage?(y.innerHTML="<span style='color:#666'>腾讯验证</span><br><span style='color:#000'>智能检测中</span>",v.marginTop=4.5*_+"px"):y.innerText=p.c12,S(y,v),r.appendChild(y),this.ele.appendChild(r),a(r,z.width*_,z.height*_)},enlargeVerifyType:function(e,t,i){if(window.document.getElementById("verify_text")){var n=window.document.getElementById("verify_text");n.style.display="none"}if(window.document.getElementById("verify_icon")){var o={marginTop:i/2-30+"px"};S(window.document.getElementById("verify_icon"),o)}var s={width:t+"px",height:i+"px"};S(e,s),a(e,t,i)},changeVerifyType:function(){var e="";this.opts.params.split("lang=")[1]&&(e=this.opts.params.split("lang=")[1]);var t=this;if(window.document.getElementById("dot0_item"))for(var i=window.document.getElementsByClassName("dots_item"),n=window.document.getElementsByClassName("dots_item").length,o=0;o<n;o++)i[o].style.display="none";var s=t.opts.htdoc_path+"/tverify_success_m.png",r={height:4*_+"px",marginTop:1.25*_+"px",background:"url("+s+") center no-repeat",backgroundSize:"30%"},a=window.document.getElementById("verify_icon");S(a,r);var d=window.document.getElementById("verify_text");S(d,{marginTop:5.3125*_+"px"}),p.c21.length>19&&(d.style.fontSize=.8*_+"px"),d.innerText=p.c21,setTimeout(function(){if(window.document.getElementById("t_verify")){var e=window.document.getElementById("t_verify");window.document.body.removeChild(e)}if(window.document.getElementById("t_mask")){var t=window.document.getElementById("t_mask");window.document.body.removeChild(t)}},1e3)},createSecurityCode:function(e,t){var i=this.opts.htdoc_path+"/ticon_sp_m_sprites.png";this.opts.startFn();var n={uid:this.opts.uid,cap_cd:this.opts.capcd,rnd:Math.floor(1e6*Math.random()),forcestyle:this.opts.forcestyle,wxLang:this.wxLang,TCapIframeLoadTime:this.opts.TCapIframeLoadTime,prehandleLoadTime:this.prehandleLoadTime,createIframeStart:this.createIframeStart},s="absolute";if("popup"==this.opts.type&&this.opts.pos&&this.opts.pos.length>0)for(var r=["absolute","fixed","static","relative"],a=0;a<r.length;a++)if(this.opts.pos===r[a]){s=this.opts.pos;break}if(h(e,t)){var d="";this.opts.params.split("lang=")[1]&&(d=this.opts.params.split("lang=")[1]);var l=c("div");l.className="tcaptcha-transform",l.id="tcaptcha_transform",this._div=l;var u={width:this.sizeSC.width+"px",height:this.sizeSC.height+"px",position:s,top:this.posSC.top,left:this.posSC.left,visibility:"visible",zIndex:2000000002,fontFamily:"Helvtical,microsoft yahei,sans-serif",backgroundSize:"20%",backgroundPosition:"50% 32%",backgroundColor:"#fff",borderRadius:"3px"};if("popup"==this.opts.type&&(u.border="1px solid #e5e5e5"),S(l,u),"popup"==this.opts.type){var m=c("div");m.id="transform_close",m.className="ticons";var f={position:"absolute",cursor:"pointer",visibility:"hidden",height:1.8*_+"px",width:1.8*_+"px",bottom:1*_+"px",right:1*_+"px",background:"url("+i+") "+_*-2.75+"px "+_*-4.5625+"px",backgroundRepeat:"no-repeat",backgroundSize:8.4375*_+"px "+8.28125*_+"px",zIndex:-1};S(m,f),l.appendChild(m)}var g=c("div");g.className="ticons",g.id="ticon_refresh";var w={position:"absolute",visibility:"hidden",height:4*_+"px",width:4*_+"px",left:0,right:0,top:0,bottom:0,margin:"auto",marginTop:6*_+"px",background:"url("+i+") "+_*-.2275+"px "+_*-.17+"px",backgroundRepeat:"no-repeat",backgroundSize:8.4375*_+"px "+8.28125*_+"px",zIndex:-1};if(S(g,w),l.appendChild(g),"popup"!=this.opts.type&&(1==this.opts.showHeader||0==this.opts.showheader)){var y=c("span");y.className="ticons tback",y.id="transform_eicon";var v={position:"absolute",visibility:"hidden",top:1.4*_+"px",left:1*_+"px",width:.5*_+"px",height:.5*_+"px",marginTop:-.125*_+"px",borderStyle:"solid",borderWidth:"1px 1px 0 0",borderColor:"#1a79ff",webkitTransformOrigin:"75% 25%",webkitTransform:"rotateZ(225deg)",transition:"100ms ease-in .1s",zIndex:-1};S(y,v),l.appendChild(y);var x=c("div");x.className="ticons tback",x.id="transform_eb",x.innerText=p.c11;var C={position:"absolute",visibility:"hidden",width:4*_+"px",height:2.1*_+"px",lineHeight:1.5*_+"px",fontSize:.9375*_+"px",textAlign:"left",left:2*_+"px",marginTop:.6875*_+"px",color:"#1a79ff",zIndex:0};S(x,C),l.appendChild(x);var b=c("p");b.className="ticons",b.id="transform_eh";var z={position:"absolute",visibility:"hidden",width:"100%",height:2.1*_+"px",fontSize:1.0625*_+"px",textAlign:"center",marginTop:.6875*_+"px",fontWeight:"700",color:"#333",borderBottom:"1px solid #e6e6e6",zIndex:-1};S(b,z),p.c2.length>20?(x.style.fontSize=.7*_+"px",b.style.fontSize=.7*_+"px"):p.c2.length>15&&(x.style.fontSize=.9*_+"px",b.style.fontSize=.9*_+"px"),b.innerText=p.c2,l.appendChild(b)}var I=c("p");I.className="ticons",I.id="transform_header",this._ph=I,I.innerText=p.c22;var E={position:"absolute",visibility:"hidden",width:"100%",fontSize:1*_+"px",textAlign:"center",marginTop:10.5*_+"px",zIndex:-1};S(I,E),l.appendChild(I);var k=c("p");k.className="ticons",k.id="transform_text",this._pt=k,k.innerText=p.c23;var B={position:"absolute",visibility:"hidden",width:"90%",fontSize:.9*_+"px",textAlign:"center",paddingLeft:"5%",paddingRight:"5%",marginTop:12*_+"px",zIndex:-1};S(k,B),l.appendChild(k)}if(this.hasSecurityCode()){var u={height:this.sizeSC.height+"px",width:this.sizeSC.width+"px",top:this.posSC.top,left:this.posSC.left};return S(this.securityIframe,u),void(this.securityIframe.src=o(this.src,n))}var T=document.createElement("iframe");if(T.id="tcaptcha_iframe",T.setAttribute("frameborder","0",0),T.setAttribute("border","0"),T.marginheight=0,T.marginwidth=0,T.setAttribute("marginheight","0",0),T.setAttribute("marginwidth","0",0),"popup"==this.opts.type?(T.setAttribute("scrolling","no"),S(T,{opacity:"0"})):S(T,{border:"0px"}),h(e,t))var u={height:this.sizeSC.height+"px",width:this.sizeSC.width+"px",margin:"auto","z-index":2000000002};else var u={height:this.sizeSC.height+"px",width:this.sizeSC.width+"px",top:this.posSC.top,left:this.posSC.left,position:s,margin:"auto","z-index":2000000002};S(T,u),this.securityIframe=T,h(e,t)?(l.appendChild(T),this.ele.appendChild(l)):this.ele.appendChild(T),this.src=o(this.src,n),T.src=this.src,this.initSecurityCodeTarget()},hasSecurityCode:function(){var e=!!this.securityIframe&&this.securityIframe;return e},initSecurityCodeTarget:function(){this.msg.addTarget(this.securityIframe.contentWindow,l.securityCode)},destroy:function(){if(window.document.getElementById("t_mask")){var e=window.document.getElementById("t_mask");document.body.removeChild(e)}if(window.document.getElementById("tcaptcha_transform")){var t=window.document.getElementById("tcaptcha_transform");t.parentNode.removeChild(t)}if(window.document.getElementById("t_verify")){var i=window.document.getElementById("t_verify");window.document.body.removeChild(i)}C&&(this.closeSecurityCode(),this.listenFunc=[],this.readyFunc=function(){},this.msg.clear(),this.ele="",C="")},refresh:function(e){if(window.document.getElementById("t_verify")){var t=window.document.getElementById("t_verify");window.document.body.removeChild(t)}C&&(this.closeSecurityCode(),this.initOptions(),g(e)&&(e.uin&&(this.opts.uid=e.uin),e.uid&&(this.opts.uid=e.uid),e.capcd&&(this.opts.capcd=e.capcd)),this.create())},listen:function(e,t){this.listenFunc=[],this.listenFunc.push(e),this.readyFunc=function(){},t&&(this.readyFunc=t)},send2securityCode:function(e){var t=l.securityCode;this.msg.targets[t].send(e)},closeSecurityCode:function(e){this.opts.endFn(),this.securityIframe&&(this.securityIframe.parentNode&&this.securityIframe.parentNode.removeChild(this.securityIframe),this.securityIframe=""),w(e)&&e(),window.CollectGarbage&&window.CollectGarbage()},clear:function(){this.listenFunc.length=0,this.readyFunc=function(){}},getTicket:function(){return{ticket:this.ticket,randstr:this.randstr}},start:function(e){this.opts.startFn=e},end:function(e){this.opts.endFn=e}},e.AqSCode=s}(window);