<?php

namespace App\Enums;

enum RoleEnum: string
{
    case SUPER_ADMIN = 'super-admin';
    case CLIENT_ADMIN = 'client-admin';
    case CUSTOMER = 'client-customer';
}
