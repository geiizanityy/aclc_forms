<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SubjectContentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return parent::toArray($request);
        /* return [
            'subjectcontent_id'       => $this->subject_id,
            'topic_no'          => $this->topic_no,
            'topic_desc'      => $this->topic_desc,
            'topic_slug'          => $this->slug,
            'topic_content'   => $this->topic_content,
            'topic_status'    => $this->topic_status,
            'topic_type'=> $this->topic_type,
            'created_at'       => $this->created_at,
            'updated_at'   => $this->updated_at,
            'subject_id' => $this->subject_id,
            'subject_name'       => $this->subject_name,
            'banner' => $this->banner,
            'course'   => $this->course,
            'subject_code' => $this->subject_code,
            'subject_description' => $this->subject_description
        ]; */

    }
}
