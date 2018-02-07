<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Task;
use App\Comment;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        User::create([
            'name' => 'Administrator',
            'email' => 'admin@test.com',
            'password' => Hash::make(str_random(6)),
            'role' => 99,
            'api_token' => str_random(30)
        ]);

        // And now let's generate a few dozen users for our app:
        for ($i = 0; $i < 10; $i++) {
            User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => Hash::make(str_random(6)),
                'role' => 10,
                'api_token' => str_random(30)
            ]);
        }

        // Create Task
        Task::create([
            'title' => 'Task 1',
            'description' => 'task1 desc',
            'type' => 10,
            'assigned_to' => 3,
            'created_by' => 2,
            'updated_by' => 2
        ]);

        // Create Task 1 comment
        Comment::create([
        	'task_id' => 1,
            'comment' => 'Task 1 comment',
            'reminder_date' => '2018-01-06',
            'created_by' => 4,
            'updated_by' => 4
        ]);
    }
}
