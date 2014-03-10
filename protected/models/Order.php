<?php

/**
 * This is the model class for table "order".
 *
 * The followings are the available columns in table 'order':
 * @property integer $id
 * @property integer $user_id
 * @property string $secret_key
 * @property integer $delivery_id
 * @property double $delivery_price
 * @property double $total_price
 * @property integer $status_id
 * @property integer $paid
 * @property string $user_name
 * @property string $user_email
 * @property string $user_address
 * @property string $user_phone
 * @property string $user_comment
 * @property string $ip_address
 * @property string $created
 * @property string $updated
 * @property string $discount
 * @property string $admin_comment
 */
class Order extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'order';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
                        array('user_name, user_phone, user_address', 'required'),
                        array('user_email', 'email'),
			array('user_id, delivery_id, status_id, paid', 'numerical', 'integerOnly'=>true),
			array('delivery_price, total_price', 'numerical'),
			array('secret_key', 'length', 'max'=>10),
			array('user_name, user_email', 'length', 'max'=>100),
			array('user_address, discount', 'length', 'max'=>255),
			array('user_phone', 'length', 'max'=>30),
			array('user_comment', 'length', 'max'=>500),
			array('ip_address', 'length', 'max'=>50),
			array('created, updated, admin_comment', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, user_id, secret_key, delivery_id, delivery_price, total_price, status_id, paid, user_name, user_email, user_address, user_phone, user_comment, ip_address, created, updated, discount, admin_comment', 'safe', 'on'=>'search'),
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
			'user_id' => 'User',
			'secret_key' => 'Secret Key',
			'delivery_id' => 'Delivery',
			'delivery_price' => 'Delivery Price',
			'total_price' => 'Total Price',
			'status_id' => 'Status',
			'paid' => 'Paid',
			'user_name' => 'Ф.И.О.',
			'user_email' => 'E-mail',
			'user_address' => 'Адрес',
			'user_phone' => 'Телефон',
			'user_comment' => 'Комментарий',
			'ip_address' => 'Ip Address',
			'created' => 'Created',
			'updated' => 'Updated',
			'discount' => 'Discount',
			'admin_comment' => 'Admin Comment',
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
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('secret_key',$this->secret_key,true);
		$criteria->compare('delivery_id',$this->delivery_id);
		$criteria->compare('delivery_price',$this->delivery_price);
		$criteria->compare('total_price',$this->total_price);
		$criteria->compare('status_id',$this->status_id);
		$criteria->compare('paid',$this->paid);
		$criteria->compare('user_name',$this->user_name,true);
		$criteria->compare('user_email',$this->user_email,true);
		$criteria->compare('user_address',$this->user_address,true);
		$criteria->compare('user_phone',$this->user_phone,true);
		$criteria->compare('user_comment',$this->user_comment,true);
		$criteria->compare('ip_address',$this->ip_address,true);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('updated',$this->updated,true);
		$criteria->compare('discount',$this->discount,true);
		$criteria->compare('admin_comment',$this->admin_comment,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Order the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
