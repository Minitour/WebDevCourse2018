/*

This function will create and append the new comment to the list of comments

*/

this.get_reviews = function(movie_id, page_num, callback) {
    $.post(`/new/index.php/reviews/movie/${movie_id}/${page_num}`,{}, (data) => {
        if(data == undefined) return;
        callback(data);
    });
}

this.setup_movie = function(movie_data) {
  $("#title").text(movie_data["name"]);
  var final_str = "";
  var i = movie_data['id'];
  // for taging the movies in the modal_first_div var below

  var stars_number = 5;
  // constructing a movie
  var first_div = '<div class="col-lg-3 col-md-4 col-sm-6 portfolio-item">';
  var second_div = '<div class="card h-100">';
  var link_to_image = `<img style="width:100%;" class="card-img-top" src="${movie_data["cover"]}" alt="">`;
  var third_div = '<div class="card-body">';
  var h4_line = '<h4 class="card-title">';
  var title = `<a href="#"> ${movie_data["name"]} </a>`;
  var close_h4 = "</h4>";
  var description = `<p class="card-text">${movie_data["info"]}</p>`;
  var close_third_div = "</div>";
  var button = `<button type="button" class="btn btn-primary" style="background-color:#353a40;border-color:#353a40;" data-toggle="modal" data-target="#${i}">Movie Info</button>`;
  var closing_first_second_divs_first = "</div></div>";

  // constructing the modal for the movie
  var modal_first_div = `<div id="${i}" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">`;
  var modal_second_div = '<div class="modal-dialog modal-lg">';
  var closeButton_modal = '<button type="button" class="close" style="color:white;" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
  var modal_third_div_and_close_div_header = `<div class="modal-content"><div class="modal-header" style="background-color:#353a40;"><h5 class="modal-title" style="color:white;">${movie_data["name"]}</h5>${closeButton_modal}</div>`;

  // fetching the info the specific movie
  var fields_for_movie_info = "";

  var number_of_empty_stars = stars_number - movie_data["ratings"];
  var j;
  var ratings = "<p><span style='font-weight:bold;'>Rating: </span>";
  for (j = 0; j < movie_data["ratings"]; j++) {
    ratings += "<span class='fa fa-star checked'></span>";
  }
  for (j = 0; j < number_of_empty_stars; j++) {
    ratings += "<span class='fa fa-star'></span>";
  }
  ratings += "</p>";
  //var ratings = '<p style="font-size:20"><span style="font-weight:bold;">Ratings</span> : ' + movies_infos[movie]['ratings'] + "</p>";
  var released =
    `<p style="font-size:20"><span style="font-weight:bold;">Released</span> : ${movie_data["release_date"]}</p>`;
  //var genre = `<p style="font-size:20"><span style="font-weight:bold;">Genre</span> : ${movie_data["genre"]}</p>`;
  var plot =
    `<p style="font-size:20"><span style="font-weight:bold;">Plot</span> : ${movie_data["plot"]} </p>`;
  //var actors =`<p style="font-size:20"><span style="font-weight:bold;">Actors</span> : ${movie_data["actors"]}</p>`;

  // appending the fields together
  fields_for_movie_info = ratings + released + /*genre*/ plot; /*+ actors;*/

  // appending the joined fields to the modal body
  var modalBody =
    '<div class="row" style="padding:10px;width:device-width;">  <div class="col s9"><div class="row" style="width:device-width;"><div class="col s6">' +
    link_to_image +
    '</div> <div class="col s6">' +
    fields_for_movie_info +
    "</div></div></div></div>";

  // closing the first three divs of the modal.
  var closing_modal_first_second_third_divs = "</div></div></div>";

  // appending all movies together and put in a specific tag later
  final_str +=
    first_div +
    second_div +
    link_to_image +
    third_div +
    h4_line +
    title +
    close_h4 +
    description +
    close_third_div +
    button +
    closing_first_second_divs_first +
    modal_first_div +
    modal_second_div +
    modal_third_div_and_close_div_header +
    modalBody +
    closing_modal_first_second_third_divs;

  // fetching the element we taged
  var first_tag_element = document.getElementById("first_tag");

  // attach the string we constructed above to the div we taged as "first_tag".
  first_tag_element.insertAdjacentHTML("beforeend", modalBody);
}

this.construct_review = function(movie_id,user_id,profile_img, name,time, review, score) {
  var review_item = "";
  review_item += '<li class="collection-item avatar">';
  review_item += '<img src="' + profile_img + '" alt="" class="circle">';
  review_item += '<span class="title"><b>' + name + "</b></span>";
  review_item += "<p>" + time + "<br><br>";
  review_item += review;
  review_item += "</p>";
  review_item += '<a class="secondary-content">';
  for (var i = 0; i < score; i++) {
    review_item += '<i class="material-icons">grade</i>';
  }
  review_item += "</a>";
  review_item += '<div class="row">'
  review_item += `<div class="col s2 m1"><a href="/new/index.php/comments/${movie_id}/${user_id}" class="waves-effect blue waves-light btn"><i class="material-icons">comment</i></a></div>`
  if (this.user_id = user_id) {
    review_item += `<div class="col s2 m1"><a onclick="did_select_delete(${movie_id})" class="waves-effect red waves-light btn"><i class="material-icons">delete</i></a></div>`
  }
  review_item += "</div>"
  review_item += "</li>";

  return review_item;
}

function did_select_delete(movie_id) {
  //make api call to delete the review
}



$(document).ready(() => {
  $("#create_review").click(() => {
    let review = $("#textarea1").val();
    // let title = $("#review_title").val();
    let stars = parseInt(
      $("input[name=rating]:checked", "#star_rating_form").val()
    );

    let reviewView = construct_review(
      movie_id,
      user_id,
      profile_picture,
      username,
      new Date(),
      review,
      stars
    );

    $("#textarea1").val("");

    $("#reviews").prepend(reviewView);

    let payload = {
      'movie_id' : movie_id,
      'comment' : review,
      'star_rating' : stars
    }

    $.post('/new/index.php/reviews/add',payload,(res) => {
      console.log(res)
      M.toast({html: 'Review Published.'})
    })
  });
});

function load_more() {
      
  // if we reached the end return.
  if(!should_load_more){
    return;
  }

  // fetch reviews for movie with id.
  isMakingRequest = true;
  $('#loading_indicator').show();
  get_reviews(movie_data['id'],page, (reviews) => {
    $('#loading_indicator').hide();
    // reached the final page.
    if (reviews.length == 0) {
      should_load_more = false;
      return;
    }

    // load comments
    reviews.forEach( r => {
      var review_item = construct_review(r['movie_id'],r['user_id'],r['profile_picture'],r['username'],r['created_at'],r['comment'],parseInt(r['star_rating']));
      $('#comments').append(review_item);
    });

    // increment page for next load.
    page += 1;

    // disable flag
    isMakingRequest = false;
    
  });
}

// load the first page of reviews.


// setup scroll listner
$(window).scroll(function() {
  // if we reached the eng of the page
  if($(window).scrollTop() == $(document).height() - $(window).height()) {
       //make api call to server to load more.
       if (page > 1 && !isMakingRequest) { load_more(); }
  }
});
