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

class Reference extends Model
{
    use HasFactory;

    public function questionnaire(): BelongsTo
    {
        return $this->belongsTo(Questionnaire::class);
    }

    public function getApaStyle(): string
    {
        $reference = '[' . $this['index'] . '] ';
        if(isset($this['author'])) $reference .= $this['author'] . (isset($this['year']) ? (' (' . $this['year'] . ')') : '') . '. ';
        if(!isset($this['author']) && !isset($this['editor']) && isset($this['publisher'])) $reference .= $this['publisher'] . (isset($this['year']) ? (' (' . $this['year'] . ')') : '') . '. ';
        if(isset($this['title'])) $reference .= $this['title'] . '.';

        if(isset($this['title']) && isset($this['book'])) $reference .= ' In: ';
        if(isset($this['editor']) && !isset($this['book'])) $reference .= ' ';
        if(isset($this['editor'])) $reference .= $this['editor'] . ' (Eds.)';
        if(isset($this['editor']) && isset($this['book']))
        {
            if(isset($this['author'])) $reference .= ', ';
            else $reference .= '. ' . (isset($this['year']) ? (' (' . $this['year'] . '). ') : '');
        }
        if(isset($this['book'])) $reference .= '<span class="fst-italic">' . $this['book'] . '</span>';

        if(isset($this['journal'])) $reference .= ' <span class="fst-italic">' . $this['journal'];
        if(isset($this['journal']) && isset($this['volume'])) $reference .= ', ';
        if(isset($this['volume'])) $reference .= $this['volume'];
        if(isset($this['journal'])) $reference .= '</span>';

        if(isset($this['issue'])) $reference .= '(' . $this['issue'] . ')';
        if(isset($this['journal']) && isset($this['page'])) $reference .= ', ';
        if(isset($this['book']) && isset($this['page'])) $reference .= ' (';
        if(isset($this['page'])) $reference .= $this['page'];
        if(isset($this['book']) && isset($this['page'])) $reference .= ')';
        if(isset($this['journal']) || isset($this['book']) || isset($this['editor'])) $reference .= '.';

        if(isset($this['publisher']) && (isset($this['author']) || isset($this['editor']))) $reference .= ' ' . $this['publisher'] . '.';

        if(isset($this['url']) || isset($this['doi'])) $reference .= ' ';

        if(isset($this['url'])) $reference .= '<a href="' . $this['url'] . '" target="_blank" rel="noopener">' . $this['url'] . '</a>';
        else if(isset($this['doi'])) $reference .= '<a href="' . $this['doi'] . '" target="_blank" rel="noopener">' . $this['doi'] . '</a>';

        if(isset($this['accessed'])) $reference .= ' (accessed ' . $this['accessed'] . ')';

        // italicize "et al."
        $reference = str_replace('et al.', '<span class="fst-italic">et al.</span>', $reference);

        return $reference;
    }
}
