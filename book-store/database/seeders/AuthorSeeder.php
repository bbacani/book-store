<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Author;
use App\Models\Contact;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $authors = [
            ['author_name' => 'Marcel Proust', 'phone' => '+33 7 00 69 20 56', 'email' => 'marcelproust@example.com'],
            ['author_name' => 'James Joyce', 'phone' => '', 'email' => 'jamesjoyce@example.com'],
            ['author_name' => 'Miguel de Cervantes', 'phone' => '', 'email' => ''],
        ];

        foreach ($authors as $authorData) {
            $author = Author::create(['author_name' => $authorData['author_name']]);

            $contact = new Contact([
                'phone' => $authorData['phone'],
                'email' => $authorData['email'],
            ]);

            $author->contact()->save($contact);
        }
    }
}
