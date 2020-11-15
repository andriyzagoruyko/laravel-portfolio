<?php

namespace App\Http\Requests;

use App\Models\Project;
use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'slug' => 'required|min:3|max:60|unique:projects',
            'name' => 'required|max:255',
            'link' => 'required|max:255',
            'image' => 'required_without:_method',
        ];

        if ($this->route()->named('projects.update')) {
            $project = Project::where('slug', $this->slug)->first();
            $routeId = $this->route()->parameter('project')->id;

            if (!is_null($project) && $project->id === $routeId) {
                $rules['slug'] .=  ',id,' . $routeId;
            }
        }

        return $rules;
    }
    
    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'required' => 'Поле :attribute обов`язкове',
            'required_without' => 'Поле :attribute обов`язкове',
            'max' => 'Максимальна кількість символів для :attribute - :max',
            'min' => 'Мінімальна кількість символів для :attribute - :min',
        ];
    }
}

