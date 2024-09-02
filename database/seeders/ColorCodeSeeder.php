<?php

namespace Database\Seeders;

use App\Models\ColorCode;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ColorCodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('color_codes')->insert([
            array(
                'name' => 'IndianRed',
                'hex' => '#CD5C5C',
                'is_bright' => null,
                'category' => 'red',
                'created_at' => now()
            ),
            array(
                'name' => 'LightCoral',
                'hex' => '#F08080',
                'is_bright' => null,
                'category' => 'red',
                'created_at' => now()
            ),
            array(
                'name' => 'Salmon',
                'hex' => '#FA8072',
                'is_bright' => null,
                'category' => 'red',
                'created_at' => now()
            ),
            array(
                'name' => 'DarkSalmon',
                'hex' => '#E9967A',
                'is_bright' => null,
                'category' => 'red',
                'created_at' => now()
            ),
            array(
                'name' => 'LightSalmon',
                'hex' => '#FFA07A',
                'is_bright' => null,
                'category' => 'red',
                'created_at' => now()
            ),
            array(
                'name' => 'Crimson',
                'hex' => '#DC143C',
                'is_bright' => null,
                'category' => 'red',
                'created_at' => now()
            ),
            array(
                'name' => 'Red',
                'hex' => '#FF0000',
                'is_bright' => null,
                'category' => 'red',
                'created_at' => now()
            ),
            array(
                'name' => 'FireBrick',
                'hex' => '#B22222',
                'is_bright' => false,
                'category' => 'red',
                'created_at' => now()
            ),
            array(
                'name' => 'DarkRed',
                'hex' => '#8B0000',
                'is_bright' => false,
                'category' => 'red',
                'created_at' => now()
            ),
            array(
                'name' => 'PoppyRed*',
                'hex' => '#DC343B',
                'is_bright' => null,
                'category' => 'red',
                'created_at' => now()
            ),
            array(
                'name' => 'Vermilion*',
                'hex' => '#E34234',
                'is_bright' => null,
                'category' => 'red',
                'created_at' => now()
            ),
            array(
                'name' => 'Pink',
                'hex' => '#FFC0CB',
                'is_bright' => true,
                'category' => 'pink',
                'created_at' => now()
            ),
            array(
                'name' => 'LightPink',
                'hex' => '#FFB6C1',
                'is_bright' => true,
                'category' => 'pink',
                'created_at' => now()
            ),
            array(
                'name' => 'HotPink',
                'hex' => '#FF69B4',
                'is_bright' => null,
                'category' => 'pink',
                'created_at' => now()
            ),
            array(
                'name' => 'DeepPink',
                'hex' => '#FF1493',
                'is_bright' => null,
                'category' => 'pink',
                'created_at' => now()
            ),
            array(
                'name' => 'MediumVioletRed',
                'hex' => '#C71585',
                'is_bright' => null,
                'category' => 'pink',
                'created_at' => now()
            ),
            array(
                'name' => 'PaleVioletRed',
                'hex' => '#DB7093',
                'is_bright' => null,
                'category' => 'pink',
                'created_at' => now()
            ),
            array(
                'name' => 'ParadisePink*',
                'hex' => '#E63E62',
                'is_bright' => null,
                'category' => 'pink',
                'created_at' => now()
            ),
            array(
                'name' => 'LightSalmon',
                'hex' => '#FFA07A',
                'is_bright' => null,
                'category' => 'orange',
                'created_at' => now()
            ),
            array(
                'name' => 'Coral',
                'hex' => '#FF7F50',
                'is_bright' => null,
                'category' => 'orange',
                'created_at' => now()
            ),
            array(
                'name' => 'Tomato',
                'hex' => '#FF6347',
                'is_bright' => null,
                'category' => 'orange',
                'created_at' => now()
            ),
            array(
                'name' => 'OrangeRed',
                'hex' => '#FF4500',
                'is_bright' => null,
                'category' => 'orange',
                'created_at' => now()
            ),
            array(
                'name' => 'Tangerine*',
                'hex' => '#F08000',
                'is_bright' => false,
                'category' => 'orange',
                'created_at' => now()
            ),
            array(
                'name' => 'DarkOrange',
                'hex' => '#FF8C00',
                'is_bright' => null,
                'category' => 'orange',
                'created_at' => now()
            ),
            array(
                'name' => 'Orange',
                'hex' => '#FFA500',
                'is_bright' => null,
                'category' => 'orange',
                'created_at' => now()
            ),
            array(
                'name' => 'Gold',
                'hex' => '#FFD700',
                'is_bright' => null,
                'category' => 'yellow',
                'created_at' => now()
            ),
            array(
                'name' => 'Yellow',
                'hex' => '#FFFF00',
                'is_bright' => null,
                'category' => 'yellow',
                'created_at' => now()
            ),
            array(
                'name' => 'LightYellow',
                'hex' => '#FFFFE0',
                'is_bright' => true,
                'category' => 'yellow',
                'created_at' => now()
            ),
            array(
                'name' => 'LemonChiffon',
                'hex' => '#FFFACD',
                'is_bright' => true,
                'category' => 'yellow',
                'created_at' => now()
            ),
            array(
                'name' => 'LightGoldenrodYellow',
                'hex' => '#FAFAD2',
                'is_bright' => true,
                'category' => 'yellow',
                'created_at' => now()
            ),
            array(
                'name' => 'PapayaWhip',
                'hex' => '#FFEFD5',
                'is_bright' => true,
                'category' => 'yellow',
                'created_at' => now()
            ),
            array(
                'name' => 'Moccasin',
                'hex' => '#FFE4B5',
                'is_bright' => true,
                'category' => 'yellow',
                'created_at' => now()
            ),
            array(
                'name' => 'PeachPuff',
                'hex' => '#FFDAB9',
                'is_bright' => true,
                'category' => 'yellow',
                'created_at' => now()
            ),
            array(
                'name' => 'PaleGoldenrod',
                'hex' => '#EEE8AA',
                'is_bright' => true,
                'category' => 'yellow',
                'created_at' => now()
            ),
            array(
                'name' => 'Khaki',
                'hex' => '#F0E68C',
                'is_bright' => true,
                'category' => 'yellow',
                'created_at' => now()
            ),
            array(
                'name' => 'DarkKhaki',
                'hex' => '#BDB76B',
                'is_bright' => null,
                'category' => 'yellow',
                'created_at' => now()
            ),
            array(
                'name' => 'Sunflower*',
                'hex' => '#FFDA03',
                'is_bright' => null,
                'category' => 'yellow',
                'created_at' => now()
            ),
            array(
                'name' => 'CyberYellow*',
                'hex' => '#FFD300',
                'is_bright' => null,
                'category' => 'yellow',
                'created_at' => now()
            ),
            array(
                'name' => 'MellowYellow*',
                'hex' => '#F8DE7E',
                'is_bright' => true,
                'category' => 'yellow',
                'created_at' => now()
            ),
            array(
                'name' => 'Lavender',
                'hex' => '#E6E6FA',
                'is_bright' => true,
                'category' => 'purple',
                'created_at' => now()
            ),
            array(
                'name' => 'Thistle',
                'hex' => '#D8BFD8',
                'is_bright' => null,
                'category' => 'purple',
                'created_at' => now()
            ),
            array(
                'name' => 'Plum',
                'hex' => '#DDA0DD',
                'is_bright' => null,
                'category' => 'purple',
                'created_at' => now()
            ),
            array(
                'name' => 'Violet',
                'hex' => '#EE82EE',
                'is_bright' => null,
                'category' => 'purple',
                'created_at' => now()
            ),
            array(
                'name' => 'Orchid',
                'hex' => '#DA70D6',
                'is_bright' => null,
                'category' => 'purple',
                'created_at' => now()
            ),
            array(
                'name' => 'Magenta',
                'hex' => '#FF00FF',
                'is_bright' => null,
                'category' => 'purple',
                'created_at' => now()
            ),
            array(
                'name' => 'MediumOrchid',
                'hex' => '#BA55D3',
                'is_bright' => null,
                'category' => 'purple',
                'created_at' => now()
            ),
            array(
                'name' => 'MediumPurple',
                'hex' => '#9370DB',
                'is_bright' => null,
                'category' => 'purple',
                'created_at' => now()
            ),
            array(
                'name' => 'RebeccaPurple',
                'hex' => '#663399',
                'is_bright' => false,
                'category' => 'purple',
                'created_at' => now()
            ),
            array(
                'name' => 'BlueViolet',
                'hex' => '#8A2BE2',
                'is_bright' => false,
                'category' => 'purple',
                'created_at' => now()
            ),
            array(
                'name' => 'DarkViolet',
                'hex' => '#9400D3',
                'is_bright' => false,
                'category' => 'purple',
                'created_at' => now()
            ),
            array(
                'name' => 'DarkOrchid',
                'hex' => '#9932CC',
                'is_bright' => false,
                'category' => 'purple',
                'created_at' => now()
            ),
            array(
                'name' => 'DarkMagenta',
                'hex' => '#8B008B',
                'is_bright' => false,
                'category' => 'purple',
                'created_at' => now()
            ),
            array(
                'name' => 'Purple',
                'hex' => '#800080',
                'is_bright' => false,
                'category' => 'purple',
                'created_at' => now()
            ),
            array(
                'name' => 'Indigo',
                'hex' => '#4B0082',
                'is_bright' => false,
                'category' => 'purple',
                'created_at' => now()
            ),
            array(
                'name' => 'SlateBlue',
                'hex' => '#6A5ACD',
                'is_bright' => false,
                'category' => 'purple',
                'created_at' => now()
            ),
            array(
                'name' => 'DarkSlateBlue',
                'hex' => '#483D8B',
                'is_bright' => false,
                'category' => 'purple',
                'created_at' => now()
            ),
            array(
                'name' => 'MediumSlateBlue',
                'hex' => '#7B68EE',
                'is_bright' => false,
                'category' => 'purple',
                'created_at' => now()
            ),
            array(
                'name' => 'GreenYellow',
                'hex' => '#ADFF2F',
                'is_bright' => true,
                'category' => 'green',
                'created_at' => now()
            ),
            array(
                'name' => 'Chartreuse',
                'hex' => '#7FFF00',
                'is_bright' => true,
                'category' => 'green',
                'created_at' => now()
            ),
            array(
                'name' => 'LawnGreen',
                'hex' => '#7CFC00',
                'is_bright' => true,
                'category' => 'green',
                'created_at' => now()
            ),
            array(
                'name' => 'Lime',
                'hex' => '#00FF00',
                'is_bright' => null,
                'category' => 'green',
                'created_at' => now()
            ),
            array(
                'name' => 'LimeGreen',
                'hex' => '#32CD32',
                'is_bright' => null,
                'category' => 'green',
                'created_at' => now()
            ),
            array(
                'name' => 'PaleGreen',
                'hex' => '#98FB98',
                'is_bright' => true,
                'category' => 'green',
                'created_at' => now()
            ),
            array(
                'name' => 'LightGreen',
                'hex' => '#90EE90',
                'is_bright' => true,
                'category' => 'green',
                'created_at' => now()
            ),
            array(
                'name' => 'MediumSpringGreen',
                'hex' => '#00FA9A',
                'is_bright' => null,
                'category' => 'green',
                'created_at' => now()
            ),
            array(
                'name' => 'SpringGreen',
                'hex' => '#00FF7F',
                'is_bright' => null,
                'category' => 'green',
                'created_at' => now()
            ),
            array(
                'name' => 'MediumSeaGreen',
                'hex' => '#3CB371',
                'is_bright' => null,
                'category' => 'green',
                'created_at' => now()
            ),
            array(
                'name' => 'SeaGreen',
                'hex' => '#2E8B57',
                'is_bright' => false,
                'category' => 'green',
                'created_at' => now()
            ),
            array(
                'name' => 'ForestGreen',
                'hex' => '#228B22',
                'is_bright' => false,
                'category' => 'green',
                'created_at' => now()
            ),
            array(
                'name' => 'Green',
                'hex' => '#008000',
                'is_bright' => false,
                'category' => 'green',
                'created_at' => now()
            ),
            array(
                'name' => 'DarkGreen',
                'hex' => '#006400',
                'is_bright' => false,
                'category' => 'green',
                'created_at' => now()
            ),
            array(
                'name' => 'YellowGreen',
                'hex' => '#9ACD32',
                'is_bright' => true,
                'category' => 'green',
                'created_at' => now()
            ),
            array(
                'name' => 'OliveDrab',
                'hex' => '#6B8E23',
                'is_bright' => false,
                'category' => 'green',
                'created_at' => now()
            ),
            array(
                'name' => 'Olive',
                'hex' => '#808000',
                'is_bright' => false,
                'category' => 'green',
                'created_at' => now()
            ),
            array(
                'name' => 'DarkOliveGreen',
                'hex' => '#556B2F',
                'is_bright' => false,
                'category' => 'green',
                'created_at' => now()
            ),
            array(
                'name' => 'MediumAquamarine',
                'hex' => '#66CDAA',
                'is_bright' => null,
                'category' => 'green',
                'created_at' => now()
            ),
            array(
                'name' => 'DarkSeaGreen',
                'hex' => '#8FBC8B',
                'is_bright' => null,
                'category' => 'green',
                'created_at' => now()
            ),
            array(
                'name' => 'LightSeaGreen',
                'hex' => '#20B2AA',
                'is_bright' => null,
                'category' => 'green',
                'created_at' => now()
            ),
            array(
                'name' => 'DarkCyan',
                'hex' => '#008B8B',
                'is_bright' => false,
                'category' => 'green',
                'created_at' => now()
            ),
            array(
                'name' => 'Teal',
                'hex' => '#008080',
                'is_bright' => false,
                'category' => 'green',
                'created_at' => now()
            ),
            array(
                'name' => 'Fern*',
                'hex' => '#63B76C',
                'is_bright' => null,
                'category' => 'green',
                'created_at' => now()
            ),
            array(
                'name' => 'Cyan',
                'hex' => '#00FFFF',
                'is_bright' => null,
                'category' => 'blue',
                'created_at' => now()
            ),
            array(
                'name' => 'LightCyan',
                'hex' => '#E0FFFF',
                'is_bright' => true,
                'category' => 'blue',
                'created_at' => now()
            ),
            array(
                'name' => 'PaleTurquoise',
                'hex' => '#AFEEEE',
                'is_bright' => true,
                'category' => 'blue',
                'created_at' => now()
            ),
            array(
                'name' => 'Aquamarine',
                'hex' => '#7FFFD4',
                'is_bright' => null,
                'category' => 'blue',
                'created_at' => now()
            ),
            array(
                'name' => 'Turquoise',
                'hex' => '#40E0D0',
                'is_bright' => null,
                'category' => 'blue',
                'created_at' => now()
            ),
            array(
                'name' => 'MediumTurquoise',
                'hex' => '#48D1CC',
                'is_bright' => null,
                'category' => 'blue',
                'created_at' => now()
            ),
            array(
                'name' => 'DarkTurquoise',
                'hex' => '#00CED1',
                'is_bright' => null,
                'category' => 'blue',
                'created_at' => now()
            ),
            array(
                'name' => 'CadetBlue',
                'hex' => '#5F9EA0',
                'is_bright' => null,
                'category' => 'blue',
                'created_at' => now()
            ),
            array(
                'name' => 'SteelBlue',
                'hex' => '#4682B4',
                'is_bright' => null,
                'category' => 'blue',
                'created_at' => now()
            ),
            array(
                'name' => 'LightSteelBlue',
                'hex' => '#B0C4DE',
                'is_bright' => true,
                'category' => 'blue',
                'created_at' => now()
            ),
            array(
                'name' => 'PowderBlue',
                'hex' => '#B0E0E6',
                'is_bright' => true,
                'category' => 'blue',
                'created_at' => now()
            ),
            array(
                'name' => 'LightBlue',
                'hex' => '#ADD8E6',
                'is_bright' => true,
                'category' => 'blue',
                'created_at' => now()
            ),
            array(
                'name' => 'SkyBlue',
                'hex' => '#87CEEB',
                'is_bright' => true,
                'category' => 'blue',
                'created_at' => now()
            ),
            array(
                'name' => 'LightSkyBlue',
                'hex' => '#87CEFA',
                'is_bright' => true,
                'category' => 'blue',
                'created_at' => now()
            ),
            array(
                'name' => 'DeepSkyBlue',
                'hex' => '#00BFFF',
                'is_bright' => null,
                'category' => 'blue',
                'created_at' => now()
            ),
            array(
                'name' => 'DodgerBlue',
                'hex' => '#1E90FF',
                'is_bright' => null,
                'category' => 'blue',
                'created_at' => now()
            ),
            array(
                'name' => 'CornflowerBlue',
                'hex' => '#6495ED',
                'is_bright' => null,
                'category' => 'blue',
                'created_at' => now()
            ),
            array(
                'name' => 'RoyalBlue',
                'hex' => '#4169E1',
                'is_bright' => false,
                'category' => 'blue',
                'created_at' => now()
            ),
            array(
                'name' => 'Blue',
                'hex' => '#0000FF',
                'is_bright' => false,
                'category' => 'blue',
                'created_at' => now()
            ),
            array(
                'name' => 'MediumBlue',
                'hex' => '#0000CD',
                'is_bright' => false,
                'category' => 'blue',
                'created_at' => now()
            ),
            array(
                'name' => 'DarkBlue',
                'hex' => '#00008B',
                'is_bright' => false,
                'category' => 'blue',
                'created_at' => now()
            ),
            array(
                'name' => 'Navy',
                'hex' => '#000080',
                'is_bright' => false,
                'category' => 'blue',
                'created_at' => now()
            ),
            array(
                'name' => 'MidnightBlue',
                'hex' => '#191970',
                'is_bright' => false,
                'category' => 'blue',
                'created_at' => now()
            ),
            array(
                'name' => 'CoolBlack*',
                'hex' => '#002E63',
                'is_bright' => false,
                'category' => 'blue',
                'created_at' => now()
            ),
            array(
                'name' => 'Liberty*',
                'hex' => '#545AA7',
                'is_bright' => false,
                'category' => 'blue',
                'created_at' => now()
            ),
            array(
                'name' => 'Cornsilk',
                'hex' => '#FFF8DC',
                'is_bright' => true,
                'category' => 'brown',
                'created_at' => now()
            ),
            array(
                'name' => 'BlanchedAlmond',
                'hex' => '#FFEBCD',
                'is_bright' => true,
                'category' => 'brown',
                'created_at' => now()
            ),
            array(
                'name' => 'Bisque',
                'hex' => '#FFE4C4',
                'is_bright' => true,
                'category' => 'brown',
                'created_at' => now()
            ),
            array(
                'name' => 'NavajoWhite',
                'hex' => '#FFDEAD',
                'is_bright' => true,
                'category' => 'brown',
                'created_at' => now()
            ),
            array(
                'name' => 'Wheat',
                'hex' => '#F5DEB3',
                'is_bright' => true,
                'category' => 'brown',
                'created_at' => now()
            ),
            array(
                'name' => 'BurlyWood',
                'hex' => '#DEB887',
                'is_bright' => null,
                'category' => 'brown',
                'created_at' => now()
            ),
            array(
                'name' => 'Tan',
                'hex' => '#D2B48C',
                'is_bright' => null,
                'category' => 'brown',
                'created_at' => now()
            ),
            array(
                'name' => 'RosyBrown',
                'hex' => '#BC8F8F',
                'is_bright' => null,
                'category' => 'brown',
                'created_at' => now()
            ),
            array(
                'name' => 'SandyBrown',
                'hex' => '#F4A460',
                'is_bright' => null,
                'category' => 'brown',
                'created_at' => now()
            ),
            array(
                'name' => 'Goldenrod',
                'hex' => '#DAA520',
                'is_bright' => null,
                'category' => 'brown',
                'created_at' => now()
            ),
            array(
                'name' => 'DarkGoldenrod',
                'hex' => '#B8860B',
                'is_bright' => null,
                'category' => 'brown',
                'created_at' => now()
            ),
            array(
                'name' => 'Peru',
                'hex' => '#CD853F',
                'is_bright' => null,
                'category' => 'brown',
                'created_at' => now()
            ),
            array(
                'name' => 'Chocolate',
                'hex' => '#D2691E',
                'is_bright' => false,
                'category' => 'brown',
                'created_at' => now()
            ),
            array(
                'name' => 'SaddleBrown',
                'hex' => '#8B4513',
                'is_bright' => false,
                'category' => 'brown',
                'created_at' => now()
            ),
            array(
                'name' => 'Sienna',
                'hex' => '#A0522D',
                'is_bright' => false,
                'category' => 'brown',
                'created_at' => now()
            ),
            array(
                'name' => 'Brown',
                'hex' => '#A52A2A',
                'is_bright' => false,
                'category' => 'brown',
                'created_at' => now()
            ),
            array(
                'name' => 'Maroon',
                'hex' => '#800000',
                'is_bright' => false,
                'category' => 'brown',
                'created_at' => now()
            ),
            array(
                'name' => 'White',
                'hex' => '#FFFFFF',
                'is_bright' => true,
                'category' => 'white',
                'created_at' => now()
            ),
            array(
                'name' => 'Snow',
                'hex' => '#FFFAFA',
                'is_bright' => true,
                'category' => 'white',
                'created_at' => now()
            ),
            array(
                'name' => 'HoneyDew',
                'hex' => '#F0FFF0',
                'is_bright' => true,
                'category' => 'white',
                'created_at' => now()
            ),
            array(
                'name' => 'MintCream',
                'hex' => '#F5FFFA',
                'is_bright' => true,
                'category' => 'white',
                'created_at' => now()
            ),
            array(
                'name' => 'Azure',
                'hex' => '#F0FFFF',
                'is_bright' => true,
                'category' => 'white',
                'created_at' => now()
            ),
            array(
                'name' => 'AliceBlue',
                'hex' => '#F0F8FF',
                'is_bright' => true,
                'category' => 'white',
                'created_at' => now()
            ),
            array(
                'name' => 'GhostWhite',
                'hex' => '#F8F8FF',
                'is_bright' => true,
                'category' => 'white',
                'created_at' => now()
            ),
            array(
                'name' => 'WhiteSmoke',
                'hex' => '#F5F5F5',
                'is_bright' => true,
                'category' => 'white',
                'created_at' => now()
            ),
            array(
                'name' => 'SeaShell',
                'hex' => '#FFF5EE',
                'is_bright' => true,
                'category' => 'white',
                'created_at' => now()
            ),
            array(
                'name' => 'Beige',
                'hex' => '#F5F5DC',
                'is_bright' => true,
                'category' => 'white',
                'created_at' => now()
            ),
            array(
                'name' => 'OldLace',
                'hex' => '#FDF5E6',
                'is_bright' => true,
                'category' => 'white',
                'created_at' => now()
            ),
            array(
                'name' => 'FloralWhite',
                'hex' => '#FFFAF0',
                'is_bright' => true,
                'category' => 'white',
                'created_at' => now()
            ),
            array(
                'name' => 'Ivory',
                'hex' => '#FFFFF0',
                'is_bright' => true,
                'category' => 'white',
                'created_at' => now()
            ),
            array(
                'name' => 'AntiqueWhite',
                'hex' => '#FAEBD7',
                'is_bright' => true,
                'category' => 'white',
                'created_at' => now()
            ),
            array(
                'name' => 'Linen',
                'hex' => '#FAF0E6',
                'is_bright' => true,
                'category' => 'white',
                'created_at' => now()
            ),
            array(
                'name' => 'LavenderBlush',
                'hex' => '#FFF0F5',
                'is_bright' => true,
                'category' => 'white',
                'created_at' => now()
            ),
            array(
                'name' => 'MistyRose',
                'hex' => '#FFE4E1',
                'is_bright' => true,
                'category' => 'white',
                'created_at' => now()
            ),
            array(
                'name' => 'Gainsboro',
                'hex' => '#DCDCDC',
                'is_bright' => true,
                'category' => 'gray',
                'created_at' => now()
            ),
            array(
                'name' => 'LightGray',
                'hex' => '#D3D3D3',
                'is_bright' => true,
                'category' => 'gray',
                'created_at' => now()
            ),
            array(
                'name' => 'Silver',
                'hex' => '#C0C0C0',
                'is_bright' => true,
                'category' => 'gray',
                'created_at' => now()
            ),
            array(
                'name' => 'DarkGray',
                'hex' => '#A9A9A9',
                'is_bright' => null,
                'category' => 'gray',
                'created_at' => now()
            ),
            array(
                'name' => 'Gray',
                'hex' => '#808080',
                'is_bright' => null,
                'category' => 'gray',
                'created_at' => now()
            ),
            array(
                'name' => 'DimGray',
                'hex' => '#696969',
                'is_bright' => null,
                'category' => 'gray',
                'created_at' => now()
            ),
            array(
                'name' => 'LightSlateGray',
                'hex' => '#778899',
                'is_bright' => null,
                'category' => 'gray',
                'created_at' => now()
            ),
            array(
                'name' => 'SlateGray',
                'hex' => '#708090',
                'is_bright' => null,
                'category' => 'gray',
                'created_at' => now()
            ),
            array(
                'name' => 'DarkSlateGray',
                'hex' => '#2F4F4F',
                'is_bright' => false,
                'category' => 'gray',
                'created_at' => now()
            ),
            array(
                'name' => 'Black',
                'hex' => '#000000',
                'is_bright' => false,
                'category' => 'gray',
                'created_at' => now()
            ),
            array(
                'name' => 'Einstellungen',
                'hex' => '#606070',
                'is_bright' => false,
                'category' => 'custom',
                'created_at' => now()
            ),
            array(
                'name' => 'Einstellungen (Alternativ)',
                'hex' => '#646474',
                'is_bright' => false,
                'category' => 'custom',
                'created_at' => now()
            ),
            array(
                'name' => 'Daten',
                'hex' => '#609890',
                'is_bright' => false,
                'category' => 'custom',
                'created_at' => now()
            ),
            array(
                'name' => 'Daten (Alternativ)',
                'hex' => '#509c94',
                'is_bright' => false,
                'category' => 'custom',
                'created_at' => now()
            ),
            array(
                'name' => 'Dateiverwaltung',
                'hex' => '#90a060',
                'is_bright' => false,
                'category' => 'custom',
                'created_at' => now()
            ),
            array(
                'name' => 'Dateiverwaltung (Alternativ)',
                'hex' => '#94a450',
                'is_bright' => false,
                'category' => 'custom',
                'created_at' => now()
            ),
            array(
                'name' => 'Mitgliedschaften',
                'hex' => '#906090',
                'is_bright' => false,
                'category' => 'custom',
                'created_at' => now()
            ),
            array(
                'name' => 'Mitgliedschaften (Alternativ)',
                'hex' => '#945094',
                'is_bright' => false,
                'category' => 'custom',
                'created_at' => now()
            ),
            array(
                'name' => 'Vorhaben',
                'hex' => '#a06060',
                'is_bright' => false,
                'category' => 'custom',
                'created_at' => now()
            ),
            array(
                'name' => 'Vorhaben (Alternativ)',
                'hex' => '#a85050',
                'is_bright' => false,
                'category' => 'custom',
                'created_at' => now()
            ),
            array(
                'name' => 'Fragebögen',
                'hex' => '#c0a060',
                'is_bright' => false,
                'category' => 'custom',
                'created_at' => now()
            ),
            array(
                'name' => 'Fragebögen (Alternativ)',
                'hex' => '#c4a450',
                'is_bright' => false,
                'category' => 'custom',
                'created_at' => now()
            ),
            array(
                'name' => 'Skripte',
                'hex' => '#589870',
                'is_bright' => false,
                'category' => 'custom',
                'created_at' => now()
            ),
            array(
                'name' => 'Skripte (Alternativ)',
                'hex' => '#48a060',
                'is_bright' => false,
                'category' => 'custom',
                'created_at' => now()
            ),
            array(
                'name' => 'Benutzerverwaltung',
                'hex' => '#5878a0',
                'is_bright' => false,
                'category' => 'custom',
                'created_at' => now()
            ),
            array(
                'name' => 'Benutzerverwaltung (Alternativ)',
                'hex' => '#5070a8',
                'is_bright' => false,
                'category' => 'custom',
                'created_at' => now()
            ),
            array(
                'name' => 'Benutzergruppen',
                'hex' => '#6060a0',
                'is_bright' => false,
                'category' => 'custom',
                'created_at' => now()
            ),
            array(
                'name' => 'Benutzergruppen (Alternativ)',
                'hex' => '#5050a5',
                'is_bright' => false,
                'category' => 'custom',
                'created_at' => now()
            ),
            array(
                'name' => 'Dunkelblau (Grundfarbe FHE, Pant 281)',
                'hex' => '#003366',
                'is_bright' => false,
                'category' => 'fhe',
                'created_at' => now()
            ),
            array(
                'name' => 'Blau (Bauingenieurwesen, Pant 300)',
                'hex' => '#0088CC',
                'is_bright' => false,
                'category' => 'fhe',
                'created_at' => now()
            ),
            array(
                'name' => 'Graublau (Angewandte Informatik, Pant 5415)',
                'hex' => '#7799BB',
                'is_bright' => false,
                'category' => 'fhe',
                'created_at' => now()
            ),
            array(
                'name' => 'Mint (Gebäude- und Energietechnik, Pant 326)',
                'hex' => '#009999',
                'is_bright' => false,
                'category' => 'fhe',
                'created_at' => now()
            ),
            array(
                'name' => 'Petrol (Verkehrs- und Transportwesen, Pant 3155)',
                'hex' => '#007788',
                'is_bright' => false,
                'category' => 'fhe',
                'created_at' => now()
            ),
            array(
                'name' => 'Graugrün (Landschaftsarchitektur, Pant 5555)',
                'hex' => '#558877',
                'is_bright' => false,
                'category' => 'fhe',
                'created_at' => now()
            ),
            array(
                'name' => 'Dunkelgrün (Forstwirtschaft, Pant 3415)',
                'hex' => '#007733',
                'is_bright' => false,
                'category' => 'fhe',
                'created_at' => now()
            ),
            array(
                'name' => 'Hellgrün (Gartenbau, Pant 362)',
                'hex' => '#339933',
                'is_bright' => false,
                'category' => 'fhe',
                'created_at' => now()
            ),
            array(
                'name' => 'Grüngelb (Pant 5757)',
                'hex' => '#666600',
                'is_bright' => false,
                'category' => 'fhe',
                'created_at' => now()
            ),
            array(
                'name' => 'Gold (Bildung und Erziehung von Kindern, Pant 118)',
                'hex' => '#a88624',
                'is_bright' => false,
                'category' => 'fhe',
                'created_at' => now()
            ),
            array(
                'name' => 'Ockergelb (Pant 139)',
                'hex' => '#cc9900',
                'is_bright' => false,
                'category' => 'fhe',
                'created_at' => now()
            ),
            array(
                'name' => 'Gelb (Pant 104)',
                'hex' => '#bbaa00',
                'is_bright' => false,
                'category' => 'fhe',
                'created_at' => now()
            ),
            array(
                'name' => 'Sonnengelb (Wirtschaftswissenschaften, Pant 137)',
                'hex' => '#ff9900',
                'is_bright' => false,
                'category' => 'fhe',
                'created_at' => now()
            ),
            array(
                'name' => 'Orange (Soziale Arbeit, Pant orange 021)',
                'hex' => '#ff6600',
                'is_bright' => false,
                'category' => 'fhe',
                'created_at' => now()
            ),
            array(
                'name' => 'Rot (Spotfarbe für alle Bereiche, Pant 1795)',
                'hex' => '#cc0000',
                'is_bright' => false,
                'category' => 'fhe',
                'created_at' => now()
            ),
            array(
                'name' => 'Rotbraun (Konservierung und Restaurierung, Pant 194)',
                'hex' => '#990000',
                'is_bright' => false,
                'category' => 'fhe',
                'created_at' => now()
            ),
            array(
                'name' => 'Purpur (Pant 206)',
                'hex' => '#cc0066',
                'is_bright' => false,
                'category' => 'fhe',
                'created_at' => now()
            ),
            array(
                'name' => 'Grau (Architektur, Pant Warm Gray 8)',
                'hex' => '#999088',
                'is_bright' => false,
                'category' => 'fhe',
                'created_at' => now()
            ),
            array(
                'name' => 'Kieselgrau (Stadt- und Raumplanung, Pant 431)',
                'hex' => '#60686b',
                'is_bright' => false,
                'category' => 'fhe',
                'created_at' => now()
            ),
            array(
                'name' => 'BS_Primary',
                'hex' => '#0d6efd',
                'is_bright' => false,
                'category' => 'bootstrap',
                'created_at' => now()
            ),
            array(
                'name' => 'BS_Primary_Border_Subtle',
                'hex' => '#9ec5fe',
                'is_bright' => true,
                'category' => 'bootstrap',
                'created_at' => now()
            ),
            array(
                'name' => 'BS_Primary_BG_Subtle',
                'hex' => '#cfe2ff',
                'is_bright' => true,
                'category' => 'bootstrap',
                'created_at' => now()
            ),
            array(
                'name' => 'BS_Success',
                'hex' => '#198754',
                'is_bright' => false,
                'category' => 'bootstrap',
                'created_at' => now()
            ),
            array(
                'name' => 'BS_Success_Border_Subtle',
                'hex' => '#a3cfbb',
                'is_bright' => true,
                'category' => 'bootstrap',
                'created_at' => now()
            ),
            array(
                'name' => 'BS_Success_BG_Subtle',
                'hex' => '#d1e7dd',
                'is_bright' => true,
                'category' => 'bootstrap',
                'created_at' => now()
            ),
            array(
                'name' => 'BS_Info',
                'hex' => '#0dcaf0',
                'is_bright' => null,
                'category' => 'bootstrap',
                'created_at' => now()
            ),
            array(
                'name' => 'BS_Info_Border_Subtle',
                'hex' => '#9eeaf9',
                'is_bright' => true,
                'category' => 'bootstrap',
                'created_at' => now()
            ),
            array(
                'name' => 'BS_Info_BG_Subtle',
                'hex' => '#cff4fc',
                'is_bright' => true,
                'category' => 'bootstrap',
                'created_at' => now()
            ),
            array(
                'name' => 'BS_Warning',
                'hex' => '#ffc107',
                'is_bright' => null,
                'category' => 'bootstrap',
                'created_at' => now()
            ),
            array(
                'name' => 'BS_Warning_Border_Subtle',
                'hex' => '#ffe69c',
                'is_bright' => true,
                'category' => 'bootstrap',
                'created_at' => now()
            ),
            array(
                'name' => 'BS_Warning_BG_Subtle',
                'hex' => '#fff3cd',
                'is_bright' => true,
                'category' => 'bootstrap',
                'created_at' => now()
            ),
            array(
                'name' => 'BS_Danger',
                'hex' => '#dc3545',
                'is_bright' => false,
                'category' => 'bootstrap',
                'created_at' => now()
            ),
            array(
                'name' => 'BS_Danger_Border_Subtle',
                'hex' => '#f1aeb5',
                'is_bright' => true,
                'category' => 'bootstrap',
                'created_at' => now()
            ),
            array(
                'name' => 'BS_Danger_BG_Subtle',
                'hex' => '#f8d7da',
                'is_bright' => true,
                'category' => 'bootstrap',
                'created_at' => now()
            ),
            array(
                'name' => 'BS_Light',
                'hex' => '#f8f9fa',
                'is_bright' => true,
                'category' => 'bootstrap',
                'created_at' => now()
            ),
            array(
                'name' => 'BS_Secondary_Border_Subtle',
                'hex' => '#c4c8cb',
                'is_bright' => true,
                'category' => 'bootstrap',
                'created_at' => now()
            ),
            array(
                'name' => 'BS_Secondary_BG_Subtle',
                'hex' => '#e2e3e5',
                'is_bright' => true,
                'category' => 'bootstrap',
                'created_at' => now()
            ),
            array(
                'name' => 'BS_Gray200',
                'hex' => '#e9ecef',
                'is_bright' => true,
                'category' => 'bootstrap',
                'created_at' => now()
            ),
            array(
                'name' => 'BS_Gray300',
                'hex' => '#dee2e6',
                'is_bright' => true,
                'category' => 'bootstrap',
                'created_at' => now()
            ),
            array(
                'name' => 'BS_Gray400',
                'hex' => '#ced4da',
                'is_bright' => true,
                'category' => 'bootstrap',
                'created_at' => now()
            ),
            array(
                'name' => 'BS_Gray500',
                'hex' => '#adb5bd',
                'is_bright' => null,
                'category' => 'bootstrap',
                'created_at' => now()
            ),
            array(
                'name' => 'BS_Gray600 (BS_Secondary)',
                'hex' => '#6c757d',
                'is_bright' => false,
                'category' => 'bootstrap',
                'created_at' => now()
            ),
            array(
                'name' => 'BS_Gray700',
                'hex' => '#495057',
                'is_bright' => false,
                'category' => 'bootstrap',
                'created_at' => now()
            ),
            array(
                'name' => 'BS_Gray800',
                'hex' => '#343a40',
                'is_bright' => false,
                'category' => 'bootstrap',
                'created_at' => now()
            ),
            array(
                'name' => 'BS_Dark',
                'hex' => '#212529',
                'is_bright' => false,
                'category' => 'bootstrap',
                'created_at' => now()
            )
        ]);

        $colors = ColorCode::all();
        foreach ($colors as $color)
        {
            $color->updateRgbValues();
            $color->save();
        }
    }
}
