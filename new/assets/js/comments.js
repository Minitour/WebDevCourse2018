this.get_comments = function(movie_id,user_id, page_num, callback) {
    $.post(`/new/index.php/comments/movie/${movie_id}/${user_id}/${page_num}`,{}, (data) => {
        if(data == undefined) return;
        callback(data);
    });
}

this.construct_comment = function(user_id,profile_img, name,time, comment) {
    var review_item = "";
    review_item += '<li class="collection-item avatar">';
    review_item += '<img src="' + profile_img + '" alt="" class="circle">';
    review_item += '<span class="title"><b>' + name + "</b></span>";
    review_item += "<p>" + time + "<br><br>";
    review_item += comment;
    review_item += "</p>";
    review_item += '<a class="secondary-content">';
    for (var i = 0; i < score; i++) {
      review_item += '<i class="material-icons">grade</i>';
    }
    review_item += "</a>";
    review_item += "</li>";
  
    return review_item;
  }