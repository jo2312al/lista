<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "curso".
 *
 * @property int $id_curso
 * @property string $nombre
 * @property int $id_profesor
 *
 * @property Alumno[] $alumnos
 * @property Evaluacion[] $evaluacions
 * @property Profesor $profesor
 */
class Curso extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'curso';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'id_profesor'], 'required'],
            [['id_profesor'], 'integer'],
            [['nombre'], 'string', 'max' => 100],
            [['id_profesor'], 'exist', 'skipOnError' => true, 'targetClass' => Profesor::class, 'targetAttribute' => ['id_profesor' => 'id_profesor']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_curso' => 'Id Curso',
            'nombre' => 'Nombre',
            'id_profesor' => 'Id Profesor',
        ];
    }

    /**
     * Gets query for [[Alumnos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAlumnos()
    {
        return $this->hasMany(Alumno::class, ['id_curso' => 'id_curso']);
    }

    /**
     * Gets query for [[Evaluacions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEvaluacions()
    {
        return $this->hasMany(Evaluacion::class, ['id_curso' => 'id_curso']);
    }

    /**
     * Gets query for [[Profesor]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProfesor()
    {
        return $this->hasOne(Profesor::class, ['id_profesor' => 'id_profesor']);
    }

}
