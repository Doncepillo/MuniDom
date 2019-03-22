<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getCategoryCategoriaAttribute(){
        if ($this->category)
            return $this->category->categoria;
            return 'sin categoría';
    }

     public function operation(){
            
            return $this->hasOne(Operation::class);  
    }

    public function getOperationCantidadAttribute(){
        if ($this->operation)
            return $this->operation->cantidad;
            return 'sin cantidad especificada';
    }

    public function article_state()
    {
        return $this->belongsTo(ArticleState::class);
    }

    public function getArticleStateEstadoAttribute(){
        if ($this->article_state)
            return $this->article_state->estado;
            return 'sin estado asociado';
    }
    
    public function sub_category()
    {
        return $this->belongsTo(SubCategory::class);
    }

    public function getSubCategorySubcategoriaAttribute(){
        if ($this->sub_category)
            return $this->sub_category->subcategoria;
            return 'sin subcategoría';
    }

    
    
}
