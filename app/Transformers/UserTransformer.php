<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
{
    // protected $availableIncludes = [
      
    // ];

    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform($user)
    {
        return [
          //cases of changing the db ( L - R(real))
            "id"          => $user->id,
            "email"   => $user->email,
            "token"     => json_decode($user->token),
        ];
    }

    
}
