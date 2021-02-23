<?php

namespace common\models\query;

/**
 * This is the ActiveQuery class for [[\common\models\AboutI18n]].
 *
 * @see \common\models\AboutI18n
 */
class AboutI18nQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \common\models\AboutI18n[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\AboutI18n|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
