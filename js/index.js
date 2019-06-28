require('./masonry')

const options = {
  sourceAttr: 'href',
  overlay: true,
  captions: false,
  showCounter: false,
  animationSpeed: 150,
  loop: false,
  rel: false,
  className: 'lightbox-gallery',
  widthRatio: 0.9,
  heightRatio: 0.8,
  doubleTapZoom: 2,
  maxZoom: 10,
  htmlClass: 'has-lightbox'
}

jQuery(function($){
  let gal = $('.wp-block-gallery a').simpleLightbox(options)
})
