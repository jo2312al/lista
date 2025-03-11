<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "alumno".
 *
 * @property int $id_alumno
 * @property string $nombre
 * @property string $apellido
 * @property int $id_curso
 *
 * @property Asistencia[] $asistencias
 * @property Curso $curso
 * @property Entrega[] $entregas
 * @property Participacion[] $participacions
 */
class Alumno extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'alumno';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'apellido', 'id_curso'], 'required'],
            [['id_curso'], 'integer'],
            [['nombre', 'apellido'], 'string', 'max' => 50],
            [['id_curso'], 'exist', 'skipOnError' => true, 'targetClass' => Curso::class, 'targetAttribute' => ['id_curso' => 'id_curso']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_alumno' => 'Id Alumno',
            'nombre' => 'Nombre',
            'apellido' => 'Apellido',
            'id_curso' => 'Id Curso',
        ];
    }

    /**
     * Gets query for [[Asistencias]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAsistencias()
    {
        return $this->hasMany(Asistencia::class, ['id_alumno' => 'id_alumno']);
    }

    /**
     * Gets query for [[Curso]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCurso()
    {
        return $this->hasOne(Curso::class, ['id_curso' => 'id_curso']);
    }

    /**
     * Gets query for [[Entregas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEntregas()
    {
        return $this->hasMany(Entrega::class, ['id_alumno' => 'id_alumno']);
    }

    /**
     * Gets query for [[Participacions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getParticipacions()
    {
        return $this->hasMany(Participacion::class, ['id_alumno' => 'id_alumno']);
    }

}
