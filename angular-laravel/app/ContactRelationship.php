<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactRelationship extends Model
{
    // Table name
    protected $table = 'contact_relationships';
    // Primary key
    protected $primaryKey = 'id';
    /**
     * Get all of the owning metable models.
     */
    public function metable()
    {
        return $this->morphTo();
    }
}
