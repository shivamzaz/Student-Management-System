<?php namespace App\Services;

use App\Validations\StudentValidator;
use App\Repositories\Contracts\StudentRepository;

class StudentService
{

  public function __construct(
    StudentValidator $validator,
    StudentRepository $studentRepo
  )
  {
    $this->validator = $validator;
    $this->studentRepo = $studentRepo;
  }
// this  belongs to studentservices object
  
  public function getStudent($id)
  {
    return $this->studentRepo->get($id);
  }

  public function getStudents($inputs)
  {
    return $this->studentRepo->search($inputs);
  }

  public function getPaginatedStudents($limit, $page)
  {

  }

  public function create($inputs)
  {
    $this->validator->fire($inputs, 'create');

    return $this->studentRepo->create($inputs);

  }

  public function update($inputs, $id){

      $this->validator->fire($inputs , 'update');

      $student = $this->studentRepo->get($id);

      return $this->studentRepo->update($student, $inputs);


  }
  public function destroy($id)
  {
    return $this->studentRepo->delete($id);
  }
}
