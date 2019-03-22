<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Operation extends Model
{
    public function article()
    {
        return $this->belongsTo(Article::class);
    }

    public function operation_type()
    {
        return $this->belongsTo(OprationType::class);
    }

    public function operation_detail()
    {
        return $this->belongsTo(OperationDetail::class);
    }

    public function berrie()
    {
        return $this->belongsTo(Article::class);
    }

    public function getArticleNombreArticuloAttribute(){
        if ($this->article)
            return $this->article->nombre_articulo;
            return 'sin cantidad especificada';
    }

    public function getArticleDescripcionAttribute(){
        if ($this->article)
            return $this->article->descripcion;
            return 'sin descripción especificada';
    }

    public function getArticleCantAttribute(){
        if ($this->article)
            return $this->article->cant;
            return 'sin descripción especificada';
    }

    public function getBerrieNombreBerrieAttribute(){
        if ($this->berrie)
            return $this->berrie->nombre_berrie;
            return 'sin cantidad especificada';
    }

    public function getOperationDetailFechaAttribute(){
        if ($this->operation_detail)
            return $this->operation_detail->fecha;
            return 'sin fecha especificada';
    }
    public function getOperationDetailFolioAttribute(){
        if ($this->operation_detail)
            return $this->operation_detail->folio;
            return 'sin folio especificada';
    }


}
