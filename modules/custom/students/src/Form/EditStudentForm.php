<?php

/** @var \Drupal\Core\Database\Connection $connection */

namespace Drupal\students\Form;

use \Drupal\Core\Form\FormBase;
use \Drupal\Core\Form\FormStateInterface;
use \Drupal\Core\Database\Database;

class EditStudentForm extends FormBase
{
  /*
   * {@inheritdoc}
   */
  public function getFormId()
  {
    return 'edit_students_form';
  }

  /*
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state)
  {
    // ToDo
  }

  /*
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state)
  {
    // ToDO
  }
}
