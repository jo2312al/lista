<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "evaluacion".
 *
 * @property int $id_evaluacion
 * @property int $id_curso
 * @property string $nombre
 * @property int $id_tipo
 * @property string $fecha
 *
 * @property Curso $curso
 * @property Entrega[] $entregas
 * @property TipoEvaluacion $tipo
 */
class Evaluacion extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'evaluacion';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_curso', 'nombre', 'id_tipo', 'fecha'], 'required'],
            [['id_curso', 'id_tipo'], 'integer'],
            [['fecha'], 'safe'],
            [['nombre'], 'string', 'max' => 100],
            [['id_curso'], 'exist', 'skipOnError' => true, 'targetClass' => Curso::class, 'targetAttribute' => ['id_curso' => 'id_curso']],
            [['id_tipo'], 'exist', 'skipOnError' => true, 'targetClass' => TipoEvaluacion::class, 'targetAttribute' => ['id_tipo' => 'id_tipo']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_evaluacion' => 'Id Evaluacion',
            'id_curso' => 'Id Curso',
            'nombre' => 'Nombre',
            'id_tipo' => 'Id Tipo',
            'fecha' => 'Fecha',
        ];
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
        return $this->hasMany(Entrega::class, ['id_evaluacion' => 'id_evaluacion']);
    }

    /**
     * Gets query for [[Tipo]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTipo()
    {
        return $this->hasOne(TipoEvaluacion::class, ['id_tipo' => 'id_tipo']);
    }

}
