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

  public function listStudents()
  {

    return array(
      '#type' => 'markup',
      '#theme' => 'students',
      '#items' => array(
       'title' => 'List All Students Test',
       'data' => $this->fetchAllStudents(),
      ),
    );
  }

  private function fetchAllStudents() {
    $query = \Drupal::database()->query( "SELECT * FROM students" );
    $results = $query->fetchAll();
    return $results;
  }
}
