<?php

namespace App\Repositories\Db;

use App\Models\Student;
use App\Traits\DbRepositoryTrait;
use App\Repositories\Contracts\StudentRepository as StudentRepositoryInterface;
use App\Exceptions\ModelNotFoundException;


class StudentRepository implements StudentRepositoryInterface{

	protected $model = Student::class;

	use DbRepositoryTrait;

	//@override

	public function create(array $inputs)
	{

		$query = $this->query();

		$student = $query->create($inputs);

		// does api user enters interests

		$interests = array_get($inputs, 'interests');

		if($interests)
		{
			$student->interests()->sync($interests);
		}

		return $student;
	}
	//@overide
	public function update($student, array $inputs)
	{
		$student->update($inputs);

		$interests = array_get($inputs, 'interests');

		if($interests)
		{
			$student->interests()->sync($interests);
		}

		return $student;
	}
	//@override
	public function delete($id)
	{
		$student = $this->get($id);

		$student->interests()->sync([]);

		return $student->delete();
	}

}
