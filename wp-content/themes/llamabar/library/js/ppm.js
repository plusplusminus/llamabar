var bodyIsOverflowing, scrollbarWidth, originalBodyPadl, $body = jQuery(document.body)

jQuery(function () {

    jQuery('#vendor-grid').mixItUp();

    var wdwin = jQuery(window).width();
    jQuery(window).resize(function () {
        wdwin = jQuery(window).width();
    });

    jQuery(document).ready(function () {
        jQuery('.enumenu_ul').responsiveMenu({
            'mobileResulution': '767',
            onMenuopen: function () {}
        });
        jQuery(".dont-miss").hover(function () {
            jQuery(".mountain-main").toggleClass("mountain-box-up");
        });
    });

    /*var strstAni = 0;
    jQuery(window).scroll(function () {
        if (wdwin > 767) {
            var contOfSet = jQuery(".header-top").height();
            var headeObj = jQuery("header");
            console.log(jQuery(window).scrollTop())
            if(jQuery(window).scrollTop() >= 100 && strstAni == 0){
                headeObj.addClass("fix-header").removeClass("fixHeaderRemove")
                strstAni= 1;
            } else if(jQuery(window).scrollTop() < 50 && strstAni == 1){
                headeObj.removeClass("fix-header").addClass("fixHeaderRemove")
                setTimeout(function(){
                    headeObj.removeClass("fixHeaderRemove")
                },400)
                strstAni= 0
            }
        }
    })*/
	/*var strstAni = 0;
    jQuery(window).scroll(function () {
        if (wdwin > 200) {
            var contOfSet = jQuery(".header-top").height();
            var headeObj = jQuery("header");
			var headeObjHeight = headeObj.outerHeight();
            console.log(jQuery(window).scrollTop())
            if(jQuery(window).scrollTop() >= 100 && strstAni == 0){
                headeObj.addClass("fix-header").removeClass("fixHeaderRemove")
				//jQuery(".banner").css({"margin-top":"181px"})
                strstAni= 1;
            } else if(jQuery(window).scrollTop() < 50 && strstAni == 1){
                headeObj.removeClass("fix-header").addClass("fixHeaderRemove")
				jQuery(".banner").css({"margin-top":"auto"})
                setTimeout(function(){
                    headeObj.removeClass("fixHeaderRemove")
                },400)
                strstAni= 0
            }
        }
    })*/
	var strstAni = 0;
    jQuery(window).scroll(function () {
        if (wdwin > 200) {
            var contOfSet = jQuery(".header-top").height();
            var headeObj = jQuery("header");
           
            if(jQuery(window).scrollTop() >= 400 && strstAni == 0){
                strstAni= 1;
                headeObj.css({"position":"fixed"})
                jQuery(".dummy-height").height(headeObj.height())
                headeObj.addClass("fix-header");
                //headeObj.removeClass("fixHeaderRemove");
                strstAni =1;
            } 
            else if(jQuery(window).scrollTop() + jQuery(".fix-header").height() <  400 && strstAni == 1){
                jQuery(".dummy-height").height(0)
                headeObj.removeClass("fix-header");
                //headeObj.addClass("fixHeaderRemove");
                headeObj.css({"position":"relative"})
                strstAni = 0
            }
            
        }
    })

});