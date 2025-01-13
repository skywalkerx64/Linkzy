<?php

namespace Database\Seeders;

use App\Models\Link;
use App\Services\FaviconFetcherService;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $links = [
            [
            'title' => 'Laravel Documentation',
            'description' => 'Its the link to the Laravel Documentation',
            'original_url' => 'https://laravel.com/docs/11.x',
            'shortened_url' => 'http://localhost:8000/link/lrvl7765',
            'favicon' => FaviconFetcherService::fetchFromUrl('https://laravel.com/docs/11.x'),
            'visits' => rand(10, 1000),
            'user_id' => 1,
            ],
            [
            'title' => 'Vue.js Documentation',
            'description' => 'Its the link to the Vue.js Documentation',
            'original_url' => 'https://vuejs.org/v2/guide/',
            'shortened_url' => 'http://localhost:8000/link/vuejs1234',
            'favicon' => FaviconFetcherService::fetchFromUrl('https://vuejs.org/v2/guide/'),
            'visits' => rand(10, 1000),
            'user_id' => 1,
            ],
            [
            'title' => 'React Documentation',
            'description' => 'Its the link to the React Documentation',
            'original_url' => 'https://reactjs.org/docs/getting-started.html',
            'shortened_url' => 'http://localhost:8000/link/react5678',
            'favicon' => FaviconFetcherService::fetchFromUrl('https://reactjs.org/docs/getting-started.html'),
            'visits' => rand(10, 1000),
            'user_id' => 1,
            ],
            [
            'title' => 'Angular Documentation',
            'description' => 'Its the link to the Angular Documentation',
            'original_url' => 'https://angular.io/docs',
            'shortened_url' => 'http://localhost:8000/link/ng9101',
            'favicon' => FaviconFetcherService::fetchFromUrl('https://angular.io/docs'),
            'visits' => rand(10, 1000),
            'user_id' => 1,
            ],
            [
            'title' => 'Symfony Documentation',
            'description' => 'Its the link to the Symfony Documentation',
            'original_url' => 'https://symfony.com/doc/current/index.html',
            'shortened_url' => 'http://localhost:8000/link/symf1122',
            'favicon' => FaviconFetcherService::fetchFromUrl('https://symfony.com/doc/current/index.html'),
            'visits' => rand(10, 1000),
            'user_id' => 1,
            ],
            [
            'title' => 'Django Documentation',
            'description' => 'Its the link to the Django Documentation',
            'original_url' => 'https://docs.djangoproject.com/en/stable/',
            'shortened_url' => 'http://localhost:8000/link/djngo3344',
            'favicon' => FaviconFetcherService::fetchFromUrl('https://docs.djangoproject.com/en/stable/'),
            'visits' => rand(10, 1000),
            'user_id' => 1,
            ],
            [
            'title' => 'Flask Documentation',
            'description' => 'Its the link to the Flask Documentation',
            'original_url' => 'https://flask.palletsprojects.com/en/2.0.x/',
            'shortened_url' => 'http://localhost:8000/link/flsk5566',
            'favicon' => FaviconFetcherService::fetchFromUrl('https://flask.palletsprojects.com/en/2.0.x/'),
            'visits' => rand(10, 1000),
            'user_id' => 1,
            ],
            [
            'title' => 'Ruby on Rails Documentation',
            'description' => 'Its the link to the Ruby on Rails Documentation',
            'original_url' => 'https://guides.rubyonrails.org/',
            'shortened_url' => 'http://localhost:8000/link/rails7788',
            'favicon' => FaviconFetcherService::fetchFromUrl('https://guides.rubyonrails.org/'),
            'visits' => rand(10, 1000),
            'user_id' => 1,
            ],
            [
            'title' => 'Spring Documentation',
            'description' => 'Its the link to the Spring Documentation',
            'original_url' => 'https://spring.io/docs',
            'shortened_url' => 'http://localhost:8000/link/spring9900',
            'favicon' => FaviconFetcherService::fetchFromUrl('https://spring.io/docs'),
            'visits' => rand(10, 1000),
            'user_id' => 1,
            ],
            [
            'title' => 'Express Documentation',
            'description' => 'Its the link to the Express Documentation',
            'original_url' => 'https://expressjs.com/en/starter/installing.html',
            'shortened_url' => 'http://localhost:8000/link/exprs1122',
            'favicon' => FaviconFetcherService::fetchFromUrl('https://expressjs.com/en/starter/installing.html'),
            'visits' => rand(10, 1000),
            'user_id' => 1,
            ],
            [
            'title' => 'Node.js Documentation',
            'description' => 'Its the link to the Node.js Documentation',
            'original_url' => 'https://nodejs.org/en/docs/',
            'shortened_url' => 'http://localhost:8000/link/nodejs2233',
            'favicon' => FaviconFetcherService::fetchFromUrl('https://nodejs.org/en/docs/'),
            'visits' => rand(10, 1000),
            'user_id' => 1,
            ],
            [
            'title' => 'Svelte Documentation',
            'description' => 'Its the link to the Svelte Documentation',
            'original_url' => 'https://svelte.dev/docs',
            'shortened_url' => 'http://localhost:8000/link/svelte4455',
            'favicon' => FaviconFetcherService::fetchFromUrl('https://svelte.dev/docs'),
            'visits' => rand(10, 1000),
            'user_id' => 1,
            ],
            [
            'title' => 'Ember.js Documentation',
            'description' => 'Its the link to the Ember.js Documentation',
            'original_url' => 'https://guides.emberjs.com/release/',
            'shortened_url' => 'http://localhost:8000/link/ember6677',
            'favicon' => FaviconFetcherService::fetchFromUrl('https://guides.emberjs.com/release/'),
            'visits' => rand(10, 1000),
            'user_id' => 1,
            ],
            [
            'title' => 'Backbone.js Documentation',
            'description' => 'Its the link to the Backbone.js Documentation',
            'original_url' => 'https://backbonejs.org/',
            'shortened_url' => 'http://localhost:8000/link/backbone8899',
            'favicon' => FaviconFetcherService::fetchFromUrl('https://backbonejs.org/'),
            'visits' => rand(10, 1000),
            'user_id' => 1,
            ],
            [
            'title' => 'Meteor Documentation',
            'description' => 'Its the link to the Meteor Documentation',
            'original_url' => 'https://docs.meteor.com/',
            'shortened_url' => 'http://localhost:8000/link/meteor0011',
            'favicon' => FaviconFetcherService::fetchFromUrl('https://docs.meteor.com/'),
            'visits' => rand(10, 1000),
            'user_id' => 1,
            ],
            [
            'title' => 'Next.js Documentation',
            'description' => 'Its the link to the Next.js Documentation',
            'original_url' => 'https://nextjs.org/docs',
            'shortened_url' => 'http://localhost:8000/link/nextjs2233',
            'favicon' => FaviconFetcherService::fetchFromUrl('https://nextjs.org/docs'),
            'visits' => rand(10, 1000),
            'user_id' => 1,
            ],
            [
            'title' => 'Nuxt.js Documentation',
            'description' => 'Its the link to the Nuxt.js Documentation',
            'original_url' => 'https://nuxtjs.org/docs/2.x/get-started/installation',
            'shortened_url' => 'http://localhost:8000/link/nuxtjs4455',
            'favicon' => FaviconFetcherService::fetchFromUrl('https://nuxtjs.org/docs/2.x/get-started/installation'),
            'visits' => rand(10, 1000),
            'user_id' => 1,
            ],
            [
            'title' => 'Gatsby Documentation',
            'description' => 'Its the link to the Gatsby Documentation',
            'original_url' => 'https://www.gatsbyjs.com/docs/',
            'shortened_url' => 'http://localhost:8000/link/gatsby6677',
            'favicon' => FaviconFetcherService::fetchFromUrl('https://www.gatsbyjs.com/docs/'),
            'visits' => rand(10, 1000),
            'user_id' => 1,
            ],
            [
            'title' => 'Gridsome Documentation',
            'description' => 'Its the link to the Gridsome Documentation',
            'original_url' => 'https://gridsome.org/docs/',
            'shortened_url' => 'http://localhost:8000/link/gridsome8899',
            'favicon' => FaviconFetcherService::fetchFromUrl('https://gridsome.org/docs/'),
            'visits' => rand(10, 1000),
            'user_id' => 1,
            ],
            [
            'title' => 'Quasar Documentation',
            'description' => 'Its the link to the Quasar Documentation',
            'original_url' => 'https://quasar.dev/start',
            'shortened_url' => 'http://localhost:8000/link/quasar0011',
            'favicon' => FaviconFetcherService::fetchFromUrl('https://quasar.dev/start'),
            'visits' => rand(10, 1000),
            'user_id' => 1,
            ],
        ];

        foreach ($links as $link) {
            $model = Link::create($link);
            $model->setStatus(rand(0, 1) ? Link::ACTIVE_STATUS : Link::DRAFTED_STATUS);
        }
    }
}
