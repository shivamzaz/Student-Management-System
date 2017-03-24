<?php

namespace App\Repositories\Db;

use App\Models\Student;
use App\Traits\DbRepositoryTrait;
use App\Repositories\Contracts\StudentRepository as StudentRepositoryInterface;
use App\Exceptions\ModelNotFoundException;


class StudentRepository implements StudentRepositoryInterface{

	protected $model = Student::class;

	use DbRepositoryTrait;

	public function search($inputs)
	{
		$query = $this->query();

		if(array_get($inputs, 'q'))
		{
			$query = $query->where('full_name', 'LIKE', '%' . array_get($inputs, 'q') . '%');
			// value regarding to q {dictionery type}
		}

		//dd($query->toSql()); (this won't give you result if it'll be present.)

		return $query->get();
	}

	//@override

	public function create(array $inputs)
	{

		$query = $this->query();

		$student = $query->create($inputs); // object return

		// does api user enters interests

		$interests = array_get($inputs, 'interests');
		
		// don;t use it if($interests)

		$student->interests()->sync($interests); // sync taking the id's of interests
		

		return $student;
	}
	//@overide
	public function update($student, array $inputs)
	{
		$student->update($inputs);

		$interests = array_get($inputs, 'interests', []);

		
		$student->interests()->sync($interests);
		

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
