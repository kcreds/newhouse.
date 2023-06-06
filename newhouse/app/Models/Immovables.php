<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;


class Immovables extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'meta_name',
        'meta_desc',
        'metarobots',
        'slug',
        'price',
        'extent',
        'address',
        'short_desc',
        'long_desc',
        'first_head',
        'first_desc' ,
        'second_head' ,
        'second_desc' ,
    ];

    public function validateData(array $data)
    {
        $validator = Validator::make($data, self::validationRules($this));
    
        return $validator->validate();
    }

    public static function validationRules($model)
    {
        return [
            'name' => 'required',
            'meta_name' => '',
            'meta_desc' => '',
            'metarobots' => '',
            'slug' => [
                'required',
                Rule::unique('immovables')->ignore($model->id),
            ],
            'price' => 'required',
            'extent' => 'required|numeric',
            'address' => 'required',
            'short_desc' => '',
            'main_photo' => $model->main_photo ? 'image' : 'required|image',
            'long_desc' => '',
            'first_head' => '',
            'first_desc' => '',
            'first_photo' => 'image',
            'second_head' => '',
            'second_desc' => '',
            'second_photo' => 'image',
        ];
    }
}
