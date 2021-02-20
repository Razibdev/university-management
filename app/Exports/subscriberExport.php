<?php

namespace App\Exports;

use App\Models\NewletterSubscriber;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class subscriberExport implements WithHeadings, FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
//        return NewletterSubscriber::all();

        $subscriberData = NewletterSubscriber::select('id', 'email', 'created_at')->where('status', 1)->orderBy('id', 'Desc')->get();
        return $subscriberData;
    }

    public function headings(): array
    {
        // TODO: Implement headings() method.

        return['ID', 'Email', 'Created'];
    }
}
