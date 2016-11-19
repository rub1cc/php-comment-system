tinymce.init({
    selector: 'textarea.tinymce',
    plugins: "link emoticons textcolor",
    toolbar: "bold italic underline | forecolor backcolor | link emoticons",
    menubar: false,
    resize: false,
    setup: function (editor) {
        editor.on('change', function () {
            editor.save();
        });
    }
});
