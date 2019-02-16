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
    review_item += "</li>";
  
    return review_item;
  }


  $(document).ready(() => {
    $("#create_comment").click(() => {
      let comment = $("#textarea1").val();
      // let title = $("#review_title").val();
  
      let commentView = construct_comment(
        user_id,
        profile_picture,
        username,
        new Date(),
        comment
      );
  
      $("#textarea1").val("");
  
      $("#comments").prepend(commentView);
  
      let payload = {
        'movie_id' : movie_id,
        'reviewer_id' : reviewer_id,
        'comment' : comment
      }
  
      $.post('/new/index.php/comments/add',payload,(res) => {
        console.log(res)
        M.toast({html: 'Comment Published.'})
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
    get_comments(review_data['movie_id'],review_data['user_id'], page, (comments) => {
      $('#loading_indicator').hide();
      // reached the final page.
      if (comments.length == 0) {
        should_load_more = false;
        return;
      }
  
      // load comments
      comments.forEach( r => {
        var commentsView = construct_comment(r['user_id'],r['profile_picture'],r['username'],r['time'],r['comment'],parseInt(r['star_rating']));
        $('#comments').append(commentsView);
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