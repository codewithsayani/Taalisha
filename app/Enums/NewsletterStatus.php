<?php

namespace App\Enums;

enum NewsletterStatus: string
{
    case SUBSCRIBED = 'subscribed';
    case UNSUBSCRIBED = 'unsubscribed';
}
