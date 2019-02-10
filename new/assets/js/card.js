
/*

This function will get all movies from the database 


TODO:

instead of using the function readTextFile()
-> we need to get the movies from the db

*/

var cards = function(){
    var all_movies = [];
    readTextFile("movies_info.json", function(text){
    // var movies_db = $this->db->get('movies');
    // for (var movie in movies_db) {...}
      var data = JSON.parse(text);
      var movies = data.movies;
      var index = 0;
      
      for (var movie in movies) {
        let movie_name = movies[movie]['name'];
        let movie_details = movies[movie];
        
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

        // construct the movie card with Movie model
        let movie_post = new Movie(movie_name, movies[movie]['cover'], ratings, movies[movie]['plot'], index, "","","");

        all_movies.push(movie_post);
        index += 1;
      }
    });
    return all_movies;
  }