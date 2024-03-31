// ckeditor
var ckeditorClassic = document.querySelector('#ckeditor-classic');
if (ckeditorClassic) {
    ClassicEditor
        .create(document.querySelector('#ckeditor-classic'))
        .then(function (editor) {
            editor.ui.view.editable.element.style.height = '200px';
            editor.model.document.on('change:data', () => {
                document.querySelector('#task-description').value = editor.getData();
            });
        })
        .catch(function (error) {
            console.error(error);
        });
}