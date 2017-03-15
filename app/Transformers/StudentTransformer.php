<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;

class StudentTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
      'interests'  ///use any name wht you want to show in result of api
    ];

    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform($student)
    {
        return [
          //cases of changing the db ( L - R(real))
            "id"            => $student->id,
            "full_name"     => $student->full_name,
            "address"       => $student->address,
            "year"          => $student->year,
            "interests_ids" => $student->interests->pluck('id')->toArray(),
            "gender"        => $student->gender
        ];
    }

    public function includeInterests($student)
    {                             // value passed ud=se collections or items
        return $this->collection($student->interests, new InterestTransformer);
    }
}
