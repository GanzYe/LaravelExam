<?php

namespace App\Http\Requests;

use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function rules()
    {

        return [
            'name' => [
                'required', 'string', 'max:100',
            ],
            'description' => [
                'required', 'string',
            ],
            'image'=>[
                'nullable','file','image'
            ],
            'price'=>[
                'required','numeric','min:0'
            ],
            'inStock'=>[
                'required','numeric','min:0'
            ],
            'catalog_id'=>[
                'required','numeric','min:0'
            ],
        ];
    }

    function validatedWithImage(){
        $data = $this->validated();
        if ($this->hasFile('image')){

            /** @var Product $product */
            if ($product = $this->route('products')){
                $product->deleteImage();
            }
            $path = $this->file('image')->store('public/images');
            $data['image_path']=str_replace("public","storage",$path);
        }
        return $data;
    }
}
