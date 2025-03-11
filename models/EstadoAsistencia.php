<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "estado_asistencia".
 *
 * @property int $id_estado
 * @property string $descripcion
 *
 * @property Asistencia[] $asistencias
 */
class EstadoAsistencia extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'estado_asistencia';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['descripcion'], 'required'],
            [['descripcion'], 'string', 'max' => 20],
            [['descripcion'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_estado' => 'Id Estado',
            'descripcion' => 'Descripcion',
        ];
    }

    /**
     * Gets query for [[Asistencias]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAsistencias()
    {
        return $this->hasMany(Asistencia::class, ['id_estado' => 'id_estado']);
    }

}
