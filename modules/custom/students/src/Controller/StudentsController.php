<?php
/**
 * @file
 * Contains Drupal\students\Controller\StudentsController
 */

namespace Drupal\students\Controller;
use Drupal\Core\Controller\ControllerBase;

class StudentsController extends ControllerBase
{
  public function addStudents()
  {
    return array(
      '#type' => 'markup',
      '#markup' => t('Test add students routing and controller'),
    );
  }
}
