<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('books')->insert([
            'book_title' => 'In Search of Lost Time',
            'book_description' => 'Swann\'s Way, the first part of A la recherche de temps perdu, Marcel Proust\'s seven-part cycle, was published in 1913. In it, Proust introduces the themes that run through the entire work. The narrator recalls his childhood, aided by the famous madeleine; and describes M. Swann\'s passion for Odette. The work is incomparable. Edmund Wilson said "[Proust] has supplied for the first time in literature an equivalent in the full scale for the new theory of modern physics."',
            'book_image' => 'images/In Search of Lost Time.jpg',
            'book_pages' => '4215',
            'book_price' => '79.42',
        ]);

        DB::table('books')->insert([
            'book_title' => 'Ulysses',
            'book_description' => 'Ulysses chronicles the passage of Leopold Bloom through Dublin during an ordinary day, June 16, 1904. The title parallels and alludes to Odysseus (Latinised into Ulysses), the hero of Homer\'s Odyssey (e.g., the correspondences between Leopold Bloom and Odysseus, Molly Bloom and Penelope, and Stephen Dedalus and Telemachus). Joyce fans worldwide now celebrate June 16 as Bloomsday.',
            'book_image' => 'images/Ulysses.jpg',
            'book_pages' => '732',
            'book_price' => '4.99',
        ]);

        DB::table('books')->insert([
            'book_title' => 'Don Quixote',
            'book_description' => 'Alonso Quixano, a retired country gentleman in his fifties, lives in an unnamed section of La Mancha with his niece and a housekeeper. He has become obsessed with books of chivalry, and believes their every word to be true, despite the fact that many of the events in them are clearly impossible. Quixano eventually appears to other people to have lost his mind from little sleep and food and because of so much reading.',
            'book_image' => 'images/Don Quixote.jpg',
            'book_pages' => '1072',
            'book_price' => '13.25',
        ]);
    }
}
