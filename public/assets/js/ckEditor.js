//Initialisation de l'éditeur WYSIWYG pour l'insertion des articles
CKEDITOR.replace( 'editor1', {
    extraPlugins: 'autogrow',
    autoGrow_minHeight: 200,
    autoGrow_maxHeight: 600,
    autoGrow_bottomSpace: 50,
    removePlugins: 'resize'
} );