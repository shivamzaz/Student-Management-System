<?php namespace App\Validations;


/**
 * defines rules for form related to user
 *
 * Class UserValidator
 * @package App\Validations
 */
class StudentValidator extends Validator{

  /**
   * Custom messages for validation⁄
   *
   * @param $type
   * @return array
   */
  public function messages($type)
  {
    return [];
  }

  /**
   * validation rules
   *
   * @param $type
   * @param $data
   * @return array
   */
  protected function rules($type, $data)
  {
    $rules =  [];

    switch($type)
    {
      case 'create':
        $rules = [
          'full_name'  => 'required',
          'address'    => 'required|max:400',
          'year'       => 'required',
          'gender'     => 'required',
        ];
        break;

      case 'update' : 
         $rules = [
          'full_name' => 'required',
          'address'   => 'required|max:400',
          'year'      => 'required',
          'gender'    => 'required',
        ];
        break;

    }
    return $rules;
  }
 

}
