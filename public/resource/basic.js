$('#form-login').submit(function () {
    var form = $(this);
    var data = $(this).serialize();

    $.ajax({
        url: 'ajax/auth',
        data: data,
        type: 'POST',
        dataType: 'json',
        beforeSend: function () {
            $("#submit-form").prop("disabled", true);
        },
        success: function (resposta) {
            if(resposta.error){
                noty({
                    text        : '<div class="alert alert-danger media fade in"><p><strong>Error:</strong>'+ resposta.error +'</p></div>',
                    layout      : 'topRight', //or left, right, bottom-right...
                    theme       : 'made',
                    maxVisible  : 10,
                    animation   : {
                        open  : 'animated bounceInRight',
                        close : 'animated bounceOutRight'
                    },
                    timeout: 3000,
                });
                $("button").prop("disabled", false);
            }else
            {
                noty({
                    text        : '<div class="alert alert-success media fade in"><p>'+ resposta.success +'</p></div>',
                    layout      : 'topRight', //or left, right, bottom-right...
                    theme       : 'made',
                    maxVisible  : 10,
                    animation   : {
                        open  : 'animated bounceInRight',
                        close : 'animated bounceOutRight'
                    },
                    timeout: 3000,
                });

                setTimeout(function () {
                    window.location.href = "/dashboard"; //will redirect to your blog page (an ex: blog.html)
                }, 1000); //will call the function after 2 secs.
            }
        }
    });

    return false;
});

// $('#form-add-post').submit(function () {
//     var form = $(this);
//     var data = $(this).serialize();
//
//     $.ajax({
//         url: '/dashboard/ajax',
//         data: data,
//         type: 'POST',
//         dataType: 'json',
//         beforeSend: function () {
//             $("#submit-form").prop("disabled", true);
//         },
//         success: function (resposta) {
//             if(resposta.error){
//                 noty({
//                     text        : '<div class="alert alert-danger media fade in"><p><strong>Error:</strong>'+ resposta.error +'</p></div>',
//                     layout      : 'topRight', //or left, right, bottom-right...
//                     theme       : 'made',
//                     maxVisible  : 10,
//                     animation   : {
//                         open  : 'animated bounceInRight',
//                         close : 'animated bounceOutRight'
//                     },
//                     timeout: 3000,
//                 });
//                 $("button").prop("disabled", false);
//             }else
//             {
//                 noty({
//                     text        : '<div class="alert alert-success media fade in"><p>'+ resposta.success +'</p></div>',
//                     layout      : 'topRight', //or left, right, bottom-right...
//                     theme       : 'made',
//                     maxVisible  : 10,
//                     animation   : {
//                         open  : 'animated bounceInRight',
//                         close : 'animated bounceOutRight'
//                     },
//                     timeout: 3000,
//                 });
//
//                 setTimeout(function () {
//                     window.location.href = "/dashboard"; //will redirect to your blog page (an ex: blog.html)
//                 }, 1000); //will call the function after 2 secs.
//             }
//         }
//     });
//
//     return false;
// });

$("#form-add-post").submit(function () {
    var formData = new FormData(this);

    $.ajax({
        url: '/dashboard/ajax',
        type: 'POST',
        data: formData,
        dataType: 'json',
         beforeSend: function () {
             $("#submit-form").prop("disabled", true);

         },
        success: function (data) {
           if(data.success)
           {
               noty({
                   text        : '<div class="alert alert-success media fade in"><p>'+ data.success +'</p></div>',
                   layout      : 'topRight', //or left, right, bottom-right...
                   theme       : 'made',
                   maxVisible  : 10,
                   animation   : {
                       open  : 'animated bounceInRight',
                       close : 'animated bounceOutRight'
                   },
                   timeout: 3000,
               });

               setTimeout(function () {
                   window.location.href = "/dashboard/post"; //will redirect to your blog page (an ex: blog.html)
               }, 1000); //will call the function after 2 secs.
           }else{
               noty({
                   text        : '<div class="alert alert-danger media fade in"><p>'+ data.error +'</p></div>',
                   layout      : 'topRight', //or left, right, bottom-right...
                   theme       : 'made',
                   maxVisible  : 10,
                   animation   : {
                       open  : 'animated bounceInRight',
                       close : 'animated bounceOutRight'
                   },
                   timeout: 3000,
               });
           }

        },
        cache: false,
        contentType: false,
        processData: false,
        xhr: function() {  // Custom XMLHttpRequest
            var myXhr = $.ajaxSettings.xhr();
            if (myXhr.upload) { // Avalia se tem suporte a propriedade upload
                myXhr.upload.addEventListener('progress', function (completo) {
                    $('.progress').fadeIn();
                    var prog = parseInt(completo.loaded / completo.total * 100);
                    $('.progress-bar').text(prog + "%").width(prog + "%");
                }, false);
            }
            return myXhr;
        }
    });
    return false;
});


$(document).ready(function() {

    if(window.File && window.FileList && window.FileReader) {
        $("#files").on("change",function(e) {
            var files = e.target.files ,
                filesLength = files.length ;
            for (var i = 0; i < filesLength ; i++) {
                var f = files[i]
                var fileReader = new FileReader();
                fileReader.onload = (function(e) {
                    var file = e.target;
                    $("<img></img>",{
                        class : "imageThumb",
                        src : e.target.result,
                        title : file.name
                    }).insertAfter("#files");
                });
                fileReader.readAsDataURL(f);
            }
        });
    } else { alert("Your browser doesn't support to File API") }
});

$('#form-cat').submit(function () {
    var form = $(this);
    var data = $(this).serialize();

    $.ajax({
        url: 'ajax/category',
        data: data,
        type: 'POST',
        dataType: 'json',
        beforeSend: function () {
            $("#submit-form").prop("disabled", true);
        },
        success: function (resposta) {
            if(resposta.error){
                noty({
                    text        : '<div class="alert alert-danger media fade in"><p><strong>Error:</strong>'+ resposta.error +'</p></div>',
                    layout      : 'topRight', //or left, right, bottom-right...
                    theme       : 'made',
                    maxVisible  : 10,
                    animation   : {
                        open  : 'animated bounceInRight',
                        close : 'animated bounceOutRight'
                    },
                    timeout: 3000,
                });
                $("button").prop("disabled", false);
            }else
            {
                noty({
                    text        : '<div class="alert alert-success media fade in"><p>'+ resposta.success +'</p></div>',
                    layout      : 'topRight', //or left, right, bottom-right...
                    theme       : 'made',
                    maxVisible  : 10,
                    animation   : {
                        open  : 'animated bounceInRight',
                        close : 'animated bounceOutRight'
                    },
                    timeout: 3000,
                });

                setTimeout(function () {
                    window.location.href = "/dashboard/category"; //will redirect to your blog page (an ex: blog.html)
                }, 1000); //will call the function after 2 secs.
            }
        }
    });

    return false;
});


