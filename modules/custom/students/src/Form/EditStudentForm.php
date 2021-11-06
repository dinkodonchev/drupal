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
    return 'edit_student_form';
  }

  /*
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state, $id = NULL)
  {
    $form['id'] = [
      '#type' => 'textfield',
      '#attributes' => array('readonly' => 'readonly'),
      '#title' => $this->t('ID - read only'),
      '#value' => $id,
    ];

    $form['name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Name'),
      '#value' => \Drupal::database()->query("SELECT name from students WHERE id = :id", array(":id" => $id))->fetchField(),
    ];

    // for db values of one row - fetchField or entityQuery?

    $form['gender'] = [
      '#type' => 'radios',
      '#title' => $this->t('Gender'),
      '#options'  => array(
        'm' => $this
          ->t('Male'),
        'f' => $this
          ->t('Female'),
      ),
     // '#value' => ,
    ];

    $form['faculty_number'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Faculty number'),
      //'#value' => ,
    ];

    $form['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Save'),
    ];

    return $form;
  }

  /*
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state)
  {
    // ToDO
    $id = $form_state->getValue('id');
    $name = $form_state->getValue('name');
    $gender = $form_state->getValue('gender');
    $faculty_number = $form_state->getValue('faculty_number');

    //
    //    db_update('sessions')
    //      ->fields(['sid' => session_id()])
    //      ->condition('sid', $old_session_id)
    //      ->execute();
    // UPDATE {sessions} SET sid = 'abcde' WHERE (sid = 'fghij');
  }
}
