<?php

namespace Drupal\helloworld\Plugin\Block;

// use Drupal\Core\Form\FormInterface;
use Drupal\Core\Block\BlockBase;
use Drupal\node\Entity\Node;
// use Drupal\Core\Form\FormBase;
/**
   * Provides a 'hello' block.
   *
   * @Block(
   *  id = "hello_block",
   *  admin_label = @Translation("To create the the mobile name node in a custom block  "),
   * )
   */

class ArticleBlock extends BlockBase {
  public function build() {

   
    $nids = \Drupal::entityQuery('node')
  ->condition('type', 'mobiles_name_')
  ->execute();
$nodes = \Drupal\node\Entity\Node::loadMultiple($nids);
$out = [];
foreach ($nodes as $key => $value) {
  // echo '<pre>';
  // print_r($value);

  // echo '<pre>';
  // print_r($value->body->getValue()[0]['value']);
  // // echo '<pre>';
  // print_r($value->field_mobile_email->getValue()[0]['value']);
  // // echo '<pre>';
  // print_r($value->field_mobile_types->getValue()[0]['value']);
  // // echo '<pre>';
  //$body= $value->body->value;
  // print_r($var);

  //$email= $value->field_mobile_email->value;
  // print_r($var);

 
  $fid= $value->field_mobile_images->target_id;
 $file = \Drupal\file\Entity\File::load($fid); 
 $path = $file->getFileuri();
 $out[$key]['body'] = $value->body->value;
 $out[$key]['email'] = $value->field_mobile_email->value;
 $out[$key]['image_url'] = file_create_url($path);
 // echo '<pre>';
 // print_r($path);


}
//   // foreach ($nodes as $key => $value) {
//   //   // echo '<pre>';
//   // print_r($value->field_mobile_images->getValue());  
//   // }
 
// }
// // echo "<pre>";
// // print_r($out);
// // die();
// // die();

 
    return array(
      '#theme' => 'mymodule_my_block',
      '#nodes_build' => $out,
      
    );

}

  }

  
  
// protected  function  getNodesBuild() {
//   $nids = \Drupal::entityQuery('node')
//   ->condition('type', 'mobiles_name_')
//   ->execute();
// $nodes = \Drupal\node\Entity\Node::loadMultiple($nids);
// foreach ($nodes as $key => $value) {
//   // echo '<pre>';
//   // print_r($value);

//   // echo '<pre>';
//   // print_r($value->body->getValue()[0]['value']);
//   // // echo '<pre>';
//   // print_r($value->field_mobile_email->getValue()[0]['value']);
//   // // echo '<pre>';
//   // print_r($value->field_mobile_types->getValue()[0]['value']);
//   // // echo '<pre>';
//   $var= $value->body->value;
//   // print_r($var);

//   $var1= $value->field_mobile_email->value;
//   // print_r($var);

//   $var2= $value->field_mobile_types->value;
//   $fid= $value->field_mobile_images->target_id;
//  $file = \Drupal\file\Entity\File::load($fid); 
//  $path = $file->getFileuri();
//  // echo '<pre>';
//  // print_r($path);



//   // foreach ($nodes as $key => $value) {
//   //   // echo '<pre>';
//   // print_r($value->field_mobile_images->getValue());  
//   // }
 
// }
// // die();
// }
// }
