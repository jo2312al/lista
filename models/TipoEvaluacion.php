<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tipo_evaluacion".
 *
 * @property int $id_tipo
 * @property string $descripcion
 *
 * @property Evaluacion[] $evaluacions
 */
class TipoEvaluacion extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tipo_evaluacion';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['descripcion'], 'required'],
            [['descripcion'], 'string', 'max' => 50],
            [['descripcion'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_tipo' => 'Id Tipo',
            'descripcion' => 'Descripcion',
        ];
    }

    /**
     * Gets query for [[Evaluacions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEvaluacions()
    {
        return $this->hasMany(Evaluacion::class, ['id_tipo' => 'id_tipo']);
    }

}
