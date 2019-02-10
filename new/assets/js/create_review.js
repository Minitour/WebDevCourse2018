/*

This function will create and append the new comment to the list of comments

*/

function construct_review(profile_img, title, name, review, score) {
    var review_item = ""
    review_item += '<li class="collection-item avatar">'
    review_item += '<img src="' + profile_img + '" alt="" class="circle">'
    review_item += '<span class="title"><b>' + title + '</b></span>'
    review_item += '<p>' + name + '<br><br>'
    review_item += review
    review_item += '</p>'
    review_item += '<a href="#!" class="secondary-content">'
    for (var i = 0; i < score; i++) {
        review_item += '<i class="material-icons">grade</i>'
    }
    review_item += '</a>'
    review_item += '</li>'

    return review_item;
}

$('#create_review').click(() => {
    let review = $('#textarea1').val();
    let title = $('#review_title').val();
    let stars = parseInt($('input[name=rating]:checked', '#star_rating_form').val())
    let name = "<?php echo $usr->username; ?>"

    let reviewView = construct_review("https://catking.in/wp-content/uploads/2017/02/default-profile-1.png", title, name, review, stars);
    $('#textarea1').val("");
    $('#review_title').val("");

    $('#reviews').prepend(reviewView);
});