<?php

namespace App\Enums;

enum ServiceStatus: string
{
    case DRAFT = 'draft';
    case PUBLISHED = 'published';
}
