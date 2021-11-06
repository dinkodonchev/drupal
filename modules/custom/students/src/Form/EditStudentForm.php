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
//    var_dump($id);
//    die();
    // ToDo

    $form['id'] = [
      '#type' => 'textfield',
      '#attributes' => array('readonly' => 'readonly'),
      '#title' => $this->t('ID - read only'),
      '#value' => $id,
    ];

    $form['name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Name'),
    ];

    $form['gender'] = [
      '#type' => 'radios',
      '#title' => $this->t('Gender'),
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
  }
}
