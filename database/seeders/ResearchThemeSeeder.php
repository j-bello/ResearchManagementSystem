<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Theme;
class ResearchThemeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $themes = [
            [
                'id' => 1,
                'theme' => 'Renewable Energy',
                'description' => 'ICT enabled system that automate the process in creating/ maintaining renewable energy',
            ],
            [
                'id' => 2,
                'theme' => 'Disaster risk management climate change specifically on the issue of global warming, Security',
                'description' => 'Green Technology, Pollution Control, Disaster and Risk Management Systems, Health Systems, Logistics and Planning, Security and Safety System, Embedded Systems, Cyber Security Platform, Agricultural Systems and Environmental Systems',
            ],
            [
                'id' => 3,
                'theme' => 'Education, ICT and learning innovations',
                'description' => 'E-learning, Hybrid Platform, Learning Management Systems, Network Design and Distributive Technologies, Artificial Intelligence in in Education, Mining in Educational Data, M- learning, Integrated Systems',
            ],
            [
                'id' => 4,
                'theme' => 'Business Processes and New ICT Models',
                'description' => 'New Business Models, Data Science, Analytics, Visualization, Data Mining, Big Data Analysis, Information Systems, Web and IOT Technology, E-Commerce, Business Innovation using ICT enabled System, Game Development, Animations and Software Engineering',
            ],
        ];
        Theme::insert($themes);
    }
}
