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
      '#default_value' => \Drupal::database()->query("SELECT name from students WHERE id = :id", array(":id" => $id))->fetchField(),
    ];

    // for db values of one row - fetchField or entityQuery?
    // decided to go with raw sql for the time being

    $form['gender'] = [
      '#type' => 'radios',
      '#title' => $this->t('Gender'),
      '#default_value' => \Drupal::database()->query("SELECT gender from students WHERE id = :id", array(":id" => $id))->fetchField(),
      '#options'  => array(
        'm' => $this
          ->t('Male'),
        'f' => $this
          ->t('Female'),
      ),
    ];

    $form['faculty_number'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Faculty number'),
      '#default_value' => \Drupal::database()->query("SELECT faculty_number from students WHERE id = :id", array(":id" => $id))->fetchField(),
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
    $id = $form_state->getValue('id');
    $name = $form_state->getValue('name');
    $gender = $form_state->getValue('gender');
    $faculty_number = $form_state->getValue('faculty_number');

    \Drupal::database()->update('students')
      ->fields([
        'name' => $name,
        'gender' => $gender,
        'faculty_number' => $faculty_number,
      ])
      ->condition('id',$id)
      ->execute();

    $form_state->setRedirect('students.list_students');
  }
}
