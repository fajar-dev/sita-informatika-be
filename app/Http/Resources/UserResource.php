<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
        ];
    }
}
