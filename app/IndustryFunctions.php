<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IndustryFunctions extends Model
{
    //Set table for model
  protected $table = 'industryfunctions';

   /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
  'Name', 'Parent', 'Details'
];


}
