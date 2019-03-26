<?php

namespace Drupal\helloworld\Controller;
use Drupal\Core\Controller\ControllerBase;

class HelloworldController extends ControllerBase {
	/**
   * Generates an user bulk upload page.
   */
  public function helloworld() {
    
    return array(
      '#type' => 'markup',
      '#markup' => t('Hello vishal'),
    );
  }
}
