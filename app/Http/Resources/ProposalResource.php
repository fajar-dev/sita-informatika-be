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
            'status' => $this->status,
            'ksrFile' => $this->f_krs,
            'khsFile' => $this->f_khs,
            'transkripFile' => $this->f_transkip,
            'consultation1File' => $this->f_acc1,
            'consultation2File' => $this->f_acc2,
            'proposalFile' => $this->f_proposal,
            'comment' => $this->komentar,
            'createdAt' => $this->created_at,
            'updatedAt' => $this->updated_at,
        ];
    }
}
