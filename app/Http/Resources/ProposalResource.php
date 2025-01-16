<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProposalResource extends JsonResource
{
    public function toArray($request)
    {
        return[
            'id' => $this->id,
            'ksrUrl' => $this->f_krs,
            'khsUrl' => $this->f_khs,
            'transkripUrl' => $this->f_transkip,
            'consultation1Url' => $this->f_acc1,
            'consultation2Url' => $this->f_acc2,
            'fileUrl' => $this->f_proposal,
            'comment' => $this->komentar,
            'createdAt' => $this->created_at,
            'updatedAt' => $this->updated_at,
        ];
    }
}
