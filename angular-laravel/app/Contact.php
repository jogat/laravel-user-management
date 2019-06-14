<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    // Table name
    protected $table = 'contact';
    // Primary key
    protected $primaryKey = 'id';
    /**
     * Get all of the contact's meta.
     */
    public function meta()
    {
        return $this->hasMany(ContactMeta::class, 'contact_id');
    }
    /**
     * Get all of the contact's relationships.
     */
    public function relationships()
    {
        return $this->hasMany(ContactRelationship::class, 'contact_host_id');
    }
}
