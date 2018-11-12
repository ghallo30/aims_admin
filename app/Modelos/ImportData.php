<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class ImportData extends Model
{
    protected $table = 'import_datas';

    protected $fillable = ['data_filename', 'csv_header', 
                        'csv_data', 'data_filetype',
                        'data_filepath','total_rows', 'entity_use'
                    ];
}
