<?php
/**
 * @file
 * Contains Drupal\students\Controller\StudentsController
 */

namespace Drupal\students\Controller;
use Drupal\Core\Controller\ControllerBase;
// use Drupal\Core\Ajax\RedirectCommand;
// use Drupal\Core\Ajax\InvokeCommand;
use Drupal\Core\Ajax\RemoveCommand;
use Drupal\Core\Ajax\AjaxResponse;
// use \Drupal\Core\Url;

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

  private function fetchAllStudents()
  {
    $query = \Drupal::database()->select( 'students', 's' )->fields('s', array('id', 'name', 'gender', 'faculty_number'))->execute();;
    $results = $query->fetchAll();

    return $results;
  }

  public function deleteStudent($id)
  {
     $delete_query = \Drupal::database()->delete('students')
      ->condition('id', $id)
      ->execute();

    $response = new AjaxResponse();
    $response->addCommand(new RemoveCommand('#student-row-' . $id, 'remove'));

    return $response;
  }

  public function updateSortOrder($order)
  {
    // toDo
    var_dump("test update sort order");
    die();
  }
}
