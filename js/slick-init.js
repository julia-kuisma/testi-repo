jQuery(document).ready(function(){
  jQuery('.projektit').slick({
      infinite: true,
      autoplaySpeed: 3000,
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: true,
      dots: false,
      centerMode: true,
      autoplay: true,
      centerPadding: '0%',
      slide: ".container-fluid",
      speed: 1000,
  });
  jQuery('.center-this-icon').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    slide: ".slide-icon",
    autoplaySpeed: 3000,
    speed: 1000,
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: true,
    infinite: true,
    dots: false,
    centerMode: true,
    autoplay: false,
    centerPadding: '0%',
    mobileFirst: true,
    responsive: [
      {
        breakpoint: 768,
        settings: 'unslick',
      },
  ]
  });
  jQuery('.image-slider').slick({
    dots: true,
    arrows: false,
    slidesToShow: 1,
    centerMode: true,
    centerPadding: '0%',
    autoplay: true,
    autoplaySpeed: 3000,
    speed: 1000
  });
  jQuery('.full-slide').slick({
    slide: ".the-main-content",
    vertical: true,
    dots: true,
    arrows: false,
    slidesToShow: 1,
    centerMode: true,
    centerPadding: '0%',
    autoplay: true,
    autoplaySpeed: 3000,
    speed: 1000,
    responsive: [
      {
        breakpoint: 768,
        settings: {
          vertical: false,
        }
      },
    ]
  });
});