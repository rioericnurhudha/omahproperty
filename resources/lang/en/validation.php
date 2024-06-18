<?php

return [
    'required' => 'Field :attribute wajib diisi.',
    'unique' => ':attribute telah ada.',
    'mimes'    => 'Field :attribute harus berupa file bertipe: :values.',
    'max'      => [
        'numeric' => 'Field :attribute tidak boleh lebih dari :max.',
        'file'    => 'Field :attribute tidak boleh lebih dari :max kilobytes.',
        'string'  => 'Field :attribute tidak boleh lebih dari :max karakter.',
        'array'   => 'Field :attribute tidak boleh lebih dari :max item.',
    ],
    // tambahkan pesan lainnya sesuai kebutuhan
];