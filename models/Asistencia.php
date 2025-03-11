<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "asistencia".
 *
 * @property int $id_asistencia
 * @property int $id_alumno
 * @property string $fecha
 * @property int $id_estado
 *
 * @property Alumno $alumno
 * @property EstadoAsistencia $estado
 */
class Asistencia extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'asistencia';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_alumno', 'fecha', 'id_estado'], 'required'],
            [['id_alumno', 'id_estado'], 'integer'],
            [['fecha'], 'safe'],
            [['id_alumno'], 'exist', 'skipOnError' => true, 'targetClass' => Alumno::class, 'targetAttribute' => ['id_alumno' => 'id_alumno']],
            [['id_estado'], 'exist', 'skipOnError' => true, 'targetClass' => EstadoAsistencia::class, 'targetAttribute' => ['id_estado' => 'id_estado']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_asistencia' => 'Id Asistencia',
            'id_alumno' => 'Id Alumno',
            'fecha' => 'Fecha',
            'id_estado' => 'Id Estado',
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

    /**
     * Gets query for [[Estado]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEstado()
    {
        return $this->hasOne(EstadoAsistencia::class, ['id_estado' => 'id_estado']);
    }

}
