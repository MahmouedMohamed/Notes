<?php

namespace Mahmoued\Notes\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NoteResource extends JsonResource
{
    public function __construct(public $resource, private $only = [])
    {
        parent::__construct($resource);
    }

    public function hasValueOrEmpty($value)
    {
        return in_array($value, $this->only) || empty($this->only);
    }

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'uuid' => $this->when($this->hasValueOrEmpty('uuid'), $this->uuid),
            'text' => $this->when($this->hasValueOrEmpty('text'), $this->text),
            'created_by_uuid' => $this->when($this->hasValueOrEmpty('created_by'), $this->created_by),
        ];
    }
}
