<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ThesisResource extends JsonResource
{
    public function toArray($request)
    {
        return[
            'id' => $this->id,
            'status' => $this->status,
            'ksrFile' => $this->f_krs,
            'khsFile' => $this->f_khs,
            'transkripFile' => $this->f_transkip,
            'consultationFile' => $this->f_acc1,
            'plagiarismFile' => $this->f_plagialisme,
            'paymentFile' => $this->f_spp,
            'kknFile' => $this->f_kkn,
            'journalFile' => $this->f_jurnal,
            'thesisFile' => $this->f_tga,
            'comment' => $this->komentar,
            'revisionStatus' => $this->status_rev,
            'createdAt' => $this->created_at,
            'updatedAt' => $this->updated_at,
        ];
    }
}
