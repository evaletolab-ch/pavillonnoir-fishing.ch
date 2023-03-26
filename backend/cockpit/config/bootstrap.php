<?php
$app->bind('/get-autocomplete/:collection/:field', function($params) {

$tags = [];
$match = [];
$field = $queryfield = $params['field'];
if (preg_match('/^(.*)\.(.*)$/', $field, $match)) {
  $queryfield = $match[1];
}

$options = ['fields' => [$queryfield => true]]; // field name of your tags field

$entries = $this->module('collections')->find($params['collection'], $options);

if ($entries) {
    foreach($entries as $entry) {
      if (preg_match('/^(.*)\.(.*)$/', $field, $match)) {
          $tags[] = $entry[$match[1]][$match[2]];
      } else {
          if(is_string($entry[$field])) {
            $tags[] = $entry[$field];
          }
      }    
    }
}



        
// remove duplicates
$tags = array_keys(array_flip($tags));

return $tags;

});
