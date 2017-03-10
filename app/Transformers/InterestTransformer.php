<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;

class InterestTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform($interest)
    {
        return [
            'id'    => $interest->id,
            'title' => $interest->title
        ];
    }
}
