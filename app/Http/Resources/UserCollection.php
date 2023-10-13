<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class UserCollection extends ResourceCollection {

        public function toArray($request): array {
            return [
                'collection' => $this->collection->map->toArray($request)->all(),
                'links' => [
                    'self' => 'link-value',
                ],

            ];
        }
}
