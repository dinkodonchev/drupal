<?php

namespace Drupal\students\Form;

use \Drupal\Core\Form\FormBase;
use \Drupal\Core\Form\FormStateInterface;
use \Drupal\Core\Database\Database;

class AddStudentsForm extends FormBase
{
  /*
   * {@inheritdoc}
   */
  public function getFormId()
  {
    return 'add_students_form';
  }

  /*
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state)
  {
    $form['name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Name'),
    ];

    $form['gender'] = [
      '#type' => 'radios',
      '#title' => $this->t('Gender'),
      '#options'  => array(
        0 => $this
          ->t('m'),
        1 => $this
          ->t('f'),
      ),
    ];

    $form['faculty_number'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Faculty number'),
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
    \Drupal::messenger()->addMessage($form_state->getValue('name'));

    $name = $form_state->getValue('name');
    $gender = $form_state->getValue('gender');
    $faculty_number = $form_state->getValue('faculty_number');

    $connection = Database::getConnection();
    $connection->insert('students',['name' => $name,'gender' => $gender, 'faculty_number' => $faculty_number]);
  }
}
