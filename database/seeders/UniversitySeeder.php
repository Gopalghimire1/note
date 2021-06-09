<?php

namespace Database\Seeders;

use App\Models\Faculty;
use App\Models\University;
use Illuminate\Database\Seeder;

class UniversitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $uid=1;
        $fid=1;
        $name = [
            [
                'id'=>1,
                'name' => 'Purbanchal University',
                'faculties'=>[
                    [
                        'id'=>1,
                        'name'=>"Bachelor in Information Technology",
                        'sem'=>8
                    ],

                    [
                        'id'=>2,
                        'name'=>"Bachelor in Computer Application",
                        'sem'=>8
                    ],
                ]
            ],

            [
                'id'=>2,'name' => 'Tribhuvan University',
                'faculties'=>[
                    [
                        'id'=>3,
                        'name'=>"Bachelor in Information Technology",
                        'sem'=>8
                    ],
                    [
                        'id'=>4,
                        'name'=>"Bachelor in Computer Application",
                        'sem'=>8
                    ],
                ]
            ],

            [
                'id'=>3,'name' => 'Pokhara University',
                'faculties'=>[
                    [
                        'id'=>5,
                        'name'=>"Bachelor in Information Technology",
                        'sem'=>8
                    ],
                    [
                        'id'=>6,
                        'name'=>"Bachelor in Computer Application",
                        'sem'=>8
                    ],
                ]
            ],

            [
                'id'=>4,'name' => 'Kathmandu University',
                'faculties'=>[
                    [
                        'id'=>7,
                        'name'=>"Bachelor in Information Technology",
                        'sem'=>8
                    ],

                    [
                        'id'=>8,
                        'name'=>"Bachelor in Computer Application",
                        'sem'=>8
                    ],
                ]
            ],
        ];

        foreach ($name as $n) {
            $university=University::find($n['id']);
            if($university==null){

                $university = new University();
                $university->id=$n['id'];
            }
            $university->name = $n['name'];
            $university->detail = "";
            $university->save();
            foreach ($n['faculties'] as $f) {
                $faculty=Faculty::find($f['id']);
                if($faculty==null){

                    $faculty = new Faculty();
                    $faculty->id=$f['id'];
                }
                $faculty->name = $f['name'];
                $faculty->sem = $f['sem'];
                $faculty->detail = "";
                $faculty->university_id = $university->id;
                $faculty->save();
            }
        }
    }
}
