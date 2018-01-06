<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        DB::table('users') -> insert([
            'name' => 'Szymon Janaczek',
            'email' => 'contact@sim-studio.eu',
            'password' => bcrypt('130101'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('users') -> insert([
            'name' => 'Adam Szeruda',
            'email' => 'adam@szeruda.eu',
            'password' => bcrypt('1234'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        $title = 
        [
        	'Lorem ipsum dolor sit amet. ',
        	'Consectetur adipisicing elit.',
        	'Veniam modi asperiores assumenda.',
        	'Ex autem accusamus magnam impedit.',
        	'Sequi perferendis adipisci.',
        	'Ex autem accusamus magnam impedit.',
        	'Consectetur adipisicing elit.',
        	'Ex autem accusamus magnam impedit.',
        	'Veniam modi asperiores assumenda.',
        	'Lorem ipsum dolor sit amet.',
        	'Ex autem accusamus magnam impedit.',
        	'Consectetur adipisicing elit.',
        	'Lorem ipsum dolor sit amet.',
        	'Ex autem accusamus magnam impedit.',
        ];

        $content = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maiores esse dolorum omnis dolores sed! Laborum officia libero, laudantium tenetur nobis suscipit hic rem asperiores sit eos vitae quas reiciendis sint. Molestiae quod consequatur a vel fugiat, inventore amet, aliquam nemo sequi consequuntur adipisci odit. Similique error quia iste tempora omnis molestiae earum dolore, voluptates praesentium nemo. Maiores tempora, adipisci atque, voluptates esse quasi dignissimos placeat explicabo officiis saepe incidunt reiciendis. Unde iste deserunt eos fuga corporis soluta voluptatibus dolor ad, molestias veniam, labore, quasi voluptate quisquam ea sapiente sed inventore dolores nihil ratione dolorem culpa ut vero? Cumque quas beatae cum nisi quidem, illo maxime doloribus animi, laudantium dolorum quos itaque minus architecto ut iste nihil at a repellendus eius vel nemo, accusamus veritatis! Veritatis ea, dolore quas recusandae inventore corporis, quam sunt ratione quia harum facilis, fugit consequatur unde quaerat consequuntur! Enim tenetur, ipsum cupiditate temporibus necessitatibus corrupti qui error aliquam. Sint perspiciatis velit, soluta eius minus eveniet error ratione, mollitia recusandae veniam itaque suscipit consequatur libero nemo ex possimus, amet distinctio enim. Dolore distinctio quo fugit quisquam sed, necessitatibus dolores enim ullam cumque voluptate in ipsum consequuntur voluptas, dolorem officia molestias doloremque quia quae corrupti eos obcaecati labore.';

        $thumbnail = 
        [
        	'https://royalcanin.pl/blog/wp-content/uploads/2016/12/231W-2-950x680.jpeg',
        	'http://psy-pies.com/pliki/image/foto/duze/foto57889622e1f52.jpg',
        	'http://psy-pies.com/pliki/image/foto/duze/foto58adafe81362a.jpg',
        	'http://bi.gazeta.pl/im/fe/90/14/z21563646IER,Pies-nie-meczy-sie-bieganiem--ono-go-tylko-nakreca.jpg',
        	'https://www.cbdzoe.pl/img/artykuly/rzeczy-ktore-wie-twoj-pies-artykuly-cbdzoe-06.jpg',
        	'http://royalcanin.pl/blog/wp-content/uploads/2017/04/Co-zrobi%C4%87-gdy-pies-ucieka2.jpeg',
        	'http://bi.gazeta.pl/im/fe/90/14/z21563646IER,Pies-nie-meczy-sie-bieganiem--ono-go-tylko-nakreca.jpg',
        	'http://psy-pies.com/pliki/image/foto/duze/foto57889622e1f52.jpg',
        	'https://royalcanin.pl/blog/wp-content/uploads/2016/12/231W-2-950x680.jpeg',
        	'http://psy-pies.com/pliki/image/foto/duze/foto57889622e1f52.jpg',
        	'http://bi.gazeta.pl/im/fe/90/14/z21563646IER,Pies-nie-meczy-sie-bieganiem--ono-go-tylko-nakreca.jpg',
        	'https://royalcanin.pl/blog/wp-content/uploads/2016/12/231W-2-950x680.jpeg',
        	'http://bi.gazeta.pl/im/fe/90/14/z21563646IER,Pies-nie-meczy-sie-bieganiem--ono-go-tylko-nakreca.jpg',
        	'http://psy-pies.com/pliki/image/foto/duze/foto57889622e1f52.jpg',
        ];

        for ($i=0; $i < count($title); $i++) { 
            DB::table('posts') -> insert([
                'title' => $title[$i],
                'content' => $content,
                'thumbnail' => $thumbnail[$i],
                'category' => rand(1,5),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        }



        $category =
        [
            'kuchnia',
            'podróże',
            'luźne przemyślenia',
            'zdrowie',
            'zwierzęta',
            'książki',
            'filmy',
        ];

        for ($i=0; $i < count($category); $i++) { 
        	DB::table('categories') -> insert([
        		'name' => $category[$i],
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
        	]);
        }
    }
}
