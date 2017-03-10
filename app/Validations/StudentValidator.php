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
   * rules for create
   *
   * @return array
   'title' => 'required|unique:posts|max:255',
        'body' => 'required',
   */
  public function create()
  {
    return [
      'full_name'  => 'required',
      'address'    => 'required|max:400',
      'year'       => 'required',
      'gender'     => 'required',
    ];
  }
  // public function index(){
  //   return [
  //     ];
  // }
  public function update(){
    return [
      'full_name'   => 'required',
      'address' => 'required|max:400',
      'year' => 'required',
      'gender' => 'required',
      ];
  }  
 

}
