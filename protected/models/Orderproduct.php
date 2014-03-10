<?php

/**
 * This is the model class for table "orderproduct".
 *
 * The followings are the available columns in table 'orderproduct':
 * @property integer $id
 * @property integer $order_id
 * @property integer $product_id
 * @property integer $configurable_id
 * @property string $name
 * @property string $configurable_name
 * @property string $configurable_data
 * @property string $variants
 * @property integer $quantity
 * @property string $sku
 * @property double $price
 */
class Orderproduct extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'orderproduct';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('order_id, product_id', 'required'),
			array('order_id, product_id, configurable_id, quantity', 'numerical', 'integerOnly'=>true),
			array('price', 'numerical'),
			array('sku', 'length', 'max'=>255),
			array('name, configurable_name, configurable_data, variants', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, order_id, product_id, configurable_id, name, configurable_name, configurable_data, variants, quantity, sku, price', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'order_id' => 'Order',
			'product_id' => 'Product',
			'configurable_id' => 'Configurable',
			'name' => 'Name',
			'configurable_name' => 'Configurable Name',
			'configurable_data' => 'Configurable Data',
			'variants' => 'Variants',
			'quantity' => 'Quantity',
			'sku' => 'Sku',
			'price' => 'Price',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('order_id',$this->order_id);
		$criteria->compare('product_id',$this->product_id);
		$criteria->compare('configurable_id',$this->configurable_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('configurable_name',$this->configurable_name,true);
		$criteria->compare('configurable_data',$this->configurable_data,true);
		$criteria->compare('variants',$this->variants,true);
		$criteria->compare('quantity',$this->quantity);
		$criteria->compare('sku',$this->sku,true);
		$criteria->compare('price',$this->price);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Orderproduct the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
