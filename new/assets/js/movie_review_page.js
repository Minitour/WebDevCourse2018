
/*

This function will append the reviews of the specific movie

@param i - the index of the movie
@param data - movie Model instance
@param tag - where we want to append
*/


function get_reviews(i, data, tag) {
    $('#title').text(data['name']);
    var final_str = "";

    // for taging the movies in the modal_first_div var below

    var stars_number = 5;
    // constructing a movie
    var first_div = '<div class="col-lg-3 col-md-4 col-sm-6 portfolio-item">';
    var second_div = '<div class="card h-100">';
    var link_to_image = '<img style="width:100%;" class="card-img-top" src="' + data['img'] + '" alt="">';
    var third_div = '<div class="card-body">';
    var h4_line = '<h4 class="card-title">';
    var title = '<a href="#">' + data['name'] + '</a>';
    var close_h4 = '</h4>';
    var description = '<p class="card-text">' + data['info'] + '</p>';
    var close_third_div = '</div>';
    var button = '<button type="button" class="btn btn-primary" style="background-color:#353a40;border-color:#353a40;" data-toggle="modal" data-target="#' + i + '">Movie Info</button>';
    var closing_first_second_divs_first = '</div></div>';

    // constructing the modal for the movie
    var modal_first_div = '<div id="' + i + '" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">';
    var modal_second_div = '<div class="modal-dialog modal-lg">';
    var closeButton_modal = '<button type="button" class="close" style="color:white;" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
    var modal_third_div_and_close_div_header = '<div class="modal-content"><div class="modal-header" style="background-color:#353a40;"><h5 class="modal-title" style="color:white;">' + data['name'] + '</h5>' + closeButton_modal + "</div>";

    // fetching the info the specific movie
    var fields_for_movie_info = "";

    var number_of_empty_stars = stars_number - data['stars'];
    var j;
    var ratings = "<p><span style='font-weight:bold;'>Rating: </span>";
    for (j = 0; j < data['stars']; j++) {
        ratings += "<span class='fa fa-star checked'></span>";
    }
    for (j = 0; j < number_of_empty_stars; j++) {
        ratings += "<span class='fa fa-star'></span>";
    }
    ratings += "</p>";
    //var ratings = '<p style="font-size:20"><span style="font-weight:bold;">Ratings</span> : ' + movies_infos[movie]['ratings'] + "</p>";
    var released = '<p style="font-size:20"><span style="font-weight:bold;">Released</span> : ' + data['released'] + "</p>";
    var genre = '<p style="font-size:20"><span style="font-weight:bold;">Genre</span> : ' + data['genre'] + "</p>";
    var plot = '<p style="font-size:20"><span style="font-weight:bold;">Plot</span> : ' + data['info'] + "</p>";
    var actors = '<p style="font-size:20"><span style="font-weight:bold;">Actors</span> : ' + data['actors'] + "</p>";

    // appending the fields together
    fields_for_movie_info = ratings + released + genre + plot + actors;

    // appending the joined fields to the modal body
    var modalBody = '<div class="row" style="padding:10px;width:device-width;">  <div class="col s9"><div class="row" style="width:device-width;"><div class="col s6">' + link_to_image + '</div> <div class="col s6">' + fields_for_movie_info + "</div></div></div></div>";

    // closing the first three divs of the modal.
    var closing_modal_first_second_third_divs = "</div></div></div>";

    // appending all movies together and put in a specific tag later
    final_str += first_div + second_div + link_to_image + third_div + h4_line + title + close_h4 + description + close_third_div + button + closing_first_second_divs_first + modal_first_div + modal_second_div + modal_third_div_and_close_div_header + modalBody + closing_modal_first_second_third_divs;


    // fetching the element we taged
    var first_tag_element = document.getElementById(tag);

    // attach the string we constructed above to the div we taged as "first_tag".
    first_tag_element.insertAdjacentHTML('beforeend', modalBody);

}
