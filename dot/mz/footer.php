
        <script type="text/javascript" data-ignore-renderer="">
            window.mobiOneConstants = {
    campaignId: 20798,
    userId: 15089264641878556,
    sessionId: 1508926464187,
    clientSessionId: 0,
    impressions: 0,
    spyServer: "http://dump-analytics.mobileacademy.com/",
    domain: "pages.mli.me",
    q42: "pemn410Z",
    queryTokens: "v%3D681%26clickid%3DwK852BBILDCU0M69H3AGKPDK%26pid%3D8f374e3a-dfe7-4790-b05e-99399745db81",
    ip: "14.195.227.44",
    partnerId: "594",
    pageId: "1968",
    country: "qa",
    pageName: "StreetRacingMania",
    platform: "html5",
    pagePath: "StreetRacingMania-html5-qa-qtel-en-default",
    postfix: "default"
};


    window.mobiOneConstants.duIframeUrl = ""



    window.mobiOneConstants.tpayScriptUrl = ""



    window.mobiOneConstants.queryParams = {
    "v": "681",
    "clickid": "wK852BBILDCU0M69H3AGKPDK",
    "pid": "8f374e3a-dfe7-4790-b05e-99399745db81"
}





    window.mobiOneConstants.countryFromIp = "IN"




function showStats(){
    url = "http://192.168.1.42:4081/apis/branches/ptwb87c/execute/false/presentation"
    window.open(url + "?pageId=" + window.mobiOneConstants.pageId + "&campaignId=" + window.mobiOneConstants.campaignId, "_blank")
}

<!-- close tag containing ejs -->
</script>

<!-- GTM dataLayer -->
<script>
    if (typeof dataLayer == 'undefined') {
        dataLayer = [];
    }
    if (typeof mobiOneConstants != 'undefined') {
        dataLayer.push(mobiOneConstants);
    }
</script>
<!-- End GTM dataLayer -->

<!-- GTM global events -->
<script>

    function hasCaller(str){
      return new Error().stack.indexOf(str) > -1;
    }

    // Intercepts when iframe finishes loading.
    //** Works WITH: html5IframeLandingPage, mraidIframeLandingPage
    // TAG: iframe_loaded, Trigger: iframe_loaded
    var iframeContainer = document.getElementById("iframe-container");

    if(iframeContainer){
        var iframeAppend = iframeContainer.appendChild;
        iframeContainer.appendChild = function(el){
          try {
              if(el.tagName === "IFRAME"){
                el.addEventListener("load", function(e){
                  dataLayer.push({
                    'iframe-source': el.src,
                    'event':'iframe-load'
                  });
                });
              }
          } catch (e) {}

        iframeAppend.apply(iframeContainer, arguments);
      }
    }

    // Intercepts when page finishes loading.
    //** Works WITH: commonLandingPage, commonMraidLangingPage, commonExpandableMraidLangingPage **
    // TAG: script_loaded, Trigger: script_loaded
    window.addEventListener("x-mobi-one-load",function(e){
        dataLayer.push({'event':'script-load'});
      });


    // Intercepts when mobi-one request is sent
    //** Works WITH: commonLandingPage, commonMraidLangingPage **
    // TAG: submethod_request_sent, Trigger: requst_sent
    var appendChild = document.head.appendChild;
    var submethodSrc = "";
    document.head.appendChild = function(el){
      try {
          if (el.tagName === "SCRIPT" && hasCaller("getSubMethod")){
              dataLayer.push({
                'submethod-url': el.src,
                'event':'submethod-request-sent'
              });
              submethodSrc = el.src;
          }
      } catch (e) {}

        appendChild.apply(document.head, arguments);
    }

    // Intercepts when mobi-one response is received
    //** Works WITH: commonLandingPage, commonMraidLangingPage **
    // TAG: submethod_response_received, Trigger: response_received
    var removeChild = document.head.removeChild
    document.head.removeChild = function(el){
        try {
            if (el.src === submethodSrc){
                var data = arguments.callee.caller.arguments[0];
                var visitId = data.visitId || data.VisitId || 0;
                var subMethod = data.subMethod || data.SubMethod || '';
                subMethod = (typeof subMethod) === "string" ? subMethod : subMethod.Method || JSON.stringify(subMethod);
                var nextUrl = data.nextUrl || data.NextUrl || '';
                dataLayer.push({
                  'visit-id': visitId,
                  'sub-method': subMethod,
                  'next-url': nextUrl,
                  'event':'submethod-response-received'
                });
            }
        } catch (e) { }
        removeChild.apply(document.head, arguments)
    }

</script>
<!-- GTM global events -->

<!-- Google Tag Manager -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NXRZK5"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>

<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-NXRZK5');</script>
<!-- End Google Tag Manager -->


        
   <!--     <img data-ignore-minification="true" src="/20798/imagePixel?_q42=pemn410Z&amp;_userId=15089264641878556&amp;_sessionId=1508926464187&amp;_clientSessionId=0&amp;_impressions=0&amp;creative=StreetRacingMania&amp;suffix=html5-qa-qtel-en-default&amp;queryTokens=v%3D681%26clickid%3DwK852BBILDCU0M69H3AGKPDK%26pid%3D8f374e3a-dfe7-4790-b05e-99399745db81" style="display: none" class="pixel">-->
    </div>
<script src="js/index.js" type="text/javascript"></script></body>

</html>
