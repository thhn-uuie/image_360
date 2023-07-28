<?php

namespace app\models\query;

use yii\db\ActiveQuery;

class ProductQuery extends ActiveQuery
{
    

    public function searchByName($keyword)
    {
        return $this->andWhere(['like', 'name_category', $keyword]);
    }

    
}