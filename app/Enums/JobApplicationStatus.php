<?php

namespace App\Enums;

enum JobApplicationStatus: string
{
    case NEW = 'new';
    case REVIEWING = 'reviewing';
    case SHORTLISTED = 'shortlisted';
    case INTERVIEW = 'interview';
    case REJECTED = 'rejected';
    case HIRED = 'hired';
}
