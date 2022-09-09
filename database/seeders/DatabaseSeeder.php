<?php

namespace Database\Seeders;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //THIS IS NOT FOR PRODUCTION THIS IS FOR LOCAL ENVIRONMENT AND DEVELOP

        //User::truncate();
        //Category::truncate();
        //Post::truncate();

        $user = User::factory()->create([
            'name' => 'John Doe'
        ]);
        Post::factory(5)->create([
            'user_id' => $user->id
        ]);

        // $user = User::factory()->create();

        // $personal = Category::create([
        //     'name' => 'Personal',
        //     'slug' => 'personal'
        // ]);

        // $family = Category::create([
        //     'name' => 'Family',
        //     'slug' => 'family'
        // ]);

        // $work = Category::create([
        //     'name' => 'Work',
        //     'slug' => 'work'
        // ]);

        // Post::create([
        //     'user_id'       => $user->id,
        //     'category_id'   => $work->id,
        //     'title'         => 'My Work Post',
        //     'slug'          => 'my-work-post',
        //     'excerpt'       => '<p>Excerpt of my working post</p>',
        //     'body'          => "<p>here are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc','slug' => 'my-work-post</p>",
        //     'created_at' => '2022-02-14',
        //     'updated_at' => '2022-02-14',
        //     'published_at' => '2022-02-14'
        // ]); 

        // Post::create([
        //     'user_id'       => $user->id,
        //     'category_id'   => $family->id,
        //     'title'         => 'My Family Post',
        //     'slug'          => 'my-family-post',
        //     'excerpt'       => '<p>Excerpt of my family post</p>',
        //     'body'          => "<p>here are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc','slug' => 'my-work-post</p>",
        //     'created_at' => '2022-02-14',
        //     'updated_at' => '2022-02-14',
        //     'published_at' => '2022-02-14'
        // ]); 

        // Post::create([
        //     'user_id'       => $user->id,
        //     'category_id'   => $personal->id,
        //     'title'         => 'My Personal Post',
        //     'slug'          => 'my-personal-post',
        //     'excerpt'       => '<p>Excerpt of my working post</p>',
        //     'body'          => "<p>here are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc','slug' => 'my-work-post</p>",
        //     'created_at' => '2022-02-14',
        //     'updated_at' => '2022-02-14',
        //     'published_at' => '2022-02-14'
        // ]); 

        //\App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
