<?php

namespace asoliman\yii2\seo\models;

use Yii;

/**
 * This is the model class for table "meta".
 *
 * @property integer $id
 * @property string $hash
 * @property string $route
 * @property string $robots_index
 * @property string $robots_follow
 * @property string $author
 * @property string $title
 * @property string $keywords
 * @property string $description
 * @property string $canonical
 * @property string $created_at
 * @property string $updated_at
 */
class Meta extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'meta';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['hash', 'route', 'created_at', 'updated_at'], 'required'],
            [['robots_index', 'robots_follow', 'keywords', 'description', 'canonical'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['hash', 'route', 'author', 'title'], 'string', 'max' => 255],
            [['hash'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function beforeValidate()
    {
        $this->hash = md5($this->route);
        return parent::beforeValidate();
    }
    
    /**
     * @inheritdoc
     */
    public function beforeSave($insert)
    {
        $this->hash = md5($this->route);
        return parent::beforeSave($insert);
    }
    
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'hash' => Yii::t('app', 'Hash'),
            'route' => Yii::t('app', 'Route'),
            'robots_index' => Yii::t('app', 'Robots Index'),
            'robots_follow' => Yii::t('app', 'Robots Follow'),
            'author' => Yii::t('app', 'Author'),
            'title' => Yii::t('app', 'Title'),
            'keywords' => Yii::t('app', 'Keywords'),
            'description' => Yii::t('app', 'Description'),
            'canonical' => Yii::t('app', 'Canonical'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }
}
