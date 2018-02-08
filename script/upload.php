<?php
function uploadFile ($file_field = null) {
    $path = '../sounds'; 
    $max_size = 1310720;
    $whitelist_ext = array('mp3','wav');
    $whitelist_type = array('audio/mpeg', 'audio/wav');
    $filename = str_replace(' ','',$_FILES[$file_field]['name']);
    $out = array('error'=>null);
                 
    if (!$file_field) {
      $out['error'][] = "Please specify a valid form field name";           
    }
  
    if (!$path) {
      $out['error'][] = "Please specify a valid upload path";               
    }
         
    if (count($out['error'])>0) {
      return $out;
    }
  
    if((!empty($_FILES[$file_field])) && ($_FILES[$file_field]['error'] == 0)) {
           
      $file_info = pathinfo($_FILES[$file_field]['name']);
      $name = $file_info['filename'];
      $ext = $file_info['extension'];
                       
      if (!in_array($ext, $whitelist_ext)) {
        $out['error'][] = "Invalid file Extension";
      }
                 
      if (!in_array($_FILES[$file_field]["type"], $whitelist_type)) {
        $out['error'][] = "Invalid file Type";
      }
                 
      if ($_FILES[$file_field]["size"] > $max_size) {
        $out['error'][] = "File is too big";
      }
                 
      if (file_exists($path.$_FILES[$file_field]['tmp_name'])) {
        $out['error'][] = "A file with this name already exists";
      }
  
      if (count($out['error'])>0) {
        return $out;
      } 
  
      if (move_uploaded_file($_FILES[$file_field]['tmp_name'], $path.$_FILES[$file_field]['tmp_name'])) {
        $out['filepath'] = $path;
        $out['filename'] = $_FILES[$file_field]['tmp_name'];
        return $out;
      } else {
        $out['error'][] = "Server Error !";
      }
           
    } else {
      $out['error'][] = "No file uploaded";
      return $out;
    }      
  }

$file = uploadFile('file');
if (is_array($file['error'])) {
    $message = '';
    foreach ($file['error'] as $msg) {
    $message .= '<p>'.$msg.'</p>';    
    }
} else {
    $message = "File uploaded successfully";
}
echo $message;

?>     