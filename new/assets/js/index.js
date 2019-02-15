function readTextFile(file, callback) {
  var rawFile = new XMLHttpRequest();
  rawFile.overrideMimeType("application/json");
  rawFile.open("GET", file, true);
  rawFile.onreadystatechange = function() {
    if (rawFile.readyState === 4 && rawFile.status == "200") {
      callback(rawFile.responseText);
    }
  };
  rawFile.send(null);
}

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
    moviesList: []
  },
  computed: {
    filteredList() {
      return this.moviesList.filter(post => {
        return post.name.toLowerCase().includes(this.search.toLowerCase());
      });
    }
  },
  methods: {
    fetchMovies: function(page) {
      $.post("/new/index.php/movie/get_movies/" + page, {}, data => {
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
            plot = plot.substring(0, Math.min(plot.length, 300));
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
      });
    }
  }
});

$(document).ready(() => {
  $("#cat_btn").click(() => {
    $("#table_tabs").fadeToggle("fast");
  });
  app.fetchMovies(1);
});
