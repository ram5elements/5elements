<?php namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class PartyDetail extends Model {

	//
    protected $table = 'party_details';

    protected $fillable = [
        'party_id','company_name','person_name','address','email_id','mobile_no','alt_mobile_no','created_by'
    ];

}
