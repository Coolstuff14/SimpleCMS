//Content Editor Code
tinymce.init({
  selector: 'div#edit',
  inline: true,
  plugins: "link responsivefilemanager",
  menubar: "file | edit | view | format | insert | responsivefilemanager",
  toolbar: "undo redo | fontsizeselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | table | responsivefilemanager | savebtn",
  link_context_toolbar: true,
  browser_spellcheck: true,
  external_filemanager_path:"../../filemanager/filemanager/",
  filemanager_title:"Responsive Filemanager" ,
  external_plugins: { "filemanager" : "../../filemanager/filemanager/plugin.min.js"},

  setup: function(editor) {
    editor.addButton('savebtn', {
    text: "Save",
    icon: 'save',
    onclick: function () {
      //Save page content to database by passing to php though AJAX
      $.ajax({
              type: "POST",
              url: 'modules/savepost.php',
              data: "savepage=" + encodeURIComponent(tinyMCE.get('edit').getContent())+"&"+ (window.location.search.substr(1) + "&title=" + $("#titletext").text()),
              success: function(data)
              {$.notify({message:'Page Saved!'},{type: 'success'});}
            });
          }
        });
      }
  });

//File Manager iFrame for image upload
$('.iframe-btn').fancybox({
	'width'		: 900,
	'height'	: 900,
	'type'		: 'iframe',
  'autoScale'    	: false
});

//Push header image update to database and change locally without reloading
function responsive_filemanager_callback(field_id){
	//console.log(field_id);
	var url=jQuery('#'+field_id).val();
	//alert('update '+field_id+" with "+url);
	//Push to php though ajax
  $.ajax({type:"POST",url:"modules/savepost.php",data:"changehpic="+url+"&"+window.location.search.substr(1),success: function(data){$.notify({message:'Image Updated!'},{type: 'success'});}});
  $(".intro-header").css("background-image", "url('"+url+"')");
};
