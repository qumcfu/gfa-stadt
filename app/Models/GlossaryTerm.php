<?php
/*
 * The MIT License (MIT)
 *
 * Copyright (c) 2024, https://gfa-stadt.de, see LICENSE.txt for contact information
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GlossaryTerm extends Model
{
    use HasFactory;

    public function glossary(): BelongsTo
    {
        return $this->belongsTo(Glossary::class);
    }

    public function getHyperlinkedDescription(): string
    {
        if(!isset($this['description']) || is_null($this['description'])) return $this['description'];

        $description = $this['description'] ?? '';

        $referenceKeys = [];

        // $pattern = '/\d+(?=[^[]*\])/';
        // $matchCount = preg_match_all($pattern, $description, $referenceKeys);

        $description = str_replace('[', '<a class="btn-link text-decoration-none cursor-pointer" href="#glossary-references">[', $description);
        $description = str_replace(']', ']</a>', $description);

        /*
        if(sizeof($referenceKeys) > 0)
        {
            $description .= '<hr>';
            foreach ($referenceKeys as $refKey)
            {
                $reference = Reference::where([['questionnaire_id', 0], ['index', $refKey]])->first();
                if(isset($reference))
                {
                    $description .= '<p class="mt-2 mb-0">' . $reference->getApaStyle() . '</p>';
                }
            }
        }
        */

        return $description;
    }
}
