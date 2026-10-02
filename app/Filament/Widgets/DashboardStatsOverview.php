<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Service;
use App\Models\Industry;
use App\Models\Technology;
use App\Models\Article;
use App\Models\CaseStudy;
use App\Models\Job;
use App\Models\JobApplication;
use App\Models\ContactInquiry;
use App\Models\NewsletterSubscriber;

class DashboardStatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Services', Service::count() ?? 0)
                ->description('Total offered services'),
            Stat::make('Industries', Industry::count() ?? 0),
            Stat::make('Technologies', Technology::count() ?? 0),
            Stat::make('Articles', Article::count() ?? 0),
            Stat::make('Case Studies', CaseStudy::count() ?? 0),
            Stat::make('Jobs', Job::count() ?? 0),
            Stat::make('Job Applications', JobApplication::count() ?? 0),
            Stat::make('Contact Inquiries', ContactInquiry::count() ?? 0),
            Stat::make('Subscribers', NewsletterSubscriber::count() ?? 0),
        ];
    }
}
