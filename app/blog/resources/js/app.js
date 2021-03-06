/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});

if (document.querySelector('[name="description"]') != null || document.querySelector('#description') != null) {
    CKEDITOR.replace( 'description' );
}

comment = {
    template: function (comment){
        let html = '<div class="list-group">';

        html += '<div class="list-group-item list-group-item-action flex-column align-items-start">';

        html += '<div class="d-flex w-100 justify-content-between">';
        html += "<h5 class='mb-1'>Коментарий</h5>";
        html += '<small>'+comment.created_at+'</small>';
        html += '</div>';

        html += '<p class="mb-1">'+comment.content+'</p>';

        html += '<small>'+comment.author+'</small>';

        html += '</div>';

        html += '</div>';

        return html;
    }
};

//error object
error = {
    template: function (error_text){

        let html = '<div class="invalid-feedback">'+error_text+'</div>';

        return html;
    }
};

//fileSize object
fileSize = {
    maxFileSizeCheck: function (e) {
        if(e.files[0].size > 2 * 1024 * 1024 + 1){
            alert("Файл слишком большой!");
            e.value = "";
        }
    }
};



function ajaxLoadComments($jquery) {
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: $jquery.attr('data-url'),
        type: 'GET',
        dataType: 'json',
        success: function (json) {
            let html = '';

            for(let key in json) {
                html += comment.template(json[key]);
            }

            $jquery.html(html);
        }
    });
}

$(document).ready(function() {
    let $comments = $('body #comments');

    if ($comments.length == 1)  {
        ajaxLoadComments($comments);
    }

    $('form#add-comment').submit(function (e) {
        e.preventDefault();

        $.ajax({
            url: $(this).attr('action'),
            data:$(this).serialize(),
            type: 'POST',
            dataType: 'json',
            statusCode: {
                422: function (error_return) {
                    //errors reset
                    $('.is-invalid').removeClass('is-invalid');
                    $('.invalid-feedback').remove();

                    let errors = error_return.responseJSON.errors;

                    if (errors){
                        for(let input_name in errors) {
                            //error stuff
                            let error_text = String(errors[input_name]);
                            let $_input = $('[name="'+input_name+'"]');
                            let error_text_html = error.template(error_text);

                            $_input.focus().addClass('is-invalid').after(error_text_html);
                        }
                    }
                }
            },
            success: function (json) {
                //errors reset
                $('.is-invalid').removeClass('is-invalid');
                $('.invalid-feedback').remove();

                let html = comment.template(json.comment);

                $comments.append(html);

                this.reset();
            }
        });
    });
});