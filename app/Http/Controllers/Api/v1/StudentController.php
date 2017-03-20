<?php

namespace App\Http\Controllers\Api\v1;

use App\Services\StudentService;
use App\Transformers\StudentTransformer;

class StudentController extends Controller
{

  public function __construct(StudentService $studentService)
  {
	   $this->studentService = $studentService;
  }

  public function index()
  {
    $inputs = request()->all();

  	$students =  $this->studentService->getStudents($inputs);

    $students = $this->getTransformedData($students, new StudentTransformer);

    return response()->success($students);
  }

  public function show($id)
  {
    $student = $this->studentService->getStudent($id);

    $student = $this->getTransformedData($student, new StudentTransformer);

    return response()->success($student);
  }

  public function create()
  {
    $inputs = request()->all();

    $student = $this->studentService->create($inputs);

    $student = $this->getTransformedData($student, new StudentTransformer);

    return response()->success($student);
  }


  public function update($id)
  {
  	$inputs = request()->all();

    $student = $this->studentService->update($inputs , $id);

    $student = $this->getTransformedData($student, new StudentTransformer);

    return response()->success($student);

  }

  public function destroy($id){

    $this->studentService->destroy($id);

  	return response()->success([
  		'message' => 'Student deleted !'
  	]);

  }
}
