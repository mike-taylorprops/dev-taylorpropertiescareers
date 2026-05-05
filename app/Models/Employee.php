<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $connection = 'tpuserportal';

    protected $table = 'emp_in_house';

    protected $primaryKey = 'id';

    public $timestamps = false;

    public function scopeForWebsite($query)
    {
        return $query -> where('show_on_website', 1)
                      -> where('active', 'yes')
                      -> orderBy('website_order');
    }

    public function getDisplayNameAttribute(): string
    {
        return $this->fullname ?? trim(($this->first_name ?? '') . ' ' . ($this->last_name ?? ''));
    }
}
