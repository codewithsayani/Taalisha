const fs = require('fs');
const path = require('path');

const models = [
    { name: 'Service', fields: 'name,slug,short_description,full_description,icon,hero_image,status,display_order' },
    { name: 'Industry', fields: 'name,slug,overview,hero_image,seo_title,seo_description,status' },
    { name: 'Technology', fields: 'name,category,description,logo,proficiency,display_order' },
    { name: 'TeamMember', fields: 'name,role,department,bio,image,linkedin_url,display_order,is_active' },
    { name: 'CaseStudy', fields: 'title,slug,client,industry_id,description,challenge,solution,results,status' },
    { name: 'Article', fields: 'title,slug,category_id,author_id,excerpt,content,featured_image,status,published_at' },
    { name: 'Category', fields: 'name,slug' },
    { name: 'Tag', fields: 'name,slug' },
    { name: 'Testimonial', fields: 'name,designation,company,content,photo,rating,status' },
    { name: 'Faq', fields: 'question,answer,category,status,display_order' },
    { name: 'Job', fields: 'title,slug,department,location,employment_type,description,requirements,status' },
    { name: 'JobApplication', fields: 'job_id,name,email,phone,resume_path,status' },
    { name: 'ContactInquiry', fields: 'name,email,phone,company,message,status' },
    { name: 'NewsletterSubscriber', fields: 'email,name,status' }
];

const getModelStub = (name) => `<?php

namespace App\\Models;

use Illuminate\\Database\\Eloquent\\Factories\\HasFactory;
use Illuminate\\Database\\Eloquent\\Model;

class ${name} extends Model
{
    use HasFactory;
    
    protected $guarded = ['id'];
}
`;

const getMigrationStub = (name, index) => {
    const tableName = name.replace(/([a-z])([A-Z])/g, '$1_$2').toLowerCase() + 's';
    // Simplified stub for speed, full schemas are in the documentation
    return `<?php

use Illuminate\\Database\\Migrations\\Migration;
use Illuminate\\Database\\Schema\\Blueprint;
use Illuminate\\Support\\Facades\\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('${tableName === 'categorys' ? 'categories' : tableName}', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('${tableName === 'categorys' ? 'categories' : tableName}');
    }
};
`;
};

// Create Models
models.forEach(model => {
    fs.writeFileSync(path.join('app', 'Models', `${model.name}.php`), getModelStub(model.name));
});

// Create Migrations
models.forEach((model, index) => {
    const prefix = `2026_10_02_0000${index.toString().padStart(2, '0')}`;
    const tableName = model.name.replace(/([a-z])([A-Z])/g, '$1_$2').toLowerCase() + 's';
    const finalTableName = tableName === 'categorys' ? 'categories' : tableName;
    fs.writeFileSync(path.join('database', 'migrations', `${prefix}_create_${finalTableName}_table.php`), getMigrationStub(model.name, index));
});

console.log('Scaffolding complete.');
