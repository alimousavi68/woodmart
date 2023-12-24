jQuery(e=>{
    setup_carousel_countdown();

    /*setup_off_timers();*/
    jQuery("#shop-carousel .swiper-slide").click(e=>{
        let cur = jQuery(e.currentTarget);
        jQuery("#shop-carousel .swiper-slide").removeClass("swiper-slide--active");
        cur.addClass("swiper-slide--active");
        let id = cur.data("slide-id");
        jQuery(`#shop-carousel .carousel-item`).removeClass("carousel-item--active");
        jQuery(`#shop-carousel .carousel-item[data-slide-id=${id}]`).addClass("carousel-item--active");
        if(jQuery("#shop-carousel .carousel-item.carousel-item--active").hasClass("no-sale")){
            jQuery("#add-to-cart").addClass("disabled");
        }else{
            jQuery("#add-to-cart").removeClass("disabled");
        }
        setup_carousel_countdown();

    });
    setup_slider();

    jQuery("#add-to-cart").click(e=>{
        if($(e.currentTarget).hasClass("disabled")) return;
    });
});
Number.prototype.t = function (params) {
    return String(this.valueOf()).padStart(2, '0');
}
function gotoNextslide() {
    
    let curr_slide_id = jQuery("#shop-carousel .swiper-slide--active").data("slide-id");
    let total_slides = jQuery("#shop-carousel .swiper-slide").length;
    curr_slide_id++;
    if (curr_slide_id > total_slides) curr_slide_id = 1;
    jQuery(`#shop-carousel .swiper-slide[data-slide-id=${curr_slide_id}]`).click();
    jQuery(".current_slide_index").text(curr_slide_id)
}
function gotoPrevslide() {
    
    let curr_slide_id = jQuery("#shop-carousel .swiper-slide--active").data("slide-id");
    let total_slides = jQuery("#shop-carousel .swiper-slide").length;
    curr_slide_id--;
    if (curr_slide_id < 1) curr_slide_id = total_slides;
    jQuery(`#shop-carousel .swiper-slide[data-slide-id=${curr_slide_id}]`).click();
    jQuery(".current_slide_index").text(curr_slide_id)
}

let timerInterval = undefined;
function setup_carousel_countdown() {
   if (timerInterval) clearInterval(timerInterval);
    var countdownNumberEl = document.getElementById('countdown-number');
    var countdown = 5;
    jQuery(".total_slides").text(jQuery(".carousel-item").length)
    jQuery(".carousel-timer-circle").removeClass("active");
    setTimeout(() => {
        jQuery(".carousel-timer-circle").addClass("active");
    }, 100);

    timerInterval = setInterval(function() {
        countdown--;
        if (countdown <=0){
            gotoNextslide();
            countdown = 5;
        }

    }, 1000);
}
/*function setup_off_timers() {
    jQuery(".carousel-timer").each((i, item)=>{
        let unix = $(item).data("unix");
        if(!unix) {
            $(item).parent().css("display", "none");
            return;
        }
        var countDownDate = $(item).data("unix");
        var x = setInterval(function() {
          
          var distance = countDownDate - new Date(); 
          var days = Math.floor(distance /   (1000 * 60 * 60 * 24));
          var hours = Math.floor((distance % (1000 *   60 * 60 * 24)) / (1000 * 60 * 60));
          var minutes = Math.floor((distance   % (1000 * 60 * 60)) / (1000 * 60));
          var seconds = Math.floor((distance   % (1000 * 60)) / 1000);
          $(item).text(days.t() + " : " +  hours.t() + " : "  + minutes.t() + " : " + seconds.t());
          if (distance < 0) {    
              clearInterval(x);
                $(item).text("00:00:00:00");
                $(item).parent().css("display", "none") 
          }
      }, 1000);
    })
}*/
function setup_slider() {
    jQuery(".carousel-next").click(e=>{
        gotoNextslide();
    });
    jQuery(".carousel-prev").click(e=>{
        gotoPrevslide();
    });
}