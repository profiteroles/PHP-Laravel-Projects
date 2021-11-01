<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seedBooks = [
          [
              'id'=>1,
              'title'=>'MongoDB for beginners',
              'author'=>'Gould, Adrian',
              'desc'=>'Testing PHP and MongoDB',
              'published_year'=>2012
          ],[
                'id'=>2,
                'title'=>'Pro Apache,2004',
                'author'=>'Wainwright, Peter',
                'desc'=>'Install, Build, Configure anbd Test a Web Server',
                'published_year'=>2015
            ],[
                'id'=>3,
                'title'=>'Exploring Raspberry Pi',
                'author'=>'Derek, Molly',
                'desc'=>'Exploring Raspberry Pi first covers the basics of the hardware platform, recommended accessories, software, embedded Linux systems, and Linux programming techniques. Then it takes you deeper into interfacing, controlling, and communicating, with detailed information about Raspberry Pi GPIOs, buses, UART devices, and USB peripherals. You will learn to configure a cross-compilation environment in order to build large-scale software applications, as well as how to combine hardware and software to enable the Raspberry Pi to interact effectively with its physical environment. Finally, you�ll discover how to use the Raspberry Pi for advanced interfacing and interaction applications such as the Internet of Things (IoT); wireless communication and control; rich user interfaces; images, video, and audio; and Linux kernel programming.',
                'published_year'=>2010
            ],
        ];

        foreach ($seedBooks as $seed){
         Book::create($seed);
        }

    }
}
