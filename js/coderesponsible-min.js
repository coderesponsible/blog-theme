(function(e){"use strict";function i(t){console.log("resize");var r=e(window).width();if(r>=n){e("#main-nav").show();e("#searchform").show()}if(r<n){e("#main-nav").hide();e("#searchform").hide()}}var t="480",n="600",r="880";e(window).bind("resize",i);i();var s=document.getElementsByTagName("a");for(var o=0;o<s.length;o++)!s[o].onclick&&s[o].getAttribute("target")!="_blank"&&(s[o].onclick=function(){window.location=this.getAttribute("href");return!1});var u={name:/^[A-Za-z ,'-]{1,25}$/,email:/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/,postalcode:/^(?!.*[DFIOQU])[A-VXY][0-9][A-Z][ -.]*[0-9][A-Z][0-9]$/i,message:/./},a={name:"Name",email:"Valid Email Required"};e(function(){e(".email-submit").on("click",function(t){var n=e("#email-address").attr("name");if(u[n]!=undefined){if(!!u[n].test(e("#email-address").val())&&e("#email-address").val()!=""){e("#email-address").siblings("span.error-message").fadeOut();e("#email-address").siblings("span.error-message").html("");var r="email="+e("#email-address").val();e.ajax({type:"POST",url:"http://coderesponsible.com/dev/wp-content/themes/cr-2012/email-submit.php",data:r,cache:!1,success:function(){e("#email-address").val("")}});return!1}e(this).siblings("span.error-message").html(a[n]);t.preventDefault()}})});e("#email-address").on("blur",function(t){var n=e("#email-address").attr("name");if(u[n]!=undefined)if(!u[n].test(e("#email-address").val())||e("#email-address").val()==""){e(this).siblings("span.error-message").html(a[n]);t.preventDefault()}else{e("#email-address").siblings("span.error-message").fadeOut();e("#email-address").siblings("span.error-message").html("")}});e("a[name=modal]").on("click",function(t){var n=e(this).attr("href"),r=e(document).height(),i=e(window).width();e("#mask").css({width:i,height:r});e("#mask").show();var s=e(window).height(),o=e(window).width();e(n).css("top",(e(window).height()-e(n).height())/2+e(window).scrollTop()+"px");e(n).css("left",(e(window).width()-e(n).width())/2+e(window).scrollLeft()+"px");e(n).fadeIn();t.preventDefault();return!1});e(".window .close").on("click",function(t){t.preventDefault();e("#mask, .window").hide()});e("#mask").on("click",function(t){t.preventDefault();e("#mask, .window").hide()});e("section h2 a:first").addClass("article-title");e(".main-content-link").on("click",function(){e("a.article-title").focus();e("a.article-title").attr("tabindex",0);return!1});e("a[name=slideout]").on("click",function(t){var n=e(this).attr("href");e(n).slideDown();return!1});e(".slideout .close").on("click",function(t){e(this).parent().slideUp();return!1});e("#menu-link").on("click",function(){e("#main-nav").is(":visible")?e("#main-nav").slideUp():e("#main-nav").slideDown()});e("#search-link").on("click",function(){e("#searchform").is(":visible")?e("#searchform").slideUp():e("#searchform").slideDown()});e(".content a.button").on("click",function(){var t=e(this).html(),n=e(this).attr("href");_gaq.push(["_trackEvent","Click Event",t,n])});e("#sidebar .rss").on("click",function(){var e="Social Sidebar",t="RSS";_gaq.push(["_trackEvent","Click Event",e,t])});e("#sidebar .twitter").on("click",function(){var e="Social Sidebar",t="Twitter";_gaq.push(["_trackEvent","Click Event",e,t])});e("#sidebar .facebook").on("click",function(){var e="Social Sidebar",t="Facebook";_gaq.push(["_trackEvent","Click Event",e,t])});e("#footer .rss").on("click",function(){var e="Social Sidebar",t="RSS";_gaq.push(["_trackEvent","Click Event",e,t])});e("#footer .twitter").on("click",function(){var e="Social Sidebar",t="Twitter";_gaq.push(["_trackEvent","Click Event",e,t])});e("#footer .facebook").on("click",function(){var e="Social Sidebar",t="Facebook";_gaq.push(["_trackEvent","Click Event",e,t])})})(jQuery);