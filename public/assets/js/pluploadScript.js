   //Plupload Widget UI
  // Initialize the widget when the DOM is ready
  $(function() {
    $("#uploader").plupload({
        // General settings
        runtimes : 'html5,flash,silverlight,html4',
        url : "../assets/upload/upload.php",
       
 
        // Maximum file size
        max_file_size : '2mb',

       // buttons: {browse: false, start: false, stop: false},
        

        // Specify what files to browse for
        filters : [
            {title : "Image files", extensions : "jpg,gif,png,jpeg"},
            {title : "Zip files", extensions : "zip,avi"},
            {title : "PDF files", extensions : "pdf"},
            
        ],
 
        // Enable ability to drag'n'drop files onto the widget (currently only HTML5 supports that)
        dragdrop: true,

        prevent_duplicates: true,
 
        // Views to activate
        views: {
            list: true,
            thumbs: true, // Show thumbs
            active: 'thumbs',
        },
        autostart: true,
 
        // Flash settings
        flash_swf_url : '/plupload/js/Moxie.swf',

     
        // Silverlight settings
        silverlight_xap_url : '/plupload/js/Moxie.xap'


        
    });
    // A l'envoi du formulaire, ce script récupère les valeurs des inputs images générés pas plupload 
    // et les concatènent comme valeur de l'input cheminImage séparés par une virgule pour insertion dans la bdd

    $('form.formAdmin').on('submit', function () {
  
      var cheminImage = $("input[name=cheminImage]").val();
      var inputName = $( "input[name*='_name']" );
  
      inputName.each(function(){
         cheminImage += 'assets/upload/' + $(this).val() + ',';
        
      })
     
    $("input[name=cheminImage]").val(cheminImage);
          });

});
