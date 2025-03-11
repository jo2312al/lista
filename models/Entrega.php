<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "entrega".
 *
 * @property int $id_entrega
 * @property int $id_alumno
 * @property int $id_evaluacion
 * @property string $fecha_entrega
 * @property float|null $calificacion
 *
 * @property Alumno $alumno
 * @property Evaluacion $evaluacion
 */
class Entrega extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'entrega';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['calificacion'], 'default', 'value' => null],
            [['id_alumno', 'id_evaluacion', 'fecha_entrega'], 'required'],
            [['id_alumno', 'id_evaluacion'], 'integer'],
            [['fecha_entrega'], 'safe'],
            [['calificacion'], 'number'],
            [['id_alumno'], 'exist', 'skipOnError' => true, 'targetClass' => Alumno::class, 'targetAttribute' => ['id_alumno' => 'id_alumno']],
            [['id_evaluacion'], 'exist', 'skipOnError' => true, 'targetClass' => Evaluacion::class, 'targetAttribute' => ['id_evaluacion' => 'id_evaluacion']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_entrega' => 'Id Entrega',
            'id_alumno' => 'Id Alumno',
            'id_evaluacion' => 'Id Evaluacion',
            'fecha_entrega' => 'Fecha Entrega',
            'calificacion' => 'Calificacion',
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
     * Gets query for [[Evaluacion]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEvaluacion()
    {
        return $this->hasOne(Evaluacion::class, ['id_evaluacion' => 'id_evaluacion']);
    }

}
