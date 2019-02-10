
/*

Those function will help up handle file upload

*/


function readURL(input) {
    if (input.files && input.files[0]) {
        console.log("hello world");
        var reader = new FileReader();
        reader.onload = function(e) {
            console.log(e);
            $('#avatar_picture').attr('src', e.target.result);
            $('#avatar_picture').height($('#avatar_picture').width());
        }
        reader.readAsDataURL(input.files[0]);
    }
}

$(document).ready(function() {
    var input = $(document.createElement("input"));
    input.attr("type", "file");
    input.attr("accept","image/png, image/jpeg");
    input.on('change', ()=> {
            readURL(input[0]);
    });

    $('#change_picture').click(()=>{
        input.trigger("click"); 
        return false;
    });
});

$(document).ready(function() {
    var input = $(document.createElement("input"));
    input.attr("type", "file");
    input.attr("accept","application/json");
    input.on('change', ()=> {
            //readURL(input[0]);
    });

    $('#upload_file').click(()=>{
        input.trigger("click");
        return false;
    });
});