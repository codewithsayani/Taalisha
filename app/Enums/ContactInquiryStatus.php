<?php

namespace App\Enums;

enum ContactInquiryStatus: string
{
    case NEW = 'new';
    case IN_PROGRESS = 'in_progress';
    case CONTACTED = 'contacted';
    case QUALIFIED = 'qualified';
    case CLOSED = 'closed';
    case SPAM = 'spam';
}
