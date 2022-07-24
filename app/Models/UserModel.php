<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'id_user';
    protected $protectFields    = true;
    protected $allowedFields    = ['nama', 'telepon', 'email', 'username', 'password', 'role'];

    // Dates
    protected $useTimestamps = true;

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;
}
