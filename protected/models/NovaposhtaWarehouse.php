<?php

/**
 * This is the model class for table "novaposhta_warehouse".
 *
 * The followings are the available columns in table 'novaposhta_warehouse':
 * @property string $id
 * @property string $city_id
 * @property string $address_ru
 * @property string $address_ua
 * @property string $phone
 * @property string $weekday_work_hours
 * @property string $weekday_reseiving_hours
 * @property string $weekday_delivery_hours
 * @property string $saturday_work_hours
 * @property string $saturday_reseiving_hours
 * @property string $saturday_delivery_hours
 * @property integer $max_weight_allowed
 * @property double $longitude
 * @property double $latitude
 * @property string $number_in_city
 * @property string $updated_at
 */
class NovaposhtaWarehouse extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'novaposhta_warehouse';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, city_id, number_in_city, updated_at', 'required'),
			array('max_weight_allowed', 'numerical', 'integerOnly'=>true),
			array('longitude, latitude', 'numerical'),
			array('id, city_id', 'length', 'max'=>10),
			array('address_ru, address_ua', 'length', 'max'=>200),
			array('phone', 'length', 'max'=>100),
			array('weekday_work_hours, weekday_reseiving_hours, weekday_delivery_hours, saturday_work_hours, saturday_reseiving_hours, saturday_delivery_hours', 'length', 'max'=>20),
			array('number_in_city', 'length', 'max'=>3),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, city_id, address_ru, address_ua, phone, weekday_work_hours, weekday_reseiving_hours, weekday_delivery_hours, saturday_work_hours, saturday_reseiving_hours, saturday_delivery_hours, max_weight_allowed, longitude, latitude, number_in_city, updated_at', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
                    'NovaPoshtaCities' => array(self::BELONGS_TO,'NovaPoshtaCities', 'city_id')
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'city_id' => 'City',
			'address_ru' => 'Address Ru',
			'address_ua' => 'Address Ua',
			'phone' => 'Phone',
			'weekday_work_hours' => 'Weekday Work Hours',
			'weekday_reseiving_hours' => 'Weekday Reseiving Hours',
			'weekday_delivery_hours' => 'Weekday Delivery Hours',
			'saturday_work_hours' => 'Saturday Work Hours',
			'saturday_reseiving_hours' => 'Saturday Reseiving Hours',
			'saturday_delivery_hours' => 'Saturday Delivery Hours',
			'max_weight_allowed' => 'Max Weight Allowed',
			'longitude' => 'Longitude',
			'latitude' => 'Latitude',
			'number_in_city' => 'Number In City',
			'updated_at' => 'Updated At',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('city_id',$this->city_id,true);
		$criteria->compare('address_ru',$this->address_ru,true);
		$criteria->compare('address_ua',$this->address_ua,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('weekday_work_hours',$this->weekday_work_hours,true);
		$criteria->compare('weekday_reseiving_hours',$this->weekday_reseiving_hours,true);
		$criteria->compare('weekday_delivery_hours',$this->weekday_delivery_hours,true);
		$criteria->compare('saturday_work_hours',$this->saturday_work_hours,true);
		$criteria->compare('saturday_reseiving_hours',$this->saturday_reseiving_hours,true);
		$criteria->compare('saturday_delivery_hours',$this->saturday_delivery_hours,true);
		$criteria->compare('max_weight_allowed',$this->max_weight_allowed);
		$criteria->compare('longitude',$this->longitude);
		$criteria->compare('latitude',$this->latitude);
		$criteria->compare('number_in_city',$this->number_in_city,true);
		$criteria->compare('updated_at',$this->updated_at,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                        'pagination'=>array(
                            'pageSize'=>250
                            )
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return NovaposhtaWarehouse the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        public static function all()
        {            
            return CHtml::listData(self::model()->findAll(),'id','name_ru');
        }
}
