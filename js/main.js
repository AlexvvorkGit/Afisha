jQuery(document).ready(function ($) {
    var $form_modal = $('.review-modal'),
        $form_review = $form_modal.find('#review-show-form'),
        $review_banner = $('.review_banner');

    //открыть модальное окно
    $review_banner.on('click', function (event) {
        $form_modal.addClass('is-visible');
        //показать выбранную форму
        review_form_selected();
    });

    //закрыть модальное окно
    $('.review-modal').on('click', function (event) {
        if( $(event.target).is($form_modal)){
        $form_modal.removeClass('is-visible');}
    });

    //закрыть модальное окно нажатье клавиши Esc
    $(document).keyup(function(event){
        if(event.which=='27'){
            $form_modal.removeClass('is-visible');
        }
    });

    function review_form_selected() {
        $form_review.addClass('is-selected');
    }


});

jQuery.fn.putCursorAtEnd = function() {
    return this.each(function() {
        // If this function exists...
        if (this.setSelectionRange) {
            // ... then use it (Doesn't work in IE)
            // Double the length because Opera is inconsistent about whether a carriage return is one character or two. Sigh.
            var len = $(this).val().length * 2;
            this.setSelectionRange(len, len);
        } else {
            // ... otherwise replace the contents with itself
            // (Doesn't work in Google Chrome)
            $(this).val($(this).val());
        }
    });
};

$('.carousel').carousel({
    inteval: 2000
})