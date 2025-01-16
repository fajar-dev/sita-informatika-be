<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ThesisResource extends JsonResource
{
    public function toArray($request)
    {
        return[
            'id' => $this->id_mhs,
            'nim' => $this->mNim,
            'Name' => $this->mNama,
            'Email' => $this->mEmail,
            'phoneNumber' => $this->mTelp,
            'cohort' => $this->angkatan,
            'birthDate' => $this->mTgllhr,
            'birthPlace' => $this->mTmpt,
            'address' => $this->mAlamat,
            'pictureUrl' => 'https://tgainformatika.unimal.ac.id/filemhs/foto/'.$this->mFoto,
            'createdAt' => $this->created_at,
            'updatedAt' => $this->updated_at,
            'thesis' => [
                'id' => $this->sId,
                'title' => $this->sJudul,
                'date' => $this->sTgl,
                'status' => $this->sStatus,
                'comment' => $this->sKomentar,
                'advisor' => [
                    [
                        'id' => $this->pembimbing1id,
                        'name' => $this->pembimbing1,
                        'employedNumberId' => $this->nipPembimbing1,
                        'pictureUrl' => 'https://tgainformatika.unimal.ac.id/filedosen/foto/'.$this->fotoPembimbing1,
                    ],
                    [
                        'id' => $this->pembimbing2id,
                        'name' => $this->pembimbing2,
                        'employedNumberId' => $this->nipPembimbing2,
                        'pictureUrl' => 'https://tgainformatika.unimal.ac.id/filedosen/foto/'.$this->fotoPembimbing2,
                    ]
                ]
            ]
        ];
    }
}
