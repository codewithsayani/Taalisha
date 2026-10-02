<?php

$schemas = [
    'settings' => <<<EOT
            \$table->id();
            \$table->string('key')->unique()->index();
            \$table->text('value')->nullable();
            \$table->string('type')->default('string');
            \$table->timestamps();
EOT,
    'services' => <<<EOT
            \$table->id();
            \$table->string('name');
            \$table->string('slug')->unique()->index();
            \$table->text('short_description');
            \$table->longText('full_description');
            \$table->string('icon')->nullable();
            \$table->string('hero_image')->nullable();
            \$table->json('features')->nullable();
            \$table->json('benefits')->nullable();
            \$table->json('process')->nullable();
            \$table->string('seo_title')->nullable();
            \$table->text('seo_description')->nullable();
            \$table->string('status')->index()->default('published');
            \$table->integer('display_order')->default(0);
            \$table->timestamps();
            \$table->softDeletes();
EOT,
    'industries' => <<<EOT
            \$table->id();
            \$table->string('name');
            \$table->string('slug')->unique()->index();
            \$table->text('overview');
            \$table->json('problems')->nullable();
            \$table->json('solutions')->nullable();
            \$table->json('benefits')->nullable();
            \$table->string('hero_image')->nullable();
            \$table->string('seo_title')->nullable();
            \$table->text('seo_description')->nullable();
            \$table->string('status')->index()->default('published');
            \$table->timestamps();
            \$table->softDeletes();
EOT,
    'technologies' => <<<EOT
            \$table->id();
            \$table->string('name');
            \$table->string('slug')->unique()->index();
            \$table->string('category')->index();
            \$table->text('description')->nullable();
            \$table->string('logo')->nullable();
            \$table->string('proficiency')->nullable();
            \$table->integer('display_order')->default(0);
            \$table->timestamps();
            \$table->softDeletes();
EOT,
    'service_technology' => <<<EOT
            \$table->foreignId('service_id')->constrained()->cascadeOnDelete();
            \$table->foreignId('technology_id')->constrained()->cascadeOnDelete();
            \$table->primary(['service_id', 'technology_id']);
EOT,
    'team_members' => <<<EOT
            \$table->id();
            \$table->string('name');
            \$table->string('role');
            \$table->string('department')->nullable();
            \$table->text('bio')->nullable();
            \$table->string('image')->nullable();
            \$table->string('linkedin_url')->nullable();
            \$table->string('twitter_url')->nullable();
            \$table->string('github_url')->nullable();
            \$table->integer('display_order')->default(0);
            \$table->boolean('is_active')->index()->default(true);
            \$table->timestamps();
            \$table->softDeletes();
EOT,
    'case_studies' => <<<EOT
            \$table->id();
            \$table->string('title');
            \$table->string('slug')->unique()->index();
            \$table->string('client')->nullable();
            \$table->foreignId('industry_id')->constrained()->restrictOnDelete();
            \$table->text('description');
            \$table->text('challenge');
            \$table->text('solution');
            \$table->text('results');
            \$table->string('featured_image')->nullable();
            \$table->timestamp('published_at')->index()->nullable();
            \$table->string('status')->index()->default('published');
            \$table->timestamps();
            \$table->softDeletes();
EOT,
    'case_study_images' => <<<EOT
            \$table->id();
            \$table->foreignId('case_study_id')->constrained()->cascadeOnDelete();
            \$table->string('image_path');
            \$table->string('caption')->nullable();
            \$table->integer('display_order');
            \$table->timestamps();
EOT,
    'categories' => <<<EOT
            \$table->id();
            \$table->string('name');
            \$table->string('slug')->unique()->index();
            \$table->timestamps();
EOT,
    'tags' => <<<EOT
            \$table->id();
            \$table->string('name');
            \$table->string('slug')->unique()->index();
            \$table->timestamps();
EOT,
    'articles' => <<<EOT
            \$table->id();
            \$table->string('title');
            \$table->string('slug')->unique()->index();
            \$table->foreignId('category_id')->constrained()->restrictOnDelete();
            \$table->foreignId('author_id')->nullable()->constrained('users')->nullOnDelete();
            \$table->text('excerpt');
            \$table->longText('content');
            \$table->string('featured_image')->nullable();
            \$table->string('seo_title')->nullable();
            \$table->text('seo_description')->nullable();
            \$table->string('status')->index()->default('published');
            \$table->timestamp('published_at')->index()->nullable();
            \$table->timestamps();
            \$table->softDeletes();
EOT,
    'article_tag' => <<<EOT
            \$table->foreignId('article_id')->constrained()->cascadeOnDelete();
            \$table->foreignId('tag_id')->constrained()->cascadeOnDelete();
            \$table->primary(['article_id', 'tag_id']);
EOT,
    'testimonials' => <<<EOT
            \$table->id();
            \$table->string('name');
            \$table->string('designation')->nullable();
            \$table->string('company')->nullable();
            \$table->text('content');
            \$table->string('image')->nullable();
            \$table->foreignId('case_study_id')->nullable()->constrained()->nullOnDelete();
            \$table->integer('rating')->nullable();
            \$table->string('status')->index()->default('approved');
            \$table->integer('display_order')->default(0);
            \$table->timestamps();
            \$table->softDeletes();
EOT,
    'faqs' => <<<EOT
            \$table->id();
            \$table->string('question');
            \$table->text('answer');
            \$table->string('category')->index()->nullable();
            \$table->integer('display_order')->default(0);
            \$table->boolean('status')->index()->default(true);
            \$table->timestamps();
            \$table->softDeletes();
EOT,
    'jobs' => <<<EOT
            \$table->id();
            \$table->string('title');
            \$table->string('slug')->unique()->index();
            \$table->string('department')->index();
            \$table->string('location');
            \$table->string('employment_type');
            \$table->string('experience');
            \$table->string('salary_range')->nullable();
            \$table->longText('description');
            \$table->text('responsibilities');
            \$table->text('requirements');
            \$table->json('skills')->nullable();
            \$table->text('benefits')->nullable();
            \$table->date('application_deadline')->index()->nullable();
            \$table->string('status')->index()->default('open');
            \$table->timestamps();
            \$table->softDeletes();
EOT,
    'job_applications' => <<<EOT
            \$table->id();
            \$table->foreignId('job_id')->constrained()->restrictOnDelete();
            \$table->string('name');
            \$table->string('email')->index();
            \$table->string('phone');
            \$table->string('resume_path');
            \$table->text('cover_letter')->nullable();
            \$table->string('linkedin_url')->nullable();
            \$table->string('github_url')->nullable();
            \$table->string('portfolio_url')->nullable();
            \$table->string('status')->index()->default('new');
            \$table->text('admin_notes')->nullable();
            \$table->foreignId('reviewed_by')->nullable()->constrained('users')->nullOnDelete();
            \$table->timestamp('reviewed_at')->nullable();
            \$table->boolean('privacy_consent')->default(false);
            \$table->timestamp('privacy_consented_at')->nullable();
            \$table->timestamps();
EOT,
    'contact_inquiries' => <<<EOT
            \$table->id();
            \$table->string('name');
            \$table->string('email')->index();
            \$table->string('phone')->nullable();
            \$table->string('company')->nullable();
            \$table->foreignId('service_id')->nullable()->constrained()->nullOnDelete();
            \$table->string('budget')->nullable();
            \$table->string('timeline')->nullable();
            \$table->text('message');
            \$table->string('status')->index()->default('new');
            \$table->string('priority')->index()->default('medium');
            \$table->foreignId('assigned_to')->nullable()->constrained('users')->nullOnDelete();
            \$table->text('admin_notes')->nullable();
            \$table->timestamp('contacted_at')->nullable();
            \$table->boolean('privacy_consent')->default(false);
            \$table->timestamp('privacy_consented_at')->nullable();
            \$table->timestamps();
EOT,
    'newsletter_subscribers' => <<<EOT
            \$table->id();
            \$table->string('email')->unique()->index();
            \$table->string('name')->nullable();
            \$table->string('status')->index()->default('subscribed');
            \$table->timestamp('subscribed_at')->index()->useCurrent();
            \$table->timestamp('unsubscribed_at')->nullable();
            \$table->timestamps();
EOT,
];

// Read all migrations
$migrationFiles = glob(__DIR__ . '/database/migrations/*.php');
foreach ($migrationFiles as $file) {
    $content = file_get_contents($file);
    foreach ($schemas as $tableName => $schemaBody) {
        if (strpos($file, "create_{$tableName}_table") !== false) {
            // Replace the body of the up method's Schema::create block
            $content = preg_replace('/Schema::create\(\'' . $tableName . '\', function \(Blueprint \$table\) \{(.*?)\}\);/s', "Schema::create('{$tableName}', function (Blueprint \$table) {\n{$schemaBody}\n        });", $content);
            file_put_contents($file, $content);
            echo "Updated {$tableName}\n";
            break;
        }
    }
}
