<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IconSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('icons')->insert([
            array(
                'name' => '1-circle',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => '1-circle-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => '1-square',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => '1-square-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => '2-circle',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => '2-circle-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => '2-square',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => '2-square-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => '3-circle',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => '3-circle-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => '3-square',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => '3-square-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => '4-circle',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => '4-circle-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => '4-square',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => '4-square-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => '5-circle',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => '5-circle-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => '5-square',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => '5-square-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'activity',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'airplane',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'airplane-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'alarm',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'alarm-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'app',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'app-indicator',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'arrow-left',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'arrow-left-circle',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'arrow-left-circle-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'arrow-up-left',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'arrow-up-left-circle',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'arrow-up-left-circle-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'arrow-up',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'arrow-up-circle',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'arrow-up-circle-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'arrow-up-right',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'arrow-up-right-circle',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'arrow-up-right-circle-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'arrow-right',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'arrow-right-circle',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'arrow-right-circle-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'arrow-down-right',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'arrow-down-right-circle',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'arrow-down-right-circle-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'arrow-down',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'arrow-down-circle',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'arrow-down-circle-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'arrow-down-left',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'arrow-down-left-circle',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'arrow-down-left-circle-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'asterisk',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'award',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'award-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'back',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'backpack',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'backpack-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'backpack2',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'backpack2-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'backpack3',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'backpack3-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'bag',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'bag-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'balloon',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'balloon-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'balloon-heart',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'balloon-heart-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'ban',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'ban-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'bandaid',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'bandaid-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'bank',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'bank2',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'bar-chart',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'bar-chart-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'battery',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'battery-half',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'battery-full',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'battery-charging',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'bell',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'bell-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'bell-slash',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'bell-slash-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'bezier',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'bezier2',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'bicycle',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'bookshelf',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'boombox',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'boombox-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'border',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'border-all',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'border-inner',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'border-outer',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'box',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'box-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'box-seam',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'box-seam-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'boxes',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'briefcase',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'briefcase-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'brightness-alt-high',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'brightness-alt-high-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'broadcast',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'broadcast-pin',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'building',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'building-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'buildings',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'buildings-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'bullseye',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'bus-front',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'bus-front-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'cake',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'cake-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'cake2',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'cake2-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'calendar-week',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'calendar-week-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'calendar2-date',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'calendar2-date-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'calendar3',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'camera',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'camera-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'capsule',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'capsule-pill',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'car-front',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'car-front-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'caret-left',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'caret-left-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'caret-up',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'caret-up-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'caret-right',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'caret-right-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'caret-down',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'caret-down-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'cart4',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'cash-coin',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'cash-stack',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'cassette',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'cassette-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'chat',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'chat-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'chat-quote',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'chat-quote-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'chat-text',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'chat-text-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'circle',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'circle-half',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'circle-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'clipboard',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'clipboard-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'clipboard-data',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'clipboard-data-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'cloud',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'cloud-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'cloud-drizzle',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'cloud-drizzle-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'cloud-lightning-rain',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'cloud-lightning-rain-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'cloud-moon',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'cloud-moon-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'cloud-sun',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'cloud-sun-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'clouds',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'clouds-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'coin',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'compass',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'compass-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'cone-striped',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'controller',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'cookie',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'cpu',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'cpu-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'crosshair',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'crosshair2',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'cup-hot',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'cup-hot-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'diagram-3',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'diagram-3-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'diamond',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'diamond-half',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'diamond-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'dice-1',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'dice-1-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'dice-2',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'dice-2-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'dice-3',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'dice-3-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'dice-4',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'dice-4-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'dice-5',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'dice-5-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'dice-6',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'dice-6-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'display',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'display-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'door-closed',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'door-closed-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'duffle',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'duffle-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'ear',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'ear-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'easel2',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'easel2-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'emoji-astonished',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'emoji-astonished-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'emoji-expressionless',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'emoji-expressionless-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'emoji-frown',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'emoji-frown-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'emoji-grimace',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'emoji-grimace-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'emoji-grin',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'emoji-grin-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'emoji-neutral',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'emoji-neutral-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'emoji-smile',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'emoji-smile-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'envelope',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'envelope-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'exclamation-circle',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'exclamation-circle-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'exclamation-square',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'exclamation-square-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'exclamation-triangle',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'exclamation-triangle-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'exclude',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'eyedropper',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'eyeglasses',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'fan',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'feather',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'film',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'fingerprint',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'fire',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'floppy',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'floppy2-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'flower1',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'flower2',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'flower3',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'forward',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'forward-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'gem',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'geo',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'geo-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'geo-alt',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'geo-alt-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'gift',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'gift-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'globe',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'globe-americas',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'globe-asia-australia',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'globe-central-south-asia',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'globe-europe-africa',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'graph-down-arrow',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'graph-up-arrow',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'hammer',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'hand-thumbs-down',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'hand-thumbs-down-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'hand-thumbs-up',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'hand-thumbs-up-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'headphones',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'headset-vr',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'heart',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'heart-half',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'heart-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'heartbreak',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'heartbreak-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'heart-pulse',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'heart-pulse-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'hearts',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'hexagon',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'hexagon-half',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'hexagon-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'highlighter',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'highlights',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'hourglass-split',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'house',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'house-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'houses',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'houses-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'hypnotize',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'image',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'image-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'images',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'info-circle',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'info-circle-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'intersect',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'joystick',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'keyboard',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'keyboard-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'ladder',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'lamp',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'lamp-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'laptop',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'laptop-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'layer-backward',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'layer-forward',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'life-preserver',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'lightbulb',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'lightbulb-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'lightbulb-off',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'lightbulb-off-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'lightning',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'lightning-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'lock',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'lock-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'luggage',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'luggage-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'lungs',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'lungs-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'magic',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'magnet',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'magnet-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'mailbox',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'mailbox-flag',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'map',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'map-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'marker-tip',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'mask',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'megaphone',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'megaphone-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'mic',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'mic-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'moon',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'moon-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'moon-stars',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'moon-stars-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'mortarboard',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'mortarboard-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'mouse2',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'mouse2-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'music-note',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'music-note-beamed',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'music-player',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'music-player-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'newspaper',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'noise-reduction',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'paperclip',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'passport',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'passport-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'pc',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'pc-display-horizontal',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'pen',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'pen-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'pentagon',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'pentagon-half',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'pentagon-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'people',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'people-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'person-arms-up',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'person-raised-hand',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'person-standing',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'person-standing-dress',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'person-walking',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'person-wheelchair',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'pie-chart',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'pie-chart-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'piggy-bank',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'piggy-bank-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'plug',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'plug-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'plugin',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'postage',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'postage-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'printer',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'printer-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'puzzle',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'puzzle-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'qr-code',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'qr-code-scan',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'question-circle',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'question-circle-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'question-square',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'question-square-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'quote',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'radar',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'radioactive',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'rainbow',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'receipt',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'reception-0',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'reception-1',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'reception-2',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'reception-3',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'reception-4',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'recycle',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'repeat',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'rocket',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'rocket-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'rocket-takeoff',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'rocket-takeoff-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'safe2',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'safe2-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'scissors',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'send',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'send-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'shadows',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'shield',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'shield-shaded',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'shield-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'shield-check',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'shield-fill-check',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'shield-lock',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'shield-lock-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'shield-slash',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'shield-slash-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'shift',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'shift-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'sign-stop',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'sign-stop-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'signpost-split',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'signpost-split-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'snow',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'snow2',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'snow3',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'soundwave',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'speaker',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'speaker-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'speedometer',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'spellcheck',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'square',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'square-half',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'square-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'stack',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'star',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'star-half',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'star-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'stars',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'stoplights',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'stoplights-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'stopwatch',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'stopwatch-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'subtract',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'suit-club',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'suit-club-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'suit-diamond',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'suit-diamond-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'suit-heart',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'suit-heart-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'suit-spade',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'suit-spade-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'suitcase',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'suitcase-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'suitcase2',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'suitcase2-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'suitcase-lg',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'suitcase-lg-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'sun',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'sun-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'sunrise',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'sunrise-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'sunset',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'sunset-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'table',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'thermometer-snow',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'thermometer-sun',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'tools',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'translate',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'transparency',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'tree',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'tree-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'triangle',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'triangle-half',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'triangle-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'trophy',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'trophy-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'truck',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'umbrella',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'umbrella-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'union',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'universal-access',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'universal-access-circle',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'valentine',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'vignette',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'vinyl',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'vinyl-fill',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'virus',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'watch',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'wifi',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'wifi-off',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'wind',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'wrench-adjustable',
                'fill' => true,
                'created_at' => now()
            ),
            array(
                'name' => 'zoom-in',
                'fill' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'zoom-out',
                'fill' => false,
                'created_at' => now()
            )
        ]);

        DB::table('icons')->insert([
            array(
                'name' => 'clipboard-check',
                'fill' => false,
                'available' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'code-slash',
                'fill' => false,
                'available' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'file-pdf-fill',
                'fill' => true,
                'available' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'file-word-fill',
                'fill' => true,
                'available' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'file-excel-fill',
                'fill' => true,
                'available' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'file-zip-fill',
                'fill' => true,
                'available' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'folder',
                'fill' => false,
                'available' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'folder-fill',
                'fill' => true,
                'available' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'gear',
                'fill' => false,
                'available' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'hdd',
                'fill' => false,
                'available' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'journal-bookmark-fill',
                'fill' => true,
                'available' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'journal-richtext',
                'fill' => false,
                'available' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'kanban',
                'fill' => false,
                'available' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'patch-check-fill',
                'fill' => true,
                'available' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'patch-question-fill',
                'fill' => true,
                'available' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'person',
                'fill' => false,
                'available' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'person-check',
                'fill' => false,
                'available' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'person-fill',
                'fill' => true,
                'available' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'play-btn-fill',
                'fill' => true,
                'available' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'question-circle',
                'fill' => false,
                'available' => false,
                'created_at' => now()
            ),
            array(
                'name' => 'question-circle-fill',
                'fill' => true,
                'available' => false,
                'created_at' => now()
            )
        ]);
    }
}
