jQuery(document).ready(function () {
    $(".summernote").summernote({
        height: 350,
        minHeight: null,
        maxHeight: null,
        focus: !1,
        prettifyHtml:false,
        toolbar:[
            // Add highlight plugin
            ['highlight', ['highlight']],
            ['style', ['style']],
  ['font', ['bold', 'underline', 'clear']],
  ['fontname', ['fontname']],
  ['color', ['color']],
  ['para', ['ul', 'ol', 'paragraph']],
  ['table', ['table']],
  ['insert', ['link', 'picture', 'video']],
  ['view', ['fullscreen', 'codeview', 'help']],
        ],

    }),
        $(".inline-editor").summernote({ airMode: !0 })
}),
    window.edit = function () {
        $(".click2edit").summernote()
    },
    window.save = function () {
        $(".click2edit").summernote("destroy")
    };



    // $('.summernote').summernote({
    //     height: 200,
    //     tabsize: 2,
    //     // close prettify Html
    //     prettifyHtml:false,
    //     toolbar:[
    //         // Add highlight plugin
    //         ['highlight', ['highlight']],
    //     ],
    //     lang:'tr-TR'
    // });