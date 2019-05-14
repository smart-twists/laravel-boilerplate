/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
require('./bootstrap');
require('../bower_components/adminlte/dist/js/app');
require('select2/dist/js/select2.full');
require('select2/dist/js/i18n/fa');

import vue from "vue";
window.Vue = vue;

import VuePersianDatetimePicker from "vue-persian-datetime-picker";

Vue.component('date-picker', VuePersianDatetimePicker);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.component('example-component', require('./components/ExampleComponent.vue'));

const app = new Vue({
    el: '#app',
    filter:{
        yes_no(value){
            if (value) {
                return '<span class="label label-success">بله</span>';
            }
            return '<span class="label label-danger">خیر</span>';
        }
    }
});

$(document).ready(function () {
    $('[tooltip]').tooltip();
    $(".select2").select2({
        dir: "rtl",
        language: "fa",
        width: '100%'
    });
    $(".select2_tag").select2({
        dir: "rtl",
        language: "fa",
        width: '100%',
        tags: true
    });

    // tinymce.init({
    //     selector: "textarea.tinymce",
    //     language: 'fa_IR',
    //     directionality : 'rtl',
    //     plugins:['link' , 'advlist' , 'media' , 'image' , 'autolink' , 'lists', 'hr',
    //         'charmap' , 'preview' , 'anchor' , 'paste' , 'table' , 'textcolor' , 'emoticons',
    //         'searchreplace' , 'wordcount' , 'save' , 'visualblocks' , 'nonbreaking' , 'contextmenu',
    //         'template' , 'imagetools' , 'directionality' , 'textpattern' , 'colorpicker' ,
    //         'fullscreen' , 'autoresize' , 'toc', 'code'],
    //     image_caption: true,
    //     toolbar: ['undo redo | fontsizeselect | ltr rtl | alignleft aligncenter alignright alignjustify | outdent indent | searchreplace | preview fullscreen',
    //         'bold underline | forecolor backcolor | emoticons | bullist numlist | formatselect styleselect | removeformat',
    //         'link image media | insert | toc | code'],
    //     fontsize_formats: '11pt 12pt 14pt 15pt 16pt 17pt 18pt 19pt 20pt 22pt',
    //     // content_css: '/css/tinymce.css',
    //     height: 500,
    //     theme: 'modern',
    //     // plugins: 'print preview fullpage searchreplace autolink directionality visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount imagetools contextmenu colorpicker textpattern help',
    //     // toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat',
    //     image_advtab: true,
    //     templates: [
    //         { title: 'Test template 1', content: 'Test 1' },
    //         { title: 'Test template 2', content: 'Test 2' }
    //     ],
    //     content_css: [
    //         '/css/tinymce.css',
    //     ]
    // });
});