<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "profesor".
 *
 * @property int $id_profesor
 * @property string $nombre
 * @property string $apellido
 * @property string $correo
 * @property string $contraseña
 *
 * @property Curso[] $cursos
 */
class Profesor extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'profesor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'apellido', 'correo', 'contraseña'], 'required'],
            [['nombre', 'apellido'], 'string', 'max' => 50],
            [['correo'], 'string', 'max' => 100],
            [['contraseña'], 'string', 'max' => 255],
            [['correo'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_profesor' => 'Id Profesor',
            'nombre' => 'Nombre',
            'apellido' => 'Apellido',
            'correo' => 'Correo',
            'contraseña' => 'Contraseña',
        ];
    }

    /**
     * Gets query for [[Cursos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCursos()
    {
        return $this->hasMany(Curso::class, ['id_profesor' => 'id_profesor']);
    }

}
