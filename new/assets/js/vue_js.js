/*

This is for constructing new vue

given param to the function:
@param tag - the id of the element attaching the vue
@param data - the data we want to show
@param filter_by - the field we want to screen by

//For example:
class Movie:
    name
    img
    stars
    info
    url

//construct array of Movies:
var data = []
for (var movie in movies) {
    var new_movie = new Movie(name, img, stars, info, url)
    data.push(new_movie)
}

now we will call the function 'vue':

vue('#tag', all_movies, 'name')


*/
var vue = function(tag, data, filter_by) {
    const app = new Vue ({
        el: tag,
        data: {
          search: '',
          postList : data
        },
        computed: {
          filteredList() {
            return this.postList.filter(post => {
              return post[filter_by].toLowerCase().includes(this.search.toLowerCase())
            })
          }
        }
      })
}
