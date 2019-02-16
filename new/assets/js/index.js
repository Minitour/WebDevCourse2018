class Post {
  //id,name,ratings,release_date,plot,actors,conver,info
  constructor(name, img, stars, info, index) {
    this.name = name; // name
    this.img = img; // cover
    this.stars = stars; // ratings
    this.info = info; // plot
    this.url = `/new/index.php/movies/${index}`; //id
  }
}

const app = new Vue({
  el: "#first_tag",
  data: {
    search: "",
    moviesList: [],
    isFetching: false
  },
  computed: {
    filteredList() {
      return this.moviesList.filter(post => {
        return post.name.toLowerCase().includes(this.search.toLowerCase());
      });
    }
  },
  methods: {
    fetchMovies: function(page, search_query, categories) {
      if (search_query == undefined) {
        search_query = "";
      }

      if (categories == undefined) {
        categories = [];
      }

      var query_obj = {
        search: search_query,
        categories: categories
      };

      // use $_POST['query'] on backend
      this.isFetching = true;
      $.post(
        `/new/index.php/movie/get_movies/${page}`,
        { query: JSON.stringify(query_obj) },
        data => {
          this.isFetching = false;
          returned_data = JSON.parse(data);
          console.log(returned_data);
          returned_data.forEach(i => {
            //id,name,ratings,release_date,plot,actors,conver,info
            let movie_name = i["name"];
            //let cardHtml = get_card(index,movie_name,movie_details);

            // adding the stars to the modal
            let star_rating = i["ratings"];
            let number_of_empty_stars = 5 - star_rating;

            let ratings = "";
            for (j = 0; j < star_rating; j++) {
              ratings += "<span class='fa fa-star checked'></span>";
            }
            for (j = 0; j < number_of_empty_stars; j++) {
              ratings += "<span class='fa fa-star'></span>";
            }

            let plot = i["plot"];
            if (plot != undefined) {
              let len = plot.length;
              plot = plot.substring(0, Math.min(len, 300));

              if (len > 300) {
                plot += "...";
              }
            }

            let post_item = new Post(
              movie_name,
              i["cover"],
              ratings,
              plot,
              i["id"]
            );

            //console.log(ratings);
            //$('#stars_ratings').append(ratings);
            this.moviesList.push(post_item);
          });
          current_page += 1;
        }
      );
    }
  }
});

$(document).ready(() => {
  $("#cat_btn").click(() => {
    $("#table_tabs").fadeToggle("fast");
  });
  app.fetchMovies(current_page);
  // setup scroll listner
  $(window).scroll(function() {
    // if we reached the eng of the page
    if ($(window).scrollTop() == $(document).height() - $(window).height()) {
      //make api call to server to load more.
      if (current_page > 1 && !isMakingRequest) {
        app.fetchMovies(current_page);
      }
    }
  });
});
