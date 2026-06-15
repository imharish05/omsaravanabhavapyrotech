<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\ContactUs::updateOrCreate(
            ['id' => 1],
            [
                'page_title' => 'Contact Us',
                'heading' => 'Have Any Questions?',
                'subheading' => 'Have a inquiry or some feedback for us? Fill out the form below to contact our team.',
                'address' => 'Wonder Street, USA, New York',
                'phone' => 'Phone: (+00) - 12543 - 4165',
                'email' => 'hello@xton.com',
                'map_iframe' => '<iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3562.591630922224!2d77.77383147502283!3d9.351674590723098!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zOcKwMjEnMDYuMCJOIDc3wrA0NiczNS4xIkU!5e1!3m2!1sen!2sin!4v1781518711413!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
            ]
        );
    }
}
