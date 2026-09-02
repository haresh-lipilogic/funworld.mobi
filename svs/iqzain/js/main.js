var trans = {
  ar: {
    title: "تحميلك جاهز",
    "nav-service": "Gamezone",
    "nav-item-1": "كل المحتوى",
    "nav-item-2": "عن",
    "step-1": "الخطوة 1/2",
    "step-2": "الخطوة 2/2",
    "hint-top": "استمتع بالألعاب المجانية على الإنترنت",
    "offer-title": "تحميلك جاهز",
    "form-req-title":
      "&bull; أدخل رقم هاتفك أدناه<br>&bull; قم بتأكيد رمز PIN الخاص بك في الصفحة التالية",
    "form-req-label": "أدخل رقم هاتفك",
    "form-req-error": "الرجاء إدخال رقم هاتفك",
    "form-req-invalid": "الرجاء إدخال رقم هاتف صحيح",
    "btn-req": "اشترك",
    "form-check-title": "الرجاء إدخال رقم التعريف الشخصي الذي أرسلناه إليك",
    "form-check-error": "الرجاء إدخال PIN صالح",
    "btn-check": "تاكيد",
    "form-check-bottom": "لم تستلم رقم التعريف الشخصي؟",
    "form-check-repeat": "اطلب واحدة أخرى",
    footer:
      "مرحبًا بك في خدمة GameStation. قم بتنزيل ألعاب HTML5 غير المحدودة واستمتع بها. <br> هذه الخدمة متاحة لعملاء شركة الاتصالات السعودية، بتكلفة 1.5 ريال سعودي يتم تجديدها يوميًا لمشتركي الدفع المسبق، وبتكلفة 51.75 ريال سعودي يتم تجديدها شهريًا لمشتركي الدفع الآجل (شامل ضريبة القيمة المضافة). لإلغاء الإشتراك أرسل U 21 إلى 801445. <br> لقد تم بالفعل دفع ضريبة القيمة المضافة باستخدام بطاقة إعادة التعبئة لمشتركي الدفع المسبق. <br> لموبايلي بـ 7.5 ريال أسبوعياً فقط لإلغاء الخدمة أرسل U67 إلى 600614 ولمستخدمي زين بـ 7.5 ريال أسبوعياً شامل ضريبة القيمة المضافة، ولإلغاء الاشتراك أرسل U88 إلى 709222. <br> بالنسبة لخطوط الدفع المسبق، يتم تحصيل 15% ضريبة القيمة المضافة على رسوم الخدمة أعلاه عند شراء قسيمة ائتمانية. بالنسبة لخطوط الدفع الآجل، يتم إضافة 15% ضريبة القيمة المضافة إلى رسوم الخدمة المذكورة أعلاه على الفاتورة الشهرية ",
	price: "زين وموبايلي: 7.5 ريال في الأسبوع. التجديد التلقائي <br> شركة الاتصالات السعودية: 1.5 ريال سعودي/يوميًا. التجديد التلقائي",
  },
  en: {
    title: "Your download is ready",
    "nav-service": "GAMEBAR",
    "nav-item-1": "All content",
    "nav-item-2": "About",
    "step-1": "Step 1/2",
    "step-2": "Step 2/2",
    "hint-top": "Enjoy Free online games",
    "offer-title": "Your download is ready",
    "form-req-title":
      "&bull; Enter your phone number below<br>&bull; Confirm your PIN code in the next page",
    "form-req-label": "Mobile number",
    "form-req-error": "Please insert your phone number",
    "form-req-invalid": "Please insert valid phone number",
    "btn-req": "Subscribe",
    "form-check-title": "Please enter the PIN we sent over to you",
    "form-check-error": "Please insert a valid PIN",
    "btn-check": "Confirm",
    "form-check-bottom": "You did not receive the PIN?",
    "form-check-repeat": "Ask for another one",
    footer:
      "Welcome to GameStation service. Download and enjoy unlimited HTML5 Games. <br> This Service is available for STC Customers, It costs 1.5 SAR renewed daily for prepaid subscribers, and costs 51.75 SAR renewed monthly for postpaid subscribers (VAT Included). To unsubscribe send U 21 to 801445. <br>VAT Tax was already paid with refill card for prepaid subscribers. <br> For Mobily for only 7.5 SAR weekly To cancel the service just send U67 to 600614 and for Zain Users for SAR 7.5 per week VAT Inclusive, To Unsub send U88 to 709222. <br> For prepaid lines 15% VAT on above service fee is already collected upon credit voucher purchase For postpaid lines 15% VAT is added to above service fee on the monthly bill ",
    price: "ZAIN & MOBILY : SAR 7.5/week. Auto-renewal</br> STC : SAR 1.5/daily. Auto-renewal ",
  },
};


var lang = "en"; 
 


$(document).ready(function () {
  translate(lang);

  var lg = navigator.language.substring(0, 2);
  if (lg == "ar") {
    lang = lg;
    translate(lang);
  }

  var pub_id = 0;
  if (new URLSearchParams(window.location.search).get("sub6")) {
    pub_id = new URLSearchParams(window.location.search).get("sub6");
  }

  var gclid = "";
  if (new URLSearchParams(window.location.search).get("gclid")) {
    gclid = new URLSearchParams(window.location.search).get("gclid");
  }

  setTimeout(function () {
    $("[data-pin-req] .field-alert").addClass("active");
  }, 3000);

  var progress = setInterval(progressFn, 2);
  var i = 0;

  function progressFn() {
    if (i >= 100) {
      clearInterval(progress);
      setTimeout(function () {
        querySelectorAll_do(".webt-icon__value", { style: { opacity: "0" } });
        querySelectorAll_do(".progress_arrow", { style: { opacity: "1" } });
      }, 1000);
    } else {
      i++;
      querySelectorAll_do(".webt-icon__value", { innerHTML: "" + i + "%" });
    }
  }

  $("[name=msisdn]").inputmask({
    regex: "[0-9۰-۹٠-٩]{8}",
    allowPlus: false,
    allowMinus: false,
    prefix: "",
  });
  $("[name=msisdn]").on("change paste keyup input propertychange", function () {
    if ($(this).inputmask("isComplete")) {
      $(this).closest("form").addClass("form-valid");
      $("[data-pin-req] [type=submit]").prop("disabled", false);
    } else {
      $(this).closest("form").removeClass("form-valid");
      $("[data-pin-req] [type=submit]").prop("disabled", true);
    }
  });

  $("[data-lang]").on("click", function () {
    lang = $(this).data("lang");
    translate(lang);
  });

  $(".menu-btn, .nav-close").click(function () {
    $(".nav").toggleClass("open");
  });

  $(".clickable").click(function () {
    $("form:not(.d-none) [type=tel]").focus();
  });

  /*
	$('[type=tel]').focus(function() {
		$('.footer').addClass('hidden');
	});
	$('[type=tel]').blur(function() {
		$('.footer').removeClass('hidden');
	});
*/
  $("[data-pin-req]").submit(function (e) {
    e.preventDefault();

    var $msisdn = $("[name=msisdn]");
    $msisdn.removeClass("has-error");

    var msisdn = "974" + $msisdn.val();

    if ($("[data-pin-req] [type=submit]").is(":disabled")) {
      $msisdn.addClass("has-error");
      return false;
    }

    loading(true);

    $.ajax({
      type: "POST",
      url: "../handler.php",
      dataType: "json",
      data: {
        action: "pin-request",
        click_id: rawData.clickid,
        gclid: gclid,
        msisdn: msisdn,
        pub_id: pub_id,
        lang: lang,
      },
      success: function (response) {
        if (response.status == "success") {
          //ok
          window.__data = response.data;
          $("html, body").animate({ scrollTop: 0 }, "fast");
          $(".step:first").addClass("filled");
          $('[data-trans="step-1"]').addClass("d-none");
          $('[data-trans="step-2"]').removeClass("d-none");
          $("[data-pin-req]").addClass("d-none");
          $("[data-pin-check]").removeClass("d-none");
          if (response.data.mno == 42003) {
            $("[name=pin]")
              .attr("placeholder", "******")
              .attr("minlength", 6)
              .attr("maxlength", 6);
          } else {
            $("[name=pin]")
              .attr("placeholder", "****")
              .attr("minlength", 4)
              .attr("maxlength", 4);
          }
          $("[name=pin]").focus();
        } else {
          if (response.status == "already_subscribed") {
            location.href = response.url;
          }
          $("[data-pin-req] .field-alert").text(
            trans[lang]["form-req-invalid"]
          );
          $msisdn.addClass("has-error");
        }
      },
      complete: function (response) {
        loading(false);
      },
    });
  });

  $("[data-pin-check]").submit(function (e) {
    e.preventDefault();

    var $pin = $("[name=pin]");
    $pin.removeClass("has-error");

    var pin = $pin.val();

    if (pin.length < $pin.attr("maxlength")) {
      $pin.addClass("has-error");
      return false;
    }

    loading(true);

    $.ajax({
      type: "POST",
      url: "../handler.php",
      dataType: "json",
      data: {
        action: "pin-verify",
        pin: pin,
        data: window.__data,
      },
      success: function (response) {
        if (
          response.status == "success" ||
          response.status == "already_subscribed"
        ) {
          location.href = response.url;
        } else {
          $pin.addClass("has-error");
        }
      },
      complete: function (response) {
        loading(false);
      },
    });
  });

  $("[name=pin]").keyup(function () {
    if (this.value.length < $("[name=pin]").attr("minlength")) {
      $("[data-pin-check] [type=submit]").prop("disabled", true);
    } else {
      $("[data-pin-check] [type=submit]").prop("disabled", false);
    }
  });
});

function loading(status) {
  if (status) {
    $(".loading").addClass("show");
  } else {
    $(".loading").removeClass("show");
  }
}

function translate(lang) {
  $("[data-trans]").each(function () {
    var lb = $(this).data("trans");
    if (trans[lang][lb] != undefined) {
      $(this).html(trans[lang][lb]);
    }

    $("[data-lang]").removeClass("active");
    $('[data-lang="' + lang + '"]').addClass("active");

    if (lang == "ar") {
      $("body").addClass("rtl-text");
    } else {
      $("body").removeClass("rtl-text");
    }
  });
}

function querySelectorAll_do(csspatt, objdata) {
  var elem = csspatt;
  if (typeof csspatt === "string") elem = document.querySelectorAll(csspatt);
  if (typeof objdata !== "object") return elem;
  if (typeof elem.length === "undefined") elem = [elem];
  if (elem.length <= 0) return false;
  for (var i = 0, n = elem.length; i < n; i++)
    for (var prop in objdata) {
      if (prop == "innerHTML_append") elem[i].innerHTML += objdata[prop];
      else if (prop == "innerHTML_prepend")
        elem[i].innerHTML = objdata[prop] + elem[i].innerHTML;
      else if (prop == "exec" && typeof objdata[prop] === "function")
        objdata[prop](elem[i], csspatt);
      else if (prop == "altDisplay") {
        var option = objdata[prop];
        if (!option) option = "none";
        if (option == "none") elem[i].style.display = "none";
        else {
          elem[i].style.display = "";
          if (getStyle(elem[i], "display") == "none") {
            if (typeof option == "string") elem[i].style.display = option;
            else elem[i].style.display = "block";
          }
        }
      } else if (prop == "addEvent" && typeof objdata[prop] === "object") {
        for (var prop2 in objdata[prop]) {
          addEvent(elem[i], prop2, objdata[prop][prop2]);
        }
      } else if (prop == "setAttribute" && typeof objdata[prop] === "object") {
        for (var prop2 in objdata[prop]) {
          elem[i].setAttribute(prop2, objdata[prop][prop2]);
        }
      } else if (
        typeof objdata[prop] === "object" &&
        typeof elem[i][prop] === "object"
      ) {
        for (var prop2 in objdata[prop]) {
          elem[i][prop][prop2] = objdata[prop][prop2];
        }
      } else elem[i][prop] = objdata[prop];
    }
  return elem;
}
