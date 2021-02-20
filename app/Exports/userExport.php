<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class userExport implements WithHeadings,FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $userData = User::select('name', 'email', 'city', 'state','country', 'mobile')->where('status', 1)->orderBy('id', 'desc')->get();
        return $userData;
//        return User::all();
    }

    public function headings(): array
    {
        // TODO: Implement headings() method.

        return['Name', 'Email', 'City', 'State', 'Country', 'Mobile'];
    }
}
