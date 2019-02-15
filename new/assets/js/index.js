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

// function getCards(){
//     var all_movies = [];
//     $.post('/movie/get_movies',{}, function(data){
//       data = JSON.parse(data);
//       var movies = data.movies;
//       var index = 0;
//       for (var movie in movies) {
//         let movie_name = movies[movie]['name'];
//         let movie_details = movies[movie];
//         //let cardHtml = get_card(index,movie_name,movie_details);

//         // adding the stars to the modal
//         let star_rating = movies[movie]['ratings'];
//         let number_of_empty_stars = 5 - star_rating;

//         let ratings = "";
//         for (j=0; j<star_rating; j++) {
//           ratings += "<span class='fa fa-star checked'></span>";
//         }
//         for (j=0; j<number_of_empty_stars; j++) {
//           ratings += "<span class='fa fa-star'></span>";
//         }
//         let movie_post = new Post(movie_name, movies[movie]['cover'], ratings, movies[movie]['plot'], index);

//         //console.log(ratings);
//         //$('#stars_ratings').append(ratings);

//         all_movies.push(movie_post);
//         index += 1;
//       }
//     });
//   }

// console.log(all_movies);
class Post {
  //id,name,ratings,release_date,plot,actors,conver,info
  constructor(name, img, stars, info, index) {
    this.name = name; // name
    this.img = img; // cover
    this.stars = stars; // ratings
    this.info = info; // plot
    this.url = "/reviews.php?movie=" + index; //id
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
      $.post("/new/index.php/movie/get_movies/"+page, {}, data => {
        data = JSON.parse(data);
        data.forEach(i => {
          //id,name,ratings,release_date,plot,actors,conver,info
          let movie_name = i["name"];
          let movie_details = i['info'];
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
          let post_item = new Post(
            movie_name,
            i["cover"],
            ratings,
            i["plot"],
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
