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

namespace App\Http\Controllers;

use App\Models\ProjectSettings;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;


class ProjectSettingsController extends Controller
{
    public function update(ProjectSettings $settings): RedirectResponse
    {
        if (!Gate::allows('edit-projects')) {
            abort(403);
        }

        $data = $this->validatedData($settings['id']);
        $this->setValidatedData($settings, $data);

        $settings['editor_id'] = Auth::id();
        $settings->save();

        return back()->with('success', __(':things have been updated.', ['things' => __('Project Settings')]));
    }

    private function setValidatedData(ProjectSettings $settings, $data): void
    {
        $settings['mean_positive_th'] = $data['mean_positive_th'];
        $settings['mean_negative_th'] = $data['mean_negative_th'];
        $settings['mean_potential_th'] = $data['mean_potential_th'];
        $settings['max_positive_th'] = $data['max_positive_th'];
        $settings['max_negative_th'] = $data['max_negative_th'];
        $settings['max_potential_th'] = $data['max_potential_th'];
        $settings['mean_pos_effects_th'] = $data['mean_pos_effects_th'];
        $settings['mean_neg_effects_th'] = $data['mean_neg_effects_th'];
        $settings['max_pos_effects_th'] = $data['max_pos_effects_th'];
        $settings['max_neg_effects_th'] = $data['max_neg_effects_th'];
        $settings['min_met_conditions'] = $data['min_met_conditions'];
        $settings['operator'] = $data['operator'];
    }

    private function validatedData($id): mixed
    {
        $validated = request()->validate([
            'settings.' . $id . '.mean_positive_th' => 'numeric',
            'settings.' . $id . '.mean_negative_th' => 'numeric',
            'settings.' . $id . '.mean_potential_th' => 'numeric',
            'settings.' . $id . '.max_positive_th' => 'integer',
            'settings.' . $id . '.max_negative_th' => 'integer',
            'settings.' . $id . '.max_potential_th' => 'integer',
            'settings.' . $id . '.mean_pos_effects_th' => 'numeric',
            'settings.' . $id . '.mean_neg_effects_th' => 'numeric',
            'settings.' . $id . '.max_pos_effects_th' => 'integer',
            'settings.' . $id . '.max_neg_effects_th' => 'integer',
            'settings.' . $id . '.min_met_conditions' => 'integer',
            'settings.' . $id . '.operator' => 'string'
        ]);
        return $validated['settings'][$id];
    }
}
