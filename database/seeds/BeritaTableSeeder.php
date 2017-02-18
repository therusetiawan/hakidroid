<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class BeritaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'judul_berita' => 'Berita 1',
            	'isi_berita'=>'Some component types have responsive elevation, meaning they change elevation in response to user input (e.g., normal, focused, and pressed) or system events. These elevation changes are consistently implemented using dynamic elevation offsets. Dynamic elevation offsets are the goal elevation that a component moves towards, relative to the component’s resting state. They ensure that elevation changes are consistent across actions and component types. For example, all components that lift on press have the same elevation change relative to their resting elevation.',
            	'foto'=>'default.jpg',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],
            [
                'judul_berita' => 'Berita 2',
            	'isi_berita'=>'Some component types have responsive elevation, meaning they change elevation in response to user input (e.g., normal, focused, and pressed) or system events. These elevation changes are consistently implemented using dynamic elevation offsets. Dynamic elevation offsets are the goal elevation that a component moves towards, relative to the component’s resting state. They ensure that elevation changes are consistent across actions and component types. For example, all components that lift on press have the same elevation change relative to their resting elevation.',
            	'foto'=>'default.jpg',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],
            [
                'judul_berita' => 'Berita 3',
            	'isi_berita'=>'Some component types have responsive elevation, meaning they change elevation in response to user input (e.g., normal, focused, and pressed) or system events. These elevation changes are consistently implemented using dynamic elevation offsets. Dynamic elevation offsets are the goal elevation that a component moves towards, relative to the component’s resting state. They ensure that elevation changes are consistent across actions and component types. For example, all components that lift on press have the same elevation change relative to their resting elevation.',
            	'foto'=>'default.jpg',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],
            [
                'judul_berita' => 'Berita 4',
            	'isi_berita'=>'Some component types have responsive elevation, meaning they change elevation in response to user input (e.g., normal, focused, and pressed) or system events. These elevation changes are consistently implemented using dynamic elevation offsets. Dynamic elevation offsets are the goal elevation that a component moves towards, relative to the component’s resting state. They ensure that elevation changes are consistent across actions and component types. For example, all components that lift on press have the same elevation change relative to their resting elevation.',
            	'foto'=>'default.jpg',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],
            [
                'judul_berita' => 'Berita 5',
            	'isi_berita'=>'Some component types have responsive elevation, meaning they change elevation in response to user input (e.g., normal, focused, and pressed) or system events. These elevation changes are consistently implemented using dynamic elevation offsets. Dynamic elevation offsets are the goal elevation that a component moves towards, relative to the component’s resting state. They ensure that elevation changes are consistent across actions and component types. For example, all components that lift on press have the same elevation change relative to their resting elevation.',
            	'foto'=>'default.jpg',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],
        ];
        DB::table('berita')->insert($data);
    }
}
