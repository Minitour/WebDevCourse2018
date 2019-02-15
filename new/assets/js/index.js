function readTextFile(file, callback) {
    var rawFile = new XMLHttpRequest();
    rawFile.overrideMimeType("application/json");
    rawFile.open("GET", file, true);
    rawFile.onreadystatechange = function() {
        if (rawFile.readyState === 4 && rawFile.status == "200") {
            callback(rawFile.responseText);
        }
    }
    rawFile.send(null);
  }

  

function getCards(){
    var all_movies = [];
    readTextFile("movies_info.json", function(text){
      var data = JSON.parse(text);
      var movies = data.movies;
      var index = 0;
      for (var movie in movies) {
        let movie_name = movies[movie]['name'];
        let movie_details = movies[movie];
        //let cardHtml = get_card(index,movie_name,movie_details);
        
        // adding the stars to the modal
        let star_rating = movies[movie]['ratings'];
        let number_of_empty_stars = 5 - star_rating;

        let ratings = "";
        for (j=0; j<star_rating; j++) {
          ratings += "<span class='fa fa-star checked'></span>";
        }
        for (j=0; j<number_of_empty_stars; j++) {
          ratings += "<span class='fa fa-star'></span>";
        }
        let movie_post = new Post(movie_name, movies[movie]['cover'], ratings, movies[movie]['plot'], index);
      
        //console.log(ratings);
        //$('#stars_ratings').append(ratings);

        all_movies.push(movie_post);
        index += 1;
      }
    });
    return all_movies;
  }


  // console.log(all_movies);
class Post {
    constructor(name, img, stars, info, index) {
      this.name = name;
      this.img = img;
      this.stars = stars;
      this.info = info;
      this.url = "/reviews.php?movie=" + index;
    }
}

const app = new Vue ({
    el: '#first_tag',
    data: {
      search: '',
      postList : getCards()
    },
    computed: {
      filteredList() {
        return this.postList.filter(post => {
          return post.name.toLowerCase().includes(this.search.toLowerCase())
        })
      }
    }
  })

$(document).ready(() => {
    $('#cat_btn').click(()=> {
      $('#table_tabs').fadeToggle('fast');
    });
})