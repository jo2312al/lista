<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "participacion".
 *
 * @property int $id_participacion
 * @property int $id_alumno
 * @property string $fecha
 * @property int $puntos
 *
 * @property Alumno $alumno
 */
class Participacion extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'participacion';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_alumno', 'fecha', 'puntos'], 'required'],
            [['id_alumno', 'puntos'], 'integer'],
            [['fecha'], 'safe'],
            [['id_alumno'], 'exist', 'skipOnError' => true, 'targetClass' => Alumno::class, 'targetAttribute' => ['id_alumno' => 'id_alumno']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_participacion' => 'Id Participacion',
            'id_alumno' => 'Id Alumno',
            'fecha' => 'Fecha',
            'puntos' => 'Puntos',
        ];
    }

    /**
     * Gets query for [[Alumno]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAlumno()
    {
        return $this->hasOne(Alumno::class, ['id_alumno' => 'id_alumno']);
    }

}
