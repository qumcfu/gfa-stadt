<?php

namespace Database\Seeders;

use App\Models\Icon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FileTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('file_types')->insert([
            array(
                'shortname' => 'unknown',
                'name' => 'Unknown Type',
                'icon_id' => Icon::where('name', '=', 'question-circle-fill')->pluck('id')->first(),
                'folder' => '/other',
                'extensions' => '',
                'created_at' => now()
            ),
            array(
                'shortname' => 'image',
                'name' => 'Image',
                'icon_id' => Icon::where('name', '=', 'image-fill')->pluck('id')->first(),
                'folder' => '/images',
                'extensions' => 'jpg|jpeg|png|gif|bmp|svg',
                'created_at' => now()
            ),
            array(
                'shortname' => 'audio',
                'name' => 'Audio',
                'icon_id' => Icon::where('name', '=', 'mic-fill')->pluck('id')->first(),
                'folder' => '/audio',
                'extensions' => 'mp3|m4a|wav',
                'created_at' => now()
            ),
            array(
                'shortname' => 'video',
                'name' => 'Video',
                'icon_id' => Icon::where('name', '=', 'play-btn-fill')->pluck('id')->first(),
                'folder' => '/video',
                'extensions' => 'mp4',
                'created_at' => now()
            ),
            array(
                'shortname' => 'word',
                'name' => 'Document',
                'icon_id' => Icon::where('name', '=', 'file-word-fill')->pluck('id')->first(),
                'folder' => '/documents',
                'extensions' => 'docx|doc',
                'created_at' => now()
            ),
            array(
                'shortname' => 'excel',
                'name' => 'Document',
                'icon_id' => Icon::where('name', '=', 'file-excel-fill')->pluck('id')->first(),
                'folder' => '/documents',
                'extensions' => 'xlsx|xls',
                'created_at' => now()
            ),
            array(
                'shortname' => 'pdf',
                'name' => 'Document',
                'icon_id' => Icon::where('name', '=', 'file-pdf-fill')->pluck('id')->first(),
                'folder' => '/documents',
                'extensions' => 'pdf',
                'created_at' => now()
            ),
            array(
                'shortname' => 'archive',
                'name' => 'Archive',
                'icon_id' => Icon::where('name', '=', 'file-zip-fill')->pluck('id')->first(),
                'folder' => '/archives',
                'extensions' => 'zip|rar',
                'created_at' => now()
            )
        ]);
    }
}
