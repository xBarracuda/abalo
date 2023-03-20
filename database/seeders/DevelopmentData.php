<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Articlecategory;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DevelopmentData extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //user.csv
        $row = 1;
        if (($handle = fopen(resource_path()."/csv/user.csv", "r")))
        {
            while (($data = fgetcsv($handle, 1000))) {
                $num = count($data);
                if ($row++ == 1)
                {
                    continue;
                }
                $row++;
                $count = 0;
                for ($c=0; $c < $num; $c++)
                {
                    $arr = explode(';',$data[$c]);
                    $user = new User();
                    $user->id = $arr[$count++];
                    $user->ab_name = $arr[$count++];
                    $user->ab_password = $arr[$count++];
                    $user->ab_mail = $arr[$count++];
                    $user->save();
                }
            }
            fclose($handle);
        }

        //article.csv
        $firstRow = true;
        if (($handle = fopen(resource_path()."/csv/articles.csv", "r")))
        {
            while (($data = fgets($handle, 10000))) {
                if ($firstRow)
                {
                    $firstRow = false;
                    continue;
                }

                $count = 0;
                $arr = str_getcsv($data, ';');

                $article = new Article();
                $article->id = $arr[$count++];
                $article->ab_name = $arr[$count++];
                $article->ab_price = str_replace('.','',$arr[$count++]);
                $article->ab_description =$arr[$count++];
                $article->ab_creator_id = $arr[$count++];
                $article->ab_createdate = $arr[$count++];
                $article->save();
            }
            fclose($handle);
        }

        //articlecategory.csv
        $firstRow = true;
        if (($handle = fopen(resource_path()."/csv/articlecategory.csv", "r")))
        {
            while (($data = fgets($handle, 1000))) {
                if ($firstRow)
                {
                    $firstRow = false;
                    continue;
                }

                $count = 0;
                $arr = str_getcsv($data, ';');

                $articleCategory = new Articlecategory();
                $articleCategory->id = $arr[$count++];
                $articleCategory->ab_name = $arr[$count++];
                $articleCategory->ab_parent = $arr[$count] == "NULL" ? NULL : $arr[$count];
                $articleCategory->save();
            }
            fclose($handle);
        }

    }
}
