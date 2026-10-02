<?php

namespace App\Enums;

enum ContactInquiryPriority: string
{
    case LOW = 'low';
    case MEDIUM = 'medium';
    case HIGH = 'high';
}
