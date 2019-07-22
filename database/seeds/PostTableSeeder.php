<?php

use Illuminate\Database\Seeder;
use App\Post;
use App\Category;
use App\Tag;
use Illuminate\Support\Facades\Hash;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $category1=Category::create([
            'name' => 'News'
       ]);

       $author1 = App\User::create([
           'name' => 'Ahmed Magdy',
           'email' => 'a.magdi655@gmail.com',
           'password' => Hash::make('14101998'),

       ]);
       $author2 = App\User::create([
        'name' => 'Mahmoud Magdy',
        'email' => 'm.magdi615@gmail.com',
        'password' => Hash::make('123456'),

    ]);

       $category2=Category::create([
        'name' => 'Marketing'
       ]);

       $category3=Category::create([
        'name' => 'PartnerShip'
       ]);

       $post1= $author1->posts()->create([
           'title' => "We relocated our office to a new designed garage",
           'body' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.",
           'content' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.",
           'category_id' => $category1->id,
           'image' => 'storage/posts/1.jpg'
       ]);

       $post2= $author2->posts()->create([
        'title' => "Top 5 brilliant content marketing strategies",
        'body' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.",
        'content' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.",
        'category_id' => $category2->id,
        'image' => 'storage/posts/2.jpg'
        ]);

        $post3= $author1->posts()->create([
            'title' => "Best practices for minimalist design with example",
            'body' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.",
            'content' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.",
            'category_id' => $category3->id,
            'image' => 'storage/posts/3.jpg'
        ]);

        $post4= $author2->posts()->create([
            'title' => "Congratulate and thank to Maryam for joining our team",
            'body' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.",
            'content' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.",
            'category_id' => $category2->id,
            'image' => 'storage/posts/4.jpg'
        ]);

        $tag1=Tag::create([
            'name' => 'job'
        ]);

        $tag2=Tag::create([
            'name' => 'customers'
        ]);

        $tag3=Tag::create([
            'name' => 'record'
        ]);

        $post1->tags()->attach([$tag1->id, $tag2->id]);
        $post2->tags()->attach([$tag2->id, $tag3->id]);
        $post3->tags()->attach([$tag1->id, $tag3->id]);


        
    
    }
}
