/*
 * Bones Scripts File
*/

jQuery(document).ready(function($) {

  // ADD CLASS TO LINKS CONTAINING IMAGES
  $('a:has(img)').addClass('imglink');

  // ADD COUNT CLASS TO FOOTER WIDGETS FOR STYLING
     var num;
     num = $('.footer-widgets').children('.widget').size();
     $('.footer-widgets').addClass('floats_' + num);


}); /* end of as page load scripts */
